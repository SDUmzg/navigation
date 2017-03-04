<?php 
$id=$_POST["id"];
$password=$_POST["password"];
$re_password=$_POST["re_password"];
$name=$_POST["username"];
//echo $id,$password,$re_password;
if ($password==$re_password) {
	$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
	$user="insert into user values('$id','$name','$password');";
	$affected=$dbh->exec($user);
	if($affected==1){
		echo "注册成功，返回主页登陆";
		$url="../index.html";
 		echo "<script language='javascript' type=text/javascript>";
 		echo "setTimeout(function(){window.location.href='$url'},1500);";
 		echo "</script>";

	}else{
		echo "注册失败，请重试";
		$url="../index.html";
 		echo "<script language='javascript' type=text/javascript>";
 		echo "setTimeout(function(){window.location.href='$url'},1500);";
 		echo "</script>";

	}

}else{
	echo "两次密码不一致";
	$url="../index.html";
 	echo "<script language='javascript' type=text/javascript>";
 	echo "setTimeout(function(){window.location.href='$url'},1500);";
 	echo "</script>";

}
 

 ?>
