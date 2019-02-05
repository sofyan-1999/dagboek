<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../src/classes/users.php';

$user = new Users();

$register = $user->create();

if ($register) {
  header('Location: ../login.php');
} 
else{
  $_SESSION['error_message'] = $register;
  header('Location: ../register.php');
}
?>
