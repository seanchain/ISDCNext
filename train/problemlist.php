<!DOCTYPE html>

<html>
<head>
	<title>训练平台 四川大学软件学院信息安全与网络攻防协会</title>
	<?php require('../header.inc.php'); ?>
	<script src="/assets/js/jQuery.headroom.min.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.min.js" type="text/javascript"></script>
	<script>
		function goto(id){
			window.location.href='./problemdescription.php?id='+id;
		}
		$(function(){$("#SignOut").on("click", function () {
			location.href = "./signout.php";
		});});
	</script>
	<style>
		.signoutb{
			margin-bottom: 5px;
			margin-left: 8px;
		}
		.btn-primary { 
			color:#FFEFD7; ient(top, #FF9B22 0%, #FF8C00 100%); 
			background-image: none; 
		}
	</style>
</head>
<body>

<?php $_home_class='""';$_blog_class='""';$_game_class='""';$_train_class='"active"';$_about_class='"dropdown"';require('../navi.inc.php'); ?>

<header id="head" class="secondary"></header>

	<div class="container">
		<ol class="breadcrumb">
				<li><a href="index.php">训练平台</a></li>
				<li class="active">答题列表</li>
		</ol>

		<article class="col-md-12 maincontent">

			<header class="page-header">
				<h1 class="page-title">ISDC训练平台</h1>
			</header>

			<?php
				session_start();
				if (isset($_SESSION['valid_user'])) {
					$username=$_SESSION['valid_user'];
					echo '<div class="text-right signout">'.$username.'';
					echo '<button type="button" class="btn-primary btn-xs signoutb" id="SignOut">Sign Out</button></div>';
				} else {
					echo '<script>window.location.href="./index.php";</script>';
				}
			?>

			<!--<div class="row text-center">
			  <span></span>
			  <div class="col-lg-6">
			    <div class="input-group">
			      <span class="input-group-btn">
			        <button id="GOButton" class="btn btn-default search" type="button">GO</button>
			      </span>
			      <input id="GOText" type="text" class="form-control" size="6">
			    </div>
			  </div>
			</div>-->
			<p></p>

			<table class="table text-center table-bordered table-hover table-striped">
				<tr>
				<th align="center">ID</th><th ALIGN="CENTER">name</th><th ALIGN="CENTER">ST</th><th ALIGN="CENTER">ET</th><th ALIGN="CENTER">ACNUM</th>
				</tr>
				<tbody>
					<?php
					//此处开始计算提交人数
					//定义一个叫做$hand_id的数组用于记录提交的人数
					//addfilenamestoarray()函数讲文件中的文件
					function addfilenamestoarray($array, $filedir)
					{
						$filenames = scandir($filedir);
						$newfilenames = array();
						foreach($filenames as $file)
						{
							if(strcmp($file, ".") == 0 || strcmp($file, "..") == 0)
							{
								continue;
							}
							else{
								$single_file_arr = explode(".", $file);
								$file = $single_file_arr[0];
								array_push($newfilenames, $file);
							}	
						}
						$length = count($array);
						if($length == 0)
						{
							for($i = 0; $i < count($newfilenames); $i ++)
								array_push($array, $newfilenames[$i]);
						}
						else
						{
							for($j = 0; $j < count($newfilenames); $j ++)
							{
								$flag = 0;
								for($i = 0; $i < count($array); $i ++)
								{
									if(strcmp($newfilenames[$j], $array[$i]) == 0)
									{
										$flag = 1;
										break;
									}
								}
								if($flag == 0)
								{
									array_push($array, $newfilenames[$j]);
								}
							}	
						}
						
						return $array;
					}
					
					function getACNUM($id)
					{
						$filedir = "./TPD/problem/".$id."/answer/";
						if(!file_exists($filedir))
						{
							return 0;
						}
						$cppdir = $filedir."cpp";
						$javadir = $filedir."java";
						$htmldir = $filedir."html";
						$phpdir = $filedir."php";
						$pydir = $filedir."py";
						$handid = array();
						$handid = addfilenamestoarray($handid, $cppdir);
						$handid = addfilenamestoarray($handid, $javadir);
						$handid = addfilenamestoarray($handid, $htmldir);
						$handid = addfilenamestoarray($handid, $phpdir);
						$handid = addfilenamestoarray($handid, $pydir);
						$num = count($handid);
						return $num;
					}
					
						$con = mysql_connect("127.0.0.1","traindbusr","QMy2cwUWUh");
						if (!$con){
							die('Could not connect: ' . mysql_error());
						}
						mysql_select_db("trainningplatform", $con);

						$result = mysql_query("SELECT * FROM problem");

						while($row = mysql_fetch_array($result)){
							echo '<tr><td id="'.$row['ID'].'">'.$row['ID'].'</td><td><a onclick="goto(\''.$row['ID'].'\')">'.$row['name'].'</a></td><td>'. $row['ST'].'</td><td>'. $row['ET'].'</td><td>'.getACNUM($row['ID']).'</td></tr>';
						}
						mysql_close($con);
						//print_r($handid);
					?>
				</tbody>
			</table>
		</article>
</div>

<?php require('../footer.inc.php'); ?>
</body>
</html>
