<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonProgress extends Model
{
    protected $table = 'lesson_progress'; // Nama tabel
    protected $fillable = ['user_id', 'lesson_id', 'is_completed'];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke lesson
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
