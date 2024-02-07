<?php

namespace App\Http\Controllers;
use App\Enums\Exam;
use App\Models\Studentinfo;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Document;
use App\Models\Marriage_certificate;
use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use File;
use Repsonse;
use App\Mail\StudentProfileApproved;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function addstudent(Studentinfo $student)
    {
      //$studetn =Studentinfo::all();
      //echo Exam::exam->name;
   
       
       return view('admin.add-student');
    }


    public function savestudent(Request $request, Studentinfo $student)
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
//$validatedData = $request->validate();
 //$studentinfo=Studentinfo::all();
 $iframeUrl = $request->input('birthcertificate');
       
       $student = new Studentinfo;

       $student->name = $request->name;
      $student->dob=$request->dob;
      $student->email=$request->email;
      $student->fathername = $request->fathername;
      $student->mothername = $request->mothername;
      $student->phone = $request->phone;
      $student->maritalstatus = $request->maritalstatus;
      //$student->exam = $request->examyear;
     $student->permanentaddress=$request->permanentaddress;
      $student->currentaddress=$request->currentaddress;
      $student->description= $request->description;
     $student->exam = $request->exam;
     $student->dancestyle=$request->dancestyle;
      //$student->dancestyle=array('dancestyle'=>$data->dancestyle);      
     

     

      
      $student->save();


      session()->flash('success','Student created successfully');
   
     $studentinfo=request()->all();

     
     //$student=request()->all();
     //print_r($studentinfo);
     //exit;
   
     if ( $request->hasfile('recentphoto'))
    {

     $path=$request->file('recentphoto')->store('thumbnails');
     $student->image()->save( Image::create([ 'path' => $path]) );
    
   }

   if ( $request->hasfile('birthcertificate'))
    {

     $path=$request->file('birthcertificate')->store('docs');
     $student->document()->save( Document::create([ 'path' => $path]) );
    
   }

    if ( $request->hasfile('marriagecertificate'))
    {

     $path=$request->file('marriagecertificate')->store('marriagedocs');
     $student->marriage_certificate()->save( Marriage_certificate::create([ 'path' => $path]) );
    
   }
     //$student = new Danceyear();
     // $student->examyear = $request->examyear;
      //$student->save(); 
    
     return redirect('/admin/add-student')->with('birthcertificate', $iframeUrl);;

   }

  
//   public function show(Request $request)
//   {
//        $dancestyle = $request->input('dancestyle');
//         $searchterm = $request->input('search');
//         $statusFilter = $request->input('status', 'Active');

//          $selectedDanceStyle = $dancestyle;
//         // Query to get students based on filters
//         $query = Studentinfo::query();

//           if (!empty($dancestyle)) {
//         // Use where to filter directly on the dancestyle attribute
//         $query->where('dancestyle', $dancestyle);
//     }

//         if (!empty($searchterm)) {
//             $query->where(function ($query) use ($searchterm) {
//                 $query->where('name', 'LIKE', '%' . $searchterm . '%')
//                       ->orWhere('email', 'LIKE', '%' . $searchterm . '%')
//                       ->orWhere('currentaddress', 'LIKE', '%' . $searchterm . '%');
//             });
//         }

//         if (!empty($statusFilter)) {
//         $query->whereHas('user', function ($userQuery) use ($statusFilter) {
//             $userQuery->where('status', $statusFilter);
//         });
//     }
// //dd($dancestyle, $searchterm, $query->toSql(), $query->getBindings());
//         // $student = $query->get();

//         $student = $query->with('user')->get();
//    // $student= Studentinfo::all();
//     $statusOptions = ['Registered', 'Pending', 'Rejected', 'Inactive', 'Active', 'Deleted'];
//        // $student= Studentinfo::where('dancestyle',Input::get(dstyle))->get();
//        return view('admin.allstudents',['students'=>$student, 'statusOptions' => $statusOptions ,'selectedStatus' => $statusFilter,'selectedDanceStyle' =>$selectedDanceStyle,'searchterm' => $searchterm,]);
//   }

public function show(Request $request)
{
    $dancestyle = $request->input('dancestyle');
    $searchterm = $request->input('search');
    $statusFilter = $request->input('status', 'Active');

    // Query to get students based on filters
    $query = Studentinfo::query();

    if (!empty($dancestyle)) {
        // Use where to filter directly on the dancestyle attribute
        $query->where('dancestyle', $dancestyle);
    }

    if (!empty($searchterm)) {
        $query->where(function ($query) use ($searchterm) {
            $query->where('name', 'LIKE', '%' . $searchterm . '%')
                ->orWhere('email', 'LIKE', '%' . $searchterm . '%')
                ->orWhere('currentaddress', 'LIKE', '%' . $searchterm . '%');
        });
    }

    if (!empty($statusFilter)) {
        $query->whereHas('user', function ($userQuery) use ($statusFilter) {
            $userQuery->where('status', $statusFilter);
        });
    }

    $student = $query->with('user')->get();

    $statusOptions = ['Registered', 'Pending', 'Rejected', 'Inactive', 'Active', 'Deleted'];

    return view('admin.allstudents', [
        'students' => $student,
        'statusOptions' => $statusOptions,
        'selectedStatus' => $statusFilter,
        'selectedDanceStyle' => $dancestyle,
        'searchterm' => $searchterm,
    ]);
}
 public function updateStudentStatus(Request $request, $studentId)
{
    $student = Studentinfo::find($studentId);

    if (!$student) {
        return redirect()->back()->with('error', 'Student not found.');
    }

    // Retrieve the associated user using the defined relationship
    $user = $student->user;

    if (!$user) {
        return redirect()->back()->with('error', 'User not found for the student.');
    }
   //dd($user->status, $request->input('status'));
    // Update the status in the users table
    try {
        $user->update(['status' => $request->input('status')]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update status. ' . $e->getMessage());
    }
}

    public function addsyllabus()
  {
    return view('admin.syllabus');
  }

  public function resun()
  {
    return view('admin.resun');

  }
  public function store(Request $request)
    {

        $request->validate([
           //'exam' => 'required|string',
            'syllabustitle' => 'required|string',
            'dancestyle' => 'required|in:Kathak,Bharatnatyam',
            'type' => 'required|string',
            'url' => 'nullable|url',
         'file' => 'nullable|mimes:pdf',
        ]);
        //Syllabus::create($validatedData);

       // $syllabus->update($validatedData);
            $syllabus=new Syllabus;
            $syllabus->type = $request->type;
            $syllabus->url = $request->url;
            $syllabus->exam = $request->exam;
            //  $data->description=$request->description;
             $syllabus->dancestyle = $request->dancestyle;
            $syllabus->syllabustitle = $request->syllabustitle;
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


    public function display($id)
     {
       $image = Studentinfo::find($id)->image;
  
        return $image;
      }

      public function detail(Studentinfo $student)
        {
          return view('admin.detail')->with('student',$student);
         }
  
       public function editstudent(Studentinfo $student, Request $request)
       {

            $statusOptions = ['Registered', 'Pending', 'Rejected', 'Inactive', 'Active', 'Deleted'];
     
      //return view('admin.edit')->with('student',$student);
         // $user = $student->user;

    return view('admin.edit', compact('student', 'statusOptions'));

        }

        public function updateStudent(Request $request, Studentinfo $student)
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
            //$student->dancestyle = json_encode($request->dancestyle);
           $student->user->update(['status' => $request->input('status')]);
      $statusOptions = ['Registered', 'Pending', 'Rejected', 'Inactive', 'Active', 'Deleted'];
     
      // return view('admin.edit')->with('student',$student);
          $user = $student->user;
            // Save the changes
            $student->save();
        
            session()->flash('success', 'Student Updated successfully');
            return redirect()
    ->route('admin.show', $student->id)
    ->with(['success' => 'Student updated successfully', 'statusOptions' => $statusOptions]);

        
          //  return redirect()->route('admin.show', $student->id)->with('success', 'Student updated successfully');
  
        }
        
     public function destroy(Studentinfo $student)
   {
      

      $student->delete();
      session()->flash('success','Student Deleted successfully');

      return redirect('/admin/allstudents');

   }



    public function showprarmbhik()
    {
        $syllabus = Syllabus::where('exam', 1)->get();
         //$syllabus=Syllabus::all();
        return view('admin.prarmbhik',compact('syllabus'));
    }

    public function prathamshow()
    {
        $syllabus = Syllabus::where('exam', 2)->get();
         //$data=Syllabus::all();
        return view('admin.praveshika-pratham',compact('syllabus'));
    }
    
    public function praveshikashow()
    {
        $syllabus = Syllabus::where('exam', 3)->get();
         //$data=Syllabus::all();
        return view('admin.praveshika-purna',compact('syllabus'));
    }

   

    public function madhyamashow()
    {
        $syllabus = Syllabus::where('exam', 4)->get();
         //$data=Syllabus::all();
        return view('admin.madhyama-pratham',compact('syllabus'));
    }

      public function madhyamapurnashow()
    {
        $syllabus = Syllabus::where('exam', 5)->get();
         //$data=Syllabus::all();
        return view('admin.madhyama-purna',compact('syllabus'));
    }

      public function visharadpurnashow()
    {
        $syllabus = Syllabus::where('exam', 7)->get();
         //$data=Syllabus::all();
        return view('admin.visharad-purna',compact('syllabus'));
    }

      public function visharadaprathamshow()
    {
        $syllabus = Syllabus::where('exam', 6)->get();
         //$data=Syllabus::all();
        return view('admin.visharad-pratham',compact('syllabus'));
    }
 
 
     
    
    
    public function edit(Syllabus $syllabus,$id)
       {

         $syllabus=Syllabus::find($id);
        return view('admin.editsyllabus',compact('syllabus'));

        }

        public function updateLink(Request $request, $id)
{
    $request->validate([
        'syllabustitle' => 'required|string',
        'type' => 'required|string',
    ]);

    $syllabus = Syllabus::find($id);

    if (!$syllabus) {
        return redirect()->back()->with('error', 'Syllabus not found');
    }

    // Update syllabus data
    $syllabus->type = $request->type;
    $syllabus->syllabustitle = $request->syllabustitle;
    $syllabus->exam = $request->exam;
     $syllabus->dancestyle = $request->dancestyle;

    // Handle URL
    if ($request->has('url')) {
        $syllabus->url = $request->url;
    }  elseif (!$request->has('url') && !$syllabus->url) {
        $syllabus->url = null; // Retain the existing value if not provided in the request
    }

    // Handle File
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $destination_path = public_path('/assets');
        $file->move($destination_path, $filename);
        $syllabus->file = $filename;
    } elseif (!$request->hasFile('file') && !$syllabus->file) {
        $syllabus->file = null; // Retain the existing value if not provided in the request
    }

   // $dancestyle = $request->input('dancestyle');
    //$syllabus->dancestyle = $dancestyle ? json_encode($dancestyle) : null;
    $syllabus->save();

    return redirect()->back()->with('success', 'Syllabus updated successfully');
}


public function delete(Syllabus $syllabus,$id)
{
    $syllabus = Syllabus::findOrFail($id);
    $syllabus->delete();
    return redirect('admin.dashboard');

   
}
    public function prarmbhik()
    {
        // $student= Studentinfo::all();
        // return view('prarmbhik')->with('student',$student);
        return view('prarmbhik');
 
    }
    

   
    
    public function praveshikapratham()
    {
        // $student= Studentinfo::all();
        // return view('prarmbhik')->with('student',$student);
        return view('praveshika-pratham');
 
    }
    public function viewpdf($id)
    {
        $syllabus = Syllabus::find($id);
    
        return view('admin.showsyllabus', compact('syllabus'));
    }
    public function downloadfile($file)
{
    $filePath = public_path('assets/' . $file);

    return response()->download($filePath);
}



    public function testtry()
    {
        // $student= Studentinfo::all();
        // return view('prarmbhik')->with('student',$student);
        return view('admin.test');
 
    }

     public function approveStudent($id)
    {
        // Logic to approve the student with the given ID
        $student = Studentinfo::find($id);

        if (!$student) {
            abort(404, 'Student not found');
        }

         $student->user->status = 'active';
    $student->user->save();

     Mail::to($student->user->email)->send(new StudentProfileApproved($student));
return redirect()->route('admin.detail', ['student' => $student]);


        // Perform the approval logic here...
       //return redirect()->route('admin.approveStudent', ['id' => $student->id])->with('success', 'Student approved successfully');

       //return redirect()->route('student.profile', ['id' => $student->id])->with('success', 'Student approved successfully');    }
  
}
}
