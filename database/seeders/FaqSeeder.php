<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('faq_seeders')->delete();
        $faqseeders = array(
            array('id' => 1, 'title' => 'Popular Workout Programs', 'status' => "A"),
            array('id' => 2, 'title' => 'Popular Classes', 'status' => "A"),
            array('id' => 3, 'title' => 'Creating Accounts', 'status' => "A"),
            array('id' => 4, 'title' => 'Managing Accounts', 'status' => "A"),
            array('id' => 5, 'title' => 'Selling Products', 'status' => "A"),
        );
        \DB::table('faq_seeders')->insert($faqseeders);
    }
}
