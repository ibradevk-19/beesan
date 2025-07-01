<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->insert([
            'title' => json_encode([
                'ar' => 'عنوان الموقع',
                'en' => 'Website Title'
            ]),
            'description' => json_encode([
                'ar' => 'وصف الموقع بشكل مختصر',
                'en' => 'Short description of the website'
            ]),
            'og:title' => json_encode([
                'ar' => 'عنوان OG',
                'en' => 'OG Title'
            ]),
            'og:description' => json_encode([
                'ar' => 'وصف OG',
                'en' => 'OG Description'
            ]),
            'og:site_name' => json_encode([
                'ar' => 'اسم الموقع',
                'en' => 'Site Name'
            ]),
            'address' => json_encode([
                'ar' => 'غزة، فلسطين',
                'en' => 'Gaza, Palestine'
            ]),
            'site_url' => 'https://example.com',
            'mobile_number' => '+970599123456',
            'email' => 'info@example.com',
            'main_logo' => 'logos/main-logo.png',
            'footer_logo' => 'logos/footer-logo.png',
            'bg_logo' => 'logos/bg-logo.png',
            'footer_bio' => json_encode([
                'ar' => 'نص تعريفي في الفوتر',
                'en' => 'Footer bio text'
            ]),
            'facebook_url' => 'https://facebook.com/yourpage',
            'twitter_url' => 'https://twitter.com/yourprofile',
            'instagram_url' => 'https://instagram.com/yourprofile',
            'tiktok_url' => 'https://tiktok.com/@yourprofile',
            'telegram_url' => 'https://t.me/yourchannel',
            'created_at' => now(),
            'updated_at' => now(),

            'hero_title' => json_encode([
                'ar' => 'نص تعريفي في الفوتر',
                'en' => 'Footer bio text'
            ]),

            'hero_body' => json_encode([
                'ar' => 'نص تعريفي في الفوتر',
                'en' => 'Footer bio text'
            ]),
            'hero_image' => 'logos/main-logo.png',
            'beneficiaries_count' => 120,
            'project_count' => 120,
            'partner_count' => 120,
            'years_experience_count' => 120
              
        ]);
    }
}
