<h2>Transactions Dashboard</h2>

<?php
include 'shared/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  echo '<p>Please <a href="?page=login_form">login</a> to access this page.</p>';
} else {

  $username = $_SESSION['username'];

  // Handle form submission for adding a new transaction
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_transaction'])) {
    $date = $_POST['date'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $query = "INSERT INTO transactions (username, date, description, category, amount) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssd', $username, $date, $description, $category, $amount);
    $stmt->execute();
    $stmt->close();
  }

  // Handle form submission for editing a transaction
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_transaction'])) {
    $transaction_id = $_POST['transaction_id'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $query = "UPDATE transactions SET date = ?, description = ?, category = ?, amount = ? WHERE id = ? AND username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sssdis', $date, $description, $category, $amount, $transaction_id, $username);
    $stmt->execute();
    $stmt->close();
  }

  // Sorting functionality
  $sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'date';
  $sort_order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'DESC' : 'ASC';

  // Fetch sorted transactions
  $query = "SELECT * FROM transactions WHERE username = ? ORDER BY $sort_column $sort_order";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $transactions = $result->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
?>

  <!-- Add Transaction Form -->
  <form id="add-transaction-form" method="post" action="">
    <input type="hidden" name="add_transaction" value="1">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br>
    <label for="category">Category:</label>
    <select id="category" name="category" required>
      <option value="Food">Food</option>
      <option value="Bills">Bills</option>
      <option value="Entertainment">Entertainment</option>
      <option value="Transport">Transport</option>
      <option value="Other">Other</option>
    </select><br>
    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" step="0.01" required><br>
    <button type="submit">Add Transaction</button>
  </form>

  <!-- Transactions Table -->
  <table>
    <thead>
      <tr>
        <th><a href="?page=dashboard&sort=date&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Date</a></th>
        <th><a href="?page=dashboard&sort=description&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Description</a></th>
        <th><a href="?page=dashboard&sort=category&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Category</a></th>
        <th><a href="?page=dashboard&sort=amount&order=<?= $sort_order == 'ASC' ? 'desc' : 'asc' ?>">Amount</a></th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($transactions as $transaction): ?>
        <?php if (isset($_GET['edit']) && $_GET['edit'] == $transaction['id']): ?>
          <!-- Edit Mode -->
          <tr>
            <form method="post" action="index.php?page=dashboard">
              <input type="hidden" name="edit_transaction" value="1">
              <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>">
              <td><input type="date" name="date" value="<?= $transaction['date'] ?>" required></td>
              <td><input type="text" name="description" value="<?= $transaction['description'] ?>" required></td>
              <td>
                <select name="category" required>
                  <option value="Food" <?= $transaction['category'] == 'Food' ? 'selected' : '' ?>>Food</option>
                  <option value="Bills" <?= $transaction['category'] == 'Bills' ? 'selected' : '' ?>>Bills</option>
                  <option value="Entertainment" <?= $transaction['category'] == 'Entertainment' ? 'selected' : '' ?>>Entertainment</option>
                  <option value="Transport" <?= $transaction['category'] == 'Transport' ? 'selected' : '' ?>>Transport</option>
                  <option value="Other" <?= $transaction['category'] == 'Other' ? 'selected' : '' ?>>Other</option>
                </select>
              </td>
              <td><input type="number" name="amount" step="0.01" value="<?= $transaction['amount'] ?>" required></td>
              <td>
                <button type="submit">💾 Save</button>
                <a href="index.php?page=dashboard">❌ Cancel</a>
              </td>
            </form>
          </tr>
        <?php else: ?>
          <!-- Read-Only Mode -->
          <tr>
            <td><?= htmlspecialchars($transaction['date']) ?></td>
            <td><?= htmlspecialchars($transaction['description']) ?></td>
            <td><?= htmlspecialchars($transaction['category']) ?></td>
            <td><?= htmlspecialchars($transaction['amount']) ?></td>
            <td>
              <a class="edit-button" href="index.php?page=dashboard&edit=<?= $transaction['id'] ?>">✏️ Edit</a>
              <a href="index.php?page=delete_transaction_confirmation&id=<?= $transaction['id'] ?>">🗑️ Delete</a>
            </td>
          </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php } ?>