<?php

namespace App\Http\Controllers\Core;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseProgress;
use App\Models\LessonProgress;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class CourseController extends Controller
{
    public function showCourse(Request $request){
        
        $user = User::where('id', Auth::user()->id)->first();
        // Default: Ambil semua kursus
        $coursesQuery = Course::query();
    
        // Cek apakah tombol filter diklik atau tidak ada filter
        $filter = $request->get('filter', 'all');  // Default filter 'all'
    
        if ($filter == 'taken') {
            // Menampilkan kursus yang diambil (berdasarkan pivot table user_take_courses)
            $coursesQuery = $user->courses(); 
        } elseif ($filter == 'not_taken') {
            // Menampilkan kursus yang belum diambil sama user
            $coursesQuery = $coursesQuery->whereNotIn('courses.id', function($query) use ($user) {
                $query->select('course_id')
                      ->from('user_take_courses')
                      ->where('user_id', $user->id);
            });
        }
    
        // Ambil kursus sesuai filter 
        $courses = $coursesQuery->get();
    
        // Menghitung jumlah kursus yang udah diambil user
        $courseCount = DB::table('user_take_courses')
            ->where('user_id', $user->id)
            ->count();
    
        return view('core.course', [
            'courses' => $courses,
            'courses_count' => $courseCount,
            'filter' => $filter, // Kirimkan filter yang aktif ke tampilan
        ]);
    }


    public function takeCourse(Course $course){
        $userId = Auth::id();
    
        // Cek apakah pengguna sudah mengambil kursus
        $existingRecord = DB::table('user_take_courses')
            ->where('user_id', $userId)
            ->where('course_id', $course->id)
            ->first();
    
        if ($existingRecord) {
            return redirect()->route('show-dashboard')->with('info', 'You have already taken this course.');
        }
    
        // Tambahkan kursus ke tabel `user_take_courses`
        DB::table('user_take_courses')->insert([
            'user_id' => $userId,
            'course_id' => $course->id,
            'created_at' => now(),
        ]);
    
        // Tambahkan progress kursus ke `course_progress`
        CourseProgress::updateOrCreate(
            [
                'user_id' => $userId,
                'course_id' => $course->id,
            ],
            [
                'progress_percentage' => 0, // Progress awal adalah 0%
                'last_accessed_at' => now(), // Tanggal terakhir diakses adalah sekarang
            ]
        );
    
        return redirect()->route('show-dashboard')->with('success', 'Course added successfully!');
    }
    

    public function showCourseDetail(Course $course){
        $lesson = Lesson::where('course_id', $course['id'])->get();

        return view('core.course-detail', [
            'course' => $course,
            'lesson' => $lesson
           
        ]);
    }


    public function update(Request $request, $id){
   
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

  
    $course = Course::findOrFail($id);

    
    $course->title = $request->input('title');
    $course->description = $request->input('description');


    $course->save();

   
    return redirect()->route('show-course-management')->with('success', 'Course updated successfully.');
    }


    public function updateProgress(Course $course){
        $user = Auth::user();

        $totalLessons = $course->lessons()->count();
        $completedLessons = LessonProgress::where('user_id', $user->id)
            ->whereIn('lesson_id', $course->lessons->pluck('id'))
            ->where('is_completed', true)
            ->count();

        $progressPercentage = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;

        // Update progress di tabel course_progress
        CourseProgress::updateOrCreate(
            [
                'user_id' => $user->id,
                'course_id' => $course->id,
            ],
            [
                'progress_percentage' => $progressPercentage,
                'is_completed' => $progressPercentage === 100,
            ]
        );

        return response()->json([
            'progressPercentage' => $progressPercentage,
        ]);
    }


    // ====================================Admin Methods Area =============================================================================

    public function create()
    {
        return view('admin.addCourseManagement'); // Pastikan file view sudah ada
    }

    public function showCourseManagement(){
        $courses = Course::all();
        return view('admin.courseManagement',[
            'courses' => $courses
        ]);
    }


    public function showCourseDetails(Course $course){
        $lessons = $course->lessons;  
        return view('admin.courseDetails', [
            'course' => $course,
            'lessons' => $lessons
        ]);
    }

    // Handle create course
    public function store(Request $request){
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validate image
        ]);

        // Handle image upload
        $imagePath = $request->file('img')->store('course/img', 'public');

        // Create new course
        $course = Course::create([
            'uuid' => Str::uuid(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'img' => $imagePath,
        ]);

        // Redirect or show success message
        return redirect()->route('show-course-management')->with('success', 'Course added successfully!');
    }

    public function delete($id){
        // Ambil data course
        $course = Course::findOrFail($id);

        // Cek apakah gambar ada di public/img/assets/course
        $defaultPath = public_path("img/assets/course/{$course->img}");
        $storagePath = public_path("storage/{$course->img}");

        // Hapus file gambar jika ada
        if (File::exists($defaultPath)) {
            File::delete($defaultPath);
        } elseif (File::exists($storagePath)) {
            File::delete($storagePath);
        }

        // Hapus course dari database
        $course->delete();

        return redirect()->route('show-course-management')->with('success', 'Course deleted successfully!');
    }
}
