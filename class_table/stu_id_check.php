<?php 
header('Content-Type:text/html;charset=utf-8');
session_start();
//echo $_POST['u_id'];  输出类似这样  Id=1666188122@qq.com
$id=substr($_POST['u_id'],3);
$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
$query="select stu_id from u_student where  u_id='$id' ;";
$result=$dbh->query($query);
$stu_id = array();
foreach ($result AS $key=>$row){
	$stu_id[$key]=$row[0];
}
$stu_json="{"."\"list\":".json_encode($stu_id)."}";
echo $stu_json;
$_SESSION["stu_json"]=$stu_json;
?>