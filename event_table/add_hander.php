<?php 
include("function_package.php");
$choice=$_POST["choice"];
$user_id=$_COOKIE["Login_Id"];
$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
switch ($choice) {
	case 'memo':
		# code...
		echo "添加备忘...";
		$time=$_POST["time"];
		$event=$_POST["event"];
		$other=$_POST["other"];
		//echo $time,$event,$other;
		//$query1="insert $mychoice values(null,'$mytime','$content');";
		$insert_memo="insert into memo values(null,'$time','$event','$other');";
		//$memo_insert=mysql_insert($insert_memo,$dbh);
		do{
			$memo_insert=mysql_insert($insert_memo,$dbh);
		}while ($memo_insert=="fail");
		$lastid="select last_insert_id();";
		$result=mysql_select($lastid,$dbh);
		foreach ($result AS $row)
		{
			$memo_id=$row[0];
		}
		$insert_u_m="insert u_memo values('$user_id','$memo_id');";
		do{
			$u_m_insert=mysql_insert($insert_u_m,$dbh);
		}while ($u_m_insert=="fail");
		if($u_m_insert=="success"){
			echo "添加成功";
			$url="event.php";
 			echo "<script language='javascript' type=text/javascript>";
 			echo "setTimeout(function(){window.location.href='$url'},1500);";
 			echo "</script>";

		}
		break;

	case 'essay':
		# code...
		echo "添加随笔";
		$time=$_POST["time"];
		$content=$_POST["content"];
		$insert_essay="insert into essay values(null,'$time','$content');";
		do{
			$essay_insert=mysql_insert($insert_essay,$dbh);
		}while ($essay_insert=="fail");
		$lastid="select last_insert_id();";
		$result=mysql_select($lastid,$dbh);
		foreach ($result AS $row)
		{
			$essay_id=$row[0];
		}
		$insert_u_e="insert u_essay values('$user_id','$essay_id');";
		do{
			$u_e_insert=mysql_insert($insert_u_e,$dbh);
		}while ($u_e_insert=="fail");
		if($u_e_insert=="success"){
			echo "添加成功";
			$url="event.php";
 			echo "<script language='javascript' type=text/javascript>";
 			echo "setTimeout(function(){window.location.href='$url'},1500);";
 			echo "</script>";

		}


		break;
	
	default:
		# code...
		echo "非法登陆！";
		break;
}

 ?>