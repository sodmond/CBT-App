<?php
if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        body{
            margin:0px auto;
        }
        #main{
           width:100%;
           height:30px;
           margin-top:-16px;
           background:#000;
           color:#F0F; text-align:center;
        }
        #main ul{
            display:block;
            padding: 5px;
            height: 30px;
        }
        #main ul li{
            display: inline; background:#FC9;
            border-right:1px #FFF solid;
            border-left:1px #FFF solid;
            padding:7px;
        }
		#main ul li a{
			padding:15px;
			color:#000;
		}
		#main ul li a:hover{
			color:#006;
		}
    </style>
</head>

<body>

    <div id="main">
        <ul>
        <?php
			for($i=1; $i<=20; $i++){
				echo '<li id="num'.$i.'"><a href="exam.php?id='.$i.'" target="_parent">'.$i.'</a></li>';
			}
		?>
        </ul>
    </div>
    
    <?php
	for($i=1; $i<=20; $i++){
		if( isset($_COOKIE['choice'.$i]) ){
			if($_COOKIE['choice'.$i] != NULL){
				echo '<style type="text/css"> #main ul #num'.$i.'{background:#0F0;} </style>';
			}
		}else{
			echo '';
		}
	}
	?>
    
    </body>
</html>
<?php
}
else{
	header('Location: index.php');
}

?>
?>