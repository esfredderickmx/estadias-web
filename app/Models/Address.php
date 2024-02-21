<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Address extends Model {
  use SoftDeletes;

  protected $fillable = [
    'country',
    'state',
    'city',
    'zip',
    'settlement',
    'street',
    'number',
  ];
}
