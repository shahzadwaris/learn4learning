<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ForParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('for_parents')->insert([

            'title' => 'FOR PARENTS',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('for_parents')->insert([

            'title' => 'INSPIRATIONAL TEACHERS',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('for_parents')->insert([

            'title' => 'LEARN AT HOME',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('for_parents')->insert([

            'title' => 'Track Attainment',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('for_parents')->insert([

            'title' => 'Homework Assignment',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('for_parents')->insert([

            'title' => '1 : 1 Tutoring',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('for_parents')->insert([

            'title' => 'REGISTER',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
    }
}
