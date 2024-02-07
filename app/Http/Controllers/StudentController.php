<?php

namespace App\Http\Controllers;

use App\Models\Studentinfo;
use Illuminate\Http\Request;
use App\Models\Syllabus;
use Illuminate\Support\Facades\Auth;
use App\Models\Resource;
use App\Enums\Exam;
use App\Enums\Dancestyle;
use App\Models\QuestionPaper;
use File;
use Repsonse;
use DB;

class StudentController extends Controller
{
    public function showDashboard()
    {
        $user = auth()->user();
        $studentinfo = $user->studentinfo; // Assumes the relationship is named 'studentInfo'
       
        return view('student.sunita', compact('studentinfo'));
    }

    public function profile()
{
    // Get the authenticated user
    $user = Auth::user();

    // You can also retrieve related data from the Studentinfo model
    // assuming you have defined a relationship in the User model
    // E.g., $studentInfo = $user->studentInfo;

    // Return the user data to the view
    return view('sunita', compact('user', 'studentInfo'));
}

    public function editstudentdetail(Studentinfo $student, Request $request)
       {
       return view('student.editstudentinfo')->with('student',$student);

        }


         public function updateStudentinfo(Request $request, Studentinfo $student)
        {
             $request->validate([
    'name' => 'required',
    'dob' => 'required|date|before:-6 years',
    'email' => 'required|email',
    'fathername' => 'required',
    'mothername' => 'required',
    'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
    'permanentaddress' => 'required',
    'maritalstatus' => 'required',
    'exam' => 'required',
    'currentaddress' => 'required',
    'dancestyle' => 'required',
    't&c' => 'required',
    'recentphoto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=250,max_height=250',
    'birthcertificate' => 'required|mimes:pdf|max:500000',
    'marriagecertificate' => 'nullable|mimes:pdf|max:500000',
    'description' => 'required',
], [
    'recentphoto.required' => 'The recent photo field is required.',
    'recentphoto.image' => 'The recent photo must be an image.',
    'recentphoto.mimes' => 'The recent photo must be a JPEG, JPG, or PNG image.',
    'recentphoto.dimensions' => 'The recent photo must be 250x250 pixels.',
    'currentaddress.required' => 'The current address field is required.',
    'birthcertificate.required' => 'The birth certificate field is required.',
    'birthcertificate.mimes' => 'The birth certificate must be a PDF file.',
    'birthcertificate.max' => 'The birth certificate file size must not exceed 500KB.',
    'marriagecertificate.mimes' => 'The marriage certificate must be a PDF file.',
    'marriagecertificate.max' => 'The marriage certificate file size must not exceed 500KB.',
    'permanentaddress.required' => 'The permanent address field is required.',
    'fathername.required' => 'The father name field is required.',
    'mothername.required' => 'The mother name field is required.',
 

]);
            // Update student information
            $student->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'email' => $request->email,
                'fathername' => $request->fathername,
                'mothername' => $request->mothername,
                'phone' => $request->phone,
                'permanentaddress' => $request->permanentaddress,
                'maritalstatus' => $request->maritalstatus,
                'exam' => $request->exam,
                'currentaddress' => $request->currentaddress,
                'dancestyle' => $request->dancestyle,
                'description' => $request->description,
            ]);
         $student->dancestyle = $request->dancestyle;
            // Handle photo update
            if ($request->hasFile('recentphoto')) {
                $path = $request->file('recentphoto')->store('thumbnails');
        
                if ($student->image) {
                    Storage::delete($student->image->path);
                    $student->image->path = $path;
                    $student->image->save();
                } else {
                    $student->image()->save(
                        Image::create(['path' => $path])
                    );
                }
            }
        
            // Handle birth certificate update
            if ($request->hasFile('birthcertificate')) {
                $path = $request->file('birthcertificate')->store('docs');
        
                if ($student->document) {
                    Storage::delete($student->document->path);
                    $student->document->path = $path;
                    $student->document->save();
                } else {
                    $student->document()->save(
                        Document::create(['path' => $path])
                    );
                }
            }
        
            // Handle marriage certificate update
            if ($request->hasFile('marriagecertificate')) {
                $path = $request->file('marriagecertificate')->store('marriagedocs');
        
                if ($student->marriage_certificate) {
                    Storage::delete($student->marriage_certificate->path);
                    $student->marriage_certificate->path = $path;
                    $student->marriage_certificate->save();
                } else {
                    $student->marriage_certificate()->save(
                        Marriage_certificate::create(['path' => $path])
                    );
                }
            }
        
            // Update dance style
           // $student->dancestyle = json_encode($request->dancestyle);
        
            // Save the changes
            $student->save();
        
            session()->flash('success', 'Student Updated successfully');
        
            return redirect()->route('student.showstudentinfo', $student->id)->with('success', 'Student updated successfully');
  
        }
        
    public function showstudnetinfo()
{

 $user = auth()->user();

    // Assuming there is a 'student' relationship on the User model
    $student = $user->studentinfo;
    // $student = Studentinfo::where('name', 'Sunita')->first();
    
    return view('student.sunita', compact('student'));
}

public function addsyllabus()
  {
    return view('student.syllabus');
  }

  public function studentsyllabus()
{
    // Identify the student (replace with your actual logic)
    $student = auth()->user();
   // dd($student); // Check if $student has the expected data
    
   $currentExamYear = auth()->user()->exam;
   //dd($currentExamYear); 
  $currentStudentInfo = auth()->user()->studentInfo;

    

    $currentExam = optional($currentStudentInfo)->exam;
    ( $currentExam); 


}

public function prarmbhiksource()
{
   $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $resource = Resource::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 1)
    ->get();
 
//dd($resources);

    return view('student.student-sources.prarmbhik', compact('resource'));
}


     public function prathamsource()
    {
       $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $resource = Resource::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 2)
    ->get();
 

        return view('student.student-sources.praveshika-pratham',compact('resource'));
    }
    
    public function praveshikasource()
    {
        $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $resource = Resource::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 3)
    ->get();
 



    

return view('student.student-sources.praveshika-purna',compact('resource'));
    }

   

    public function madhyamasource()
    {
        $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $resource = Resource::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 4)
    ->get();
 
        return view('student.student-sources.madhyama-pratham',compact('resource'));
    }

      public function madhyamapurnasource()
    {
        $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $resource = Resource::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 5)
    ->get();
    return view('student.student-sources.madhyama-purna',compact('resource'));
    }

      public function visharadpurnasource()
    {
        $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $resource = Resource::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 6)
    ->get();
    return view('student.student-sources.visharad-purna',compact('resource'));
    }

      public function visharadaprathamsource()
    {
       $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $resource = Resource::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 7)
    ->get();
 
        return view('student.student-sources.visharad-pratham',compact('resource'));
    }

    public function prarmbhikquestion()
    {
        $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $questionpaper = QuestionPaper::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 1)
    ->get();
 

        //$questionpaper = QuestionPaper::where('exam', 1)->get();
         //$syllabus=Syllabus::all();
        return view('student.student-questions.prarmbhik',compact('questionpaper'));
    }

    public function prathamquestion()
    {

         $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $questionpaper = QuestionPaper::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 2)
    ->get();
 

        //$questionpaper = QuestionPaper::where('exam', 2)->get();
         //$data=Syllabus::all();
        return view('student.student-questions.praveshika-pratham',compact('questionpaper'));
    }
    
    public function praveshikaquestion()
    {

          $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $questionpaper = QuestionPaper::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 3)
    ->get();
 

       // $questionpaper = QuestionPaper::where('exam', 3)->get();
         //$data=Syllabus::all();
        return view('student.student-questions.praveshika-purna',compact('questionpaper'));
    }

   

    public function madhyamaquestion()
    {

         $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $questionpaper = QuestionPaper::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 4)
    ->get();
 

       // $questionpaper = QuestionPaper::where('exam', 4)->get();
         //$data=Syllabus::all();
        return view('student.student-questions.madhyama-pratham',compact('questionpaper'));
    }

      public function madhyamapurnaquestion()
    {
         $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $questionpaper = QuestionPaper::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 5)
    ->get();
 
        
        //$questionpaper = QuestionPaper::where('exam', 5)->get();
         //$data=Syllabus::all();
        return view('student.student-questions.madhyama-purna',compact('questionpaper'));
    }

      public function visharadpurnaquestion()
    {

  $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $questionpaper = QuestionPaper::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 7)
    ->get();
 

        //$questionpaper = QuestionPaper::where('exam', 7)->get();
         //$data=Syllabus::all();
        return view('student.student-questions.visharad-purna',compact('questionpaper'));
    }

      public function visharadaprathamquestion()
    {
          $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $questionpaper = QuestionPaper::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 6)
    ->get();
 
        
        
        //$questionpaper = QuestionPaper::where('exam', 6)->get();
         //$data=Syllabus::all();
        return view('student.student-questions.visharad-pratham',compact('questionpaper'));
    }

    public function download(Request $request, $file)
    {
       
        return response()->download(public_path('assets/'.$file));
       
    }

    public function viewstudentsourcepdf($id)
    {
        $resource = Resource::find($id);
 
        return view('student.student-sources.showsource',compact('resource'));
 
 
    }

    public function viewstudentquestionpdf($id)
    {
        $questionpaper = QuestionPaper::find($id);
 
        return view('student.student-questions.showquestions',compact('questionpaper'));
 
 
    }

    
    
    }
