<?php

namespace App\Models;

use App\Enums\Exam;
use App\Enums\Dancestyle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentinfo extends Model
{
    use HasFactory;

      protected $fillable = [
      'name', 'dob', 'email', 'fathername', 'mothername','phone','permanentaddress','currentaddress','dancestyle','description','exam','maritalstatus'    ];
     protected $casts = ['exam' => Exam::class,'dancestyle' => Dancestyle::class ]; 

   public function image()
   {

      //return $this->hasOne('App\Models\Image');
      return $this->hasOne(Image::class);
    }
   
    public function document()
   {

      //return $this->hasOne('App\Models\Document');
      return $this->hasOne(Document::class);
    }
  
   public function marriage_certificate()
   {

      //return $this->hasOne('App\Models\Marriage_certificate');
      return $this->hasOne(Marriage_certificate::class);
    }

     public function danceyear()
   {

      return $this->belongsTO('App\Models\Danceyear');
      
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

public function resources()
    {
       return $this->hasMany(Resource::class, 'dancestyle', 'dancestyle')->where('exam', 1);
        
        
        }

}

