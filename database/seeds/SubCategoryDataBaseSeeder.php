<?php

use Illuminate\Database\Seeder;

class SubCategoryDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class,10)->create([
            'parent_id' => $this->getRandomParentId()
        ]);
    }

    private function getRandomParentId()
    {
        return \App\Models\Category::inRandomOrder()->first()->id;
    }
}
