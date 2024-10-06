<?php
$outputString = '';

// Function to sanitize input
function sanitizeInput($data)
{
  return htmlspecialchars(stripslashes(trim($data)));
}

// Function to generate output string
function generateOutputString($method, $data)
{
  $output = '';
  $firstName = sanitizeInput($data['first-name-' . strtolower($method)]);
  $lastName = sanitizeInput($data['last-name-' . strtolower($method)]);
  $primaryGoal = sanitizeInput($data['primary-goal-' . strtolower($method)]);
  $multiselect = isset($data['account-types-' . strtolower($method)]) ? $data['account-types-' . strtolower($method)] : [];

  if (!empty($firstName) && !empty($lastName)) {
    $output .= "<h2>" . strtoupper($method) . " Form Results</h2>";
    $output .= "<ul>";
    $output .= "<li><strong>First Name:</strong> $firstName</li>";
    $output .= "<li><strong>Last Name:</strong> $lastName</li>";
    $output .= "<li><strong>Primary Financial Goal:</strong> $primaryGoal</li>";
    $output .= "<li><strong>Account Types:</strong> " . implode(", ", $multiselect) . "</li>";
    $output .= "</ul>";
    $output .= "<hr>";
  }

  return $output;
}

// Process POST form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $outputString .= generateOutputString('POST', $_POST);
}

// Process GET form
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['first-name-get'])) {
  $outputString .= generateOutputString('GET', $_GET);
}
?>

<!-- POST Form -->
<h2>POST Form</h2>
<form method="post" action="">
  <label for="first-name-post">First Name:</label>
  <input type="text" id="first-name-post" name="first-name-post" required="true">
  <br>
  <label for="last-name-post">Last Name:</label>
  <input type="text" id="last-name-post" name="last-name-post" required="true">
  <br>
  <label for="primary-goal-post">Primary Financial Goal:</label>
  <select id="primary-goal-post" name="primary-goal-post">
    <option value="save-for-a-house">Save for a House</option>
    <option value="retirement-savings">Retirement Savings</option>
    <option value="debt-payoff">Debt Payoff</option>
    <option value="vacation-planning">Vacation Planning</option>
    <option value="emergency-fund">Emergency Fund</option>
    <option value="college-savings">College Savings</option>
    <option value="investment-growth">Investment Growth</option>
  </select>
  <br>
  <label for="account-types-post">Account Types:</label>
  <select id="account-types-post" name="account-types-post[]" multiple="true">
    <option value="checking">Checking</option>
    <option value="savings">Savings</option>
  </select>
  <br>
  <button type="submit">Submit</button>
</form>

<hr>

<!-- GET Form -->
<h2>GET Form Hi</h2>
<form method="get" action="">
  <input type="hidden" name="page" value="form">
  <label for="first-name-get">First Name:</label>
  <input type="text" id="first-name-get" name="first-name-get" required="true">
  <br>
  <label for="last-name-get">Last Name:</label>
  <input type="text" id="last-name-get" name="last-name-get" required="true">
  <br>
  <label for="primary-goal-get">Primary Financial Goal:</label>
  <select id="primary-goal-get" name="primary-goal-get">
    <option value="save-for-a-house">Save for a House</option>
    <option value="retirement-savings">Retirement Savings</option>
    <option value="debt-payoff">Debt Payoff</option>
    <option value="vacation-planning">Vacation Planning</option>
    <option value="emergency-fund">Emergency Fund</option>
    <option value="college-savings">College Savings</option>
    <option value="investment-growth">Investment Growth</option>
  </select>
  <br>
  <label for="account-types-get">Account Types:</label>
  <select id="account-types-get" name="account-types-get[]" multiple="true">
    <option value="checking">Checking</option>
    <option value="savings">Savings</option>
  </select>
  <br>
  <button type="submit">Submit</button>
</form>

<hr>

<?php
// Output the results
echo $outputString;
?>