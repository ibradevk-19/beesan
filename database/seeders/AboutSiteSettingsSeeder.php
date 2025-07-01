<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutData;

class AboutSiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutData = AboutData::first();
        if($aboutData){
          $aboutData->update([
            'our_roles_section' => [
                [
                    'title' => [
                        'ar' => 'تاريخنا',
                        'en' => 'Our History'
                    ],
                    'description' => [
                        'ar' => 'وصف مختصر عن تاريخنا باللغة العربية.',
                        'en' => 'A brief description about our history in English.'
                    ]
                    ],
                    [
                    'title' => [
                        'ar' => 'تاريخنا',
                        'en' => 'Our History'
                    ],
                    'description' => [
                        'ar' => 'وصف مختصر عن تاريخنا باللغة العربية.',
                        'en' => 'A brief description about our history in English.'
                    ]
                ]
            ],
                'history_section' => [
                [
                    'title' => [
                    'ar' => 'تاريخنا',
                    'en' => 'Our History'
                    ],
                    'description' => [
                        'ar' => 'وصف مختصر عن تاريخنا باللغة العربية.',
                        'en' => 'A brief description about our history in English.'
                    ]
                    ],
                    [
                    'title' => [
                        'ar' => 'تاريخنا',
                        'en' => 'Our History'
                    ],
                    'description' => [
                        'ar' => 'وصف مختصر عن تاريخنا باللغة العربية.',
                        'en' => 'A brief description about our history in English.'
                    ]
                ]
            ],
            'team_section' => [
                [
                    'image' => 'team1.jpg',
                    'name' => [
                        'ar' => 'أحمد محمد',
                        'en' => 'Ahmed Mohamed'
                    ],
                    'position' => [
                        'ar' => 'مدير تنفيذي',
                        'en' => 'CEO'
                    ],
                    'bio' => [
                        'ar' => 'نبذة مختصرة عن أحمد.',
                        'en' => 'Short bio about Ahmed.'
                    ]
                ],
                [
                    'image' => 'team2.jpg',
                    'name' => [
                        'ar' => 'سارة علي',
                        'en' => 'Sara Ali'
                    ],
                    'position' => [
                        'ar' => 'مدير مشاريع',
                        'en' => 'Project Manager'
                    ],
                    'bio' => [
                        'ar' => 'نبذة مختصرة عن سارة.',
                        'en' => 'Short bio about Sara.'
                    ]
                ]
            ]
         ]);
        }
        //  AboutData::create([
        //     'history_section' => [
        //         'title' => [
        //             'ar' => 'تاريخنا',
        //             'en' => 'Our History'
        //         ],
        //         'description' => [
        //             'ar' => 'وصف مختصر عن تاريخنا باللغة العربية.',
        //             'en' => 'A brief description about our history in English.'
        //         ]
        //     ],
        //     'team_section' => [
        //         [
        //             'image' => 'team1.jpg',
        //             'name' => [
        //                 'ar' => 'أحمد محمد',
        //                 'en' => 'Ahmed Mohamed'
        //             ],
        //             'position' => [
        //                 'ar' => 'مدير تنفيذي',
        //                 'en' => 'CEO'
        //             ],
        //             'bio' => [
        //                 'ar' => 'نبذة مختصرة عن أحمد.',
        //                 'en' => 'Short bio about Ahmed.'
        //             ]
        //         ],
        //         [
        //             'image' => 'team2.jpg',
        //             'name' => [
        //                 'ar' => 'سارة علي',
        //                 'en' => 'Sara Ali'
        //             ],
        //             'position' => [
        //                 'ar' => 'مدير مشاريع',
        //                 'en' => 'Project Manager'
        //             ],
        //             'bio' => [
        //                 'ar' => 'نبذة مختصرة عن سارة.',
        //                 'en' => 'Short bio about Sara.'
        //             ]
        //         ]
        //     ]
        // ]);
    }
}
