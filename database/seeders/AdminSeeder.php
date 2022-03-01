<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                    \DB::table('users')->delete();
                    $users = array(
                        array('id' => 1,
                            'first_name' => "TrainByTrainer",
                            'last_name' => "Team",
                            'email' => "admin@yopmail.com",
                            'password' => Hash::make('12345678'),
                            'status' => 'A',
                            'role_type' =>'A',
                            'account_complete' => 1,
                            'created_at' =>date('Y-m-d h:i:s'))
                        );
                        \DB::table('users')->insert($users);

            }
        }
