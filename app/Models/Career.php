<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

class Career extends Model {
  use SoftDeletes;

  protected $fillable = [
    'name',
    'area',
    'grade',
    'availability',
  ];

  public function students(): HasMany {
    return $this->hasMany(Student::class);
  }

  public function academy(): BelongsTo {
    return $this->belongsTo(Academy::class);
  }
}
