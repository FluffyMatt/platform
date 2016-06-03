<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Matthew Stephens',
                'username' => 'StepheM06',
                'email' => 'StepheM06@cpwplc.com',
                'password' => bcrypt('StepheM06'),
                'admin' => 1,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Ben Knowles',
                'username' => 'KnowleB04',
                'email' => 'KnowleB04@cpwplc.com',
                'password' => bcrypt('KnowleB04'),
                'admin' => 1,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
