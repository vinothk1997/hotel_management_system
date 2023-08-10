<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_id' => '0776172295',
            'name'=>'amal rakavam',
            'password'=>Hash::make('admin'),
            'user_type'=>'admin',
            'attempt'=>'0',
            'status' =>'active',
        ]);

        DB::table('staffs')->insert([
            'fname' => 'amal',
            'lname'=>'rakavam',
            'gender'=>'Male',
            'nic'=>'199710703012',
            'dob'=>'1997-04-16',
            'address'=>'siththankurichchi',
            'phone_no'=>'0776172295',
            'email'=>'vinothk1997@gmail.com',
            'position' =>'Admin',
        ]);
    }
}
