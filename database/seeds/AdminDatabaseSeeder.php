<?php

use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'moaz',
            'email' => 'moazzaq@gmail.com',
            'password' => bcrypt('123456'), // password
//            'remember_token' => Str::random(10),
        ]);
    }
}
