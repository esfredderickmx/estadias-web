<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\EmbedsOne;
use MongoDB\Laravel\Relations\HasMany;

class Process extends Model {
  use SoftDeletes;

  protected $fillable = [
    'status',
    'attempt',
    'type',
  ];

  public function period(): EmbedsOne {
    return $this->embedsOne(Period::class);
  }

  public function company(): EmbedsOne {
    return $this->embedsOne(Company::class);
  }

  public function student(): EmbedsOne {
    return $this->embedsOne(Student::class);
  }

  public function advisor(): EmbedsOne {
    return $this->embedsOne(Employee::class);
  }

  public function evaluations(): HasMany {
    return $this->hasMany(Evaluation::class);
  }

  public function files(): EmbedsMany {
    return $this->embedsMany(File::class);
  }

  public function comments(): EmbedsMany {
    return $this->embedsMany(Comment::class);
  }
}
