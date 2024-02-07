<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPaper extends Model
{
    use HasFactory;
     protected $fillable=[ 'questionpapertitle', 'type', 'url', 'file'];
    protected $casts = [
        'exam' => \App\Enums\Exam::class, 'dancestyle' => \App\Enums\Dancestyle::class
    ];
}
