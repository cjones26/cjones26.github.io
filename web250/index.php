<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Charles Jones' WEB250 Home Page">
  <meta name="keywords" content="WEB250, Charles Jones, CPCC, Web Development">
  <meta name="author" content="Charles L. Jones">
  <link href="styles/default.css" rel="stylesheet" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <title>Charles Jones' MoneyMingle | Home</title>
  <script src="https://lint.page/kit/880bd5.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include 'contents/shared/header.php'; ?>

  <main>
    <?php
    // Get the current page from the query string
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Determine which content to include based on the page
    switch ($page) {
      case 'brand':
        include 'contents/brand.php';
        break;
      case 'contract':
        include 'contents/contract.php';
        break;
      case 'demo':
        include 'contents/demo.php';
        break;
      case 'introduction':
        include 'contents/introduction.php';
        break;
      case 'introduction_form':
        include 'contents/introduction_form.php';
        break;
      case 'red_form_blue_form':
        include 'contents/red_form_blue_form.php';
        break;
      case 'fizz_buzz_bang_everything':
        include 'contents/fizz_buzz_bang_everything.php';
        break;
      case 'everything_form':
        include 'contents/everything_form.php';
        break;
      case 'login_form':
        include 'contents/login_form.php';
        break;
      case 'login_success':
        include 'contents/login_success.php';
        break;
      case 'logout_success':
        include 'contents/logout_success.php';
        break;
      case 'register':
        include 'contents/register.php';
        break;
      case 'dashboard':
        include 'contents/dashboard.php';
        break;
      case 'delete_transaction_confirmation':
        include 'contents/delete_transaction_confirmation.php';
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

</html>