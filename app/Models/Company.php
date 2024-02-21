<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\EmbedsOne;

class Company extends Model {
  use SoftDeletes;

  protected $fillable = [
    'name',
    'email',
    'phone_number',
    'phone_extension',
  ];

  public function address(): EmbedsOne {
    return $this->embedsOne(Address::class);
  }
}
