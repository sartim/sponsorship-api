<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'gender_id'];

    public function sponsor()
    {
        return $this->hasOne(ChildSponsor::class);
    }

    public function gender(){
        return $this->belongsTo('App\Gender');
    }
}
