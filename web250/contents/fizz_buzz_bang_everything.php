<?php
// Initialize variables
$firstName = "";
$lastName = "";
$startNumber = "";
$endNumber = "";
$fizzWord = "";
$fizzNumber = "";
$buzzWord = "";
$buzzNumber = "";
$bangWord = "";
$bangNumber = "";
$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = htmlspecialchars($_POST['first-name']);
  $lastName = htmlspecialchars($_POST['last-name']);
  $startNumber = intval($_POST['start-number']);
  $endNumber = intval($_POST['end-number']);
  $fizzWord = htmlspecialchars($_POST['fizz-word']);
  $fizzNumber = intval($_POST['fizz-number']);
  $buzzWord = htmlspecialchars($_POST['buzz-word']);
  $buzzNumber = intval($_POST['buzz-number']);
  $bangWord = htmlspecialchars($_POST['bang-word']);
  $bangNumber = intval($_POST['bang-number']);

  $output .= "<h2>Hello, $firstName $lastName!</h2>";
  $output .= "<p>Your $fizzWord$buzzWord$bangWord results:</p><ul>";

  for ($i = $startNumber; $i <= $endNumber; $i++) {
    $line = "$i: ";
    if ($i % $fizzNumber === 0) $line .= $fizzWord;
    if ($i % $buzzNumber === 0) $line .= $buzzWord;
    if ($i % $bangNumber === 0) $line .= $bangWord;
    if ($line === "$i: ") $line .= "Not divisible by $fizzNumber, $buzzNumber, or $bangNumber";
    $output .= "<li>" . trim($line) . "</li>";
  }

  $output .= "</ul>";
}
?>

<h2>FizzBuzzBangEverything!</h2>

<form method="post" action="" id="fizz-buzz-bang-everything-form">
  <div class="flex">
    <div class="full-width">
      <label for="name">First Name:</label>
      <input type="text" id="first-name" name="first-name" value="<?= $firstName ?: 'John'; ?>" required><br>
    </div>

    <div class="full-width">
      <label for="name">Last Name:</label>
      <input type="text" id="last-name" name="last-name" value="<?= $lastName ?: 'Doe'; ?>" required><br>
    </div>
  </div>

  <div class="flex">
    <div class="full-width">
      <label for="start-number">Starting Number:</label>
      <input type="number" id="start-number" name="start-number" value="<?= $startNumber ?: 1; ?>" required><br>
    </div>

    <div class="full-width">
      <label for="end-number">Ending Number:</label>
      <input type="number" id="end-number" name="end-number" value="<?= $endNumber ?: 100; ?>" required><br>
    </div>
  </div>

  <div class="flex">
    <div class="full-width">
      <label for="fizz-word">First Word (Fizz):</label>
      <input type="text" id="fizz-word" name="fizz-word" value="<?= $fizzWord ?: 'Fizz'; ?>" required><br>
    </div>

    <div class="full-width">
      <label for="fizz-number">First Word Number:</label>
      <input type="number" id="fizz-number" name="fizz-number" value="<?= $fizzNumber ?: 3; ?>" required><br>
    </div>
  </div>

  <div class="flex">
    <div class="full-width">
      <label for="buzz-word">Second Word (Buzz):</label>
      <input type="text" id="buzz-word" name="buzz-word" value="<?= $buzzWord ?: 'Buzz'; ?>" required><br>
    </div>

    <div class="full-width">
      <label for="buzz-number">Second Word Number:</label>
      <input type="number" id="buzz-number" name="buzz-number" value="<?= $buzzNumber ?: 5; ?>" required><br>
    </div>
  </div>

  <div class="flex">
    <div class="full-width">
      <label for="bang-word">Third Word (Bang):</label>
      <input type="text" id="bang-word" name="bang-word" value="<?= $bangWord ?: 'Bang'; ?>" required><br>
    </div>

    <div class="full-width">
      <label for="bang-number">Third Word Number:</label>
      <input type="number" id="bang-number" name="bang-number" value="<?= $bangNumber ?: 7; ?>" required><br>
    </div>
  </div>

  <button type="submit">Submit</button>
</form>

<!-- Output -->
<div id="results">
  <?= $output; ?>
</div>