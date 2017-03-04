<?php 
header('Content-Type:text/html;charset=utf-8');
$Login_Id=$_POST["Login_User"];
$Login_Password=$_POST["Login_Password"];
//echo $Login_User,"<br/>",$Login_Password;
$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
$query="select * from user where  id='$Login_Id' ;";
$result=$dbh->query($query);
foreach ($result AS $row) {
	if ($row[2]==$Login_Password) {
		ini_set('session.gc_maxlifetime',24*3600);
		session_start();
		setcookie("PHPSESSID", session_id(), time()+86400,'/');
		setcookie("Login_Id", $Login_Id, time()+86400,'/');
		setcookie("Login_Password", $Login_Password, time()+86400,'/');
		setcookie("name", $row[1], time()+86400,'/');
		$_SESSION['user_info'] = $row;
		//echo $path;
		header("location:../index.html?req_url=".$_SERVER['REQUEST_URI']);
	}else{
		echo "账户或密码有误,请重新登录";
		$url="../index.html";
 		echo "<script language='javascript' type=text/javascript>";
 		echo "setTimeout(function(){window.location.href='$url'},1500);";
 		echo "</script>";
	}
}
?>