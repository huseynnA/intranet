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
    Schema::create('way_sheets', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('waysheet_no');
      $table->date('waysheet_date');
      $table
        ->bigInteger('vehicle_id')
        ->unsigned()
        ->index()
        ->nullable();
      $table
        ->foreign('vehicle_id')
        ->references('id')
        ->on('vehicles');
      $table->string('gar_exit_time');
      $table->string('gar_entry_time');
      $table->string('endofday_odometer');
      $table->bigInteger('fuel_start');
      $table->bigInteger('fuel_add');
      $table->bigInteger('fuel_spent');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('way_sheets');
  }
};
