<?php 
header('Content-Type:text/html;charset=utf-8');
include("function_package.php");
function get_cookie($url,$stuid,$pwd,$cookie_file)
{
	$post_data=array(
		"stuid"=>$stuid,
		"pwd"=>$pwd
		);

	$curl=curl_init();
	//设置抓取的url
	curl_setopt($curl, CURLOPT_URL,$url);
	//设置文件头信息作为数据流输出
	curl_setopt($curl, CURLOPT_HEADER, 0);//
	//设置获取的信息以文件流的形式返回，而不是直接输出
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	//设置post方式提交
	curl_setopt($curl, CURLOPT_POST, 1);
	//设置post数据
	curl_setopt($curl,CURLOPT_POSTFIELDS,$post_data);
	//储存cookie
	curl_setopt($curl,CURLOPT_COOKIEJAR,$cookie_file);
	//执行命令
	//$data=curl_exec($curl);
	curl_exec($curl);
	//关闭url请求
	curl_close($curl);
	//显示获得的数据
	/*$a=strpos($data,"ACCOUNT=");
	$result=substr($data,$a,30);
	return $result;*/
	return $cookie_file;
}
function load_sys($url_load,$url_table,$mycookie)
{
	$curl=curl_init();
	curl_setopt($curl, CURLOPT_URL,$url_load);
	curl_setopt($curl, CURLOPT_HEADER, 0);//
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//
	curl_setopt($curl, CURLOPT_COOKIEFILE, $mycookie);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_exec($curl);
	///echo $contents;
	curl_close($curl);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url_table );
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
	curl_setopt($ch, CURLOPT_COOKIEFILE, $mycookie);
	$html=curl_exec($ch);
	curl_close($ch);
	return $html;
}

/**
way=0   未登录 无本地cookie学号	已登录 无本地cookie学号
way=1   未登录 有本地cookie学号

*/
$stuid=$_POST["stuid"];
$pwd=$_POST["pwd"];
$load=$_GET["load"];
$stu=$_GET["stu"];
$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
$query="select * from student where  stu_id='$stuid' ;";
$result=$dbh->query($query);
foreach ($result AS $key=>$row){
	$check_stu_id_if_load=$row[0];
}
if(strlen($check_stu_id_if_load)!=0){
	//echo $check_stu_id_if_load;
	if(!empty($_COOKIE['Login_Id'])){
		$Login_Id=$_COOKIE['Login_Id'];
		$insert_u_s="insert u_student values('$Login_Id','$stuid');";
		do{
			$u_s_insert=mysql_insert($insert_u_s,$dbh);
			//echo $u_c_insert,"u_c_insert";
		}while ($u_s_insert=="fail");
		$update_stu="update student set state='1' where stu_id='$stuid';";
		do{
			$stu_update=mysql_insert($update_stu,$dbh);
			//echo $u_c_insert,"u_c_insert";
		}while ($stu_update=="fail");
	}
	setcookie("stuid", $stuid, time()+86400,'/');
	header("location:class_table.html");
}else{
$url_cookie="http://jwxt.sdu.edu.cn:7890/pls/wwwbks/bks_login2.login";
//$stuid="201400301185";
//$pwd="166618";
$url_load="http://jwxt.sdu.edu.cn:7890/zhxt_bks/zhxt_bks.html";
$url_table="http://jwxt.sdu.edu.cn:7890/pls/wwwbks/xk.CourseView";
//创建一个临时文件  删除时用tempnam
$cookie_file=tempnam("./temp","cookie");
$mycookie=get_cookie($url_cookie,$stuid,$pwd,$cookie_file);
var_dump($mycookie);
$content=load_sys($url_load,$url_table,$mycookie);
unlink($cookie_file);
/*$handle=fopen("stu_class.txt", "w");
fwrite($handle, $content);
fclose($handle);*/
//$html=strrchr($content,"</TABLE>");
$content = iconv("gbk","utf-8//IGNORE",$content);
$start=strrpos($content, "<table");
$HTML=substr($content, $start);
/*$handle=fopen("stu_class.txt", "w");
fwrite($handle, $HTML);
fclose($handle);
echo $HTML;*/
$arr=explode("TR", $HTML);
/*$handle=fopen("stu_class.txt", "w");
foreach ($arr as $key => $value) {
	# code...
	fwrite($handle, $key);
	fwrite($handle, $value);
     ".*(?<=a=)(.*)(?=aa).*"
     ".*>.*(\&nbsp;).*"
}
fclose($handle);*/
/*$handle=fopen("stu_class.txt", "w");
fwrite($handle, );
fclose($handle);*/
//$exer=$arr[1];
//$matches= array();
//preg_match_all("/(?<=center\">)(.*)(?=\&nbsp;)/",$exer,$matches);
/*foreach ($matches as $key => $value) {
	foreach ($value as $key => $value1) {
		var_dump(trim($value1));
	}
	var_dump($value);
	
}*/
$matches=array();
for ($i=0; $i < (count($arr)-1)/2; $i++) { 
	$a=2*$i+1;
	$exer=$arr[$a];
	preg_match_all("/(?<=center\">)(.*)(?=\&nbsp;)/",$exer,$matches[$i]);
}
//var_dump($matches);
$insert_s="insert student values('$stuid','$load');";
do{
	$s_insert=mysql_insert($insert_s,$dbh);
	//echo $u_c_insert,"u_c_insert";
}while ($s_insert=="fail");
if($load==1){
	$user_id=$_COOKIE["Login_Id"];	
	$insert_u_s="insert u_student values('$user_id','$stuid');";
	do{
		$u_s_insert=mysql_insert($insert_u_s,$dbh);
		//echo $u_c_insert,"u_c_insert";
	}while ($u_s_insert=="fail");
}

for ($x=0; $x <count($matches) ; $x++) { 
	//echo "x",$x ;
	//echo "<br/>";
	$insert_str="";
	for($y=0;$y<count($matches[$x][0]);$y++){
		//echo $y,"space";
		//这里是数据库插入的地方
		//$insert_str=$insert_str."$matches[$x][0][$y]".",";
		//var_dump($matches[$x][0][$y]);
		//echo "space","<br/>";
		//$insert_str=$insert_str."'".$matches[$x][0][$y]."'".",";
		//输出    '软件工程(双语)','','sd03030561','1','必修','考试','软件园1区205d','3-3','3-14周上',
		if($y==7||$y==8){
			if ($y==7) {
				//在这处理星期几第几节课上课
				preg_match("/^[1-7]+(?=-)/",$matches[$x][0][$y],$day);
				//echo "week:  ";
				//echo $week[0];  //这是上课星期几
				$insert_str=$insert_str."'".$day[0]."'".",";
				preg_match("/(?<=-)[1-7]+/",$matches[$x][0][$y],$class);
				//echo "day:  ";   //这是那一节大课
				//echo $day[0];
				$insert_str=$insert_str."'".$class[0]."'".",";
			}else{
				if(strlen($matches[$x][0][$y])>0){
				//在这里处理上课周数
				preg_match("/(^[0-9]*(?=-))/",$matches[$x][0][$y],$start_week);
				$insert_str=$insert_str."'".$start_week[0]."'".",";
				//echo "start_week",$start_week[0];
				preg_match("/((?<=-)[0-9]*(?=.*))/",$matches[$x][0][$y],$end_week);
				$insert_str=$insert_str."'".$end_week[0]."'";
				//echo "end_week",$end_week[0];
				}else{
					$insert_str=$insert_str."'".""."'".",";
					$insert_str=$insert_str."'".""."'";
				}
			}
		}else{
			$insert_str=$insert_str."'".$matches[$x][0][$y]."'".",";
		}

	}
	$insert_str="insert into course values(null,".$insert_str.");";
	do{
		$course_insert=mysql_insert($insert_str,$dbh);
		//echo $course_insert,"course_insert";
	}while ($course_insert=="fail");
	$lastid="select last_insert_id();";
	$result=mysql_select($lastid,$dbh);
	foreach ($result AS $row)
	{
		$course_id=$row[0];
	}
	$insert_s_c="insert stu_course values('$stuid','$course_id');";
	do{
		$s_c_insert=mysql_insert($insert_s_c,$dbh);
		//echo $u_c_insert,"u_c_insert";
	}while ($s_c_insert=="fail");
	if($s_c_insert=="success"){
		echo "添加成功";
		$url="event.php";
 		//echo "<script language='javascript' type=text/javascript>";
 		//echo "setTimeout(function(){window.location.href='$url'},1500);";
 		//echo "</script>";

	}




	//echo $insert_str;
	//输出类似这样   '计算机网络(双语)','','sd03030361','1','必修','考试','软件园1区201d','1','3','3','17'
	echo "<br/>";

	
}
setcookie("stuid", $stuid, time()+86400,'/');
header("location:class_table.html");
}
 ?>
