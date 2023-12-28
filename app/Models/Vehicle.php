<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
  use HasFactory;

  protected $fillable = [
    'vehicle_plate',
    'vehicle_year',
    'vehicle_power',
    'vehicle_averages',
    'vehicle_hour_avg',
    'vehicle_day_norm',
    'vehicle_odometer',
    'id_vehicle_type',
    'id_vehicle_fuels',
    'id_vehicle_marks',
    'id_vehicle_tons',
    'id_vehicle_motors',
    'id_vehicle_statuses',
    'id_vehicle_novs',
  ];
}
