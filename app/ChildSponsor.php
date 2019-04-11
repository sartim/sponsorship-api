<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildSponsor extends Model
{
    protected $fillable = ['child_id', 'sponsor_id'];
}
