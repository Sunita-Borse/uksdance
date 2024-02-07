@extends('layout.admin-layout')

@section('space-work')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#fileOrUrlSelect').change(function () {
                var selectedValue = $(this).val();

                if (selectedValue === 'file') {
                    $('#fileInput').show();
                    $('#urlInput').hide();
                } else if (selectedValue === 'url') {
                    $('#fileInput').hide();
                    $('#urlInput').show();
                } else {
                    $('#fileInput').hide();
                    $('#urlInput').hide();
                }
            });
        });
    </script>
<div class="card card-deafult" style="    padding: 20px;">
	<form action="{{url('updatesourcesLink/'.$resource->id)}} " method="POST" enctype="multipart/form-data">

		@csrf
        @method('PUT')
		<div class="form-group">
		Exam Year</br>
        <select id="examYearDropdown" name="exam">

      


                    @foreach(\App\Enums\Exam::cases() as $exam)
                   
                        <option value="{{ $exam->value }}" {{ $exam->label() == ($resource->exam)->label() ? 'selected' : '' }}>{{ $exam->label() }}</option>
                    @endforeach
                </select>
</div>
<div class="form-group">
Resources Title</br>
	<input type="text" name="resourcestitle" placeholder="Resources Title" value="{{$resource->resourcestitle}}" style="width:100%;">
</div>


<div class="form-group">
    Dance Style</br>
    <select id="dancestyleDropdown" name="dancestyle">
        @foreach(\App\Enums\Dancestyle::cases() as $dstyle)
            <?php
                $selected = '';
                if (is_object($resource->dancestyle) && $dstyle->value === $resource->dancestyle->value) {
                    $selected = 'selected';
                }
            ?>
            <option value="{{ $dstyle->value }}" {{ $selected }}>
                {{ $dstyle->label() }}
            </option>
        @endforeach
    </select>
</div>


<div class="form-group">
Select Type Of Resources	</br>
    <select id="fileOrUrlSelect" name="type" style="width:100%;">
        <option value="">Select an option</option>
        <option value="file" {{ $resource->type == 'file' ? 'selected' : '' }}>Upload File</option>
        <option value="url" {{ $resource->type == 'url' ? 'selected' : ''  }}>External URL/Video links</option>
    </select>
	</div>

	<div id="fileInput" style="display: none;margin-bottom:15px;">
<input type="file" name="file">
</div>

<div id="urlInput" style="display: none; margin-bottom:15px;">
<input type="text" name="url" placeholder="Add External URL/Video links">
</div>

	<div class="form-group">
	<button type="submit" class="btn btn-success">
                Update Info
            </button>
</div>
   

	<!-- <input type="submit" class="btn btn-success" > -->


	</form>
</div>
</div>

@endsection