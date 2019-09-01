<?php
require_once("../connection.php");
session_start();
$fname = stripslashes($_POST['fname']);
$regnum = stripslashes($_POST['regnum']);
$query = mysqli_query($linkdb, "SELECT COUNT(*) FROM candidate WHERE (Firstname='".$fname."' AND Regnum='".$regnum."')");
$result = mysqli_fetch_array($query);
$result2 = mysqli_fetch_array(mysqli_query($linkdb, 'SELECT * FROM result WHERE Regnum = "'.$regnum.'"'));
if (($result[0] > 0)){
if(!($result2[0] > 0)){
	$_SESSION['user'] = $regnum;
	header('Location: start_exam.php');
}
else{
	$_SESSION['user'] = $regnum;
	header('Location: exam_finished.php');
}
}
else{
	$_SESSION['error'] = 'Incorrect Username/Password';
	header("Location: index.php");
}
?>