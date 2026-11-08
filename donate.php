<?php
// ============================================
// donate.php - Donor Form
// This saves donor data into the donor table
// ============================================

include 'db.php'; // Connect to database

$message = ""; // Success or error message

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data from the form
    $donor_name = $_POST['donor_name'];
    $number     = $_POST['number'];
    $amount     = $_POST['amount'];

    // Save to donor table in PostgreSQL
    $query = "INSERT INTO donor (donor_name, number, amount) 
              VALUES ('$donor_name', '$number', $amount)";

    $result = pg_query($conn, $query);

    if ($result) {
        $message = "Thank you, $donor_name! Your donation of Rs. $amount has been received.";
    } else {
        $message = "Something went wrong. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Donate - Seva Arogya</title>
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
  <a href="register.php">Register</a>
</nav>

<!-- Donor Form -->
<div class="section">
  <h2>Make a Donation</h2>
  <p>Support Seva Arogya Foundation's work for underprivileged communities.</p>

  <!-- Show message after donation -->
  <?php if ($message != "") { echo "<p class='msg'>$message</p>"; } ?>

  <form action="donate.php" method="POST">

    <label>Donor Name:</label>
    <input type="text" name="donor_name" placeholder="Enter your full name" required>

    <label>Phone Number:</label>
    <input type="text" name="number" placeholder="Enter your phone number" required>

    <label>Amount (Rs.):</label>
    <input type="number" name="amount" placeholder="Enter donation amount" required>

    <br>
    <button type="submit">Donate Now</button>

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
