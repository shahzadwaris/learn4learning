<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiences')->insert([

            'id' => 1,
            'teacher_id' => 1,
            'year' => 2002,
            'location' => 'UK',
            'title' =>'Masters In Computer Science',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('experiences')->insert([

            'id' => 2,
            'teacher_id' => 1,
            'year' => 2000,
            'location' => 'UK',
            'title' =>'Masters In Date Science',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('experiences')->insert([

            'id' => 3,
            'teacher_id' => 1,
            'year' => 1998,
            'location' => 'UK',
            'title' =>'Bashelors in Computer',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);

    }
}
