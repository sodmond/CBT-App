<?php
session_start();
$ans        =   "d";
$choice     =   @$_POST['q'];
if ($choice == $ans){
$_SESSION['score'] += 10;
}
else{
$_SESSION['score'] += 0;
}
if(isset($_SESSION['score'])){
	$score = $_SESSION['score'] / 2;
    if ($score > 60){
		$status = 'Passed';
    }
    else{
		$status = 'Failed';
    }
	$_SESSION['status'] = $status;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About to start the exam</title>
<style type="text/css">
body{
	width:400px;
	margin:0px auto;
	background:#CCC;
}
div{
	width:400px;
	height:320px;
	background:#FFF;
	margin-top:40%;
	border-radius:10px;
	font:20px Arial;
}
#finalize{
	background:#090;
	color:#CCC; border-radius:20px;
	text-decoration:none; width:200px; height:100px;
	font-size:20px; border:1px solid #FFF;
	font-family:"Times New Roman", Times, serif;
}
#finalize:hover{
	background:#0C0;
	color:#FFF;
}
</style>
</head>        
<body>
<div><table width="95%" height="90%" border="0" align="center">
  <tr>
    <td align="center">
        <p>Examination Completed</p>
        <hr style="width:350px; height:1px; border:1px #CCC solid;" />
        <p>Click the finish button below to finalize examination</p>\
        <p><form action="finalize_exam.php" method="post">
        <input type="hidden" name="f_exam" />
        <input type="submit" id="finalize" value="FINISH" />
        </form></p>
    </td>
  </tr>
</table>
</div>
</body>            
</html>