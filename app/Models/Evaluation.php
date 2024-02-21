<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\EmbedsMany;

class Evaluation extends Model {
  use SoftDeletes;

  protected $fillable = [
    'status',
    'type',
    'description',
    'limit_date',
  ];

  protected $casts = [
    'limit_date' => 'datetime',
  ];

  public function process(): BelongsTo {
    return $this->belongsTo(Process::class);
  }

  public function files(): EmbedsMany {
    return $this->embedsMany(File::class);
  }

  public function comments(): EmbedsMany {
    return $this->embedsMany(Comment::class);
  }
}
