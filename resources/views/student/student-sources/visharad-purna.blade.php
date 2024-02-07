@extends('layout.student-layout')

@section('space-work')

<div class="card">
            <div>
                <div class="col-md-9" style="float:left; clear:both;">
                    <h3>Resources For Visharad Purna</h3>
                </div>
                
            </div>


<div id="syllabusTable" class="table-container">
    <div class="table-header">
        <div class="column-exam">Exam Year</div>
        <div class="column">Resource Title</div>
        <div class="dance-style-column">Dance Style</div>
        <div class="column-info">More Info</div>
        <div class="action-column">Detail</div>
    </div>

       @foreach($resource as $resourceItem)
    <div class="table-row">
        <div class="column-exam">{{ $resourceItem->exam->label() }}</div>
        <div class="column">{{ $resourceItem->resourcestitle }}</div>
        <div class="dance-style-column">{{ $resourceItem->dancestyle->label() }}</div>

        @if ($resourceItem->file)
        <div class="column-info"><a href="{{ url('/download', $resourceItem->file) }}">Download</a></div>
        @endif

        @if ($resourceItem->url)
        <div class="column-info"><a href="{{ $resourceItem->url }}" target="_blank">{{ $resourceItem->url }}</a></div>
        @endif

        <div class="action-column">
            <span>
                @if ($resourceItem->file)
                <a href="{{ url('/viewsourcepdf', $resourceItem->id) }}">View</a>
                @endif

                @if ($resourceItem->url)
                <a href="{{ $resourceItem->url }}" target="_blank">View</a>
                @endif

               
            </span>
        </div>
    </div>
    @endforeach
</div>


@endsection
