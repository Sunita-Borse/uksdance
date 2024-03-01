
@extends('layout.admin-layout')

@section('space-work')

<div class="row col-md-12 pageheading " style="padding-right: 0px;">
    <div class="col-md-6">
        <h2>All Branches</h2>
    </div>
    <div class="col-md-6 text-right" style="    padding-top: 10px;">
        <button class="btn btn-secondary"><a href="{{url('/branches/createbranch')}}" style="color:white !important;">Add Branch</a></button>
    </div>
</div>


</br>
<!-- Status Filter Form -->

<div class="container">
    <div class="heading">
        <div class="col">Branch Name</div>
        <div class="email-col">Address</div>
       
         <div class="dob-col">Phone</div>
        <div class="dob-col">Action</div>
    </div>

  @foreach($branches as $branch)
        <div class="table-row">
            <div class="col">{{ $branch->branch_name }}</div>
            <div class="email-col">{{ $branch->address }}</div>
          
            <div class="dob-col">{{ $branch->phone }}</div>
            <div class="dob-col">
                 <span>
                   
                    <a href="/branches/{{$branch->id}}/editbranch">Edit</a>
                    <a href="/branches/{{$branch->id}}/delete" class="my-2">Delete</a><br>
                </span>
            </div>
            <!-- Add more columns for other attributes -->
        </div>
   
    @endforeach
</div>

<script>
    // Function to submit dance style form
    function submitDanceStyleForm() {
        document.getElementById('danceStyleForm').submit();
    }

    // Function to submit status form
    // function submitStatusForm() {
    //    // document.getElementById('statusForm').submit();
    //     document.getElementById('statusfilter').submit();
    // }
    function submitStatusForm() {
        var form = document.getElementById('danceStyleForm');
        form.submit();
    }
</script>
@endsection
