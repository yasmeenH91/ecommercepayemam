<?php

use Illuminate\Database\Seeder;

class SettingDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Africa/Cairo',
            'reviews_enabled' => true,
            'auto_approved_reviews' => true,
            'supported_currencies' => ['USD','LE','SAR'],
            'default_currency' => 'USD',
            'store_email' => 'moazzaq@gmail.com',
            'search_engine' => 'mysql',
            'local_shipping_cost' => 0,
            'outer_shipping_cost' => 0,
            'free_shipping_cost' => 0,
            'translatable' => [
                'store_name' => 'المتجر الامامي',
                'free_shipping_label' => 'توصيل مجاني',
                'outer_label' => 'توصيل خارجي',
                'local_label' => 'توصيل داخلي',

            ],
        ]);
    }
}
