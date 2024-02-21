<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('evaluations', function (Blueprint $table) {
      $table->id();
      $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
      $table->enum('type', ['first', 'second', 'third', 'final']);
      $table->text('description');
      $table->dateTime('limit_date');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('evaluations');
  }
};
