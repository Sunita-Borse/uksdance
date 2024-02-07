<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marriage_certificate extends Model
{
    //use HasFactory;

    protected $fillable = ['studentinfo_id','path'];
    
   public function studentinfo()
   {
      // return $this->belongsTo('App\Models\Studentinfo');
      return $this->belongsTo(Studentinfo::class);

    }
}
