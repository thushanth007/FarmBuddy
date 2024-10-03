<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use DateTime;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'name'  => 'Farm Buddy',
            'title' => 'Farm Buddy',
            'description' => 'We are a friendly bar serving a variety of cocktails, wines and beers. Our bar is a perfect place for a couple.',
            'keywords'  => 'Farmbuddy',
            'google_analytics' => '',
            'phone'  => '+94 77 123 4567',
            'email'  => 'info@farmbuddy.lk',
            'address' => 'Clock Tower, Vavuniya, SL',
            'favicon' => 'favicon.jpg',
            'logo'  => 'logo.png',
            'about' => 'We are a friendly bar serving a variety of cocktails, wines and beers.',
            'facebook' => '',
            'twitter'  => '',
            'user_id'  => '1',
            'status' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
