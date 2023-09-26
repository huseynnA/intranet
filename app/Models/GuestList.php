<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestList extends Model
{
  use HasFactory;

  protected $fillable = ['fullname', 'purpose', 'division', 'id', 'emekdas', 'nomre', 'tarix', 'note'];
}