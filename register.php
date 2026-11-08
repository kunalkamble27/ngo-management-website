<?php
// ============================================
// register.php - Student Registration
// This saves student data into the student table
// ============================================

include 'db.php'; // Connect to database

$message = ""; // This will show success or error message

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data from the form
    $name           = $_POST['name'];
    $student_id_no  = $_POST['student_id_no'];
    $age            = $_POST['age'];
    $std            = $_POST['std'];

    // Save to student table in PostgreSQL
    $query = "INSERT INTO student (name, student_id_no, age, std) 
              VALUES ('$name', '$student_id_no', $age, '$std')";

    $result = pg_query($conn, $query);

    if ($result) {
        $message = "Student registered successfully!";
    } else {
        $message = "Something went wrong. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Registration - Seva Arogya</title>
  <style>
    body { font-family: Arial; margin: 0; padding: 0; }
    nav { background-color: green; padding: 15px; }
    nav a { color: white; text-decoration: none; margin-right: 20px; font-size: 16px; }
    .section { padding: 40px; }
    h2 { color: green; }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input { width: 300px; padding: 8px; margin: 5px 0 10px 0; display: block; border: 1px solid gray; }
    button { background-color: orange; color: white; padding: 10px 20px; border: none; cursor: pointer; }
    .msg { color: green; font-weight: bold; margin-bottom: 15px; }
    footer { background-color: green; color: white; text-align: center; padding: 15px; }
  </style>
</head>
<body>

<!-- Navigation -->
<nav>
  <a href="index.php">Home</a>
  <a href="login.php">Login</a>
</nav>

<!-- Register Form -->
<div class="section">
  <h2>Student Registration</h2>

  <!-- Show message if registration done -->
  <?php if ($message != "") { echo "<p class='msg'>$message</p>"; } ?>

  <form action="register.php" method="POST">

    <label>Full Name:</label>
    <input type="text" name="name" placeholder="Enter your full name" required>

    <label>Student ID No:</label>
    <input type="text" name="student_id_no" placeholder="Enter your Student ID" required>

    <label>Age:</label>
    <input type="number" name="age" placeholder="Enter your age" required>

    <label>Std (Standard / Class):</label>
    <input type="text" name="std" placeholder="e.g. 10th, BCA 2nd Year" required>

    <br>
    <button type="submit">Register</button>

  </form>

  <br>
  <a href="index.php">Back to Home</a>
</div>

<!-- Footer -->
<footer>
  <p>Seva Arogya Foundation | Karvenagar, Pune | Est. 2016</p>
  <p>Field Project - Modern College Warje | Kunal, Nagesh, Abhijeet, Anuj</p>
</footer>

</body>
</html>
