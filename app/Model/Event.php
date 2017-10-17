<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    protected $fillable = ['name','poster','category_id','place_id','date','schedule'];

    public function place(){
        return $this->belongsTo('App\Model\Place');
    }

    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

    public function seats(){
        return $this->hasMany('App\Model\Seat');
    }

    public function tickets(){
        return $this->hasMany('App\Model\Ticket');
    }
}
