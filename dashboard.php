<?php
// Required file(s).
require 'config.php';

// Start new or resume existing session.
session_start();

// Check if(not) a user is logged in.
if(!isset($_COOKIE['username'])) {
  
  // Session variable message.
  $_SESSION['message'] = 'Access is required.';
  
  // Redirect to another location.
  header('Location: login.php');
  
  // Terminate the current script.
  exit();
  
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
  </head>
  <body>
    <p>Hello, <?php echo $_COOKIE['username']; ?></p>
    <p><a href="dashboard.php">[Dashboard]</a> <a href="logout.php">[Logout]</a></p>
  </body>
</html>
