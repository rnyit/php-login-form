<?php
// Required file.
require 'config.php';

// Start new or resume existing session.
session_start();

// Check if the user is already logged in.
if(isset($_SESSION['user'])) {
  // Redirect to another location.
  header('Location: dashboard.php');
  // Terminate the current script.
  exit();
}

// Validate the username and password.
if(isset($_POST['submitbutton'])) {
  // Get the input username data.
  $username = strtolower($_POST['username']);
  // Get the input password data.
  $password = $_POST['password'];
  // Check if the input fields are empty.
  if(empty($username) || empty($password)) {
    // Session variable.
    $_SESSION['message'] = 'Please enter your username and password.';
  } else {
    // Check if username and password are correct.
    if($username == username && $password == password) {
    // Session variable.
    $_SESSION['user'] = $username;
    // Redirect to another location.
    header('Location: dashboard.php');
    // Terminate the current script.
    exit();
    } else {
      // Session variable.
      $_SESSION['message'] = 'Access denied.';
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP Login Form</title>
  </head>
  <body>
    <form method="POST">
      <?php if(isset($_SESSION['message'])) { ?><span><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></span><br><?php } ?>
      <h1>PHP Login Form</h1>
      <br>
      <input type="text" name="username" placeholder="Username" required>
      <br>
      <input type="password" name="password" placeholder="Password" required>
      <br>
      <input type="submit" name="submitbutton" value="Submit">
    </form>
  </body>
</html>
