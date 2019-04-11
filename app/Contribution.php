<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $fillable = ['child_id', 'sponsor_id', 'currency_id', 'contribution'];
}
