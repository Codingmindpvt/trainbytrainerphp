<?php

namespace Database\Seeders;

use App\Models\Day;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakeDayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::truncate();
        DB::table('days')->insert([
            ['name' => 'Sun','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'Mon','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'Tue','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'Wed','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'Thu','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'Fri','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name' => 'Sat','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]
        ]);
    }
}
