<?php
// Start new or resume existing session.
session_start();

// Unset a given variable, in this case the username.
unset($_SESSION['user']);

// Session variable.
$_SESSION['message'] = 'Logged out.';

// Redirect to another location.
header('Location: login.php');

// Terminate the current script.
exit();
