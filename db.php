<?php
// ============================================
// db.php - Database Connection File
// This file connects PHP to PostgreSQL
// ============================================

// Connection details
$host     = "localhost";
$dbname   = "ngodb";
$user     = "postgres";
$password = "your_password_here";

// Connect to PostgreSQL
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

// Check if connection worked
if (!$conn) {
    die("Connection failed. Please check your database settings.");
}
?>
