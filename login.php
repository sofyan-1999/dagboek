<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Dagboek</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Dagboek</a>
    </div>
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
    </ul>
  </div>
</nav>
<body>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<h1 style="color: red">'.$_SESSION['error_message'].'</h1>';
    }
    ?>
<div class="container">
    <form action="forms/processLogin.php" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
        <input type="email"name="email">
    </div>
    <div class="form-group">
      <label for="password">Wachtwoord:</label>
        <input type="password"name="password">
    </div>
        <input type="submit" name="submit" value="submit">
    </form>
</div>
</body>
</html>
<?php
if (isset($_SESSION['error_message'])) {
    unset($_SESSION['error_message']);
}
?>