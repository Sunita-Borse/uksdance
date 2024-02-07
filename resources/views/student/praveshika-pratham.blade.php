@extends('layout.student-layout')

@section('space-work')

<div class="card">
            <div>
                <div class="col-md-9" style="float:left; clear:both;">
                    <h3>Syllabus For Praveshika Pratham</h3>
                </div>
               
            </div>


<div id="syllabusTable" class="table-container">
    <div class="table-header">
        <div class="column-exam">Exam Year</div>
        <div class="column">Syllabus Title</div>
        <div class="dance-style-column">Dance Style</div>
        <div class="column-info">More Info</div>
        <div class="action-column">Detail</div>
    </div>

    @foreach($syllabus as $syllabus)
    <div class="table-row">
        <div class="column-exam">{{ $syllabus->exam->label() }}</div>
        <div class="column">{{ $syllabus->syllabustitle }}</div>
        <div class="dance-style-column">{{ $syllabus->dancestyle->label() }}</div>

        @if ($syllabus->file)
        <div class="column-info"><a href="{{ url('/download', $syllabus->file) }}">Download</a></div>
        @endif

        @if ($syllabus->url)
        <div class="column-info"><a href="{{ $syllabus->url }}" target="_blank">{{ $syllabus->url }}</a></div>
        @endif

        <div class="action-column">
            <span>
                 @if ($syllabus->file )
                        <a href="{{url('/view',$syllabus->id )}}">View</a>
                         @endif
                          @if ($syllabus->url )
                        <a href="{{ $syllabus->url }}" target="_blank">View</a>
                       
                        @endif
                           </span>
        </div>
    </div>
    @endforeach
</div>


@endsection
