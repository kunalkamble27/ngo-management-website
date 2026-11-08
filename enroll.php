<?php
// ============================================
// enroll.php - Student Program Enrollment
// Student selects a program and enrolls
// This represents the "Enroll For" relationship
// from the ER Diagram (Student --- NGO)
// ============================================

include 'db.php';      // Connect to database
session_start();       // Start session (to check login)

$message = "";         // Success or error message

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data from form
    $student_name   = $_POST['student_name'];
    $student_id_no  = $_POST['student_id_no'];
    $ngo_program    = $_POST['ngo_program'];

    // First check: does this student exist in the student table?
    $check = pg_query($conn, "SELECT * FROM student WHERE name='$student_name' AND student_id_no='$student_id_no'");

    if (pg_num_rows($check) == 0) {
        // Student not found
        $message = "error:Student not found. Please register first or check your Name and ID.";

    } else {
        // Check if already enrolled in this program
        $already = pg_query($conn, "SELECT * FROM enrollment WHERE student_id_no='$student_id_no' AND ngo_program='$ngo_program'");

        if (pg_num_rows($already) > 0) {
            $message = "error:You are already enrolled in this program!";
        } else {
            // Save enrollment to database
            $query = "INSERT INTO enrollment (student_name, student_id_no, ngo_program)
                      VALUES ('$student_name', '$student_id_no', '$ngo_program')";

            $result = pg_query($conn, $query);

            if ($result) {
                $message = "success:You have successfully enrolled in: $ngo_program !";
            } else {
                $message = "error:Something went wrong. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Enroll for Program - Seva Arogya</title>
  <style>
    body { font-family: Arial; margin: 0; padding: 0; }

    nav { background-color: green; padding: 15px; }
    nav a { color: white; text-decoration: none; margin-right: 20px; font-size: 16px; }

    .section { padding: 40px; max-width: 600px; }

    h2 { color: green; }
    h3 { color: #555; margin-top: 30px; }

    label { display: block; margin-top: 12px; font-weight: bold; }

    input, select {
      width: 350px;
      padding: 8px;
      margin: 5px 0 10px 0;
      display: block;
      border: 1px solid gray;
      font-size: 15px;
    }

    button {
      background-color: orange;
      color: white;
      padding: 10px 25px;
      border: none;
      cursor: pointer;
      font-size: 15px;
      margin-top: 10px;
    }

    /* Success message */
    .msg-success {
      background-color: #e6ffe6;
      border-left: 4px solid green;
      padding: 12px 16px;
      color: green;
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* Error message */
    .msg-error {
      background-color: #fff0f0;
      border-left: 4px solid red;
      padding: 12px 16px;
      color: red;
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* Program info boxes */
    .program-box {
      border: 1px solid #ccc;
      padding: 12px 16px;
      margin: 8px 0;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
    .program-box h4 { color: green; margin: 0 0 4px 0; }
    .program-box p { margin: 0; font-size: 14px; color: #555; }

    footer {
      background-color: green;
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<!-- Navigation -->
<nav>
  <a href="index.php">Home</a>
  <a href="register.php">Register</a>
  <a href="login.php">Login</a>

  <?php if (isset($_SESSION['student_name'])): ?>
    <span style="float:right; color:white; margin-right:15px;">
      Hello, <?php echo $_SESSION['student_name']; ?>!
    </span>
    <a href="logout.php" style="float:right;">Logout</a>
  <?php endif; ?>
</nav>


<!-- Enroll Section -->
<div class="section">
  <h2>Enroll for a Program</h2>
  <p>Choose one of the 3 programs offered by Seva Arogya Foundation and enroll.</p>

  <!-- Show message if form was submitted -->
  <?php
    if ($message != "") {
      $parts = explode(":", $message, 2);
      $type = $parts[0];
      $text = $parts[1];
      if ($type == "success") {
        echo "<div class='msg-success'>$text</div>";
      } else {
        echo "<div class='msg-error'>$text</div>";
      }
    }
  ?>

  <!-- Program info boxes (so student knows what to choose) -->
  <h3>Available Programs</h3>

  <div class="program-box">
    <h4>1. Sangati Margdarshak Yojana</h4>
    <p>Mentorship — Connects children with mentors for guidance and personal development.</p>
  </div>

  <div class="program-box">
    <h4>2. Samruddha Varg</h4>
    <p>Education — Extra classes to help children with studies and basic skills.</p>
  </div>

  <div class="program-box">
    <h4>3. Ghe Bharari - Kishor Vikas Prakalp</h4>
    <p>Youth Development — Life skills and career guidance for teenagers.</p>
  </div>

  <br>

  <!-- Enrollment Form -->
  <h3>Fill Enrollment Form</h3>

  <form action="enroll.php" method="POST">

    <label>Your Full Name:</label>
    <input type="text" name="student_name"
      placeholder="Enter your name (same as registration)"
      value="<?php echo isset($_SESSION['student_name']) ? $_SESSION['student_name'] : ''; ?>"
      required>

    <label>Student ID No:</label>
    <input type="text" name="student_id_no"
      placeholder="Enter your Student ID"
      required>

    <label>Select Program:</label>
    <select name="ngo_program" required>
      <option value="">-- Choose a Program --</option>
      <option value="Sangati Margdarshak Yojana">Sangati Margdarshak Yojana (Mentorship)</option>
      <option value="Samruddha Varg">Samruddha Varg (Education)</option>
      <option value="Ghe Bharari - Kishor Vikas Prakalp">Ghe Bharari - Kishor Vikas Prakalp (Youth Development)</option>
    </select>

    <button type="submit">Enroll Now</button>

  </form>

  <br>
  <p style="font-size:14px; color:#777;">
    Not registered yet? <a href="register.php">Register first</a> before enrolling.
  </p>

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
