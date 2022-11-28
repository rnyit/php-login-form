<?php
// Keep a session for notifications.
session_start();

// Unset the cookie.
unset($_COOKIE['username']);
setcookie('username', null, -1, '/');

// Session variable.
$_SESSION['message'] = 'Logged out.';

// Redirect to another location.
header('Location: login.php');

// Terminate the current script.
exit();
