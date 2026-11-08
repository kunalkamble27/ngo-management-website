<?php
// ============================================
// logout.php - Logout File
// Clears session and sends student to home page
// ============================================

session_start();          // Start session
session_destroy();        // Delete all session data (logs out the student)

header("Location: index.php"); // Go back to home page
exit();
?>
