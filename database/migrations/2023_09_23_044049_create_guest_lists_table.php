<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('guest_lists', function (Blueprint $table) {
      $table->id();
      $table->string('fullname');
      $table->string('division');
      $table->string('emekdas');
      $table->string('nomre');
      $table->date('tarix');
      $table->text('purpose');
      $table->text('note');
      $table->string('status');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('guest_lists');
  }
};