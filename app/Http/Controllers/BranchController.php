<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('branches.createbranch');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'branch_name' => 'required',
            'address' => 'required',
            'phone' => ['required', 'regex:#^([0-9\s\-\+\(\)]*)$#', 'min:10'],
        ]);

        // Create a new branch record
        $branch = Branch::create([
            'branch_name' => $validatedData['branch_name'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
        ]);

        // Check if branch record was created successfully
        if ($branch) {
            return redirect()->route('branches.show')->with('success', 'Branch created successfully');
        } else {
            return back()->withInput()->withErrors(['error' => 'Failed to create branch.']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $branches = Branch::all();
        return view('branches.showbranch', compact('branches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('branches.editbranch',  compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Branch $branch)
    {
        // Validate request data
        $validatedData = $request->validate([
            'branch_name' => 'required',
            'address' => 'required',
            'phone' => ['required', 'regex:#^([0-9\s\-\+\(\)]*)$#', 'min:10'],
        ]);

        // Update the branch record with the validated data
        $branch->update([
            'branch_name' => $validatedData['branch_name'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
        ]);

        // Check if branch record was updated successfully
        if ($branch) {
            return redirect()->route('branches.show')->with('success', 'Branch updated successfully');
        } else {
            return back()->withInput()->withErrors(['error' => 'Failed to update branch.']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.show')->with('success', 'Batch deleted successfully');
    }
}
