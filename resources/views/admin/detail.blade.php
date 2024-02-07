@extends('layout.admin-layout')

@section('space-work')
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Dashboard</title>
    <!- Bootstrap CSS ->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1>Welcome to Your Dashboard, {{ auth()->user()->name }}</h1>
 -->
<p>Your Student Information:</p>

<h1 class="text-center my-5">{{ $student->name }}</h1>

<div class="row justify-content-center" style="margin-right: 0px !important; margin-left: 0px !important;">
    <div class="col-md-8">

        <div class="card card-default my-2">
            <div class="card-header">
                Details
            </div>
            <div class="card-body"  >

                @csrf

                 <div class="form-group" style="pointer-events: none;">
                <label for="name"> Student Status</label>
                    <input type="text" class="form-control my-2" name="name" placeholder="name" value="{{ $student->user->status }}">
                </div>
               

                <div class="form-group" style="pointer-events: none;">
                <label for="name"> Name</label>
                    <input type="text" class="form-control my-2" name="name" placeholder="name" value="{{ $student->name }}">
                </div>

                <div class="form-group" style="pointer-events: none;">
                <label for="dob">Date Of Birth</label> 
                    <input type="date" class="form-control my-2" name="dob" placeholder="DOB" value="{{ $student->dob }}">
                </div>

                <div class="form-group" style="pointer-events: none;">
                <label for="rathername">Father Name</label> 
                    <input type="text" class="form-control my-2" name="fathername" placeholder="Father Name" value="{{ $student->fathername }}">
                </div>

                <div class="form-group" style="pointer-events: none;">
                <label for="mothername">Mother Name</label>  
                    <input type="text" class="form-control my-2" name="mothername" placeholder="Mother Name" value="{{ $student->mothername }}">
                </div>

                <div class="form-group" style="pointer-events: none;">
                <label for="permanentaddress">Permanent Address</label>
                    <textarea name="permanentaddress" placeholder="Permanent Address" class="form-control my-2" cols="10" rows="5">{{ $student->permanentaddress }}</textarea>
                </div>

                <div class="form-group" style="pointer-events: none;">
                <label for="currentaddress"> Current Address</label> 
                    <textarea name="currentaddress" placeholder="Current Address" class="form-control my-2" cols="10" rows="5">{{ $student->currentaddress }}</textarea>
                </div>

                <div class="form-group" style="pointer-events: none;" >
                <label for="eamil">Email</label>
                <input type="email" class="form-control my-2" name="email" placeholder="Enter Email" value="{{$student->email}}">
                </div> 

                <div class="form-group" style="pointer-events: none;">
                <label for="phone">Contact Number</label> 
    <input type="number" class="form-control my-2" name="phone" placeholder="Contact Number" value="{{$student->phone}}">
    </div>

    <div class="form-group" style="pointer-events: none;">
    <label for="maritalstatus">Marital Status</label> 
    <input type="text" class="form-control my-2" name="maritalstatus" placeholder="Marital Status" value="{{$student->maritalstatus}}">
    </div>

    <div class="form-group" style="pointer-events: none;">
    <label for="description">Description</label> 
            <textarea name="description" placeholder="description"  class="form-control my-2"  cols="10" rows="5">{{$student->description}}</textarea>
    </div>

   


 <div class="form-group" style="padding-left:0px;">
 <label for="dancestyle"> Dancestyle</label>   
 <div class="form-group" style="pointer-events: none;">
        @if ($student->dancestyle)
            <input type="text" class="form-control my-2" name="dancestyle" placeholder="Dancestyle" value="{{ $student->dancestyle->label() }}">
        @else
            <input type="text" class="form-control my-2" name="dancestyle" placeholder="Exam Name" value="No dancestyle Selected">
        @endif
    </div>

    </div>

 <div class="form-group" style="padding-left:0px;">
 <label for="exam"> Exam Year</label>   
 <div class="form-group" style="pointer-events: none;">
        @if ($student->exam)
            <input type="text" class="form-control my-2" name="exam" placeholder="Exam Name" value="{{ $student->exam->label() }}">
        @else
            <input type="text" class="form-control my-2" name="exam" placeholder="Exam Name" value="No Exam Selected">
        @endif
    </div>

    </div>
     
            <div class="form-group">
                <label for="recentphoto">Recent Photo (250px by 250px)</label>
                <div class="d-flex justify-content-center align-items-center">
                    @if ($student->image && $student->image->path)
                        <!-- If image exists, display the image -->
                        <img src="https://vedak8.sg-host.com/storage/app/{{ $student->image->path }}" alt="Recent Photo" class="img-fluid">
                    @else
                        <!-- If no image, display a placeholder or default image -->
                        <img src="{{ asset('storage/app/img/photo.jpeg') }}"  alt="Placeholder Image" class="img-fluid">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="birthcertificate">Birth Certificate (Not more than 500KB)</label>
                <div class="d-flex justify-content-center align-items-center">
                    <!-- You can adjust the styles as needed -->
                    <iframe src="https://vedak8.sg-host.com/storage/app/{{ $student->document->path }}" class="iframe-class img-fluid" frameborder="0"></iframe>
                </div>
            </div>

            <div class="form-group">
                <label for="marriagecertificate">Marriage Certificate (Not more than 500KB)</label>
                <div class="d-flex justify-content-center align-items-center">
                    <!--input type="file" class="form-control-file my-2" name="marriagecertificate"-->
                    @if($student->marriage_certificate)
                        <!-- You can adjust the styles as needed -->
                        <iframe src="{{ asset('storage/app/' . $student->marriage_certificate->path) }}" class="iframe-class img-fluid" frameborder="0"></iframe>
                    @else
                        <p>No marriage certificate uploaded.</p>
                    @endif
                </div>
            </div>


 
                <a href="/admin/{{ $student->id }}/edit" class="btn btn-info">Edit</a>
                <a href="/admin/{{ $student->id }}/delete" onclick="confirmDelete()" class="btn btn-danger my-2">Delete</a>
            </div>
        </div>

    </div>
</div>
<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this student?")) {
            document.getElementById('delete-form').submit();
        }
    }
</script>
<!-- Bootstrap JS and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
<!-- </body>
</html> -->
