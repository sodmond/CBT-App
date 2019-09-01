<?php
session_start();
setcookie("time_online_ID", "");
setcookie("time_online_ST", "");
setcookie("time_online_TT", "");
setcookie("time_online_TO", "");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/cookie.js"></script>
<script type="text/javascript">
function discard_ans() {
	for(i=1; i<=20; i++){
		Cookie.unset("choice"+i);
	}
}
</script>
<title>About to start the exam</title>
<style type="text/css">
body{
	width:400px;
	margin:0px auto;
	background:#CCC;
}
#container{
	width:350px;
	height:300px;
	margin-top:40%; background:#FFF;
	border-radius:7px;
	font:24px "Trebuchet MS", Arial, Helvetica, sans-serif;
}
.txtinput{
    height:30px; width:250px; border:1px #999 solid; border-radius:5px; font-size:15px; text-align:center;
}
#login{width:100px; height:40px; font:18px "Trebuchet MS", Arial, Helvetica, sans-serif;}
</style>
</head>        
<body onload="discard_ans();">
<div id="container">
<form action="login.php" method="post">
<table width="320" height="280" border="0" align="center">
  <tr><td align="center"><strong>Login to start exam</strong></td></tr>
  <tr><td align="center">
	<div style="background:#006600; color:#F6F6F6; font:15px Arial, Helvetica, sans-serif;">
		<?php if(isset($_SESSION['logout'])) {echo $_SESSION['logout']; unset($_SESSION['logout']);} ?>
	</div>
	<div style="background:#C00; color:#F6F6F6; font:15px Arial, Helvetica, sans-serif;">
		<?php if(isset($_SESSION['error'])) {echo $_SESSION['error']; unset($_SESSION['error']);} ?>
	</div>
  </td></tr>
  <tr><td align="center"><input type="text" name="fname" class="txtinput" placeholder="Enter your Firstname" /></td></tr>
  <tr><td align="center"><input type="text" name="regnum" class="txtinput" placeholder="Enter your Registration Number" /></td></tr>
  <tr><td align="center"><input type="submit" value=" Login " id="login" /></td></tr>
</table>
</form>
</div>
</body>            
</html>