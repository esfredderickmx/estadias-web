<?php

namespace App\Livewire\Management\SignUpRequests;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class RequestsIndex extends Component {

  use WithPagination;

  private $users;

  public $total_results;
  public $search;
  public $sorting = 'first_name';
  public $sort_direction = false;
  public $select_all = false;
  public $selection = [];

  #[Title('Solicitudes de activación')]
  public function render() {
    $query = User::query();

    $query->onlyTrashed();

    if ($this->search) {
      $query->where(function (Builder $sub_query) {
        $sub_query->where('first_name', 'like', "%$this->search%")->orWhere('last_name', 'like', "%$this->search%")->orWhere('email', 'like', "%$this->search%");
      });
    }

    if ($this->sorting) {
      $query->orderBy($this->sorting, $this->sort_direction ? 'desc' : 'asc');
    }

    if ($query->count() === 0) {
      $this->resetPage();
    }

    $this->total_results = $query->count();
    $this->users = $query->paginate(8);

    if ($this->users->currentPage() > $this->users->lastPage()) {
      $this->resetPage();
      $this->render();
    }

    return view('livewire.management.sign-up-requests.requests-index')->with([
      'users' => $this->users
    ]);
  }

  public function updatedSelectAll($property) {
    if ($property) {
      if ($this->search) {
        $this->selection = User::onlyTrashed()->where(function (Builder $query) {
          $query->where('first_name', 'like', "%$this->search%")->orWhere('last_name', 'like', "%$this->search%")->orWhere('email', 'like', "%$this->search%");
        })->pluck('_id');
        $this->selection = $this->selection->toArray();
      } else {
        $this->selection = User::onlyTrashed()->pluck('_id');
        $this->selection = $this->selection->toArray();
      }
    } else {
      $this->selection = [];
    }
  }

  public function updatedSelection() {
    $this->verifySelection();
  }

  public function verifySelection() {
    if (!$this->selection) {
      $this->select_all = false;
      $this->dispatch('child-check-change', set: 'unchecked');
    } elseif ($this->selection) {
      if (!($this->total_results === count($this->selection))) {
        $this->select_all = false;
        $this->dispatch('child-check-change', set: 'indeterminate');
      } else {
        $this->select_all = true;
        $this->dispatch('child-check-change', set: 'checked');
      }
    }
  }

  #[On('sort-by')]
  public function changeSorting($column) {
    if ($this->sorting !== $column) {
      $this->sorting = $column;
      $this->sort_direction = false;
    } else {
      $this->sort_direction = !$this->sort_direction;
    }
  }

  #[On('show-message')]
  public function resetSelection() {
    $this->reset('selection');

    $this->verifySelection();
  }
}
