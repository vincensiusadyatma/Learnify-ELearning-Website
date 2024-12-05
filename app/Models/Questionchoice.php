<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionchoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_correct', 'choice', 'question_id'
    ];

    public function Question()
    {
        return $this->belongsTo(Question::class);
    }
}
