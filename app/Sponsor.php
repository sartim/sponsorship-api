<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];
}
