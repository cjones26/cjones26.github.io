<?php

$server = "db";
$username = "root";
$password = "root_password";
$db_name = "lamp_db"; // Replace with your actual database name

$mysqli = new mysqli($server, $username, $password, $db_name);

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
