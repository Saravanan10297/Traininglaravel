@extends('layout.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF token for AJAX requests -->
    <title>AJAX Example in Laravel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>
<center>
    <div class="mb-5">
        <h5>Student Details</h5>
    </div>
    <form action="/student/storeUpdate" method="POST">
        @csrf
        <select id="studentSelect" onchange="populateStudentDetails()">
            <option value="" disabled selected>Select a student</option> <!-- Default option -->
            @foreach($student as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>

        
        
        <div class="mb-3" id="studentDetails" style="display:none;"> <!-- Corrected DIV id -->

            <input type="text" id="Id" name="Id" style="display:none;">

            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name">
      
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone">
      
            <label for="email" class="form-label">Email</label>
            <input type="text" id="email" name="email">
        
            <label for="address" class="form-label">Address</label>
            <input type="text" id="address" name="address">

            <button type="submit" class="btn btn-primary" onclick="windows.location.href='/student/storeUpdete'">Submit</button>
        </div>
    </form>
</center>

<script>
    function populateStudentDetails() {
        var value = document.getElementById('studentSelect').value;
        if (!value) return; // Return if no student is selected

        var div = document.getElementById('studentDetails');
        div.style.display = "block"; // Show student details div

        var token = $('meta[name="csrf-token"]').attr('content'); // Fetch CSRF token

        // AJAX request to fetch student details
        $.ajax({
            url: "{{ route('student.fetch') }}",
            type: "POST",
            data: {
                id: value,
                _token: token
            },
            success: function(response) {
                if (response.success) {
                    var student = response.student;
                    console.log(response.classAB);
                    console.log(student);
                    // Populate input fields with student data
                    $('#Id').val(student.id);
                    $('#name').val(student.name);
                    $('#phone').val(student.phone);
                    $('#email').val(student.email);
                    $('#address').val(student.Address);
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error); // Log error message
                console.log(xhr.responseText); // Log response text for debugging
            }
        });
    }
</script>
@endsection
