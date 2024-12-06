<div id="everything-form">
  <h2 id="everything-form-header">Everything Form</h2>
  <form method="POST" action="">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>

      <label>Account Type:</label>
      <div class="radio-group">
        <div>
          <input type="radio" id="savings" name="account-type" value="savings" required>
          <label for="savings">Savings</label>
        </div>
        <div>
          <input type="radio" id="checking" name="account-type" value="checking" required>
          <label for="checking">Checking</label>
        </div>
      </div>

      <label for="services">Services Used:</label>
      <div class="checkbox-group">
        <div>
          <input type="checkbox" id="online-banking" name="services[]" value="online-banking">
          <label for="online-banking">Online Banking</label>
        </div>
        <div>
          <input type="checkbox" id="mobile-banking" name="services[]" value="mobile-banking">
          <label for="mobile-banking">Mobile Banking</label>
        </div>
        <div>
          <input type="checkbox" id="investment" name="services[]" value="investment">
          <label for="investment">Investment</label>
        </div>
      </div>

      <label for="income">Monthly Income:</label>
      <select id="income" name="income" required>
        <option value="below-2000">Below $2000</option>
        <option value="2000-4000">$2000 - $4000</option>
        <option value="4000-6000">$4000 - $6000</option>
        <option value="above-6000">Above $6000</option>
      </select>

      <label for="comments">Additional Comments:</label>
      <textarea id="comments" name="comments" rows="4"></textarea>

      <button type="submit">Submit</button>
    </div>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $phone = htmlspecialchars($_POST['phone']);
    $account_type = htmlspecialchars($_POST['account-type']);
    $services = isset($_POST['services']) ? $_POST['services'] : [];
    $income = htmlspecialchars($_POST['income']);
    $comments = htmlspecialchars($_POST['comments']);

    echo "<h3>Form Results</h3>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Password: $password<br>";
    echo "Phone Number: $phone<br>";
    echo "Account Type: $account_type<br>";
    echo "Services Used: " . implode(", ", $services) . "<br>";
    echo "Monthly Income: $income<br>";
    echo "Additional Comments: $comments<br>";
  }
  ?>
</div>