<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionPaper; 

class QuestionPaperController extends Controller
{
   public function indexquestion(QuestionPaper $questionpaper)
    {
        $questionpaper = QuestionPaper::all();
        return view('questionpaper', compact('questionpaper'));
    }

   public function storequestion(Request $request)
{
    $request->validate([
        'exam' => 'required',
        'dancestyle' => 'required|in:Kathak,Bharatnatyam', // Add the necessary validation rules for 'exam'
        'questionpapertitle' => 'required|string',
        'type' => 'required|string',
        'url' => 'nullable|url',
        'file' => 'nullable|mimes:pdf',
        
    ]);

    $questionpaper = new QuestionPaper;
    $questionpaper->type = $request->type;
    $questionpaper->url = $request->url;
    $questionpaper->exam = $request->exam;
      $questionpaper->dancestyle = $request->dancestyle;
    $questionpaper->questionpapertitle = $request->questionpapertitle;

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $destination_path = public_path().'/assets';
        $file->move($destination_path, $filename);
        $questionpaper->file = $filename;
    }

    $questionpaper->save();

    return redirect()->back();
}

 public function editquestionpaper(QuestionPaper $questionpaper,$id)
       {

         $questionpaper=QuestionPaper::find($id);
        return view('admin.editsquestionpaper',compact('questionpaper'));

        }

   

public function deletequestionpaper(Resource $resource,$id)
{
    $questionpaper = QuestionPaper::findOrFail($id);
    $questionpaper->delete();
    return redirect('admin.dashboard');

   
}

public function showprarmbhikquestion()
    {
        $questionpaper = QuestionPaper::where('exam', 1)->get();
         //$syllabus=Syllabus::all();
        return view('questionpapers.prarmbhik',compact('questionpaper'));
    }

    public function prathamshowquestion()
    {
        $questionpaper = QuestionPaper::where('exam', 2)->get();
         //$data=Syllabus::all();
        return view('questionpapers.praveshika-pratham',compact('questionpaper'));
    }
    
    public function praveshikashowquestion()
    {
        $questionpaper = QuestionPaper::where('exam', 3)->get();
         //$data=Syllabus::all();
        return view('questionpapers.praveshika-purna',compact('questionpaper'));
    }

   

    public function madhyamashowquestion()
    {
        $questionpaper = QuestionPaper::where('exam', 4)->get();
         //$data=Syllabus::all();
        return view('questionpapers.madhyama-pratham',compact('questionpaper'));
    }

      public function madhyamapurnashowquestion()
    {
        $questionpaper = QuestionPaper::where('exam', 5)->get();
         //$data=Syllabus::all();
        return view('questionpapers.madhyama-purna',compact('questionpaper'));
    }

      public function visharadpurnashowquestion()
    {
        $questionpaper = QuestionPaper::where('exam', 7)->get();
         //$data=Syllabus::all();
        return view('questionpapers.visharad-purna',compact('questionpaper'));
    }

      public function visharadaprathamshowquestion()
    {
        $questionpaper = QuestionPaper::where('exam', 6)->get();
         //$data=Syllabus::all();
        return view('questionpapers.visharad-pratham',compact('questionpaper'));
    }

     public function editsquestion(QuestionPaper $questionpaper,$id)
       {

         $questionpaper=QuestionPaper::find($id);
        return view('questionpapers.editquestion',compact('questionpaper'));

        }

    public function updatelinkquestion(Request $request, $id)
{
    $request->validate([
        'questionpapertitle' => 'required|string',
        'type' => 'required|string',
    ]);

    $questionpaper = QuestionPaper::find($id);

    if (!$questionpaper) {
        return redirect()->back()->with('error', 'Resource not found');
    }

    // Update resource data
    $questionpaper->type = $request->type;
    $questionpaper->questionpapertitle = $request->questionpapertitle;
      $questionpaper->exam = $request->exam;
       $questionpaper->dancestyle = $request->dancestyle;

    // Handle URL
    if ($request->has('url')) {
        $questionpaper->url = $request->url;
    } elseif (!$request->has('url') && !$questionpaper->url) {
        $questionpaper->url = null; // Retain the existing value if not provided in the request
    }

    // Handle File
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $destination_path = public_path('/assets');
        $file->move($destination_path, $filename);
        $questionpaper->file = $filename;
    } elseif (!$request->hasFile('file') && !$questionpaper->file) {
        $questionpaper->file = null; // Retain the existing value if not provided in the request
    }

    // Handle dancestyle
    //$dancestyle = $request->input('dancestyle');
    //$questionpaper->dancestyle = $dancestyle ? json_encode($dancestyle) : null;

    $questionpaper->save();

    return redirect()->back()->with('success', 'Questions updated successfully');
}


 public function downloadquestions(Request $request, $file)
    {
        return response()->download(public_path('assets/'.$file));
    }

    public function viewquestionspdf($id)
    {
        $questionpaper = QuestionPaper::find($id);
        return view('questionpapers.showquestions', compact('questionpaper'));
    }


}
