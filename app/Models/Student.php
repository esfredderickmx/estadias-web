<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

class Student extends Model {
  use SoftDeletes;

  protected $fillable = [
    'registration_number',
    'modality',
    'chance_status',
  ];

  public function career(): BelongsTo {
    return $this->belongsTo(Career::class);
  }
}
