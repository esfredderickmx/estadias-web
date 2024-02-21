<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

class Comment extends Model {
  use SoftDeletes;

  protected $fillable = [
    'type',
    'message',
  ];

  public function user(): BelongsTo {
    return $this->belongsTo(User::class);
  }
}
