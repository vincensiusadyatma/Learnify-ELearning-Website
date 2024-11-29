<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'lesson_id'
    ];

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function lesson() 
    {
        return $this->belongsTo(Lesson::class);
    }
}
