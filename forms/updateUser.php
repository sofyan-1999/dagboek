<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require '../src/classes/users.php';

$user = new Users();

$edit = $user->updateUser();

if ($edit) {
  header('Location: ../user.php');
} 
?>