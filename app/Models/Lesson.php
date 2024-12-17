<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\LessonProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description', 'content', 'course_id'
    ];

    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function quizes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function progress()
{
    return $this->hasOne(LessonProgress::class, 'lesson_id')
        ->where('user_id', Auth::user()->id); // Ambil progress hanya untuk user yang login
}
}
