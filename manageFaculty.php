

<?php

include("configASL.php");
session_start();
if(!isset($_SESSION['aid']))
{
    echo "<script></script>";
	header("location:index.php");
}
?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Feedback System</title>
<link rel="stylesheet" type="text/css" href="manage.css?v=<?php echo time(); ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="topHeader" >
    <img src="nit.png" class="img">
	<h2>National Institute Of Technology Uttarakhand</h2>
    
</div>

  
<br>
</br></br>


<div id="content" align="center">
    <br /><br />
 
    <form method="post" id="facultyForm" enctype="multipart/form-data" action="add_teacher.php">
        <div class="blur-container">
            <div id="table">
                <div class="tr"><h2>Add teacher and subject<br><br></h2>
                    <div class="td">
                        <label style="color:black">Faculty : </label>
                    </div>
                    <div class="td">
                        <input type="text" name="fc" id="fc" size="25" required placeholder="Enter Faculty Name" />
                    </div>
                </div>
                <div class="tr">
                    <div class="td">
                        <br>
                        <label style="color: black">Subject : </label>
                    </div>
                    <div class="td">
                        <input type="text" name="sub[]" class="subject-input" size="25" required placeholder="Enter Subject" />
                    </div>
                    
                </div>
                <div class="paste-new-forms"></div>
                <div class="tr main-forms">
                    <div class="td">
                        <br>
                        <label style="color: blacj">Upload Excel:</label>
                    </div>
                    <div class="td">
                        <input type="file" class="form-control" id="exceldata" name="exceldata" required />
                    </div>
                    <div class="tdd">
                        <br />
                        <button type="button" id="uploadExcelBtn" class="btn btn-primary" >Upload</button>
                    </div>
                </div>
                <div class="tr main-forms">
                    <br />
                    <button type="button" class="btn btn-primary add-more-form">Add Subject</button>
                    <br />
                </div>
                <div class="tdd" id="addFacultyBtnContainer" style="display: none;">
                    <br />
                    <button type="button" id="addFacultyBtn" class="btn btn-success" disabled>ADD FACULTY</button>
                </div>
            </div>
        </div>
        <a href="deletestudent.php" onClick="return confirm('Are you sure?')" class="btn btn-primary btn-lg btn-block" style="text-decoration:none;font-size:2.8vmin;color:white;">
    Delete Student Data Enrolled in Previous Semester
</a>

    </form>
   
    <br />

    <script>
        $(document).ready(function () {
            // Add more forms dynamically
            $(document).on('click', '.add-more-form', function () {
                var subjectInput = $('.subject-input:last');
                if (subjectInput.val().trim() === '') {
                    alert("Please fill in the subject field before adding another subject.");
                    return;
                }
                $('.paste-new-forms').append('<div class="tr main-forms">\
                    <div class="td">\
                        <label style="color: white;" >Subject : </label>\
                    </div>\
                    <div class="td">\
                        <input type="text" name="sub[]" class="subject-input" size="25" required placeholder="Enter Subject" />\
                    </div>\
                    <div class="td">\
                        <br />\
                        <button type="button" class="remove-subject-btn btn btn-danger">Remove</button>\
                    </div>\
                </div>');

                // Show remove button for subsequent subject fields
                $('.remove-subject-btn').show();

                // Check if both subject and Excel file are present to show the "ADD FACULTY" button
                checkEnableAddFacultyButton();
            });

            // Remove subject form dynamically
            $(document).on('click', '.remove-subject-btn', function () {
                $(this).closest('.main-forms').remove();
                // Check if both subject and Excel file are present to show the "ADD FACULTY" button
                checkEnableAddFacultyButton();
            });

            // Enable "ADD FACULTY" button when Excel file is uploaded
            $('#exceldata').change(function () {
                // Check if both subject and Excel file are present to show the "ADD FACULTY" button
                checkEnableAddFacultyButton();
            });

            // AJAX form submission for adding faculty
            $('#addFacultyBtn').click(function () {
                var formData = $('#facultyForm').serialize();
                
                $.ajax({
                    type: 'POST',
                    url: 'add_teacher.php',
                    data: formData,
                    success: function (response) {
                        alert(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // AJAX form submission for uploading Excel
            $('#uploadExcelBtn').click(function () {
                var formData = new FormData($('#facultyForm')[0]);

                $.ajax({
                    type: 'POST',
                    url: 'process_faculty.php',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Function to check if both subject and Excel file are present to enable the "ADD FACULTY" button
            function checkEnableAddFacultyButton() {
                var subjectCount = $('.subject-input').length;
                var excelFile = $('#exceldata').val();

                if (subjectCount > 0 && excelFile !== '') {
                    $('#addFacultyBtnContainer').show();
                    $('#addFacultyBtn').prop('disabled', false);
                } else {
                    $('#addFacultyBtnContainer').hide();
                    $('#addFacultyBtn').prop('disabled', true);
                }
            }
        });
    </script>

</div>
</body>
</html>
