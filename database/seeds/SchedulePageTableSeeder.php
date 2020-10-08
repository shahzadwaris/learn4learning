<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SchedulePageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shedule_page_posters')->insert([

//            'id' => 4,
            'title' => 'SCHEDULE',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('shedule_page_posters')->insert([

//            'id' => 1,
            'title' => 'Search Results',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('shedule_page_posters')->insert([

//            'id' => 2,
            'title' => 'Subject',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('shedule_page_posters')->insert([

//            'id' => 3,
            'title' => 'Teacher',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('shedule_page_posters')->insert([

//            'id' => 4,
            'title' => 'Time Available',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);
        DB::table('shedule_page_posters')->insert([

//            'id' => 4,
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
