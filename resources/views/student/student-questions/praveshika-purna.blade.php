@extends('layout.student-layout')

@section('space-work')

<div class="card">
            <div>
                <div class="col-md-9" style="float:left; clear:both;">
                    <h3>Questions For Praveshika Purna</h3>
                </div>
                
            </div>


<div id="syllabusTable" class="table-container">
    <div class="table-header">
        <div class="column-exam">Exam Year</div>
        <div class="column">Questions Title</div>
        <div class="dance-style-column">Dance Style</div>
        <div class="column-info">More Info</div>
        <div class="action-column">Detail</div>
    </div>

    @foreach($questionpaper as $questionpaper)
    <div class="table-row">
        <div class="column-exam">{{ $questionpaper->exam->label() }}</div>
        <div class="column">{{ $questionpaper->questionpapertitle }}</div>
        <div class="dance-style-column">{{ $questionpaper->dancestyle->label() }}</div>

        @if ($questionpaper->file)
        <div class="column-info"><a href="{{ url('/downloadquestions', $questionpaper->file) }}">Download</a></div>
        @endif

        @if ($questionpaper->url)
        <div class="column-info"><a href="{{ $questionpaper->url }}" target="_blank">{{ $questionpaper->url }}</a></div>
        @endif

        <div class="action-column">
            <span>
                @if ($questionpaper->file)
                <a href="{{ url('/viewquestionspdf', $questionpaper->id) }}">View</a>
                @endif

                @if ($questionpaper->url)
                <a href="{{ $questionpaper->url }}" target="_blank">View</a>
                @endif

                       </div>
    </div>
    @endforeach
</div>

@endsection
