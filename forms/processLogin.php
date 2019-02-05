<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require '../src/classes/users.php';

$user = new Users();

$login = $user->setLoginUser();

if ($login === true) {
	header('Location: ../');
} else {
	$_SESSION['error_message'] = $login;
	header('Location: ../login.php');
}
?>