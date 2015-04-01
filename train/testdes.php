<!DOCTYPE html>

<html>
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="四川大学学术性社团信息安全与网络攻防协会网站" />
	<meta name="keywords" content="网络攻防,信息安全,四川大学软件学院" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Le styles -->
	<link href="/assets/css/bootstrap.css" rel="stylesheet" />
	<link href="/assets/css/bootstrap-responsive.css" rel="stylesheet" />
	<link href="/assets/css/bootstrap-theme.css" rel="stylesheet" />
	<link href="/assets/css/docs.css" rel="stylesheet" />
	<link href="/assets/js/google-code-prettify/prettify.css" rel="stylesheet" />
	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="assets/ico/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/ic_144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/ic_114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/ic_72.png" />
	<link rel="apple-touch-icon-precomposed" href="/assets/ico/ic_57.png" />
	<!--[if lt IE 9]><script src="assets/js/html5.js" type="text/javascript"/><![endif]-->
	<script src="/assets/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/js/google-code-prettify/prettify.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-transition.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-alert.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-modal.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-dropdown.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-scrollspy.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-tab.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-tooltip.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-popover.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-button.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-collapse.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-carousel.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-typeahead.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-affix.js" type="text/javascript"></script>
	<script src="/assets/js/application.js" type="text/javascript"></script>
	<script src="/assets/js/superfish.js" type="text/javascript"></script>
	<script src="/assets/js/custom.js" type="text/javascript"></script>
</head>
<body>
<?php require_once('./NavbarForTrain.php'); ?>
<div class="container">
		<?php
			//$time=
			function getfilecontent($filedir)
			{
				$str = "";
				$file = fopen($filedir, "r");
				if ($file) {
					$ch = fgetc($file);
					while(!feof($file))
					{
						$str = $str.$ch;
						$ch = fgetc($file);
					}
				}
				fclose($file);
				return $str;
			}
			$con = mysql_connect("127.0.0.1","traindbusr","QMy2cwUWUh");
			if (!$con){
				die('维护中...');
			}
			mysql_select_db("trainningplatform", $con);

			$id=$_GET["id"];
			// if (get_magic_quotes_gpc()) {
			// 　　$id = stripslashes($id);
			// }
			// else{
			// 　　$id = mysql_real_escape_string($id);
			// }
			// 
			$query = "SELECT * FROM problem where id=".$id;
			$result = mysql_query($query);
			if($row = mysql_fetch_array($result)){
				echo '<div class="page-header" align="center">
							<h1>'.$row['ID'].'  '.$row['name'].'</h1><br/>
							<h6><small>time limit:'.$row['TL'].'  '.'memory limit:'.$row['ML'].'  '.'start time:'.$row['ST'].'  '.'end time:'.$row['ET'].'</small></h6>
						</div>';
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
			mysql_close($con);
		?>
</div>
<?php require_once('../Footer.php'); ?>

</body>
</html>
