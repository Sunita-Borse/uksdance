<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{ 
   protected $fillable = ['studentinfo_id','path'];
    
   public function studentinfo()
   {
      //return $this->belongsTo('App\Models\Studentinfo');
      return $this->belongsTo(Studentinfo::class);

    }
}

