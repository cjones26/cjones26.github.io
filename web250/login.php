<?php
session_start();

include 'contents/shared/db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate credentials
  $stmt = $mysqli->prepare('SELECT * FROM users WHERE username = ?');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('Location: index.php?page=login_success');
  } else {
    $error = 'Invalid username or password';
    $_SESSION['error'] = $error;
    header('Location: index.php?page=login_form');
    exit();
  }
}
