<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
       'uuid','title', 'description', 'img'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function user(){
        return $this->belongsToMany(Course::class, 'user_take_courses');
    }
    
}
