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
	<form action="{{url('updatelinkquestion/'.$questionpaper->id)}} " method="POST" enctype="multipart/form-data">

		@csrf
        @method('PUT')
		<div class="form-group">
		Exam Year</br>
        <select id="examYearDropdown" name="exam">

      


                    @foreach(\App\Enums\Exam::cases() as $exam)
                   
                        <option value="{{ $exam->value }}" {{ $exam->label() == ($questionpaper->exam)->label() ? 'selected' : '' }}>{{ $exam->label() }}</option>
                    @endforeach
                </select>
</div>
<div class="form-group">
Question Title</br>
	<input type="text" name="questionpapertitle" placeholder="Question Title" value="{{$questionpaper->questionpapertitle}}" style="width:100%;">
</div>


<div class="form-group">
    <label>Select dance style (Tick√)</label>
    <textarea name="dancestyle[]" placeholder="(B) Which dance style do you want to learn" class="form-control my-2" cols="10" rows="5">
        @if ($questionpaper->dancestyle)
            @foreach(json_decode($questionpaper->dancestyle) as $dstyle)
                {{ $dstyle }}
            @endforeach
        @endif
    </textarea>
</div>


<div class="form-group">
Select Type Of Questions	</br>
    <select id="fileOrUrlSelect" name="type" style="width:100%;">
        <option value="">Select an option</option>
        <option value="file" {{ $questionpaper->type == 'file' ? 'selected' : '' }}>Upload File</option>
        <option value="url" {{ $questionpaper->type == 'url' ? 'selected' : ''  }}>External URL/Video links</option>
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