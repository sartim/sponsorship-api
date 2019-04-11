<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildSponsor extends Model
{
    protected $fillable = ['child_id', 'sponsor_id'];

    public function sponsor(){
        return $this->belongsTo('App\Sponsor');
    }

    public function child(){
        return $this->belongsTo('App\Child');
    }
}
