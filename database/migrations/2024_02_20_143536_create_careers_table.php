<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('careers', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('area');
      $table->enum('grade', ['public', 'technician', 'engineering', 'degree', 'major', 'master']);
      $table->enum('availability', ['weekdays', 'weekend']);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('careers');
  }
};
