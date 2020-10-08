<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class HowitworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('howitworks')->insert([

            'title' => 'LEARNING SHOULD BE FUN',
            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
             Nam nec tellus a odio tincidunt mauris',
            'thumbnail' => 'pic.png',
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ]);


        DB::table('howitworks')->insert([

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



//        DB::table('howitworks')->insert([
//
//            'title' => 'Subject',
//            'discription' => 'Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
//             auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit
//             amet.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris.auci elit cons equat ipsutis
//             sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit.
//             Nam nec tellus a odio tincidunt mauris',
//            'thumbnail' => 'pic.png',
//            'created_at' =>Carbon::now(),
//            'updated_at' =>Carbon::now(),
//        ]);


        DB::table('howitworks')->insert([

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
        DB::table('howitworks')->insert([

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

        DB::table('howitworks')->insert([

            'title' => 'LEARNING SHOULD BE FUN',
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
