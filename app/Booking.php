<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Booking extends Model
{
    protected $fillable=['from','to'];
    public function bookables(){
       return $this->belongsTo(Bookable::class);
    }
    public function review(){
        return $this->hasOne(Review::class);
    }


    public function scopeBetweenDates(Builder $query,$from,$to){

        $query->where('to','>=',$from)->where('from','<=',$to);
    }
}
