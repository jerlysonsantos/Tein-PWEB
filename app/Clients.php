<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = ['name', 'gender', 'age', 'email', 'phone', 'organization'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'tblclientes';
}
