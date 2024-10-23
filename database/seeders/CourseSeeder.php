<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
                    [
                        'title'=> 'Java',
                        'description'=>'Understand the language behind millions of apps. Grasp core concepts, write basic programs, and make your first step forward breaking into tech.'
                    ],
                    [
                        'title'=>'Python',
                        'description'=>'Python is a straightforward and versatile language, making it ideal for beginners and experts alike. Dive into our curated lessons to gain foundational skills or branch out into specialized fields, from web development to data analysis.'
                    ],
                    [
                        'title'=>'HTML',
                        'description'=>'Fundamental part of every web developers toolkit. HTML provides the content that gives web pages structure, by using elements and tags, you can add text, images, videos, forms, and more.'
                    ]
                ]);
    }
}
