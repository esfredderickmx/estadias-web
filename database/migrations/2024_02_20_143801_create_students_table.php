<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->integer('registration_number')->unique();
      $table->enum('modality', ['weekdays', 'weekend']);
      $table->enum('chance_status', ['ok', 'warned', 'banned']);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('students');
  }
};
