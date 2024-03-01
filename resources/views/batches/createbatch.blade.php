@extends('layout.admin-layout')

@section('space-work')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!--script>
    $(document).ready(function() {
        // Counter for dynamic field IDs
        let counter = 1;

        // Add button click event
        $('#addTiming').click(function() {
            counter++;

            // Clone the timing fields
            let clone = $('#timingFields').clone();

            // Update IDs of cloned fields
            clone.find('select, input').each(function() {
                let id = $(this).attr('id');
                $(this).attr('id', id + counter);
            });

            // Append cloned fields to the form
            $('#timingsContainer').append(clone);
        });
    });
</script-->
<script>
    $(document).ready(function() {
        // Add button click event
        $(document).on('click', '#addTiming', function() {
            // Clone the timing fields
            let clone = $('#timingFields tr:last').clone();

            // Append cloned fields to the table body
            $('#timingFields').append(clone);
        });

          $(document).on('click', '.deleteTiming', function() {
            // Remove the parent row of the clicked delete button
            $(this).closest('tr').remove();
        });
    });
</script>

<h1>Add New Batch</h1>

<div class="container">
    <div class="card">
        <form method="POST" action="{{ route('batches.store') }}">
            @csrf

            <div class="form-group">
                <label for="batch_name">Batch Name</label>
                <input type="text" class="form-control" id="batch_name" name="batch_name" required>
            </div>

           

 <div class="form-group">
    <label for="branch_id">Branch</label>
    <select class="form-control" id="branch_id" name="branch_id">
        <option value="">Select Branch</option>
        @foreach($branches as $branch)
            <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
        @endforeach
    </select>
</div>

    <div class="form-group">
        <label for="fees">Fees</label>
        <input type="number" step="0.01" class="form-control" id="fees" name="fees" required>
    </div>
    <div class="form-group">
        <label for="teacher">Teacher</label>
        <input type="text" class="form-control" id="teacher" name="teacher" required>
    </div>
     <div class="form-group">
        <label for="phone">Contact No</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

            <!-- Other fields... -->

            <!-- Day, start time, and end time fields -->
          <!--div id="timingsContainer">
    <div id="timingFields">
        @for ($i = 0; $i < 3; $i++)
        <div class="form-group">
            <label for="day">Batch Day</label>
            <select class="form-control" id="day{{ $i }}" name="days[]">
               
                  
            <option value="Sunday">Sunday</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
       <!-- Other options... >
            </select>
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" class="form-control" id="start_time{{ $i }}" name="start_times[]" required>
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" class="form-control" id="end_time{{ $i }}" name="end_times[]" required>
        </div>
        @endfor
    </div>
</div>
            <!-- Button to add more timings >
            <button type="button" id="addTiming" class="btn btn-primary">Add Timing</button-->


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
            <tr>
                <td>
                    <select class="form-control" name="days[]">
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </td>
                <td>
                    <input type="time" class="form-control" name="start_times[]" required>
                </td>
                <td>
                    <input type="time" class="form-control" name="end_times[]" required>
                </td>
                <td>
                    <button type="button" id="addTiming" class="btn btn-primary">Add Timing</button>
                     <button type="button" class="btn btn-danger deleteTiming">Delete</button>

                </td>
            </tr>
        </tbody>
    </table>
</div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

