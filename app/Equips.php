<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equips extends Model
{
    protected $fillable = ['name', 'type', 'location'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'equips';
}
