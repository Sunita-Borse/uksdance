@extends('layout.admin-layout')

@section('space-work')

<div class="card">
            <div>
                <div class="col-md-9" style="float:left; clear:both;">
                    <h3>Resources For Prarmbhik</h3>
                </div>
                <div class="col-md-3" style="float:left;">
                    <button class="btn btn-secondary form-control" onclick="redirectToSyllabus('Prarmbhik')" id="prarmbhik-upload-btn" style="width: auto; float: right;">Upload New Syllabus</button>
                </div>
            </div>
<div class="col-md-3" style="float:left; margin-top: 10px;">
    <label for="danceStyleFilter">Filter by Dance Style:</label>
    <select id="danceStyleFilter" class="form-control" onchange="filterTable()">
        <option value="">All</option>
        <option value="Kathak">Kathak</option>
        <option value="Bharatnatyam">Bharatnatyam</option>
    </select>
</div>

<div id="syllabusTable" class="table-container">
    <div class="table-header">
        <div class="column-exam">Exam Year</div>
        <div class="column">Syllabus Title</div>
        <div class="dance-style-column">Dance Style</div>
        <div class="column-info">More Info</div>
        <div class="action-column">Detail</div>
    </div>

       @foreach($resource as $resource)
    <div class="table-row">
        <div class="column-exam">{{ $resource->exam->label() }}</div>
        <div class="column">{{ $resource->resourcestitle }}</div>
        <div class="dance-style-column">{{ $resource->dancestyle->label() }}</div>

        @if ($resource->file)
        <div class="column-info"><a href="{{ url('/downloadfile', $resource->file) }}">Download</a></div>
        @endif

        @if ($resource->url)
        <div class="column-info"><a href="{{ $resource->url }}" target="_blank">{{ $resource->url }}</a></div>
        @endif

        <div class="action-column">
            <span>
                @if ($resource->file)
                <a href="{{ url('/viewpdf', $resource->id) }}">View</a>
                @endif

                @if ($resource->url)
                <a href="{{ $resource->url }}" target="_blank">View</a>
                @endif

                <a href="/editsources/{{$resource->id}}">Edit</a>
                <a href="/delete/{{$resource->id}}" class="my-2">Delete</a>
            </span>
        </div>
    </div>
    @endforeach
</div>

<script>
    function redirectToSyllabus(examType) {
        window.location.href = `/sources?exam=${encodeURIComponent(examType)}`;
    }

     function filterTable() {
        var input, filter, table, tr, td, i, danceStyleFilter;
        input = document.getElementById("danceStyleFilter");
        filter = input.value.toUpperCase();
        table = document.getElementById("syllabusTable"); // Update to match the ID of the table container
        tr = table.getElementsByClassName("table-row"); // Use getElementsByClassName to get rows

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName("dance-style-column")[0]; // Get the Dance Style column
            if (td) {
                danceStyleFilter = td.textContent || td.innerText;
                if (filter === '' || danceStyleFilter.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
