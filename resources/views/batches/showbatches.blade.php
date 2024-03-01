<!-- Loop through batches 
@foreach($batches as $batch)
    <div>
        <h4>{{ $batch->batch_name }}</h4>
        <p>Branch: {{ $batch->location }}</p>
        <p>Fees: {{ $batch->fees }}</p>
        <p>Teacher: {{ $batch->teacher }}</p>
        <p>Contact No: {{ $batch->phone }}</p>
        <a href="" class="btn btn-primary">Edit</a>
        <form action="" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this batch?')">Delete</button>
        </form>
    </div>
@endforeach-->

@extends('layout.admin-layout')

@section('space-work')

<div class="row col-md-12 pageheading " style="padding-right: 0px;">
    <div class="col-md-6">
        <h2>All Batches</h2>
    </div>
    <div class="col-md-6 text-right" style="    padding-top: 10px;">
        <button class="btn btn-secondary"><a href="{{url('/batches/createbatch')}}" style="color:white !important;">Add Batch</a></button>
    </div>
</div>


</br>
<!-- Status Filter Form -->

<div class="container">
    <div class="heading">
        <div class="col">Batch Name</div>
        <div class="email-col">Branch</div>
        <div class="dob-col-dance">Teacher</div>
        <div class="dob-col">Fees</div>
         <div class="dob-col">Phone</div>
        <div class="dob-col">Action</div>
    </div>

  @foreach($batches as $batch)
        <div class="table-row">
            <div class="col">{{ $batch->batch_name }}</div>
            <div class="email-col">{{ $batch->branch->branch_name }}</div>
            <div class="dob-col-dance">{{ $batch->teacher }}</div>
            <div class="dob-col"> {{ $batch->fees }}</div>
            <div class="dob-col">{{ $batch->phone }}</div>
            <div class="dob-col">
                <span>
                   
                    <a href="/batches/{{$batch->id}}/editbatch">Edit</a>
                    <a href="/batches/{{$batch->id}}/delete" class="my-2">Delete</a><br>
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
