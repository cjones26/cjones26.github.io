<?php
session_start();

include 'contents/shared/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php?page=login_form');
  exit();
}

$transaction_id = $_POST['transaction_id'];

// Handle deletion confirmation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $query = "DELETE FROM transactions WHERE id = $transaction_id";
  $data = $mysqli->query($query);

  header('Location: index.php?page=dashboard');
}
