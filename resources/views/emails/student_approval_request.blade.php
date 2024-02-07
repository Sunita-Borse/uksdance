<p>Hello Admin,</p>

<p>A new student has submitted their information and is awaiting approval.</p>

<p>Student Details:</p>
<ul>
    <li>Name: {{ $student->name }}</li>
    <li>Email: {{ $student->email }}</li>
    <!-- Include other relevant details -->
</ul>

<p>Click the link below to approve the student:</p>
<a href="{{ route('admin.approveStudent', ['student' => $student->id]) }}">Approve Student</a>

<p>Thank you!</p>