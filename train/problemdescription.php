<!DOCTYPE html>

<html>
<head>
	<title>训练平台 四川大学软件学院信息安全与网络攻防协会</title>
	<?php
	session_start();
	session_start();
	if (!isset($_SESSION['valid_user'])) {
		echo '<script>window.location.href="./index.php";</script>';
	}
	require('../header.inc.php');
	?>
	<script src="/assets/js/jQuery.headroom.min.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.min.js" type="text/javascript"></script>
	<style>
		.btn-primary { 
			color:#FFEFD7; ient(top, #FF9B22 0%, #FF8C00 100%); 
			background-image: none; 
		}
		.pds{
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	
<?php $_home_class='""';$_blog_class='""';$_game_class='""';$_train_class='"active"';$_about_class='"dropdown"';require('../navi.inc.php'); ?>

<header id="head" class="secondary"></header>
<div class="container">
	<ol class="breadcrumb">
				<li><a href="index.php">训练平台</a></li>
				<li><a href="problemlist.php">答题列表</a></li>
				<li class="active">题目描述</li>
		</ol>
		<?php
			function getfilecontent($filedir)
			{
				$str = "";
				$file = fopen($filedir, "r");
				if($file)
				{
					$ch = fgetc($file);
                                while(!feof($file))
                                {
                                        $str = $str.$ch;
                                        $ch = fgetc($file);
                                }
                                return $str;
				}
				else echo "no such file";
			}
			$con = mysql_connect("127.0.0.1","traindbusr","QMy2cwUWUh");
			if (!$con){
				die('维护中...');
			}
			mysql_select_db("trainningplatform", $con);

			$id=$_GET["id"];
			$id = mysql_real_escape_string($id);
			$query = "SELECT * FROM problem where id=".$id;
			$result = mysql_query($query);
			if($row = mysql_fetch_array($result)){
				echo '<div class="page-header" align="center">
							<h1>'.$row['ID'].'  '.$row['name'].'</h1><br/>
							<h6><small>Start Time:'.$row['ST'].'  '.'End Time:'.$row['ET'].'</small></h6>
						</div>';
						// time limit:'.$row['TL'].'  '.'memory limit:'.$row['ML'].'  '.'
				$endtime = $row['ET'];
				echo '<div class="panel panel-default">
						  <div class="panel-heading">Description</div>
						  <div class="panel-body">'.
						  getfilecontent($row['description'])
						  .'</div>
						</div>';
				echo '<div class="panel panel-default">
						  <div class="panel-heading">Input</div>
						  <div class="panel-body">'.
						    getfilecontent($row['input'])
						  .'</div>
						</div>';
				echo '<div class="panel panel-default">
						  <div class="panel-heading">Output</div>
						  <div class="panel-body">'.
						    getfilecontent($row['output'])
						  .'</div>
						</div>';
			}
			$time = time();
			$endtime = strtotime($endtime);
			if ($time < $endtime) {
				echo'
				<div class align="center">
				<button type="button" id="SubmitButton" class="btn btn-primary pds">
					Submit
				</button>

				<script>
				  $("#SubmitButton").on("click", function () {
						location.href = "./submit.php?id='.$id.'";
				  })
				</script>
				</div>';
			} 
			mysql_close($con);
		?>
</div>
<?php require('../footer.inc.php');?>
</body>
</html>
