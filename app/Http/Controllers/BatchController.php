<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Branch;
use App\Models\BatchDetail;


class BatchController extends Controller
{
    
    public function index()
    {
        $branches = Branch::all();
            return view('batches.createbatch', compact('branches'));

      // return view('batches.createbatch');
    }

   
    public function create()
    {
        
    }

  
public function store(Request $request)
{
    // Validate request data
    $validatedData = $request->validate([
        'batch_name' => 'required',
       
        'fees' => 'required|numeric',
        'teacher' => 'required',
        'phone' => ['required', 'regex:#^([0-9\s\-\+\(\)]*)$#', 'min:10'],
        'days' => 'required|array', // Ensure days, start_times, and end_times are arrays
        'start_times' => 'required|array',
        'end_times' => 'required|array',
        'days.*' => 'required', // Validate each element of the arrays
        'start_times.*' => 'required',
        'end_times.*' => 'required',
        'branch_id' => 'required|exists:branches,id',
    ]);

    // Create a new batch record
    $batch = Batch::create([
        'batch_name' => $validatedData['batch_name'],
       
        'fees' => $validatedData['fees'],
        'teacher' => $validatedData['teacher'],
        'phone' => $validatedData['phone'],
        'branch_id' => $validatedData['branch_id'],
    ]);

    // Check if batch record was created successfully
    if ($batch) {
        // Combine days, start times, and end times into a single record
        $batchDetails = [];
        foreach ($validatedData['days'] as $key => $day) {
            $batchDetails[] = [
                'day' => $day,
                'start_time' => $validatedData['start_times'][$key],
                'end_time' => $validatedData['end_times'][$key],
            ];
        }

        // Create batch detail records
        $batch->batchDetails()->createMany($batchDetails);

        return redirect()->route('batches.show')->with('success', 'Batch created successfully');
    } else {
        return back()->withInput()->withErrors(['error' => 'Failed to create batch.']);
    }
}

    public function show()
    {
         $batches = Batch::all();
        return view('batches.showbatches', compact('batches'));
    }

    
   public function edit(Batch $batch)
{
      $batchDetail = $batch->batchDetails;
       //dd(session()->all());
      //dd($batch->batchDetails);
       $branches = Branch::all();
    
    return view('batches.editbatch',  compact('batch', 'batchDetail','branches'));
}
 

public function update(Request $request, Batch $batch)
{
    $request->validate([
        'batch_name' => 'required|string|max:255',
        
        'fees' => 'required|numeric',
        'teacher' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'days.*' => 'required', // Validate each day in the days array
        'start_times.*' => 'required',
        'end_times.*' => 'required',
        'branch_id' => 'required|exists:branches,id',
    ]);

    // Update Batch
    $batch->update([
        'batch_name' => $request->batch_name,
       
        'fees' => $request->fees,
        'teacher' => $request->teacher,
        'phone' => $request->phone,
        'branch_id' => $request->branch_id,
    ]);

    // Update or delete BatchDetail if it exists
    foreach ($batch->batchDetails as $index => $batchDetail) {
        if (isset($request->days[$index])) {
            // Update existing BatchDetail
            $batchDetail->update([
                'day' => $request->days[$index],
                'start_time' => $request->start_times[$index],
                'end_time' => $request->end_times[$index],
            ]);
        } else {
            // Delete extra BatchDetail
            $batchDetail->delete();
        }
    }

    // Add new BatchDetail if there are more entries in the request arrays
    $numExistingDetails = $batch->batchDetails->count();
    if (count($request->days) > $numExistingDetails) {
        for ($i = $numExistingDetails; $i < count($request->days); $i++) {
            $batch->batchDetails()->create([
                'day' => $request->days[$i],
                'start_time' => $request->start_times[$i],
                'end_time' => $request->end_times[$i],
            ]);
        }
    }

    return redirect()->route('batches.show')->with('success', 'Batch updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('batches.show')->with('success', 'Batch deleted successfully');
    }
}

