<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutData;

class AboutDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        AboutData::create([
            'title' => [
                'ar' => 'عنوان رئيسي بالعربية',
                'en' => 'Main Title in English',
            ],
            'body' => [
                'ar' => 'نص تفصيلي بالعربية يشرح محتوى القسم.',
                'en' => 'Detailed English text explaining the section content.',
            ],
            'button' => [
                'ar' => 'اقرأ المزيد',
                'en' => 'Read More',
            ],
        ]);
    }
}
