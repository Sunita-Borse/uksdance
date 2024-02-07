<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
     protected $fillable=[ 'resourcestitle', 'type', 'url', 'file','dancestyle'];
    protected $casts = [
        'exam' => \App\Enums\Exam::class, 'dancestyle' => \App\Enums\Dancestyle::class
    ];

    public function studentinfo()
    {
        return $this->belongsTo(Studentinfo::class);
    }
}
