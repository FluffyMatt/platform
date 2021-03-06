<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Matthew',
                'last_name' =>  'Stephens',
                'full_name' => 'Matthew Stephens',
                'username' => 'StepheM06',
                'email' => 'StepheM06@cpwplc.com',
                'password' => bcrypt('StepheM06'),
                'admin' => 1,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            [
                'first_name' => 'Ben',
                'last_name' => 'Knowles',
                'full_name' => 'Ben Knowles',
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
