<?php
session_start();
if(isset($_SESSION['user']) || isset($_POST['logout'])){
	unset($_SESSION['user']);
	session_destroy();
	session_start();
	$_SESSION['logout'] = 'Successfully logged out';
	header('Location: index.php');
}
else{
	header('Location: index.php');
}
?>