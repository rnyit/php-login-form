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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../files/style.css?v=1.0">
  </head>
  <body>
    <div id="form">
      <form method="POST">
        <?php if(isset($_SESSION['message'])) { ?><div class="form-message"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div><div class="br"></div><?php } ?>
        <h1>PHP Login Form</h1>
        <div class="br"></div>
        <input type="text" name="username" placeholder="Username" required>
        <div class="br"></div>
        <input type="password" name="password" placeholder="Password" required>
        <div class="br"></div>
        <input type="submit" name="submitbutton" value="Submit">
      </form>
    </div>
  </body>
</html>
