@extends('layout.admin-layout')

@section('space-work')
<h1 class="text-center my-5">Update Info</h1>

<div class="row justify-content-center" style="margin-right: 0px !important; margin-left: 0px !important;">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Edit Info</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                 

                <form id="statusUpdateForm"  action="{{ route('admin.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

     <select name="status" class="form-control" onchange="submitStatusForm(this)">
                                @foreach($statusOptions as $option)
                                    <option value="{{ $option }}" {{ $student->user && $student->user->status == $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control my-2" name="name" placeholder="Name" value="{{$student->name}}">
    </div>

    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control my-2" name="dob" value="{{$student->dob}}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control my-2" name="email" placeholder="Enter Email" value="{{$student->email}}">
    </div>

    <div class="form-group">
        <label for="fathername">Father Name</label>
        <input type="text" class="form-control my-2" name="fathername" placeholder="Father Name" value="{{$student->fathername}}">
    </div>

    <div class="form-group">
        <label for="mothername">Mother Name</label>
        <input type="text" class="form-control my-2" name="mothername" placeholder="Mother Name" value="{{$student->mothername}}">
    </div>

    <div class="form-group">
        <label for="maritalstatus">Marital Status</label>
        <input type="text" class="form-control my-2" name="maritalstatus" placeholder="Marital Status" value="{{$student->maritalstatus}}">
    </div>

    <div class="form-group">
        <label for="permanentaddress">Permanent Address</label>
        <textarea name="permanentaddress" placeholder="Permanent Address" class="form-control my-2" cols="10" rows="5">{{$student->permanentaddress}}</textarea>
    </div>

    <div class="form-group">
        <label for="currentaddress">Current Address</label>
        <textarea name="currentaddress" placeholder="Current Address" class="form-control my-2" cols="10" rows="5">{{$student->currentaddress}}</textarea>
    </div>


    <div class="form-group">
    <label for="phone">Contact Number</label>
    <input type="number" class="form-control my-2" name="phone" placeholder="Contact Number" value="{{$student->phone}}">
    </div>

    <div class="form-group">
    <label for="phone">Description</label>  
            <textarea name="description" placeholder="description"  class="form-control my-2"  cols="10" rows="5">{{$student->description}}</textarea>
    </div>
    
     <div class="form-group" style="padding-left:0px;">
                        <label for="dancestyle"> Dancestyle</label>   
                        <select id="dancestyle" class="form-control" name="dancestyle">
                            @foreach(\App\Enums\Dancestyle::cases() as $dancestyle)
                                <option value="{{ $dancestyle->value }}" {{ $dancestyle->label() == ($student->dancestyle)->label() ? 'selected' : '' }}>{{ $dancestyle->label() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="padding-left:0px;">
                        <label for="exam"> Exam Year</label>   
                        <select id="exam" class="form-control" name="exam">
                            @foreach(\App\Enums\Exam::cases() as $exam)
                                <option value="{{ $exam->value }}" {{ $exam->label() == ($student->exam)->label() ? 'selected' : '' }}>{{ $exam->label() }}</option>
                            @endforeach
                        </select>
                    </div>

  <div class="form-group">
                <label for="recentphoto">Recent Photo (250px by 250px)</label>
                 <input type="file" class="form-control-file my-2" name="recentphoto">

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
    <label for="birthcertificate">Please Add your Birth Certificate (Not more than 500KB)</label>
    <input type="file" class="form-control-file my-2" name="birthcertificate">

    @if ($student->document && $student->document->path)
        <!-- If birth certificate exists, display the PDF -->
        <iframe src="https://vedak8.sg-host.com/storage/app/{{ $student->document->path }}" class="iframe-class img-fluid" frameborder="0" ></iframe>
    @else
        <!-- If no birth certificate, display a message or handle accordingly -->
        <p>No birth certificate available</p>
    @endif
</div>

   <div class="form-group">
    <label for="marriagecertificate">Marriage Certificate (Not more than 500KB)</label>
    <input type="file" class="form-control-file my-2" name="marriagecertificate">

    @if($student->marriage_certificate)
        <iframe src="{{ asset('storage/app/' . $student->marriage_certificate->path) }}" class="iframe-class img-fluid" frameborder="0">
            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('folder/file_name.pdf') }}">Download PDF</a>
        </iframe>
    @else
        <p>No marriage certificate uploaded.</p>
    @endif
</div>

    <!-- ... (other form fields) ... -->

    <div class="form-group text-center">
        <button type="submit" class="btn btn-success">Update Info</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection
