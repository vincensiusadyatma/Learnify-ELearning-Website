<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lessons')->insert([
            [
                'title'=>'Perkenalan Java',
                'content'=>"perkenalan_java.txt",
                'course_id'=>1
            ],
            [
                'title'=>'tipe data dan variabel',
                'content'=>"tipe_data_dan_variabel.txt",
                'course_id'=>1
            ],
            [
                'title'=>'Introduction to Python',
                'content'=>"",
                'course_id'=>2
            ],
            [
                'title'=>'Introduction to HTML',
                'content'=>"",
                'course_id'=>3
            ],
            [
                'title'=>'Introduction to JavaScript',
                'content'=>"",
                'course_id'=>4
            ],
            [
                'title'=>'Introduction to CSS',
                'content'=>"",
                'course_id'=>5
            ]

        ]);
    }
}
