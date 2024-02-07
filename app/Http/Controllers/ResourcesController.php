<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource; // Import the Resource model
use App\Enums\Dancestyle;

class ResourcesController extends Controller
{
    public function indexresources(Resource $resource)
    {
        $resources = Resource::all();
        return view('resource', compact('resources'));
    }

   public function storeresources(Request $request)
{
   $request->validate([
    'resourcestitle' => 'required|string',
    'dancestyle' => 'required|in:Kathak,Bharatnatyam', // Update this line with your enum values
    'type' => 'required|string',
    'url' => 'nullable|url',
    'file' => 'nullable|mimes:pdf',
]);

    $resource = new Resource;
    $resource->type = $request->type;
    $resource->url = $request->url;
    $resource->exam = $request->exam;
    $resource->dancestyle = $request->dancestyle; // Ensure the value is a valid enum value
    $resource->resourcestitle = $request->resourcestitle;

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $destination_path = public_path().'/assets';
        $file->move($destination_path, $filename);
        $resource->file = $filename;
    }

    $resource->save();

    return redirect()->back();
}


    public function downloadresources(Request $request, $file)
    {
        return response()->download(public_path('assets/'.$file));
    }

    public function viewsourcespdf($id)
    {
        $resource = Resource::find($id);
        return view('admin.showresources', compact('resource'));
    }

    public function editsources(Resource $resource,$id)
       {

         $resource=Resource::find($id);
        return view('admin.editsource',compact('resource'));

        }

   public function updateLinksources(Request $request, $id)
{
    $request->validate([
        'resourcestitle' => 'required|string',
        'type' => 'required|string',
    ]);

    $resource = Resource::find($id);

    if (!$resource) {
        return redirect()->back()->with('error', 'Resource not found');
    }

    // Update resource data
    $resource->type = $request->type;
    $resource->resourcestitle = $request->resourcestitle;
    $resource->exam = $request->exam;
    $resource->dancestyle = $request->dancestyle;

    // Handle URL
    if ($request->has('url')) {
        $resource->url = $request->url;
    } elseif (!$request->has('url') && !$resource->url) {
        $resource->url = null; // Retain the existing value if not provided in the request
    }

    // Handle File
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $destination_path = public_path('/assets');
        $file->move($destination_path, $filename);
        $resource->file = $filename;
    } elseif (!$request->hasFile('file') && !$resource->file) {
        $resource->file = null; // Retain the existing value if not provided in the request
    }

    // Handle dancestyle
    // $dancestyle = $request->input('dancestyle');
    // $resource->dancestyle = $dancestyle ? json_encode($dancestyle) : null;

    $resource->save();

    return redirect()->back()->with('success', 'Resource updated successfully');
}

public function deletesources(Resource $resource,$id)
{
    $resource = Resource::findOrFail($id);
    $resource->delete();
    return redirect('admin.dashboard');

   
}

public function showprarmbhiksource()
    {
        $resource = Resource::where('exam', 1)->get();
         //$syllabus=Syllabus::all();
        return view('sources.prarmbhik',compact('resource'));
    }

    public function prathamshowsource()
    {
        $resource = Resource::where('exam', 2)->get();
         //$data=Syllabus::all();
        return view('sources.praveshika-pratham',compact('resource'));
          //return redirect()->back()->with(compact('resource'));
    }
    
    public function praveshikashowsource()
    {
        $resource = Resource::where('exam', 3)->get();
         //$data=Syllabus::all();
        return view('sources.praveshika-purna',compact('resource'));
    }

   

    public function madhyamashowsource()
    {
        $resource = Resource::where('exam', 4)->get();
         //$data=Syllabus::all();
        return view('sources.madhyama-pratham',compact('resource'));
    }

      public function madhyamapurnashowsource()
    {
        $resource = Resource::where('exam', 5)->get();
         //$data=Syllabus::all();
        return view('sources.madhyama-purna',compact('resource'));
    }

      public function visharadpurnashowresource()
    {
        $resource = Resource::where('exam', 7)->get();
         //$data=Syllabus::all();
        return view('sources.visharad-purna',compact('resource'));
    }

      public function visharadaprathamshowsource()
    {
        $resource = Resource::where('exam', 6)->get();
         //$data=Syllabus::all();
        return view('sources.visharad-pratham',compact('resource'));
    }

     



}
