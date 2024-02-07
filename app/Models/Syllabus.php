<?php

namespace App\Models;
use App\Enums\Examyear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;
    
    protected $fillable=[ 'syllabustitle', 'type', 'url', 'file'];
    protected $casts = [
        'exam' => \App\Enums\Exam::class, 'dancestyle' => \App\Enums\Dancestyle::class
    ];
}
