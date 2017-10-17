<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Event;
use App\Model\Seat;
class Place extends Model
{
    protected $fillable = ['name','number_of_seats'];

    public function events(){
        return $this->hasMany('App\Model\Event');
    }
    public function seats(){
        return $this->hasMany('App\Model\Seat');
    }
}
