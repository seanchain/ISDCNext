<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
$checkCode = $_POST['checkCode'];
$checkCode = strtoupper($checkCode);


$DECUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

$id = trim($_POST['id']);
$textarea = trim($_POST['textarea']);
$username = $_SESSION['valid_user'];
$language_sel = trim($_POST['language_sel']);


if($_SESSION['cc'] != $checkCode)
{
	echo '<script>alert("验证码输入错误!!!");</script>';
	echo '<script>window.location.href="./problemdescription.php?id='.$id.'"</script>';
	exit();
}



$structure = './TPD/problem/'.$id."/answer/";
if($language_sel == "cpp")
	$filedir = $structure."cpp/".$username.".cpp";
else if($language_sel == "java")
	$filedir = $structure."java/".$username.".java";
else if($language_sel == "py")
	$filedir = $structure."py/".$username.".py";
else if($language_sel == "html")
	$filedir = $structure."html/".$username.".html";
else if($language_sel == "php")
	$filedir = $structure."php/".$username.".php";
$myfile = fopen($filedir, "w");
echo "<br />";
fwrite($myfile, $textarea);
if(!$myfile)
{
	echo '<title>unsuccessful</title>';
	echo '<script>alert("Unsuccessful");</script>';
	echo '<script>window.location.href="./problemdescription.php?id='.$id.'"</script>';
}
else
{
	echo '<title>successful</title>';
	if(!get_magic_quotes_gpc())
	{
    	$id = addslashes($id);
    	$username = addslashes($username);
    	$password =addslashes($password);
	}
	echo '<script>alert("提交成功!!!");</script>';
	echo '<script>window.location.href="./problemlist.php"</script>';
	$db = new mysqli("127.0.0.1", "traindbusr", "QMy2cwUWUh", "trainningplatform");
	$db->query("SET NAMES UTF8"); #防止中文乱码
	if(mysqli_connect_errno())
	{
		echo '<script>alert("服务器连接错误！提交失败！");</script>';
		echo '<script>window.location.href="./problemlist.php"</script>';
	}

	$insert = "INSERT INTO `trainningplatform`.`answer` (`id`,`username`, `problemid`, `path`,`time`) VALUES
		(NULL, '".$username."', '".$id."', '".$filedir."', CURRENT_TIMESTAMP);";
		
	$db->query($insert);
	$insert->free();
	$db->close();
	fclose($myfile);
	echo '<script>window.location.href = "./problemlist.php"</script>';
}

?>
