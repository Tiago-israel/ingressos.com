<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Event;
class Category extends Model
{
    protected $fillable = ['name'];

    public function events(){
        return $this->hasMany('App\Model\Event');
    }
}
