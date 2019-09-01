<?php
require_once('../connection.php');
session_start();
if(isset($_SESSION['user'])){
	$choice = array();
	$ans = array();
	$score = 0;
	#Get correct answers from database
	for($i=1; $i<=20; $i++){
		$ans[$i] = mysqli_fetch_array(mysqli_query($linkdb, 'SELECT Answer FROM examquestions WHERE ID='.$i));
	}
	#Compare correct answers with student answers
	for($i=1; $i<=20; $i++){
		$choice[$i] = $_COOKIE['choice'.$i];
		if($choice[$i] == $ans[$i]['Answer']) {
			$score += 10;
		} else {
			$score += 0;
		}
	}
	#Calculate and Grade scores then save to databse
	$avgScore = $score/2;
	$status = '';
	if($avgScore > 70) {$status = 'PASS';} else{$status = 'FAIL';}
	$stmt = "INSERT INTO result(Regnum, Score, Status) VALUES('".$_SESSION['user']."', '".$avgScore."', '".$status."')";
	mysqli_query($linkdb, $stmt);

	header('Location: exam_finished.php');
}
else{
	header('Location: index.php');
}

?>