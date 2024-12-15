<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseProgress extends Model
{
    protected $table = 'course_progress'; // Nama tabel
    protected $fillable = ['user_id', 'course_id', 'progress_percentage', 'is_completed','last_accessed_at'];

    public function course()
{
    return $this->belongsTo(Course::class);
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
