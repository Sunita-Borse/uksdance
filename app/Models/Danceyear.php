<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danceyear extends Model
{
    //use HasFactory;
   protected $fillable = ['studentinfo_id','exam'];
    
   public function studentinfo()
   {
      return $this->belongsTo('App\Models\Studentinfo');


    }
    

    public function dancestyle()
    {
       return $this->belongsTo('App\Models\Dancestyle');
     }
     
    public function studentinfo()
    {
       return $this->hasMany('App\Models\Studentinfo');
     }
}
