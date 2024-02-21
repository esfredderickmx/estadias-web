<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

class Employee extends Model {
  use SoftDeletes;

  protected $fillable = [
    'employee_number',
    'can_advise',
  ];

  public function academy(): BelongsTo {
    return $this->belongsTo(Academy::class);
  }
}
