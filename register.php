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
<!-- 
  Voornaam:<br>
  <input type="text" name="firstname" pattern="[A-Za-z]{1,32}" required>
  <br>
  Tussenvoegsel:<br>
  <input type="text" name="suffix" pattern="[A-Za-z]{1,32}">
  <br>
  Achternaam:<br>
  <input type="text" name="lastname" pattern="[A-Za-z]{1,32}" required>
  <br>
  Email:<br>
  <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
  <br>
  Wachtwoord:<br>
  <input type="password" name="password" pattern=".{6,}" required>
  <br> -->

<div class="container">
  <form action="forms/verwerkRegister.php" method="POST">
    <div class="form-group">
      <label for="firstname">Voornaam:</label>
	  <input type="text" name="firstname" pattern="[A-Za-z]{1,32}" required>
    </div>
    <div class="form-group">
      <label for="suffix">Tussenvoegsel:</label>
  	  <input type="text" name="suffix" pattern="[A-Za-z]{1,32}">
    </div>
    <div class="form-group">
      <label for="lastname">Achternaam:</label>
      <input type="text" name="lastname" pattern="[A-Za-z]{1,32}" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
    </div>
    <div class="form-group">
      <label for="password">Wachtwoord:</label>
     <input type="password" name="password" pattern=".{6,}" required>
    </div>
  	<input type="submit" name="submit" value="submit">
  </form>
</div>

</form>
</body>
</html>
