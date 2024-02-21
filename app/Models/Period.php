<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Period extends Model {
  use SoftDeletes;

  protected $fillable = [
    'quarter',
    'year',
  ];
}
