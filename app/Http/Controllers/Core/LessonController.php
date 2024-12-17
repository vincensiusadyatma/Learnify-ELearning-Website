<?php

namespace App\Http\Controllers\Core;

use App\Models\User;

use App\Models\Course;
use App\Models\Lesson;

use Illuminate\Http\Request;
use App\Models\CourseProgress;
use App\Models\LessonProgress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{   
    public function listLesson($course){
        return view('core.lesson',[
            'lesson' => 1
        ]);
    }

    public function showLesson(Course $course, Lesson $lesson){
        $filePath = $lesson->content;

        try {
            $content = file_get_contents(storage_path('app/public/course/materials/lessons/' . $filePath));
            preg_match('/Content:\s*(.*)/s', $content, $matches);
            $lessonContent = $matches[1] ?? 'Materi belum ada';
        } catch (\Exception $e) {
            $lessonContent = 'Materi belum ada';
        }

        $user = Auth::user();

        // Perbarui nilai `last_accessed_at` di `course_progress`
        $courseProgress = CourseProgress::updateOrCreate(
            [
                'user_id' => $user->id,
                'course_id' => $course->id,
            ],
            [
                'last_accessed_at' => now(), // Tetapkan waktu terakhir diakses
            ]
        );

        // Ambil semua lessons untuk ditampilkan di sidebar
        $lessons = $course->lessons->map(function ($lesson) use ($user) {
            $lesson->is_completed = LessonProgress::where('user_id', $user->id)
                ->where('lesson_id', $lesson->id)
                ->value('is_completed') ?? false;
            return $lesson;
        });

        // Dapatkan previous dan next lesson
        $previousLesson = $lessons->where('id', '<', $lesson->id)->last();
        $nextLesson = $lessons->where('id', '>', $lesson->id)->first();


        // Hitung progress
        $totalLessons = $lessons->count();
        $completedLessons = $lessons->where('is_completed', true)->count();
        $progressPercentage = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;

        // Perbarui progress di `course_progress` dengan nilai terbaru
        $courseProgress->update([
            'progress_percentage' => $progressPercentage,
            'is_completed' => $progressPercentage === 100, // Tandai selesai jika 100%
        ]);

        return view('core.lesson', [
            'lessons' => $lessons,
            'course' => $course,
            'selectedLesson' => $lesson,
            'lessonContent' => $lessonContent,
            'progressPercentage' => $progressPercentage,
            'previousLesson' => $previousLesson,
            'nextLesson' => $nextLesson
        ]);
    }


    

    public function completeLesson(Lesson $lesson){

        $user = User::where('id', Auth::id())->first();
        // Tandai lesson sebagai selesai
        LessonProgress::updateOrCreate(
            [
                'user_id' => $user->id,
                'lesson_id' => $lesson->id,
            ],
            [
                'is_completed' => true,
            ]
        );

        // Tambahkan poin ke pengguna
        $currentPoints = $user->points; // Ambil nilai points saat ini
        $user->update(['points' => $currentPoints + 10]); // Tambahkan 10 poin dan perbarui

        // Hitung progress
        $totalLessons = Lesson::where('course_id', $lesson->course_id)->count(); // Total lesson dalam course
        $completedLessons = LessonProgress::where('user_id', $user->id)
            ->whereIn('lesson_id', Lesson::where('course_id', $lesson->course_id)->pluck('id'))
            ->where('is_completed', true)
            ->count(); // Total lesson yang selesai oleh user

        $progressPercentage = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;

        // Perbarui progres di tabel `course_progress`
        CourseProgress::updateOrCreate(
            [
                'user_id' => $user->id,
                'course_id' => $lesson->course_id,
            ],
            [
                'progress_percentage' => $progressPercentage,
                'last_accessed_at' => now(),
            ]
        );

        // Kembalikan JSON untuk AJAX
        return response()->json([
            'message' => 'Lesson marked as complete!',
            'lesson_id' => $lesson->id,
            'progressPercentage' => $progressPercentage,
            'points' => $user->refresh()->points, // Refresh user untuk memastikan poin terkini
        ]);
    }

   // Melanjutkan ke lesson terakhir dikunjungi :)
   public function continueLesson(Course $course)
   {
       // Ambil lesson pertama dari course berdasarkan urutan ID
       $firstLesson = $course->lessons()->orderBy('id', 'asc')->first();
   
       // Jika ada lesson pertama, arahkan ke halaman lesson tersebut
       if ($firstLesson) {
           return redirect()->route('show-lesson', [
               'course' => $course->uuid,
               'lesson' => $firstLesson->id,
           ]);
       }
   
       // Jika tidak ada lesson yang ditemukan, beri notifikasi ke pengguna
       return redirect()->back()->with('error', 'No lessons available for this course.');
   }
   

   public function showMaterial($filename){
        // Cek apakah file HTML ada
        if (Storage::disk('local')->exists($filename)) {
            // Ambil konten file .txt
            $content = Storage::disk('local')->get($filename);

            // Menampilkan konten file dalam bentuk HTML
            return response()->make($content, 200, [
                'Content-Type' => 'text/html',
            ]);
        }

        // Jika file tidak ditemukan
        return redirect()->back()->with('error', 'File not found.');
    }


    public function store(Request $request, Course $course)
{
    // Validasi data yang dikirim
    $request->validate([
        'lesson_title' => 'required|string|max:255',
        'lesson_description' => 'required|string|max:255',
        'lesson_content' => 'required|string',
    ]);

    // Format data pelajaran
    $lessonData = [
        'Title' => $request->lesson_title,
        'Course ID' => $course->id,
    ];

    // Format data konten
    $lessonContent = $request->lesson_content;

    // Format ke string yang rapi sesuai dengan format yang diinginkan
    $formattedData = "Lesson Details:\n";
    $formattedData .= "--------------------\n";
    foreach ($lessonData as $key => $value) {
        $formattedData .= "{$key}: {$value}\n";
    }
    $formattedData .= "--------------------\n";
    $formattedData .= "Content: {$lessonContent}\n";

    // Tentukan nama file unik
    $fileName = "lesson_" . uniqid() . ".txt";

    // Tentukan path file di dalam public
    $filePath = "course/materials/lessons/" . $fileName;

    // Simpan file ke disk 'public'
    Storage::disk('public')->put($filePath, $formattedData);

    // Simpan hanya nama file ke database
    $lesson = Lesson::create([
        'title' => $request->lesson_title,
        'description' => $request->lesson_description,
        'content' => $fileName, 
        'course_id' => $course->id,
    ]);

    // Berikan respons sukses
    return redirect()->route('show-course-management')->with('success', 'Lesson created successfully. File name saved in the database.');
}


    public function editLesson(Course $course, Lesson $lesson){
        $filePath = $lesson->content;

        try {
            $content = file_get_contents(storage_path('app/public/course/materials/lessons/' . $filePath));
            preg_match('/Content:\s*(.*)/s', $content, $matches);
            $lessonContent = $matches[1] ?? 'Materi belum ada';
        } catch (\Exception $e) {
            $lessonContent = 'Materi belum ada';
        }

        return view('admin.editLessonManagement', [
            'course' => $course,
            'lesson' => $lesson,
            'content' =>$lessonContent
        ]);
    }

    public function updateLessonContent(Request $request, Course $course, Lesson $lesson){

        $request->validate([
            'lesson_content' => 'required|string',
        ]);

        $lessonContent = $request->lesson_content;
        

        $formattedData = "Lesson Details:\n";
        $formattedData .= "--------------------\n";
        $formattedData .= "Title: {$lesson->title}\n";
        $formattedData .= "Course ID: {$course->id}\n";
        $formattedData .= "--------------------\n";
        $formattedData .= "Content: {$lessonContent}\n";

        // Simpan ke disk 'public'
        Storage::disk('public')->put('course/materials/lessons/' . $lesson->content, $formattedData);

        return redirect()->route('show-course-management')->with('success', 'Lesson content updated successfully.');
    }

    public function delete(Request $request, Course $course, Lesson $lesson){
        if (Storage::disk('local')->exists($lesson->content)) {
            Storage::disk('local')->delete($lesson->content);
        }
        $lesson->delete();

   
        return redirect()->route('show-course-management')->with('success', 'Lesson and associated file deleted successfully.');
    }

     
     

    public function uploadImage(Request $request){
    
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload gambar ke folder public/images
        if ($request->file('file')) {
            $image = $request->file('file');
            $imagePath = $image->store('course/materials/img', 'public');

            // Kembalikan URL gambar yang disimpan
            return response()->json(['filepath' => Storage::url($imagePath)]);
        }

        return response()->json(['error' => 'File upload failed'], 400);
    }



    // ================================= Admin Methods Area ===========================
    public function showLessonCMS(Course $course){
        return view('admin.addLessonManagement',[
            'course' => $course
        ]);
    }

   
}
