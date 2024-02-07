<h1>hiii</h1>

<!-- Include the HTML and styling for your student dashboard -->
<div>
@php
    // Assuming the authenticated user is the current student
    $currentStudentInfo = auth()->user()->studentInfo;
    
    // Get the current exam value
    $currentExam = optional($currentStudentInfo)->exam;
@endphp

@if($currentExam == 2)

    <script>
        window.location.href = "/admin/prarmbhik";
    </script>
@endif
   
</div>
