<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php?page=login_form');
  exit();
}

session_unset();
session_destroy();
header("Location: index.php?page=logout_success");
exit();
