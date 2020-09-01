<?php

use Illuminate\Database\Seeder;

class CategoryDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class,20)->create();
    }
}
