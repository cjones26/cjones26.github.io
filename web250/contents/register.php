<div id="register-container">
  <h2 id="register-container-header">Register</h2>

  <?php

  include 'shared/db.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, first_name, last_name, email) VALUES ('$user', '$pass', '$first_name', '$last_name', '$email')";

    if ($mysqli->query($sql) === TRUE) {
  ?>
      <p>Registration successful!</p>
      <a href="index.php?page=login_form">Continue to Login</a>
    <?php
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  } else {
    ?>
    <form method="post" action="">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="first-name" required>
      </div>
      <div class="form-group">
        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="last-name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Register">
      </div>
    </form>
  <?php
  }

  $mysqli->close();
  ?>
</div>