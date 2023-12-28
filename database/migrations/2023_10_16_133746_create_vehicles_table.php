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
    Schema::create('vehicles', function (Blueprint $table) {
      $table->id();
      $table->string('vehicle_plate');
      $table->string('vehicle_year');
      $table->integer('vehicle_power');
      $table->integer('vehicle_averages');
      $table->integer('vehicle_hour_avg');
      $table->integer('vehicle_day_norm');
      $table->integer('vehicle_odometer');
      $table
        ->bigInteger('id_vehicle_type')
        ->unsigned()
        ->index()
        ->nullable();
      $table
        ->foreign('id_vehicle_type')
        ->references('id')
        ->on('vehicle_types');
      $table
        ->bigInteger('id_vehicle_fuels')
        ->unsigned()
        ->index()
        ->nullable();
      $table
        ->foreign('id_vehicle_fuels')
        ->references('id')
        ->on('vehicle_fuels');
      $table
        ->bigInteger('id_vehicle_marks')
        ->unsigned()
        ->index()
        ->nullable();
      $table
        ->foreign('id_vehicle_marks')
        ->references('id')
        ->on('vehicle_marks');
      $table
        ->bigInteger('id_vehicle_tons')
        ->unsigned()
        ->index()
        ->nullable();
      $table
        ->foreign('id_vehicle_tons')
        ->references('id')
        ->on('vehicle_tons');
      $table
        ->bigInteger('id_vehicle_motors')
        ->unsigned()
        ->index()
        ->nullable();
      $table
        ->foreign('id_vehicle_motors')
        ->references('id')
        ->on('vehicle_motors');
      $table
        ->bigInteger('id_vehicle_statuses')
        ->unsigned()
        ->index()
        ->nullable();
      $table
        ->foreign('id_vehicle_statuses')
        ->references('id')
        ->on('vehicle_statuses');

      $table
        ->bigInteger('id_vehicle_novs')
        ->unsigned()
        ->index()
        ->nullable();
      $table
        ->foreign('id_vehicle_novs')
        ->references('id')
        ->on('vehicle_novs');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('vehicles');
  }
};
