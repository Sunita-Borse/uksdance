<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    //use HasFactory;

   protected $fillable = ['batch_id'];
    
    public function batch()
    {
       return $this->belongsTo('App\Models\Batch');
 
 
     }
}
