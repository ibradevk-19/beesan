<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Report::create([
            'title' => [
                'ar' => 'عنوان رئيسي بالعربية',
                'en' => 'Main Title in English',
            ],
            'body' => [
                'ar' => 'نص تفصيلي بالعربية يشرح محتوى القسم.',
                'en' => 'Detailed English text explaining the section content.',
            ],
             'image'=> 'logos/main-logo.png',
            'file'=> 'logos/main-logo.png',
            'date' =>'2025-06-27',
            'tag' => 'y_reports',
        ]);

                Report::create([
            'title' => [
                'ar' => 'عنوان رئيسي بالعربية',
                'en' => 'Main Title in English',
            ],
            'body' => [
                'ar' => 'نص تفصيلي بالعربية يشرح محتوى القسم.',
                'en' => 'Detailed English text explaining the section content.',
            ],
             'image'=> 'logos/main-logo.png',
            'file'=> 'logos/main-logo.png',
            'date' =>'2025-06-27',
            'tag' => 'y_reports',
        ]);


        Report::create([
            'title' => [
                'ar' => 'عنوان رئيسي بالعربية',
                'en' => 'Main Title in English',
            ],
            'body' => [
                'ar' => 'نص تفصيلي بالعربية يشرح محتوى القسم.',
                'en' => 'Detailed English text explaining the section content.',
            ],
             'image'=> 'logos/main-logo.png',
            'file'=> 'logos/main-logo.png',
            'date' =>'2025-06-27',
            'tag' => 'fin_reports',
        ]);

                Report::create([
            'title' => [
                'ar' => 'عنوان رئيسي بالعربية',
                'en' => 'Main Title in English',
            ],
            'body' => [
                'ar' => 'نص تفصيلي بالعربية يشرح محتوى القسم.',
                'en' => 'Detailed English text explaining the section content.',
            ],
             'image'=> 'logos/main-logo.png',
            'file'=> 'logos/main-logo.png',
            'date' =>'2025-06-27',
            'tag' => 'fin_reports',
        ]);

                Report::create([
            'title' => [
                'ar' => 'عنوان رئيسي بالعربية',
                'en' => 'Main Title in English',
            ],
            'body' => [
                'ar' => 'نص تفصيلي بالعربية يشرح محتوى القسم.',
                'en' => 'Detailed English text explaining the section content.',
            ],
             'image'=> 'logos/main-logo.png',
            'file'=> 'logos/main-logo.png',
            'date' =>'2025-06-27',
            'tag' => 'pre_reports',
        ]);

        Report::create([
            'title' => [
                'ar' => 'عنوان  453',
                'en' => 'Main Title in English',
            ],
            'body' => [
                'ar' => 'نص تفصيلي بالعربية يشرح محتوى القسم.',
                'en' => 'Detailed English text explaining the section content.',
            ],
             'image'=> 'logos/main-logo.png',
            'file'=> 'logos/main-logo.png',
            'date' =>'2025-06-27',
            'tag' => 'pre_reports',
        ]);
    }
}
