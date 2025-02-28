<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('xu_tbl_login')->insert([
            //admin
            [
                'name'=>'admin1',

                'email'=> 'admin@gmail.com',
                'password'=> Hash::make('111'),
                'role'=> 'admin',
                
                


            ],

            //user

            [
                'name'=>'user1',

                'email'=> 'user@gmail.com',
                'password'=> Hash::make('111'),
                'role'=> 'user',
                


            ],

        ]);
    }
}
