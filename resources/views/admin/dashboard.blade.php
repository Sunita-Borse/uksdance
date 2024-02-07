@extends('layout.admin-layout')

@section('space-work')

<h2 class="mb-4">All Students</h2>


        
       <!-- Button trigger modal
       <button class="btn btn-secondary form-control" style=" width: auto;
    float: right;" ><a href="{{url('admin/add-student')}}" style="color:white !important;">Add Students</a></button>
          -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <form> 
  
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/admin/add-student" method="POST" enctype="multipart/form-data">

@csrf

<div class="form-group">
(A) Student Full Name
<input type="text" class="form-control my-2" name="name" placeholder="Name" value="{{ old('name') }}">
</div>

<div class="form-group">
Date of Birth
<input type="date" class="form-control my-2" name="dob" placeholder="DOB" value="{{ old('dob') }}">
</div>


<div class="form-group">
<input type="email" class="form-control my-2" name="email" placeholder="Enter Email" value="{{ old('email') }}">
</div>

<!--div class="form-group">
<input type="text" class="form-control my-2" name="maritalstatus" placeholder="Marital Status" value="{{ old('maritalstatus') }}">
</div-->

<div class="form-group col-md-6 my-2" style="padding-left:0px;">
Marital Status
<select class="form-control my-2" name="maritalstatus" required="required" value="{{ old('maritalstatus') }}">
<option value="single" {{ old('maritalstatus') == "single" ? 'selected' : '' }}>Single</option>
<option value="married" {{ old('maritalstatus') == "married" ? 'selected' : '' }}>Married</option>
</select></div>

<div class="form-group">
<input type="number" class="form-control my-2" name="phone" placeholder="Contact Number" value="{{ old('phone') }}">
</div>


<div class="form-group">
<input type="text" class="form-control my-2" name="fathername" placeholder="Father/Husband Name" value="{{ old('fathername') }}">
</div>
<div class="form-group">

<input type="text" class="form-control my-2" name="mothername" placeholder="Mother Name" value="{{ old('mothername') }}">
</div>
<div class="form-group">

    <textarea name="permanentaddress" placeholder="Permanent Address"  class="form-control my-2"  cols="10" rows="3" value="{{ old('permanentaddress') }}">{{ old('permanentaddress') }}</textarea>
</div>
<div class="form-group">

    <textarea name="currentaddress" placeholder="Current Address"  class="form-control my-2"  cols="10" rows="3" value="{{ old('currentaddress') }}">{{ old('currentaddress') }}</textarea>
</div>

<div class="form-group">
Please Add your Recent Photo (250px by 250px)
<input type="file" class="form-control-file my-2" name="recentphoto" >
</div>  




<div class="form-group">



Please Add your Birth Certificate (Not more than 500KB)
<input type="file" class="form-control-file my-2" name="birthcertificate" value="{{ old('birthcertificate') }}">

</div>  

<div class="form-group">
Please Add your Marriage Certificate (Not more than 500KB)
<input type="file" class="form-control-file my-2" name="marriagecertificate" value="{{ old('marriagecertificate') }}">
</div>   


<label>(B) Which dance style do you want to learn(Tick√)</label>
<div class="form-group my-2">

<input type="checkbox"   style="margin: 0px 10px;" name="dancestyle[]"   value="Kathak " {{ (is_array(old('dancestyle')) and in_array('Kathak', old('dancestyle'))) ? ' checked' : '' }}

>(i) Kathak
<input type="checkbox" style="margin: 0px 10px;" name="dancestyle[]" value="Bharatnatyam  " {{ (is_array(old('dstyle')) and in_array('Bharatnatyam', old('dstyle'))) ? ' checked' : '' }}>(ii) Bharatnatyam 
</div>

<div class="form-group">
<label for="exam" class=" control-label">Exam Year</label>

<div class="col-md-6" style="padding-left:0px;" >
 <!-- <select  id="exam" class="form-control" name="exam" required="required" value="{{ old('exam') }}">

    <option value="1" {{ old('exam') == "Prarmbhik (First Year)" ? 'selected' : '' }}>Prarmbhik (First Year)</option>
    <option value="2" {{ old('exam') == "Praveshika Pratham (Second Year)" ? 'selected' : '' }}>Praveshika Pratham (Second Year)</option>
    <option value="3" {{ old('exam') == "Praveshika Purna (Third Year)" ? 'selected' : '' }}>Praveshika Purna (Third Year)</option>
    <option value="4" {{ old('exam') == "Madhyama Pratham (Fourth Year)" ? 'selected' : '' }}>Madhyama Pratham (Fourth Year)</option>

</select> -->
</div>



</div>  

<div class="form-group">

<label  class=" control-label">Batch Time</label> 
<div class="col-md-6" style="padding-left:0px;">   
<select class="form-control" name="batch" required="required" value="{{ old('batch') }}"> 
               <option value="1" {{ old('batch') == "Morning Batch" ? 'selected' : '' }}>Morning Batch</option>  
                         <option value="2" {{ old('batch') == "Evening Batch" ? 'selected' : '' }}>Evening Batch</option> 
                                               </select>  
                                              </div>
</div>

<div class="form-group">

    <textarea name="description" placeholder="Description"  class="form-control my-2"  cols="10" rows="3" value="{{ old('description') }}">{{ old('description') }}</textarea>
</div>



<div class="form-group">
    <div class="form-check" style="padding-left:0px;">
        <input class="form-check-input" type="checkbox" value="1" id="t&c" name="t&c" style="margin-left: 0px;" {{ (old('t&c') == '1') ? 'checked' : ''}}>
        <label class="form-check-label" style="padding-left:20px;">
            I agree to the terms and conditions.
        </label>
    </div>
    </div>

<div class="form-group text-center">
   
    <button type="submit" class="btn btn-success">
        Submit
    </button>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>

</form>
  </div>
</div>
@endsection