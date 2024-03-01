@extends('layout.admin-layout')

@section('space-work')


   
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<h1>Update Branch</h1>

<div class="container">
    <div class="card">

<form method="POST" action="{{ route('branches.update', $branch->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="branch_name">Batch Name</label>
        <input type="text" class="form-control" id="branch_name" name="branch_name" value="{{ $branch->branch_name }}" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ $branch->address }}" required>
    </div>

   
    <div class="form-group">
        <label for="phone">Contact No</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $branch->phone }}" required>
    </div>

  
   
              
          
    <button type="submit" class="btn btn-primary">Update</button>
</form>


       </div>
</div>
@endsection






