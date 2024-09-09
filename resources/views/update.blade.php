<!-- resources/views/your-view.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Add CSRF token -->
    <title>AJAX Example in Laravel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>
<body>
    <!-- Dropdown to select student -->
    <select id="studentSelect">
        <!-- Options with student IDs -->
        <option value="1">Student 1</option>
        <option value="2">Student 2</option>
        <!-- Add more options as needed -->
    </select>

    <!-- Button to fetch student details -->
    <button onclick="fetchStudentDetails()">Fetch Student Details</button>

    <!-- Div to display student details -->
    <div id="studentDetails" style="display: none;"></div>

    <script>
        function fetchStudentDetails() {
            var studentId = $('#studentSelect').val(); // Get the selected student ID
            var token = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token

            $.ajax({
                url: "{{ route('student.fetch') }}", // Laravel route to handle the request
                type: "POST", // HTTP method
                data: {
                    id: studentId,
                    _token: token // Include CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        var student = response.student;
                        $('#studentDetails').html( // Populate student details
                            '<p>ID: ' + student.id + '</p>' +
                            '<p>Name: ' + student.name + '</p>' +
                            '<p>Email: ' + student.email + '</p>'
                        ).show(); // Show the details div
                    } else {
                        alert(response.message); // Show error message
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Log error for debugging
                }
            });
        }
    </script>
</body>
</html>
