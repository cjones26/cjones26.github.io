<?php
$id = $_GET['id'];
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  echo '<p>Please <a href="?page=login_form">login</a> to access this page.</p>';
} else { ?>
  <h2>Delete Transaction</h2>
  <p>Are you sure you want to delete this transaction?</p>
  <form method="post" action="delete_transaction.php">
    <input type="hidden" name="transaction_id" value="<?php echo $id ?>">
    <button id="delete-button" type="submit">Yes, Delete</button>
    <a href="?page=dashboard">No, Cancel</a>
  </form>
<?php } ?>