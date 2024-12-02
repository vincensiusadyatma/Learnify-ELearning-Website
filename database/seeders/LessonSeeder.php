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
            // Learning Path untuk Course Java (course_id = 1)
            [
                'title' => 'Perkenalan Java',
                'content' => 'perkenalan_java.txt',
                'course_id' => 1,
                'description' => 'Mengenalkan dasar-dasar bahasa pemrograman Java.'
            ],
            [
                'title' => 'Tipe Data dan Variabel di Java',
                'content' => 'tipe_data_dan_variabel.txt',
                'course_id' => 1,
                'description' => 'Memahami tipe data dasar dan bagaimana mendeklarasikan variabel di Java.'
            ],
            [
                'title' => 'Kontrol Alur Program di Java',
                'content' => 'kontrol_alur_java.txt',
                'course_id' => 1,
                'description' => 'Menjelaskan bagaimana cara mengontrol alur program dengan menggunakan percabangan dan perulangan di Java.'
            ],
            [
                'title' => 'Objek dan Kelas di Java',
                'content' => 'objek_dan_klas_java.txt',
                'course_id' => 1,
                'description' => 'Mengenalkan konsep Object-Oriented Programming (OOP) dalam Java.'
            ],
            [
                'title' => 'Pengolahan Exception di Java',
                'content' => 'exception_java.txt',
                'course_id' => 1,
                'description' => 'Memahami cara menangani kesalahan (exception) dalam program Java.'
            ],

            // Learning Path untuk Course Python (course_id = 2)
            [
                'title' => 'Introduction to Python',
                'content' => 'introduction_python.txt',
                'course_id' => 2,
                'description' => 'Pengenalan dasar bahasa pemrograman Python dan cara menulis kode pertama.'
            ],
            [
                'title' => 'Tipe Data dan Variabel di Python',
                'content' => 'tipe_data_python.txt',
                'course_id' => 2,
                'description' => 'Mempelajari tipe data dasar seperti string, integer, float, dan bagaimana menggunakan variabel di Python.'
            ],
            [
                'title' => 'Kontrol Alur Program di Python',
                'content' => 'kontrol_alur_python.txt',
                'course_id' => 2,
                'description' => 'Menggunakan pernyataan kondisi dan perulangan untuk mengontrol alur program di Python.'
            ],
            [
                'title' => 'Fungsi dan Modularisasi di Python',
                'content' => 'fungsi_python.txt',
                'course_id' => 2,
                'description' => 'Menjelaskan cara membuat fungsi dan mengorganisasi kode dalam modul di Python.'
            ],
            [
                'title' => 'Pengenalan Object-Oriented Programming di Python',
                'content' => 'oop_python.txt',
                'course_id' => 2,
                'description' => 'Mengenalkan konsep OOP seperti kelas, objek, dan pewarisan dalam Python.'
            ],

            // Learning Path untuk Course HTML (course_id = 3)
            [
                'title' => 'Introduction to HTML',
                'content' => 'introduction_html.txt',
                'course_id' => 3,
                'description' => 'Mengenalkan struktur dasar HTML untuk membuat halaman web.'
            ],
            [
                'title' => 'Tag HTML Dasar',
                'content' => 'tag_html_dasar.txt',
                'course_id' => 3,
                'description' => 'Mempelajari berbagai tag dasar yang digunakan dalam HTML untuk membuat konten halaman.'
            ],
            [
                'title' => 'Membuat Struktur Halaman HTML',
                'content' => 'struktur_halaman_html.txt',
                'course_id' => 3,
                'description' => 'Menunjukkan cara membuat struktur halaman lengkap dengan elemen-elemen HTML.'
            ],

            // Learning Path untuk Course JavaScript (course_id = 4)
            [
                'title' => 'Introduction to JavaScript',
                'content' => 'introduction_javascript.txt',
                'course_id' => 4,
                'description' => 'Pengenalan bahasa pemrograman JavaScript untuk membuat interaktivitas di halaman web.'
            ],
            [
                'title' => 'Variabel dan Tipe Data di JavaScript',
                'content' => 'variabel_js.txt',
                'course_id' => 4,
                'description' => 'Mempelajari cara mendeklarasikan variabel dan tipe data yang ada di JavaScript.'
            ],
            [
                'title' => 'Fungsi di JavaScript',
                'content' => 'fungsi_js.txt',
                'course_id' => 4,
                'description' => 'Memahami cara mendeklarasikan dan menggunakan fungsi di JavaScript.'
            ],
            [
                'title' => 'Manipulasi DOM dengan JavaScript',
                'content' => 'manipulasi_dom_js.txt',
                'course_id' => 4,
                'description' => 'Mempelajari cara mengubah elemen-elemen di halaman HTML menggunakan JavaScript (DOM manipulation).'
            ],

            // Learning Path untuk Course CSS (course_id = 5)
            [
                'title' => 'Introduction to CSS',
                'content' => 'introduction_css.txt',
                'course_id' => 5,
                'description' => 'Pengenalan dasar CSS untuk mendesain tampilan halaman web.'
            ],
            [
                'title' => 'Dasar-Dasar CSS',
                'content' => 'dasar_css.txt',
                'course_id' => 5,
                'description' => 'Mempelajari properti-properti dasar CSS seperti warna, margin, padding, dan font.'
            ],
            [
                'title' => 'Styling dengan CSS Flexbox',
                'content' => 'flexbox_css.txt',
                'course_id' => 5,
                'description' => 'Mempelajari cara menggunakan CSS Flexbox untuk layout halaman yang responsif.'
            ],
            [
                'title' => 'Pengenalan CSS Grid',
                'content' => 'grid_css.txt',
                'course_id' => 5,
                'description' => 'Mengenalkan CSS Grid untuk membuat layout halaman yang kompleks dan fleksibel.'
            ]
        ]);
     }
}
