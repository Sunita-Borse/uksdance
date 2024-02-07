@extends('layout.student-layout')

@section('space-work')

<div class="container">
 <div>User Status: {{ auth()->user()->status }}</div>
  @if (!$formSubmitted && auth()->user()->status === 'Active')
            <!--div class="alert alert-info">
                The form is currently hidden because your account is active.
            </div-->
        @else
  <div class="card">
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
     @if($errors->any())

        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)

                <li class="list-group-item">
                    {{ $error }}
                </li>

                @endforeach

            </ul>

        </div>

        @endif

        <form action="/newstudent" method="POST" enctype="multipart/form-data" id="newstudent">
            @csrf

            <div class="form-group">
                <label for="name">(A) Student Full Name</label>
                <input type="text" class="form-control my-2" name="name" placeholder="Name" value="{{ old('name', auth()->user()->name) }}">
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control my-2" name="dob" placeholder="DOB" value="{{ old('dob') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control my-2" name="email" placeholder="Enter Email" value="{{ old('email', auth()->user()->email) }}" readonly>
            </div>

            <div class="form-group col-md-6 my-2" style="padding-left:0px;">
                <label for="maritalstatus">Marital Status</label>
                <select class="form-control my-2" name="maritalstatus" required="required" value="{{ old('maritalstatus') }}">
                    <option value="single" {{ old('maritalstatus') == "single" ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('maritalstatus') == "married" ? 'selected' : '' }}>Married</option>
                </select>
            </div>
             

            <div class="form-group">
            <label for="phone"> Phone </label>
    <input type="number" class="form-control my-2" name="phone" placeholder="Contact Number" value="{{ old('phone') }}">
    </div>
      

    <div class="form-group">
    <label for="fathername"> Father Name </label>
    <input type="text" class="form-control my-2" name="fathername" placeholder="Father/Husband Name" value="{{ old('fathername') }}">
    </div>
    <div class="form-group">
    <label for="mothername"> Mother Name </label>
    <input type="text" class="form-control my-2" name="mothername" placeholder="Mother Name" value="{{ old('mothername') }}">
    </div>
    <div class="form-group">
    <label for="permanentaddress"> Permanent Address </label>
            <textarea name="permanentaddress" placeholder="Permanent Address"  class="form-control my-2"  cols="10" rows="3" value="{{ old('permanentaddress') }}">{{ old('permanentaddress') }}</textarea>
    </div>
    <div class="form-group">
    <label for="currentaddress"> Current Address </label>
            <textarea name="currentaddress" placeholder="Current Address"  class="form-control my-2"  cols="10" rows="3" value="{{ old('currentaddress') }}">{{ old('currentaddress') }}</textarea>
    </div>
    
      <!--div class="form-group">
     <label for="recentphoto">  Please Add your Recent Photo (250px by 250px)  </label>
    <input type="file" class="form-control-file my-2" name="recentphoto"  id="recentphotoInput" onchange="showDefaultPhoto()" >
     <img src="{{ asset('/public/assets/img/photo.jpeg') }}" alt="Default Photo" id="defaultPhoto" style="max-width: 250px; max-height: 250px; display: none;">

    </div-->  


     <div class="form-group">
      <label for="recentphoto">  Please Add your Recent Photo (250px by 250px)  </label></br>

    <img src="{{ asset('storage/app/img/photo.jpeg') }}" alt="Default Image" width="150"></br>

    <!-- Actual file input for selecting a new image -->
    <input type="file" name="recentphoto" accept="image/*" id="imageInput">
</div>
    
    
  
   

    

    <div class="form-group">
   

    <label for="birthcertificate">  Please Add your Birth Certificate (Not more than 500KB)  </label>
   
    <input type="file" class="form-control-file my-2" name="birthcertificate" value="{{ old('birthcertificate') }}">
    
</div>  

    <div class="form-group">
    <label for="marriagecertificate">  Please Add your Marriage Certificate (Not more than 500KB)  </label>
    
    <input type="file" class="form-control-file my-2" name="marriagecertificate" value="{{ old('marriagecertificate') }}">
    </div>   
     

    <!--label for="dancestyle[]">(B) Which dance style do you want to learn(Tick√)</label>
<div class="form-group my-2">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="dancestyle[]" value="Kathak" id="kathakCheckbox" {{ (is_array(old('dancestyle')) and in_array('Kathak', old('dancestyle'))) ? ' checked' : '' }}>
        <label class="form-check-label" for="kathakCheckbox">(i) Kathak</label>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="dancestyle[]" value="Bharatnatyam" id="bharatnatyamCheckbox" {{ (is_array(old('dancestyle')) and in_array('Bharatnatyam', old('dancestyle'))) ? ' checked' : '' }}>
        <label class="form-check-label" for="bharatnatyamCheckbox">(ii) Bharatnatyam</label>
    </div>
</div-->
<div class="form-group">
<label for="dancestyle">Select Dance Style:</label>
 <div class="col-md-6" style="padding-left:0px;">
    <select name="dancestyle" id="dancestyle"  required="required"  >
        @foreach(\App\Enums\Dancestyle::toSelectArray() as $dancestyle)
            <option value="{{ $dancestyle->value }}" {{ old('dancestyle') == $dancestyle->value ? 'selected' : '' }}>
                {{ $dancestyle->label() }}
            </option>
        @endforeach
    </select>
    </div>
    </div>

<div class="form-group">
    <label for="exam" class="control-label">Exam Year</label>

    <div class="col-md-6" style="padding-left:0px;">
        <select id="exam" class="form-control" name="exam" required="required" >
            @foreach(\App\Enums\Exam::cases() as $exam)
                <option value="{{ $exam->value }}" {{ old('exam') == $exam->value ? 'selected' : '' }}  >{{ $exam->label() }}</option>
            @endforeach
        </select>
    </div>
</div>    

  



    <div class="form-group">
    <label for="description"> Description </label>
            <textarea name="description" placeholder="Description"  class="form-control my-2"  cols="10" rows="3" value="{{ old('description') }}">{{ old('description') }}</textarea>
    </div>
    

 
        <div class="form-group">
            <div class="form-check" style="padding-left:0px;">
                <input class="form-check-input" type="checkbox" value="1" id="t&c" name="t&c" style="margin-left: 0px; width: auto !important; margin-top: 5px;" {{ (old('t&c') == '1') ? 'checked' : ''}}>
                <label class="form-check-label" style="padding-left:20px;" for="t&c">
                    I agree to the terms and conditions.
                </label>
            </div>
            </div>

            <!-- Add more form groups for other fields -->

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    <script>
    // JavaScript to set default image path if no file is chosen
    document.getElementById('newstudent').addEventListener('submit', function() {
        var fileInput = document.getElementById('imageInput');

        // If no file is chosen, set the value to the default image path
        if (!fileInput.files.length) {
            fileInput.value = '{{ asset("storage/app/img/photo.jpeg") }}';
        }
    });
</script>
          @endif
    </div>
   @endsection 