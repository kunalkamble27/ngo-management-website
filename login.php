<?php
// ============================================
// login.php - Student Login
// Student logs in using Name + Student ID No
// ============================================

include 'db.php'; // Connect to database

session_start(); // Start session to remember logged in student

$message = ""; // Error or success message

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data from the form
    $name          = $_POST['name'];
    $student_id_no = $_POST['student_id_no'];

    // Search for student in database
    $query = "SELECT * FROM student WHERE name='$name' AND student_id_no='$student_id_no'";
    $result = pg_query($conn, $query);

    if ($result && pg_num_rows($result) > 0) {
        // Student found - login success
        $student = pg_fetch_assoc($result);
        $_SESSION['student_name'] = $student['name']; // Save name in session
        
        // Go back to home page
        header("Location: index.php");
        exit();
    } else {
        // Student not found
        $message = "Name or Student ID is wrong. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Login - Seva Arogya</title>
  <style>
    body { font-family: Arial; margin: 0; padding: 0; }
    nav { background-color: green; padding: 15px; }
    nav a { color: white; text-decoration: none; margin-right: 20px; font-size: 16px; }
    .section { padding: 40px; }
    h2 { color: green; }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input { width: 300px; padding: 8px; margin: 5px 0 10px 0; display: block; border: 1px solid gray; }
    button { background-color: orange; color: white; padding: 10px 20px; border: none; cursor: pointer; }
    .msg { color: red; font-weight: bold; margin-bottom: 15px; }
    footer { background-color: green; color: white; text-align: center; padding: 15px; }
  </style>
</head>
<body>

<!-- Navigation -->
<nav>
  <a href="index.php">Home</a>
  <a href="register.php">Register</a>
</nav>

<!-- Login Form -->
<div class="section">
  <h2>Student Login</h2>

  <!-- Show error message if login failed -->
  <?php if ($message != "") { echo "<p class='msg'>$message</p>"; } ?>

  <form action="login.php" method="POST">

    <label>Full Name:</label>
    <input type="text" name="name" placeholder="Enter your full name" required>

    <label>Student ID No:</label>
    <input type="text" name="student_id_no" placeholder="Enter your Student ID" required>

    <br>
    <button type="submit">Login</button>

  </form>

  <br>
  <p>Not registered yet? <a href="register.php">Register here</a></p>
  <a href="index.php">Back to Home</a>
</div>

<!-- Footer -->
<footer>
  <p>Seva Arogya Foundation | Karvenagar, Pune | Est. 2016</p>
  <p>Field Project - Modern College Warje | Kunal, Nagesh, Abhijeet, Anuj</p>
</footer>

</body>
</html>
