<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
         $this->call(SettingDataBaseSeeder::class);
        $this->call(CategoryDataBaseSeeder::class);
        $this->call(SubCategoryDataBaseSeeder::class);
        $this->call(ProductDataBaseSeeder::class);
    }
}
