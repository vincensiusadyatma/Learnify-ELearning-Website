<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
         'quiz_id', 'title', 'choices', 'correct_answer', 'isActive'
    ];

    public function questionchoices()
    {
        return $this->hasMany(Questionchoice::class, 'question_id');
    }
}
