<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="styles/default.css" rel="stylesheet" type="text/css">
  <title>WEB140-N801 Home</title>
</head>

<body>
  <?php include 'contents/shared/header.php'; ?>

  <main>
    <?php
    // Get the current page from the query string
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Determine which content to include based on the page
    switch ($page) {
      case 'page1':
        include 'contents/page1.php';
        break;
      case 'page2':
        include 'contents/page2.php';
        break;
      case 'page3':
        include 'contents/page3.php';
        break;
      default:
        include 'contents/home.php';
        break;
    }
    ?>
  </main>

  <?php include 'contents/shared/footer.php'; ?>

  <script src="scripts/toggle-theme.js"></script>
</body>