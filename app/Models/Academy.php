<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\HasMany;

class Academy extends Model {
  use SoftDeletes;

  protected $fillable = [
    'name',
    'isotype',
  ];

  public function employees(): HasMany {
    return $this->hasMany(Employee::class);
  }

  public function careers(): HasMany {
    return $this->hasMany(Career::class);
  }
}
