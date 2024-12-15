<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $quizId = DB::table('quizzes')->insertGetId([
            'title' => 'Quiz Pengenalan Java',
            'course_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       
        $questions = [
            [
                'question' => 'Apa itu Java?',
                'answers' => [
                    'A' => 'Bahasa Pemrograman',
                    'B' => 'Sistem Operasi',
                    'C' => 'Kopi Jawa',
                    'D' => 'Framework',
                ],
                'correct_answer' => 'A',
            ],
            [
                'question' => 'Apa itu OOP?',
                'answers' => [
                    'A' => 'Object-Oriented Programming',
                    'B' => 'Style asal asalan',
                    'C' => 'Onboarding Process',
                    'D' => 'Operational Process',
                ],
                'correct_answer' => 'A',
            ],
        ];

     
        foreach ($questions as $questionData) {
            DB::table('questions')->insert([
                'quiz_id' => $quizId,
                'title' => $questionData['question'],
                'isActive' => true,
                'choices' => json_encode($questionData['answers']), 
                'correct_answer' => $questionData['correct_answer'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
