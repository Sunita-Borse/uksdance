@extends('layout.admin-layout')

@section('space-work')

<div style="text-align:center;">
{{ $syllabus->exam->label() }} - {{$syllabus->syllabustitle}}</br>

	

	<iframe  style="width: 100%; height: 100vh; max-width: 100%;   margin: auto;" src="https://vedak8.sg-host.com/public/assets/{{$syllabus->file}}"></iframe>
	</div>

    @endsection