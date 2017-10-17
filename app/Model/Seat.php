<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Seat extends Model
{
    protected $fillable = ['place_id','event_id','status','number'];

    public function  place(){
        return $this->belongsTo('App\Model\Place');
    }
}
