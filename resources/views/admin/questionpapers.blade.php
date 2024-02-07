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


<h1>Sample Question Papers</h1>

<div class="container">
    <div class="card">
        <form action="/questionpapers" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="examYearDropdown">Exam Year</label>
                <select id="examYearDropdown" name="exam">
                    @foreach(\App\Enums\Exam::cases() as $examOption)
                        <option value="{{ $examOption->value }}">{{ $examOption->label() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="questionpapertitle">Sample Questions Title</label>
                <input type="text" id="questionpapertitle" name="questionpapertitle" placeholder="Question Paper Title">
            </div>

             <div class="form-group">
                <label for="dancestyleDropdown">Dance Style</label>
                <select id="dancestyleDropdown" name="dancestyle">
                    @foreach(\App\Enums\Dancestyle::cases() as $dstyle)
                        <option value="{{ $dstyle->value }}">{{ $dstyle->label() }}</option>
                    @endforeach
                </select>
            </div>

             <!--label for="dancestyle[]">Select Dance Style(Tick√)</label>
<div class="form-group my-2">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="dancestyle[]" value="Kathak" id="kathakCheckbox" {{ (is_array(old('dancestyle')) and in_array('Kathak', old('dancestyle'))) ? ' checked' : '' }}>
        <label class="form-check-label" for="kathakCheckbox">(i) Kathak</label>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="dancestyle[]" value="Bharatnatyam" id="bharatnatyamCheckbox" {{ (is_array(old('dancestyle')) and in_array('Bharatnatyam', old('dancestyle'))) ? ' checked' : '' }}>
        <label class="form-check-label" for="bharatnatyamCheckbox">(ii) Bharatnatyam</label>
    </div>
</div-->


            <div class="form-group">
                <label for="fileOrUrlSelect">Select Type Of Questions</label>
                <select id="fileOrUrlSelect" name="type">
                    <option value="">Select Type Of Questions</option>
                    <option value="file">Upload File</option>
                    <option value="url">External URL/Video links</option>
                </select>
            </div>

            <div id="fileInput" style="margin-bottom: 20px;">
                <input type="file" name="file">
            </div>

            <div id="urlInput" style="margin-bottom: 20px;">
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
