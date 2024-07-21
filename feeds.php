<?php
// Include the PHP configuration file and start the session
include("configASL.php");
session_start();

// Check if the user is logged in as an admin or faculty member
if((!isset($_SESSION['aid'])) && (!isset($_SESSION['tname']))) {
    header("location:index.php"); // Redirect to the login page if not logged in
}

// Retrieve admin information from the session
$aid = $_SESSION['aid'];
$x = mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid'");
$y = mysqli_fetch_array($x);
$name = $y['name'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Feedback System</title>
<link rel="stylesheet" type="text/css" href="feeds.css?v=<?php echo time(); ?>">
</head>

<body>

<header>
    <div>
        <div class="title"></div>  
        <div class="announce">
            <div class="row">
                <marquee><h2>Welcome to NIT Uttarakhand's Student Feedback System</h2></marquee>
                <nav class="navigation">
                    <!-- <div class="n">-->
                    <!--  <a href="https://nituk.ac.in/" class="nav-item">Home </a>-->
                    <!--  <a href="https://nituk.ac.in/history" class="nav-item">About</a>-->
                    <!--  <a href="https://nituk.ac.in/electronics-engineering" class="nav-item">Department</a>-->
                    <!--  <a href="https://nituk.ac.in/nituk-contact" class="nav-item">Contact</a>-->
                    <!--</div>-->
                </nav>
            </div>
        </div>
    </div>

    <br><br><br><br>
</header>

<div class="box">
    <form class="blur-container" method="post" action="feeds_2.php">
        <div id="table"> 
            <div class="tr">
                <div class="td">
                    <label>Faculty:</label>
                </div>
                <div class="td">
                    <select name="teachername" id="teachername" required>
                        <option value="NA" disabled selected> - - Select Faculty - -</option>
                        <?php
                        $teachers = mysqli_query($al, "SELECT DISTINCT name FROM faculty");
                        while($teacher = mysqli_fetch_array($teachers)) {
                        ?>
                        <option value="<?php echo $teacher['name']; ?>"><?php echo $teacher['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="tr">
                
    <div class="td">
        <label>Subject:</label>
    </div>
    <div class="td">
        <select name="subject" id="subject" required>
            <option value="" selected disabled> - - Select Subject - -</option> <!-- Placeholder option -->
        </select>
    </div>
</div>

        </div>
             <br>
        <div class="tdd">
            <input type="submit" value="NEXT" />
            <input type="button" onClick="window.location='home.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <br>
        <div class="td-tdd">
            <a href="total.php" class="link">Student Count</a>
        </div>
    </form>
</div>

<script>
    // Attach event listener to the faculty dropdown
// Attach event listener to the faculty dropdown
document.getElementById('teachername').addEventListener('change', function() {
    var teacher = this.value;

    // Make an AJAX request to fetch subjects taught by the selected teacher
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var subjects = JSON.parse(xhr.responseText);
                var subjectDropdown = document.getElementById('subject');

                // Clear existing options
                subjectDropdown.innerHTML = '';

                // Add placeholder option
                var placeholderOption = document.createElement('option');
                placeholderOption.text = '- - Select Subject - -';
                placeholderOption.disabled = true;
                placeholderOption.selected = true; // Select the placeholder option by default
                subjectDropdown.add(placeholderOption);

                // Add new options
                subjects.forEach(function(subject) {
                    var option = document.createElement('option');
                    option.text = subject;
                    option.value = subject;
                    subjectDropdown.add(option);
                });
            } else {
                console.error('Failed to fetch subjects');
            }
        }
    };

    xhr.open('GET', 'get_subjects.php?teacher=' + encodeURIComponent(teacher), true);
    xhr.send();
});


</script>

</body>
</html>
