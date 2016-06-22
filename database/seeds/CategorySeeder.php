<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'title' => 'Mobile Devices',
                'slug' =>  'mobile-devices',
                'parent_id' => null
            ],
            [
                'id' => 2,
                'title' => 'Smartphones',
                'slug' =>  'smartphones',
                'parent_id' => 1
            ],
            [
                'id' => 3,
                'title' => 'Apple',
                'slug' =>  'apple',
                'parent_id' => null
            ],
            [
                'id' => 4,
                'title' => 'iPhone',
                'slug' =>  'iphone',
                'parent_id' => 3
            ],
            [
                'id' => 5,
                'title' => 'iPhone 6s',
                'slug' =>  'iphone-6s',
                'parent_id' => 4
            ],
            [
                'id' => 6,
                'title' => 'iPad',
                'slug' =>  'ipad',
                'parent_id' => 3
            ],
        ]);
    }
}
