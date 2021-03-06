<?php

use App\Bookable;
use App\Review;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bookable::all()->each(function(Bookable $bookable){
            $reviews = factory(Review::class,random_int(5,15))->make();
            $bookable->reviews()->saveMany($reviews);
        });
    }
}
