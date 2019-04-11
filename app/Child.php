<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender_id'];
}
