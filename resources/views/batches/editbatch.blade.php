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

        // Add button click event for adding timing
        $(document).on('click', '#addTiming', function() {
            // Clone the timing fields
            let clone = $('#timingFields tr:last').clone();

            // Append cloned fields to the table body
            $('#timingFields').append(clone);
        });

        // Add button click event for deleting timing
       $(document).on('click', '.deleteTiming', function() {
            // Remove the parent row of the clicked delete button
            $(this).closest('tr').remove();
        });
    });
</script>

<h1>Update Batch</h1>

<div class="container">
    <div class="card">

<form method="POST" action="{{ route('batches.update', $batch->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="batch_name">Batch Name</label>
        <input type="text" class="form-control" id="batch_name" name="batch_name" value="{{ $batch->batch_name }}" required>
    </div>

   

   <div class="form-group">
    <label for="branch_id">Branch</label>
    <select class="form-control" id="branch_id" name="branch_id">
        <option value="">Select Branch</option>
        @foreach($branches as $branch)
            <option value="{{ $branch->id }}" {{ $batch->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
        @endforeach
    </select>
</div>

    <div class="form-group">
        <label for="fees">Fees</label>
        <input type="number" step="0.01" class="form-control" id="fees" name="fees" value="{{ $batch->fees }}" required>
    </div>

    <div class="form-group">
        <label for="teacher">Teacher</label>
        <input type="text" class="form-control" id="teacher" name="teacher" value="{{ $batch->teacher }}" required>
    </div>

    <div class="form-group">
        <label for="phone">Contact No</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $batch->phone }}" required>
    </div>

  
   
               <div id="timingsContainer">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Batch Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th> <!-- Add an additional column for actions -->
                            </tr>
                        </thead>
                        <tbody id="timingFields">
                            @foreach ($batchDetail as $detail)
                                <tr>
                                    <td>
                                         <select class="form-control" name="days[]">
                <option value="Sunday" {{ old('days', $detail->day ?? '') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                <option value="Monday" {{ old('days', $detail->day ?? '') == 'Monday' ? 'selected' : '' }}>Monday</option>
                <option value="Tuesday" {{ old('days', $detail->day ?? '') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                <option value="Wednesday" {{ old('days', $detail->day ?? '') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                <option value="Thursday" {{ old('days', $detail->day ?? '') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                <option value="Friday" {{ old('days', $detail->day ?? '') == 'Friday' ? 'selected' : '' }}>Friday</option>
                <option value="Saturday" {{ old('days', $detail->day ?? '') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
            </select>
                                    </td>
                                    <td>
                                        <input type="time" class="form-control" name="start_times[]" value="{{ old('start_times', $detail->start_time ?? '') }}" required>
                                    </td>
                                    <td>
                                        <input type="time" class="form-control" name="end_times[]" value="{{ old('end_times', $detail->end_time ?? '') }}" required>
                                    </td>
                                    <td>
                                        <button type="button" id="addTiming" class="btn btn-primary">Add Timing</button>
                                           <button type="button" class="btn btn-danger deleteTiming">Delete</button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


          
    <button type="submit" class="btn btn-primary">Update</button>
</form>


       </div>
</div>
@endsection

<!-- </body>
</html> -->





