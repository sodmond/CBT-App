<?php
require_once("../connection.php");
session_start();
if(isset($_SESSION['user'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About to start the exam</title>
<style type="text/css">
body{
	width:500px;
	margin:0px auto;
	background:#CCC;
}
div{
	width:500px;
	height:350px;
	background:#FFF;
	margin-top:30%;
	border-radius:7px;
	font:18px Arial;
	padding:5px;
}
#start{
	background:#090;
	color:#CCC; border-radius:10px;
	text-decoration:none;
	font-size:24px; border:1px solid #FFF;
	font-family:"Times New Roman", Times, serif;
}
#start:hover{
	background:#0C0;
	color:#FFF;
}
</style>

</head>        
<body>
<div><table width="90%" height="90%" border="0" align="center">
  <tr>
    <td align="center"><h2>Welcome!</h2><font size="4">Candidate Reg# </font> <font color="#C00"><?php echo $_SESSION['user'] ?></font>
    <hr style="width:350px; height:1px; border:1px #161616 inset;" /></td>	
  </tr>
  <tr><td align="center">
  <p>You have just 10mins to answer all the 20 Questions</p>
  <p>Click the start button below to start your exam</p>
        <a href="exam.php?id=1" id="start">&nbsp; Start Exam &nbsp;</a>
  </td></tr>
</table>
</div>
</body>            
</html>
<?php
}
else{
	header('Location: index.php');
}
?>