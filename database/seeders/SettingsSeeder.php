<?php

namespace Database\Seeders;

use App\Models\AppSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $setting = AppSettings::insert([
            ['is_system' => 1, 'setting_type' => 'general', 'key' => 'app_name', 'value' => 'Admin Starter By Lokesh Tulsani', 'sort_order' => '10'],
            ['is_system' => 1, 'setting_type' => 'general', 'key' => 'frontend_online', 'value' => '1', 'sort_order' => '20'],
            ['is_system' => 1, 'is_system' => 1, 'setting_type' => 'general', 'key' => 'reCAPTCHA_site_key', 'value' => 'ADD_SITE_KEY_HERE', 'sort_order' => '30'],
            ['is_system' => 1, 'setting_type' => 'social', 'key' => 'fb_link', 'value' => 'https://www.facebook.com/lokesh.tulsani', 'sort_order' => '40'],
            ['is_system' => 1, 'setting_type' => 'social', 'key' => 'insta_link', 'value' => 'https://www.instagram.com/lokesh7186', 'sort_order' => '50'],
            ['is_system' => 0, 'some_random_setting' => 'User Defined', 'key' => 'rand_1', 'value' => 'User Defined Value', 'sort_order' => '60'],
        ]);
    }
}
