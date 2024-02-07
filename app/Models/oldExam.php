<?php
use App\Enums\Exam;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //use HasFactory;
 protected $casts = [
        'exam' => Exam::class
    ]; 
}
