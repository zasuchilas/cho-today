<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linked extends Model
{
    protected $fillable = ['ico', 'name', 'path'];

    protected $hidden = [];
}
