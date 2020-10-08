<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'name' => 'Primary',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);


        DB::table('levels')->insert([
            'name' => 'Secondry',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

        DB::table('levels')->insert([
            'name' => 'Higher',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

        DB::table('levels')->insert([
            'name' => 'Other',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

    }
}
