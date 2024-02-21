<?php

namespace App\Models;


use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

class File extends Model {
  use SoftDeletes;

  protected $fillable = [
    'name',
    'extension',
  ];

  public function user(): BelongsTo {
    return $this->belongsTo(User::class);
  }
}
