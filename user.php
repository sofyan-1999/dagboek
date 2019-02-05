<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require 'src/classes/users.php';

$user = new Users();

if ($_SESSION['id'] == false) {
	header('Location: login.php');
}

$selectUser = $user->select();

// if(isset($_POST['submit'])){
// 	if($selectUser){
//   		header('Location: user.php');
// 	}
// }

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
      <li><a href="index.php">Home</a></li>
      <li><a href="user.php">Profiel</a></li>
      <li><a href="createStory.php">Verhaal aanmaken</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <form action="forms/updateUser.php" method="POST">
    <div class="form-group">
      <label for="firstname">Voornaam:</label>
	  <input type="text" name="firstname" pattern="[A-Za-z]{1,32}" value='<?php echo $selectUser["voornaam"]; ?>'>
    </div>
    <div class="form-group">
      <label for="suffix">Tussenvoegsel:</label>
  	  <input type="text" name="suffix" pattern="[A-Za-z]{1,32}" value='<?php echo $selectUser["tussenvoegsels"]; ?>'>
    </div>
    <div class="form-group">
      <label for="lastname">Achternaam:</label>
      <input type="text" name="lastname" pattern="[A-Za-z]{1,32}" value='<?php echo $selectUser["achternaam"]; ?>'>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value='<?php echo $selectUser["email"]; ?>'>
    </div>
  	<input type="submit" name="submit" value="Wijzig">  
  </form>
  <form action="forms/deleteUser.php" method="POST">
	<input type="submit" name="delete" value="Verwijder">
  </form>	
</div>