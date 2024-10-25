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
                'title'=>'Introduction to Java',
                'content'=>"Ever wondered why Java's logo is a steaming cup of coffee? The creators of Java, while brainstorming a name for their new language, chose 'Java', a slang term for 'coffee'. Just as coffee fuels our day, Java powers the tech world with its robust and versatile features.
                In this topic, we will explore why java has been a popular choice among developers for over two decades and how it has brewed success in various domains. We will also introduce you to your very first Java program. So, grab your cup of coffee and join us on this exciting journey into the world of java!.
                Java is a high-level, class-based, object-oriented programming language. James Gosling at Sun Microsystems designed it, it was released in 1995. The language was developed with the 'Write Once, Run Anywhere' (WORA) philosophy. This principle underscore Java's key feature - platform independence, allowing the same Java program to run on multiple platforms without modifications.",
                'course_id'=>1
            ],
            [
                'title'=>'Data types and variables',
                'content'=>"In programming, <strong>variable</strong> is a placeholder for storing a value of a particular <strong>type:</strong> a string, a number, or something else. In this topic, you will learn how to <strong>declare</strong> and use variables in Java programs.
                Every variable has a name (also known as <strong>an identifier</strong>)",
                'course_id'=>1
            ],
            [
                'title'=>'Introduction to Java',
                'content'=>"Ever wondered why Java's logo is a steaming cup of coffee? The creators of Java, while brainstorming a name for their new language, chose 'Java', a slang term for 'coffee'. Just as coffee fuels our day, Java powers the tech world with its robust and versatile features.
                In this topic, we will explore why java has been a popular choice among developers for over two decades and how it has brewed success in various domains. We will also introduce you to your very first Java program. So, grab your cup of coffee and join us on this exciting journey into the world of java!",
                'course_id'=>1
            ],
            [
                'title'=>'Introduction to Python',
                'content'=>"Pyhon, developed by Guido Van Rossum in 1991, is loved by beginners and experts alike for its readable code and concise syntax. This language is so versatile that it can power websites, analyze data, build machine learning models, automate tasks, create games, and even control robots!
                Writing code in Python is as easy as pie. So let's ge coding without any delay!",
                'course_id'=>2
            ],
            [
                'title'=>'Introduction to HTML',
                'content'=>"HTML (HyperText Markup Language) was created by Tim Berners-Lee in 1991 as a standard for creating web pages. It's a markup language used to structure content on the web, defining elements like headings, paragraphs, links, and images. HTML forms the backbone of web content. In Iayman's terms, HTML is like the skeleton of a website.",
                'course_id'=>3
            ]

        ]);
    }
}
