@extends('layout.student-layout')

@section('space-work')

<div style="text-align:center;">

{{ $resource->exam->label() }} - {{$resource->resourcetitle}}</br>


	

	<iframe  style="width: 100%; height: 100vh; max-width: 100%;   margin: auto;" src="https://vedak8.sg-host.com/public/assets/{{$resource->file}}"></iframe>
	</div>

    @endsection