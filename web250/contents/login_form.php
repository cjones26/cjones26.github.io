<?php
if (isset($_SESSION['error'])) {
  $error = $_SESSION['error'];
  unset($_SESSION['error']);
}
?>

<h2 id="login-header">Login</h2>
<div id="login-form">
  <form method="post" action="login.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <?php if (isset($error)) { ?>
      <p id="login-form-error"><?php echo $error; ?></p>
    <?php } else {
      echo '<br>';
    } ?>
    <button type="submit">Login</button>
  </form>
</div>