<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use phpDocumentor\Reflection\Types\Boolean;

class Bookable extends Model
{
    public function Bookings(){
       return $this->hasMany(Booking::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function availableFor($from,$to): bool
    {
       $count= $this->Bookings()->BetweenDates($from,$to)->count();  
       if ($count){
           return true;
       }else{
           return false;
       }
    }
}
