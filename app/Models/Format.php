<?php

namespace App\Models;


use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\EmbedsOne;

class Format extends Model {
  use SoftDeletes;

  protected $fillable = [
    'revision',
    'name',
  ];

  public function last_editor(): EmbedsOne {
    return $this->embedsOne(User::class);
  }
}
