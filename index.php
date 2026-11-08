<?php
// ============================================
// index.php - Main Page (Home Page)
// Seva Arogya Foundation Website
// ============================================

session_start(); // Start session (to check if student is logged in)
?>

<!DOCTYPE html>
<html>
<head>
  <title>Seva Arogya Foundation</title>
  <style>
    body {
      font-family: Arial;
      margin: 0;
      padding: 0;
    }

    nav {
      background-color: green;
      padding: 15px;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin-right: 20px;
      font-size: 16px;
    }

    .section {
      padding: 40px;
    }

    h1 { color: green; }
    h2 { color: green; }

    .card {
      border: 1px solid gray;
      padding: 15px;
      margin: 10px;
      display: inline-block;
      width: 250px;
      vertical-align: top;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th {
      background-color: green;
      color: white;
      padding: 10px;
      text-align: left;
    }

    td {
      border: 1px solid gray;
      padding: 10px;
    }

    input, textarea {
      width: 300px;
      padding: 8px;
      margin: 5px 0 10px 0;
      display: block;
      border: 1px solid gray;
    }

    button {
      background-color: orange;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    footer {
      background-color: green;
      color: white;
      text-align: center;
      padding: 15px;
    }
  </style>
</head>
<body>

<!-- ============ NAVIGATION BAR ============ -->
<nav>
  <a href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#objectives">Objectives</a>
  <a href="#programs">Programs</a>
  <a href="#contact">Contact & Donate</a>
  <a href="enroll.php">Enroll for Program</a>

  <?php if (isset($_SESSION['student_name'])): ?>
    <!-- If student is logged in, show their name and logout -->
    <span style="float:right; color:white; margin-right:15px;">
      Hello, <?php echo $_SESSION['student_name']; ?>!
    </span>
    <a href="logout.php" style="float:right;">Logout</a>
  <?php else: ?>
    <!-- If not logged in, show Login and Register -->
    <a href="login.php" style="float:right;">Login</a>
    <a href="register.php" style="float:right; margin-right:15px;">Register</a>
  <?php endif; ?>
</nav>


<!-- ============ HOME SECTION ============ -->
<div class="section" id="home" style="background-color: #fff8ee; text-align: center;">
  <h1>Seva Arogya Foundation</h1>
  <p>A non-profit organization working for underprivileged communities in Pune.</p>
  <p>We provide Healthcare, Education, and Skill Development since 2016.</p>
  <br>
  <a href="#programs"><button>Our Programs</button></a>
  <a href="donate.php"><button>Donate Now</button></a>
</div>


<!-- ============ ABOUT SECTION ============ -->
<div class="section" id="about">
  <h2>About Us</h2>
  <p><b>Name:</b> Seva Arogya Foundation</p>
  <p><b>Founded:</b> 2016</p>
  <p><b>Location:</b> Hingane Home Colony, Karvenagar, Pune</p>
  <p><b>Type:</b> Non-Profit Organization</p>
  <p>The Seva Arogya Foundation is a non-profit organization established in Pune, India, in 2016.
     Located in Hingane Home Colony, Karvenagar, Pune. It focuses on the holistic development
     of underprivileged communities in urban slums through accessible healthcare, education,
     and skill development programs.</p>
  <br>
  <p><b>Mission:</b> To help underprivileged people through healthcare, education, and skill development.</p>
</div>


<!-- ============ OBJECTIVES SECTION ============ -->
<div class="section" id="objectives" style="background-color: #f5f5f5;">
  <h2>Our Objectives</h2>

  <div class="card">
    <h3>Community Development</h3>
    <p>Help underprivileged communities grow through good programs.</p>
  </div>

  <div class="card">
    <h3>Education</h3>
    <p>Improve school attendance and learning for children.</p>
  </div>

  <div class="card">
    <h3>Healthcare</h3>
    <p>Provide affordable health services to families in slums.</p>
  </div>

  <div class="card">
    <h3>Mental Wellness</h3>
    <p>Give counseling and motivation to children.</p>
  </div>

  <div class="card">
    <h3>Skill Development</h3>
    <p>Teach useful skills to youth for a better future.</p>
  </div>

  <div class="card">
    <h3>Volunteer Engagement</h3>
    <p>Connect volunteers and colleges to help the community.</p>
  </div>

</div>


<!-- ============ PROGRAMS SECTION ============ -->
<div class="section" id="programs">
  <h2>Our Programs</h2>
  <table>
    <tr>
      <th>No.</th>
      <th>Program Name</th>
      <th>Focus</th>
      <th>Description</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Sangati Margdarshak Yojana</td>
      <td>Mentorship</td>
      <td>Connects children with mentors for guidance and personal development.</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Samruddha Varg</td>
      <td>Education</td>
      <td>Extra classes to help children with studies and basic skills.</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Ghe Bharari - Kishor Vikas Prakalp</td>
      <td>Youth Development</td>
      <td>Life skills and career guidance for teenagers in slum areas.</td>
    </tr>
  </table>

  <br>
  <a href="enroll.php"><button>Enroll for a Program</button></a>
</div>


<!-- ============ CONTACT AND DONATE SECTION ============ -->
<div class="section" id="contact" style="background-color: #fff8ee;">
  <h2>Contact & Donate</h2>

  <p><b>Organization:</b> Seva Arogya Foundation</p>
  <p><b>Address:</b> Hingane Home Colony, Karvenagar, Pune - 411052</p>
  <p><b>Founded:</b> 2016</p>

  <br>
  <p>Want to donate? <a href="donate.php"><button>Click Here to Donate</button></a></p>
</div>


<!-- ============ FOOTER ============ -->
<footer>
  <p>Seva Arogya Foundation | Karvenagar, Pune | Est. 2016</p>
  <p>Field Project - Modern College Warje | Kunal, Nagesh, Abhijeet, Anuj</p>
</footer>

</body>
</html>
