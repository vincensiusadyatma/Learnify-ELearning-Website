<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id(); //primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //relasi ke tabel user
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade'); //relasi ke tabel quiz
            $table->foreignId('question_id')->constrained()->onDelete('cascade'); //relasi ke tabel question
            $table->string('answer'); //jawaban yang diberikan user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
