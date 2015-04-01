
<?php
header("Content-type: text/html; charset=utf-8");
$problemname = trim($_POST['problemname']);
$input = trim($_POST['input']);
$output = trim($_POST['output']);
$problemdescription = trim($_POST['problemdescription']);
$year = trim($_POST['year']);
$month = trim($_POST['month']);
$day = trim($_POST['day']);
$hour = trim($_POST['hour']);
$min = trim($_POST['min']);
$sec = trim($_POST['sec']);
$timelimit = trim($_POST['timelimit']);
$spacelimit = trim($_POST['spacelimit']);

$str = $year."-".$month."-".$day." ".$hour.":".$min.":".$sec;
$starttimestamp = mktime();
$endtimestamp = strtotime($str);
$endtime = strftime("%F %T", $endtimestamp);


//存入数据库的路径
$db = new mysqli("127.0.0.1", "traindbusr", "QMy2cwUWUh", "trainningplatform");
if(mysqli_connect_errno())
{
	echo "error";
}
$db->query("SET NAMES UTF8");
$problemname = addslashes($problemname);
$timelimit = addslashes($timelimit);
$spacelimit = addslashes($spacelimit);
$endtime = addslashes($endtime);
$problemdescription = addslashes($problemdescription);
$input = addslashes($input);
$output = addslashes($output);
$insert = "INSERT INTO `trainningplatform`.`problem` (`ID`, `name`, `TL`, `ML`, `ST`, `ET`, `description`, `input`, `output`, `ACNUM`) VALUES (NULL, '".$problemname."', '".$timelimit."', '".$spacelimit."', CURRENT_TIMESTAMP, '".$endtime."', '".$problemdescription."', '".$input."', 'output', '0');";
echo $insert;
$result = $db->query($insert);
echo $result;
$db->close();

$db1 = new mysqli("127.0.0.1", "traindbusr", "QMy2cwUWUh", "trainningplatform");
$db1->query("SET NAMES UTF8");
if(mysqli_connect_errno())
{
	echo "error";
}
$query = 'select * from problem where name = "'.$problemname.'" ORDER BY `ID` ASC;';
echo $query;

$result = $db1->query($query);
if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$problemid = $row['ID'];
}
$problemid = stripslashes($problemid);

echo $problemid."<br />";

$ori_path = "./TPD/problem/".$problemid;
mkdir($ori_path, 0777, true);
echo "<script>alert(Successful);</script>";
$inputpath = $ori_path."/input";
$outputpath = $ori_path."/output" ;
$descriptionpath = $ori_path."/description";

echo $inputpath."<br />";
echo $outputpath."<br />";
echo $descriptionpath."<br />";

$fpin = fopen($inputpath, "w");
$fpout = fopen($outputpath, "w");
$fpdes = fopen($descriptionpath, "w");

fwrite($fpin, $input);
fwrite($fpout, $output);
fwrite($fpdes, $problemdescription);

fclose($fpin);
fclose($fpout);
fclose($fpdes);

system("python replace.py ".$inputpath);
system("python replace.py ".$outputpath);
system("python replace.py ".$descriptionpath);

$answer_dir = $ori_path."/answer";
$cpp_dir = $answer_dir."/cpp";
$java_dir = $answer_dir."/java";
$py_dir = $answer_dir."/py";
$html_dir = $answer_dir."/html";
$php_dir = $answer_dir."/php";
echo $answer_dir;
mkdir($answer_dir, 0777, true);
mkdir($cpp_dir, 0777, true);
mkdir($java_dir, 0777, true);
mkdir($py_dir, 0777, true);
mkdir($html_dir, 0777, true);
mkdir($php_dir, 0777, true);

$update = "update problem set input = '".$inputpath."', output = '".$outputpath."', description = '".$descriptionpath."'  where name = '".$problemname."'";
$db1->query($update);
$db1->close();


?>
