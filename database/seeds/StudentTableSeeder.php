<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'thumbmail' => 'admin',
            'email' => 'admin@gmial.com',
            'email_verified_at' =>Carbon::now(),
            'user_contact' => '03001234567',
            'type' => 'admin',
            'password' => Hash::make('123123123'),
            'country' => 'pakistan',
            'city' => 'Lahore',
            'address' => 'DHA Lahore',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
    }
}
