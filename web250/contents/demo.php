<h2>PHP Demo</h2>

<h3>Welcome to my PHP demo page for WEB250!</h3>

<p>My name is <?php echo "Charles Jones" ?> and the current date is <?php echo date('l, F jS, Y'); ?>.</p>

<?php
$sOutputString = "<hr>";

for ($iCounter = 1; $iCounter <= 1000; $iCounter++) {
  $sOutputString .= $iCounter . ") Charles got PHP running on my computer!! ";
}

echo ("<h5>" . $sOutputString . "</h5><hr>");
?>