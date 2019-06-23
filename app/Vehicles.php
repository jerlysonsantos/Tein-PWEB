<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = ['mark', 'model', 'licensePlate', 'carOwnName'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'vehicles';
}
