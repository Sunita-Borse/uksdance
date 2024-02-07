<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Studentinfo;
use App\Enums\Exam;
use App\Models\User;


use App\Models\Image;
use App\Models\Document;
use App\Models\Marriage_certificate;

use Illuminate\Support\Facades\Stroage;
use App\Enums\Dancestyle;
use App\Models\Syllabus;
use File;
use Repsonse;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentApprovalRequest;
use Illuminate\Support\Facades\Session;


class SyllabusController extends Controller
{
    public function index(Syllabus $syllabus)
    {
       
        //$student= Studentinfo::all();
     $syllabus=Syllabus::all();
     //$examyear="prarmbhik";

        //return view('syllabus')->with('student',$student);;
       // $syllabus = Syllabus::where('examyear', 1) ->first();
        return view('syllabus',compact('syllabus'));
    }

    public function store(Request $request)
    {

        $request->validate([
           // 'examyear' => 'required|string',
            'syllabustitle' => 'required|string',
            'dancestyle'=>'required',
            'type' => 'required|string',
            'url' => 'nullable|url',
         'file' => 'nullable|mimes:pdf',
        ]);
        //Syllabus::create($validatedData);

       // $syllabus->update($validatedData);
            $syllabus=new Syllabus;
            $syllabus->type = $request->type;
            $syllabus->url = $request->url;
            $syllabus->exam=$request->exam;
            //  $data->description=$request->description;
            $syllabus->dancestyle=json_encode($request->dancestyle);
            $syllabus->syllabustitle=$request->syllabustitle;
        //   
            if($request->hasFile('file')){
            $file=$request->file('file');
            $filename= $file->getClientOriginalName();
            $destination_path=public_path().'/assets';
            $file->move($destination_path, $filename);
            $syllabus->file=$filename;
          }


        //   if ($request->input('fileOrUrl') === 'file') {
        //     // Handle file upload logic here
        //     if ($request->hasFile('file')) {
        //         // Process the uploaded file
        //         $file = $request->file('file');
        //         // Save the file and update the $formData model accordingly
        //         $filename= $file->getClientOriginalName();
        //     $destination_path=public_path().'/assets';
        //     $file->move($destination_path, $filename);
        //     $data->fileOrUrl=$filename;
        //     }
        // } elseif ($request->input('fileOrUrl') === 'url') {
        //     // Handle URL logic here
        //     $data->fileOrUrl = $request->url;
        // }



    

            //  $file=$request->file;
                 
    //  $filename=time().'.'.$file->getClientOriginalExtension();
 
                //  $request->file->move('assets',$filename);
 
                //   $data->file=$filename;
               
                $syllabus->save();
                $syllabus=request()->all();
                 return redirect()->back();
 
 
 
    }

    public function showprarmbhik()
    {

         $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $syllabus = Syllabus::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 1)
    ->get();
 

        //$syllabus = Syllabus::where('exam', 1)->get();
         //$syllabus=Syllabus::all();
        return view('student.prarmbhik',compact('syllabus'));
    }

    public function prathamshow()
    {
         $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $syllabus = Syllabus::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 2)
    ->get();
        
       // $syllabus = Syllabus::where('exam', 2)->get();
         //$data=Syllabus::all();
        return view('student.praveshika-pratham',compact('syllabus'));
    }
    
   public function praveshikashow()
{
         $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $syllabus = Syllabus::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 3)
    ->get();
         
        
        //$syllabus = Syllabus::where('exam', 3)->get();
         //$data=Syllabus::all();
        return view('student.praveshika-purna',compact('syllabus'));
    }

    public function madhyamashow()
    {
        $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $syllabus = Syllabus::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 4)
    ->get();
         
        
        
        //$syllabus = Syllabus::where('exam', 4)->get();
         //$data=Syllabus::all();
        return view('student.madhyama-pratham',compact('syllabus'));
    }

    public function madhyamapurnashow()
    {
          $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $syllabus = Syllabus::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 5)
    ->get();
 
        //$syllabus = Syllabus::where('exam', 5)->get();
         //$data=Syllabus::all();
        return view('student.madhyama-purna',compact('syllabus'));
    }

    public function visharadshow()
    {
           $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $syllabus = Syllabus::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 6)
    ->get();
    
        //$syllabus = Syllabus::where('exam', 6)->get();
         //$data=Syllabus::all();
        return view('student.visharad-pratham',compact('syllabus'));
    }

    public function visharadpurnashow()
    {
          $currentUser = auth()->user();

    $danceStyles = $currentUser->studentInfo->dancestyle;
 
    // Ensure $danceStyles is an array
    $likePatterns = is_array($danceStyles) ? array_map(function ($style) {
        return $style->value;
    }, $danceStyles) : [$danceStyles->value];
   

    $syllabus = Syllabus::where(function ($query) use ($likePatterns) {
        foreach ($likePatterns as $pattern) {
            $query->orWhere('dancestyle', $pattern);
        }
       
    })
    ->where('exam', 7)
    ->get();
 
        //$syllabus = Syllabus::where('exam', 7)->get();
         //$data=Syllabus::all();
        return view('student.visharad-purna',compact('syllabus'));
    }
 
 
       public function download(Request $request, $file)
    {
       
    
        
        return response()->download(public_path('assets/'.$file));
       
    }

    public function view($id)
    {
        $syllabus=Syllabus::find($id);
 
        return view('student.showsyllabus',compact('syllabus'));
 
 
    }
    public function test()
    {
        // $student= Studentinfo::all();
        // return view('prarmbhik')->with('student',$student);
        return view('hii');
 
    }

   public function addnewstudent(Studentinfo $student)
{
   // $formSubmitted = session()->get('form_submitted', false);
   // dd($formSubmitted);
    return view('student.dashboard');
}


   public function savenewstudent(Request $request, Studentinfo $student)
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

    // Find or create a user based on email
    $user = User::firstOrNew(['email' => $request->input('email')]);

    // Set the 'name' attribute for the user only if 'name' is provided
    $user->name = $request->input('name');
    
     //$student->status = 'pending';
    // Save the user
    $user->save();

    // Create a new studentinfo record
    $student = new Studentinfo;
   $student = $user->studentinfo ?? new Studentinfo;
    // Set the 'user_id' for the studentinfo
    $student->user_id = $user->id;

    // Set other fields in the studentinfo model
     $student->name = $request->name;
      $student->email = $request->email;
    $student->dob = $request->dob;
    $student->fathername = $request->fathername;
    $student->mothername = $request->mothername;
    $student->phone = $request->phone;
    $student->maritalstatus = $request->maritalstatus;
    $student->permanentaddress = $request->permanentaddress;
    $student->currentaddress = $request->currentaddress;
    $student->description = $request->description;
    $student->exam = $request->exam;
    $student->dancestyle = $request->dancestyle;
    
    // Save the studentinfo
    $student->save();

    // Check and save the uploaded files
     if ( $request->hasfile('recentphoto'))
    {

     $path=$request->file('recentphoto')->store('thumbnails');
     $student->image()->save( Image::create([ 'path' => $path]) );
    
   }

    if ($request->hasfile('birthcertificate')) {
        $path = $request->file('birthcertificate')->store('docs');
        $student->document()->save(Document::create(['path' => $path]));
    }

    if ($request->hasfile('marriagecertificate')) {
        $path = $request->file('marriagecertificate')->store('marriagedocs');
        $student->marriage_certificate()->save(Marriage_certificate::create(['path' => $path]));
    }

    $user->status = 'pending';
    $user->save();
    Mail::to('sunitamahajan.521@gmail.com')->send(new StudentApprovalRequest($student));

    session()->flash('success', 'Your student profile has been submitted successfully. It will be reviewed by an admin. You will receive an email upon approval.');
   //session()->flash('form_submitted', true);

    return redirect('/dashboard');
}
    
    
}
