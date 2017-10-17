<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class Ticket extends Model
{
   protected $fillable = ['user_id','event_id','seat_id'];

   public function user(){
       return $this->belongsTo('App\User');
   }

   public function event(){
       return $this->belongsTo('App\Model\Event');
   }

   public function  seat(){
       return $this->belongsTo('App\Model\Seat');
   }
}
