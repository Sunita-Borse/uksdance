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


<h1>Resources Form</h1>

<div class="container">
    <div class="card">
        <form action="/admin/syllabus" method="post" enctype="multipart/form-data">
            @csrf

            <!-- <div class="form-group">
                <label for="examYearDropdown">Exam Year</label>
                <select id="examYearDropdown" name="exam">
                    @foreach(\App\Enums\Exam::cases() as $examOption)
                        <option value="{{ $examOption->value }}">{{ $examOption->label() }}</option>
                    @endforeach
                </select>
            </div> -->

            <div class="form-group">
                <label for="syllabusTitle">Resources Title</label>
                <input type="text" id="syllabusTitle" name="syllabustitle" placeholder="Syllabus Title">
            </div>

            <div class="form-group">
                <label for="fileOrUrlSelect">Select Type Of Resources</label>
                <select id="fileOrUrlSelect" name="type">
                    <option value="">Select type of Resources</option>
                    <option value="file">Upload File</option>
                    <option value="url">External URL/Video links</option>
                </select>
            </div>

            <div id="fileInput">
                <input type="file" name="file">
            </div>

            <div id="urlInput">
                <label for="url">External URL/Video links</label>
                <input type="text" id="url" name="url" placeholder="Add External URL/Video links">
            </div>

            <div class="form-group" style="text-align: center;">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
@endsection

<!-- </body>
</html> -->
