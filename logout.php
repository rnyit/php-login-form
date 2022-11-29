<?php
// Required file(s).
require 'config.php';

// Start new or resume existing session.
session_start();

// Unset the cookie.
unset($_COOKIE['username']);
setcookie('username', null, -1, url_path);

// Session variable message.
$_SESSION['message'] = 'Logged out.';

// Redirect to another location.
header('Location: login.php');

// Terminate the current script.
exit();
