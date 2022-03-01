<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('categories')->delete();
        $categories = array(
            array('id' => 1,'title' => 'Weight Loss' ,'description' => "Weight Loss" ,'status' => "A"),
            array('id' => 2,'title' => 'Holistic Health Coach' ,'description' => "Health" ,'status' => "A"),
            array('id' => 3,'title' => 'Primal/Paleo Health Coach' ,'description' => "Health" ,'status' => "A"),
            array('id' => 4,'title' => 'Wellness Health Coach' ,'description' => "Health" ,'status' => "A"),
            array('id' => 5,'title' => 'Parkour' ,'description' => "Parkour" ,'status' => "A"),
            array('id' => 6,'title' => 'Climbing' ,'description' => "Climbing" ,'status' => "A"),
            array('id' => 7,'title' => 'Yoga' ,'description' => "Workout" ,'status' => "A"),
            array('id' => 8,'title' => 'Hockey' ,'description' => "Workout" ,'status' => "A"),
            array('id' => 9,'title' => 'Muscle Gain' ,'description' => "Workout" ,'status' => "A"),
            array('id' => 10,'title' => 'Swimming' ,'description' => "Afrikaans" ,'status' => "A"),
            array('id' => 11,'title' => 'Stretching' ,'description' => "Workout" ,'status' => "A"),
            array('id' => 12,'title' => 'Pilates' ,'description' => "Pilates" ,'status' => "A"),
            array('id' => 13,'title' => 'Tennis' ,'description' => "Tennis" ,'status' => "A"),
            array('id' => 14,'title' => 'Kick-boxing' ,'description' => "Health" ,'status' => "A"),
            array('id' => 15,'title' => 'Boxing' ,'description' => "Boxing" ,'status' => "A"),
            array('id' => 16,'title' => 'Soccer' ,'description' => "Soccer" ,'status' => "A"),
            array('id' => 17,'title' => 'Running' ,'description' => "Running" ,'status' => "A"),
            array('id' => 18,'title' => 'Fitness' ,'description' => "Fitness" ,'status' => "A"),
            array('id' => 19,'title' => 'Bootcamp' ,'description' => "Bootcamp" ,'status' => "A"),
            array('id' => 20,'title' => 'Cardio' ,'description' => "Health" ,'status' => "A")
            
            );
            \DB::table('categories')->insert($categories);

    }
}
