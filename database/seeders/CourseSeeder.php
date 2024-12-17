<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
                    [
                        'uuid' => Str::uuid(),
                        'title'=> 'Java',
                        'description'=>'Understand the language behind millions of apps. Grasp core concepts, write basic programs, and make your first step forward breaking into tech.',
                        'img' => 'java-icon.svg'
                    ],
                    [
                        'uuid' => Str::uuid(),
                        'title'=>'Python',
                        'description'=>'Python is a straightforward and versatile language, making it ideal for beginners and experts alike. Dive into our curated lessons to gain foundational skills or branch out into specialized fields, from web development to data analysis.',
                        'img' => 'python-icon.svg'
                    ],
                    [
                        'uuid' => Str::uuid(),
                        'title'=>'HTML',
                        'description'=>'Fundamental part of every web developers toolkit. HTML provides the content that gives web pages structure, by using elements and tags, you can add text, images, videos, forms, and more.',
                        'img' => 'w3_html5-icon.svg'
                    ],
                    [
                        'uuid' => Str::uuid(),
                        'title'=>'JavaScript',
                        'description'=>"JavaScript is a powerfull dynamic behavior on websites and plays an important role in many fields, like front- and back-end engineering, game and mobile development, virtual reality, and more. In this course, you'll learn javaScript fundamentals that will be helpful as you dive deeper into more advanced topics.",
                        'img' => 'javascript-icon.svg'
                    ],
                    [
                        'uuid' => Str::uuid(),
                        'title'=>'CSS',
                        'description'=>'CSS, shortfor Cascading Style Sheets, is a style sheet language used to style websites. Colors, fonts, and page layouts for a site can all be managed using CSS. The more comfortable you are with CSS, the better equipped you will be to create an appeling website.',
                        'img' => 'w3_css-icon.svg'
                    ],
                    [
                        'uuid' => Str::uuid(),
                        'title'=>'Laravel',
                        'description'=>'CSS, shortfor Cascading Style Sheets, is a style sheet language used to style websites. Colors, fonts, and page layouts for a site can all be managed using CSS. The more comfortable you are with CSS, the better equipped you will be to create an appeling website.',
                        'img' => 'laravel-icon.svg'
                    ],
                    [
                        'uuid' => Str::uuid(),
                        'title'=>'Node JS',
                        'description'=>'CSS, shortfor Cascading Style Sheets, is a style sheet language used to style websites. Colors, fonts, and page layouts for a site can all be managed using CSS. The more comfortable you are with CSS, the better equipped you will be to create an appeling website.',
                        'img' => 'node-js-icon.svg'
                    ],
                    [
                        'uuid' => Str::uuid(),
                        'title'=>'Express JS',
                        'description'=>'CSS, shortfor Cascading Style Sheets, is a style sheet language used to style websites. Colors, fonts, and page layouts for a site can all be managed using CSS. The more comfortable you are with CSS, the better equipped you will be to create an appeling website.',
                        'img' => 'express-js-icon.svg'
                    ],
                    [
                        'uuid' => Str::uuid(),
                        'title'=>'Java Springboot',
                        'description'=>'CSS, shortfor Cascading Style Sheets, is a style sheet language used to style websites. Colors, fonts, and page layouts for a site can all be managed using CSS. The more comfortable you are with CSS, the better equipped you will be to create an appeling website.',
                        'img' => 'spring-boot-icon.svg'
                    ]
                ]);
    }
}