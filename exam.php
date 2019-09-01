<?php
require_once("../connection.php");
require_once("exam_time.php");
session_start();
if( isset($_GET['id']) && isset($_SESSION['user']) ){
	$ID = $_GET["id"];
	$questn = mysqli_fetch_array(mysqli_query($linkdb, 'SELECT * FROM examquestions WHERE ID='.$ID));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Question <?php echo $_GET['id']?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/cookie.js"></script>
<script type="text/javascript">
function valQuestn(){
chosen = "";
choice = "choice" + <?php echo $ID; ?>;
opts = document.myForm.opt;
for(i=0; i<opts.length; i++){
	if(opts[i].checked){
		chosen = opts[i].value;
	}
}
Cookie.set(choice, chosen);
location.reload();
}
</script>
</head>

<body>

<div id="questBox"><table width="95%" height="90%" border="0" align="center">
  <tr>
    <td align="center"><span style="font:20px Arial; font:24px 'Trebuchet MS', Arial, Helvetica, sans-serif;">
    <u>Question <?php echo $questn['ID'] ?></u></span>
    <table width="98%" border="0">
    <tr>
    <td>
    <script type="text/javascript">
	function endExam(){
		check = confirm("Do you wish to end exam?");
		if(check == true){
			window.location='finalize_exam.php';
			return true;
		}else{
			location.reload();
			return false;
		}
	}
	</script>
        <a href="#" onclick="endExam()" class="NextPrev">End Exam</a>
    </td>
    	<td><div style="background:#000; color:#FFF; width:100px; height:20px; border:1px #333 solid;">
		&nbsp;&nbsp;<b>Time:</b> <?php $time -> display_time("current_session"); ?>&nbsp;&nbsp;
	</div></td>
        <td><div style="width:30px; height:25px; background:#09C; border:1px #000 solid; color:#E2E2E2; text-align:center;">
        <?php 
			$choice = 'choice'.$ID;
			if(isset($_COOKIE[$choice])){
				echo $_COOKIE[$choice];
			}
			else{
				echo 'Null';
			}
		?>
        </div></td>
        </tr></table>
        <hr style="border:1px #666 inset;" />
        <form name="myForm" method="post">
            <h2><?php echo $questn['Question'] ?></h2>
            <p><input type="radio" name="opt" value="A" onclick="valQuestn()">a) <?php echo $questn['Option1'] ?></p>
            <p><input type="radio" name="opt" value="B" onclick="valQuestn()">b) <?php echo $questn['Option2'] ?></p>
            <p><input type="radio" name="opt" value="C" onclick="valQuestn()">c) <?php echo $questn['Option3'] ?></p>
            <p><input type="radio" name="opt" value="D" onclick="valQuestn()">d) <?php echo $questn['Option4'] ?></p>
            <p> 
               <?php
			   $NID = $ID+1;
			   $PID = $ID-1;
			   if($ID == 1){
				   echo '<a href="exam.php?id='.$NID.'" style="float:right;" class="NextPrev"> Next > </a>';
			   }
			   else if($ID == 20){
				   echo '<a href="exam.php?id='.$PID.'" style="float:left;" class="NextPrev"> < Previous </a>';
			   }
			   else{
				   echo '<a href="exam.php?id='.$PID.'" style="float:left;" class="NextPrev"> < Previous </a>';
				   echo '<a href="exam.php?id='.$NID.'" style="float:right;" class="NextPrev"> Next > </a>';
			   }
			   ?>
	    </p>
        </form>
    </td>
  <?php  ?>
    <td>
        <p></p>
    </td>
  </tr>
</table>
</div>

<div id="page_nav">
    <?php require_once('page_nav.php'); ?>
</div>

</body>
</html>
<?php
}else{
	header('Location: start_exam.php');
}
?>