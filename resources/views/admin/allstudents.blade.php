@extends('layout.admin-layout')

@section('space-work')

<div class="row col-md-12 pageheading " style="padding-right: 0px;">
    <div class="col-md-6">
        <h2>All Students</h2>
    </div>
    <div class="col-md-6 text-right" style="    padding-top: 10px;">
        <button class="btn btn-secondary"><a href="{{url('admin/add-student')}}" style="color:white !important;">Add Students</a></button>
    </div>
</div>

<!-- Dance Style Filter Form -->
<div class="row col-md-12 filtersfrom" >
    <form id="danceStyleForm" action="{{ route('admin.show') }}" method="get" class="form-inline" style="width: -webkit-fill-available;">
        <div class="col-md-3 mobview">
            <input type="text" name="search" id="search" placeholder="Search here" class="form-control mr-2">
        </div>
        <div class="col-md-3 mobview">
            <select name="status" id="statusfilter" class="form-control" onchange="submitStatusForm()">
                <option value="Active" {{ $selectedStatus == 'Active' ? 'selected' : '' }}>Active</option>
                @foreach($statusOptions as $option)
                    <option value="{{ $option }}" {{ $selectedStatus == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mobview">
            <select name="dancestyle" id="dancestyle" class="form-control" onchange="submitDanceStyleForm()">
                <option value="">Select Dance Style</option>
                @foreach(\App\Enums\Dancestyle::toSelectArray() as $dancestyle)
                    <option value="{{ $dancestyle->value }}" {{ $selectedDanceStyle == $dancestyle->value ? 'selected' : '' }}>{{ $dancestyle->label() }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="col-md-3 mobview text-left">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
</div>
</br>
<!-- Status Filter Form -->

<div class="container">
    <div class="heading">
        <div class="col">Name</div>
        <div class="email-col">Email</div>
        <div class="dob-col-dance">Dance Style</div>
        <div class="dob-col">Status</div>
        <div class="dob-col">Action</div>
    </div>

    @forelse($students->when($selectedStatus == 'Active', function ($query) {
        return $query->where('user.status', 'Active');
    })->when($selectedStatus != 'Active', function ($query) use ($selectedStatus) {
        return $query->where('user.status', $selectedStatus);
    }) as $student)
        <div class="table-row">
            <div class="col">{{ $student['name'] }}</div>
            <div class="email-col">{{ $student['email'] }}</div>
            <div class="dob-col-dance">{{ $student['dancestyle']->value }}</div>
            <div class="dob-col">{{ $student->user ? $student->user->status : 'Unknown' }}</div>
            <div class="dob-col">
                <span>
                    <a href="/admin/{{$student->id}}">View</a>
                    <a href="/admin/{{$student->id}}/edit">Edit</a>
                    <a href="/admin/{{$student->id}}/delete" class="my-2">Delete</a><br>
                </span>
            </div>
            <!-- Add more columns for other attributes -->
        </div>
    @empty
        <p>No  students available.</p>
    @endforelse
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