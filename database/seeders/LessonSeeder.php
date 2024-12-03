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
            [
                'title' => 'Inheritance di Java',
                'content' => 'inheritance_java.txt',
                'course_id' => 1,
                'description' => 'Mempelajari pewarisan (inheritance) dalam Java untuk mengorganisir kode secara lebih baik.'
            ],
            [
                'title' => 'Polymorphism di Java',
                'content' => 'polymorphism_java.txt',
                'course_id' => 1,
                'description' => 'Menggunakan konsep polymorphism dalam Java untuk meningkatkan fleksibilitas program.'
            ],
            [
                'title' => 'Abstraction di Java',
                'content' => 'abstraction_java.txt',
                'course_id' => 1,
                'description' => 'Memahami konsep abstraction dan penerapannya di Java.'
            ],
            [
                'title' => 'Interface dan Implementasi di Java',
                'content' => 'interface_java.txt',
                'course_id' => 1,
                'description' => 'Mempelajari konsep interface dan bagaimana cara mengimplementasikannya dalam Java.'
            ],
            [
                'title' => 'Penggunaan Koleksi di Java',
                'content' => 'koleksi_java.txt',
                'course_id' => 1,
                'description' => 'Mengenal berbagai koleksi data seperti ArrayList, HashMap, dan lainnya di Java.'
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
            [
                'title' => 'List, Tuple, dan Dictionary di Python',
                'content' => 'list_tuple_dict_python.txt',
                'course_id' => 2,
                'description' => 'Memahami struktur data utama di Python seperti list, tuple, dan dictionary.'
            ],
            [
                'title' => 'Handling File di Python',
                'content' => 'handling_file_python.txt',
                'course_id' => 2,
                'description' => 'Belajar cara membaca dan menulis file menggunakan Python.'
            ],
            [
                'title' => 'Penggunaan Modul dan Package di Python',
                'content' => 'modul_package_python.txt',
                'course_id' => 2,
                'description' => 'Mengenal cara mengimpor modul dan menggunakan package di Python.'
            ],
            [
                'title' => 'Decorator dan Generator di Python',
                'content' => 'decorator_generator_python.txt',
                'course_id' => 2,
                'description' => 'Mempelajari penggunaan decorator dan generator dalam Python.'
            ],
            [
                'title' => 'Testing dan Debugging di Python',
                'content' => 'testing_debugging_python.txt',
                'course_id' => 2,
                'description' => 'Memahami cara melakukan testing dan debugging di Python untuk menulis kode yang lebih baik.'
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
            [
                'title' => 'Link dan Navigasi di HTML',
                'content' => 'link_html.txt',
                'course_id' => 3,
                'description' => 'Menggunakan tag untuk membuat link dan navigasi antar halaman di HTML.'
            ],
            [
                'title' => 'Formulir dan Input di HTML',
                'content' => 'form_html.txt',
                'course_id' => 3,
                'description' => 'Membuat formulir interaktif menggunakan tag input di HTML.'
            ],
            [
                'title' => 'Tabel di HTML',
                'content' => 'tabel_html.txt',
                'course_id' => 3,
                'description' => 'Menggunakan tag tabel untuk menampilkan data berbentuk tabel di HTML.'
            ],
            [
                'title' => 'Gambar dan Media di HTML',
                'content' => 'gambar_media_html.txt',
                'course_id' => 3,
                'description' => 'Menambahkan gambar dan media ke halaman HTML.'
            ],
            [
                'title' => 'Semantik HTML',
                'content' => 'semantik_html.txt',
                'course_id' => 3,
                'description' => 'Mempelajari tag semantik untuk struktur yang lebih bermakna di HTML.'
            ],
            [
                'title' => 'SEO dan HTML',
                'content' => 'seo_html.txt',
                'course_id' => 3,
                'description' => 'Menambahkan elemen SEO penting dalam HTML untuk meningkatkan peringkat mesin pencari.'
            ],
            [
                'title' => 'HTML5 dan Fitur-Fitur Baru',
                'content' => 'html5_fitur.txt',
                'course_id' => 3,
                'description' => 'Mengenal elemen-elemen baru yang ditambahkan dalam HTML5.'
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
            [
                'title' => 'Event Handling di JavaScript',
                'content' => 'event_handling_js.txt',
                'course_id' => 4,
                'description' => 'Memahami cara menangani event seperti klik, hover, dll dalam JavaScript.'
            ],
            [
                'title' => 'Asynchronous JavaScript',
                'content' => 'async_js.txt',
                'course_id' => 4,
                'description' => 'Belajar tentang konsep asynchronous programming menggunakan callback, promises, dan async/await.'
            ],
            [
                'title' => 'ES6+ Features di JavaScript',
                'content' => 'es6_js.txt',
                'course_id' => 4,
                'description' => 'Mengenal fitur-fitur baru di JavaScript yang diperkenalkan pada ES6 dan versi selanjutnya.'
            ],
            [
                'title' => 'LocalStorage dan SessionStorage di JavaScript',
                'content' => 'storage_js.txt',
                'course_id' => 4,
                'description' => 'Memahami cara menggunakan LocalStorage dan SessionStorage untuk menyimpan data di sisi klien.'
            ],
            [
                'title' => 'API di JavaScript',
                'content' => 'api_js.txt',
                'course_id' => 4,
                'description' => 'Mempelajari cara bekerja dengan API di JavaScript untuk mengambil dan mengirim data.'
            ],
            [
                'title' => 'JavaScript Frameworks dan Libraries',
                'content' => 'framework_js.txt',
                'course_id' => 4,
                'description' => 'Pengenalan kepada berbagai frameworks dan libraries JavaScript populer seperti React, Angular, dan Vue.'
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
            ],
            [
                'title' => 'Positioning di CSS',
                'content' => 'positioning_css.txt',
                'course_id' => 5,
                'description' => 'Belajar cara mengatur posisi elemen menggunakan properti positioning di CSS.'
            ],
            [
                'title' => 'Responsif dengan Media Query',
                'content' => 'media_query_css.txt',
                'course_id' => 5,
                'description' => 'Menggunakan media query untuk membuat tampilan halaman responsif di berbagai perangkat.'
            ],
            [
                'title' => 'CSS Transitions dan Animations',
                'content' => 'animations_css.txt',
                'course_id' => 5,
                'description' => 'Belajar cara menggunakan transisi dan animasi untuk memperindah tampilan halaman web.'
            ],
            [
                'title' => 'Menggunakan SASS dan LESS',
                'content' => 'sass_less_css.txt',
                'course_id' => 5,
                'description' => 'Mengenal CSS preprocessor seperti SASS dan LESS untuk mempermudah penulisan CSS.'
            ],
            [
                'title' => 'Berkreasi dengan CSS Shapes',
                'content' => 'shapes_css.txt',
                'course_id' => 5,
                'description' => 'Membuat bentuk dan desain kreatif menggunakan CSS shapes.'
            ],
            [
                'title' => 'Advanced CSS Layouts',
                'content' => 'advanced_layout_css.txt',
                'course_id' => 5,
                'description' => 'Belajar teknik layout CSS lanjutan menggunakan Grid dan Flexbox.'
            ]
        ]);
    }
}
