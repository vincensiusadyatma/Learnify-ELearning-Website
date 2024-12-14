<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizSubmission extends Model
{
    protected $fillable = ['user_id', 'quiz_id', 'answers', 'score'];

    protected $casts = [
        'answers' => 'array', // Otomatis decode/encode JSON ke array
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
