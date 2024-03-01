@extends('layout.admin-layout')

@section('space-work')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<h1>Add New Branch</h1>

<div class="container">
    <div class="card">
        <form method="POST" action="{{ route('branches.store') }}">
            @csrf

            <div class="form-group">
                <label for="branch_name">Branch Name</label>
                <input type="text" class="form-control" id="branch_name" name="branch_name" required>
            </div>

            <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
   
     <div class="form-group">
        <label for="phone">Contact No</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

