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
// echo 'Congratulations! You are logged in!';
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
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="user.php">Profiel</a></li>
      <li><a href="createStory.php">Verhaal aanmaken</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <form action="forms/processStory.php" method="POST">
    <div class="form-group">
      <label for="story">Verhaal:</label>
	   <textarea rows="4" cols="50" name="story"></textarea> 
    </div>
  	<input type="submit" name="submit" value="submit">
  </form>
</div>
