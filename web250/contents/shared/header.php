<header>
  <img src="images/logo.png" alt="MoneyMingle Logo">
  <h1>Charles Jones' MoneyMingle</h1>
  <div id="auth-header">
    <?php
    include 'db.php';

    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      // Assuming you have a database connection $conn
      $query = "SELECT first_name, last_name FROM users WHERE id = ?";
      $stmt = mysqli_prepare($mysqli, $query);
      if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $first_name, $last_name);
        if (mysqli_stmt_fetch($stmt)) {
          echo "<p>👋 Welcome, $first_name $last_name</p>";
          echo '<a href="logout.php">🔒 Logout</a>';
        }
        mysqli_stmt_close($stmt);
      }
    } else {
      echo '';
      echo '<a id="login-link" href="?page=login_form">🔑 Login</a>';
      echo '<a href="?page=register">👨 Register</a>';
      echo '';
    }
    ?>
  </div>
  <nav>
    <ul>
      <li><a href="?page=home">Home</a></li>
      <li><a href="?page=contract">Course Contract</a></li>
      <li><a href="?page=introduction">Introduction</a></li>
      <li><a href="?page=brand">Brand Guide</a></li>
      <li><a href="?page=demo">PHP Demo</a></li>
      <br>
      <li><a href="?page=introduction_form">Introduction Form</a></li>
      <li><a href="?page=red_form_blue_form">Red Form Blue Form</a></li>
      <li><a href="?page=fizz_buzz_bang_everything">FizzBuzzBangEverything!</a></li>
      <li><a href="?page=dashboard">Dashboard (Protected)</a></li>
    </ul>
  </nav>
</header>