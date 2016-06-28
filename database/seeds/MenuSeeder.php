<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id' => 1,
                'title' => 'Main',
                'slug' =>  'main'
            ],
            [
                'id' => 2,
                'title' => 'Footer',
                'slug' =>  'footer'
            ],
        ]);
    }
}
