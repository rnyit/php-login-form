<?php
// Required file(s).
require 'config.php';

// Start new or resume existing session.
session_start();

// Check if a user is logged in.
if(isset($_COOKIE['username'])) {
  
  // Redirect to another location.
  header('Location: dashboard.php');
  
  // Terminate the current script.
  exit();
  
}

// Validate the username and password.
if(isset($_POST['submitbutton'])) {
  
  // Get the input username and password data.
  $username = strtolower($_POST['username']);
  $password = $_POST['password'];
  
  // Check if the input fields are empty.
  if(empty($username) || empty($password)) {
    
    // Session variable message.
    $_SESSION['message'] = 'Please enter your username and password.';
    
  } else {
    
    // Check if username and password are valid.
    if($username == username && $password == password) {
      
      // Check if 'Keep Me Logged In' checkbox is enabled.
      if(isset($_POST['kmli'])) {
        
        // Set session time for 1 year.
        $session_time = time() + (60 * 60 * 24 * 365);
      
      } else {
        
        // Set session time for a short period of time.
        $session_time = time() + (60 * 60);
        
      }
      
      // Set the cookies.
      setcookie('username', $username, $session_time, url_path);
      
      // Redirect to another location.
      header('Location: dashboard.php');
      
      // Terminate the current script.
      exit();
      
    } else {
      
      // Session variable message.
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
      <input type="checkbox" name="kmli">
      <span>Keep Me Logged In</span>
      <br>
      <input type="submit" name="submitbutton" value="Submit">
    </form>
  </body>
</html>
