<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>小马哥的课表</title>
	<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="tablecloth/tablecloth.js"></script>
	<script src="..\js\jquery.js"></script>
	<script type="text/javascript">
		/*$(document).ready(function() {
			var data=getUrlData("stu_ids");
			//$("#test").append(data);	
			var url="sel_stu.php?stu_ids="+data;
			$.get(url, function(data) {
				$("#content").append(data);
			});
		});
		function getUrlData(name) {  
        	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");  
        	var r = window.location.search.substr(1).match(reg);  
        	if (r != null) return unescape(r[2]);  
        	return null;  
    	} */ 
	</script>
<style>

body{
	margin:0;
	padding:0;
	background:#f1f1f1;
	font:70% Arial, Helvetica, sans-serif; 
	color:#555;
	line-height:150%;
	text-align:left;
}
a{
	text-decoration:none;
	color:#057fac;
}
a:hover{
	text-decoration:none;
	color:#999;
}
h1{
	font-size:140%;
	margin:0 20px;
	line-height:80px;	
}
h2{
	font-size:120%;
}
#container{
	margin:0 auto;
	width:100%;
	background:#fff;
	padding-bottom:20px;
}
#content{margin:0 20px;}
p.sig{	
	margin:0 auto;
	width:680px;
	padding:1em 0;
}
form{
	margin:1em 0;
	padding:.2em 20px;
	background:#eee;
}
.black {
	color: #d7d7d7;
	border: solid 1px #333;
	background: #333;
	background: -webkit-gradient(linear, left top, left bottom, from(#666), to(#000));
	background: -moz-linear-gradient(top,  #666,  #000);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#666666', endColorstr='#000000');
}
.black:hover {
	background: #000;
	background: -webkit-gradient(linear, left top, left bottom, from(#444), to(#000));
	background: -moz-linear-gradient(top,  #444,  #000);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#444444', endColorstr='#000000');
}
.black:active {
	color: #666;
	background: -webkit-gradient(linear, left top, left bottom, from(#000), to(#444));
	background: -moz-linear-gradient(top,  #000,  #444);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#666666');
}
.button {
	display: inline-block;
	zoom: 1; 
	*display: inline;
	vertical-align: baseline;
	margin: 0 2px;
	outline: none;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	font: 14px/100% Arial, Helvetica, sans-serif;
	padding: .5em 2em .55em;
	text-shadow: 0 1px 1px rgba(0,0,0,.3);
	-webkit-border-radius: .5em; 
	-moz-border-radius: .5em;
	border-radius: .5em;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	box-shadow: 0 1px 2px rgba(0,0,0,.2);
}
.button:hover {
	text-decoration: none;
}
.button:active {
	position: relative;
	top: 1px;
}
</style>
</head>
<body>
<div>
	<a href='..\index.html' class='black button' style='margin: 10px 50px 10px 10px;'>返回主页</a>
	<a href='del_stu.php' class='black button' style='margin: 10px 0 10px 50px;'>无痕退出</a>
</div>
<div id="container">
	<h1>小马哥的课程表</h1>
	<div id="content">			

<?php 
header('Content-Type:text/html;charset=utf-8');
//date("Ymd")
//$first_week_day=mktime(0,0,0,9,12,2016);
$first_week_day="2016-9-11";
$current_week=current_week("2016-9-11");
$load=$_GET["load"];
$stu=$_GET["stu"];
if($load==0&&$stu==1){
	//stu_ids={"list":["201400301185"]}
	$stu_ids='{"list":["'.$_COOKIE["stuid"].'"]}';
}elseif ($load==1&&$stu==1) {
	$stu_ids='{"list":["'.$_COOKIE["stuid"].'"]}';
}elseif($load==1&&$stu==0){
	session_start();
	$stu_ids=$_SESSION["stu_json"];
	//echo $stu_ids;
}else{
	//$load==0&&$stu==0
	echo "error";
}


$stu_json=json_decode($stu_ids);
//var_dump($stu_json->list);
$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
for ($i=0; $i <count($stu_json->list); $i++) { 
	$stuId=$stu_json->list[$i];
	$class_table='<h2>学号 ： '.$stuId.'      第'.$current_week.'周'.'</h2>
		
		<table cellspacing="0" cellpadding="0">
			<tr class="odd">
				<th class="">项目</th>
				<th class="">星期一</th>
				<th class="">星期二</th>
				<th class="">星期三</th>
				<th class="">星期四</th>
				<th class="">星期五</th>
				<th class="">星期六</th>
				<th class="">星期日</th>							
			</tr>
			<tr class="even">
				<th class="">第一节</th>
				<td class="">11</td>
				<td class="">21</td>
				<td class="">31</td>
				<td class="">41</td>
				<td class="">51</td>
				<td class="">61</td>
				<td class="">71</td>						
			</tr>			
			<tr class="odd">
				<th class="">第二节</th>
				<td class="">12</td>
				<td class="">22</td>
				<td class="">32</td>
				<td class="">42</td>
				<td class="">52</td>
				<td class="">62</td>
				<td class="">72</td>							
			</tr>			
			<tr class="even">
				<th class="">第三节</th>
				<td class="">13</td>
				<td class="">23</td>
				<td class="">33</td>
				<td class="">43</td>
				<td class="">53</td>
				<td class="">63</td>
				<td class="">73</td>							
			</tr>			
			<tr class="odd">
				<th class="">第四节</th>
				<td class="">14</td>
				<td class="">24</td>
				<td class="">34</td>
				<td class="">44</td>
				<td class="">54</td>
				<td class="">64</td>
				<td class="">74</td>							
			</tr>
			<tr class="even">
				<th class="">第五节</th>
				<td class="">15</td>
				<td class="">25</td>
				<td class="">35</td>
				<td class="">45</td>
				<td class="">55</td>
				<td class="">65</td>
				<td class="">75</td>								
			</tr>
			<tr class="odd">
				<th class="">第六节</th>
				<td class="">16</td>
				<td class="">26</td>
				<td class="">36</td>
				<td class="">46</td>
				<td class="">56</td>
				<td class="">66</td>
				<td class="">76</td>								
			</tr>
			<tr class="even">
				<th class="">第七节</th>
				<td class="">17</td>
				<td class="">27</td>
				<td class="">37</td>
				<td class="">47</td>
				<td class="">57</td>
				<td class="">67</td>
				<td class="">77</td>								
			</tr>																													
	</table>';

	$classes="select c_id from stu_course where stu_id=$stuId;";
	$result=mysql_select($classes,$dbh);
	foreach ($result AS $row0)
	{
		$c_id=$row0[0];
		$insert_class="select course_name,course_room,class_day,class_order,start_week,end_week from course where id=$c_id;";
		$all_class=mysql_select($insert_class,$dbh);
		foreach ($all_class AS $row1){
			$course_name=$row1["course_name"];
			$course_room=$row1["course_room"];
			$class_day=$row1["class_day"];
			$class_order=$row1["class_order"];
			$start_week=($row1["start_week"]==0?1:$row1["start_week"]);
			$end_week=($row1["end_week"]==0?20:$row1["end_week"]);
			//echo $course_name,$course_room,$class_day,$class_order,"     ",$start_week,"   ",$end_week,"</br>";
			if(($start_week<=$current_week)&&($end_week>=$current_week)){
				$replace_class=$course_name."<br/>".$course_room;
				$class_table=insert_table($class_day,$class_order,$replace_class,$class_table);
			}

		}

	}
	$class_table=clear_table($class_table);
	echo $class_table;

}
function insert_table($col,$row,$class,$all_table){
	$class_id=$col.$row;
	$class_location="/(?<=>)".$class_id."(?=<)/";
	$all_table=preg_replace($class_location,$class,$all_table);
	return $all_table;
}
function clear_table($all_table){
	$class_location="/(?<=>)[1-7][1-7](?=<)/";
	$all_table=preg_replace($class_location," ",$all_table);
	return $all_table;
}
function mysql_select($select_word,$dbh){
	$result=$dbh->query($select_word);
	return $result;
}
//$first_week 表示第一周的最后一天（即星期天） 2016/9/11
function current_week($first_week_day){
	$current_day=date("Y-m-d");
	$days=get_days($first_week_day, $current_day)+7;
	$current_week=ceil($days/7);
	return $current_week;
}
function get_days($date1, $date2)
{
$time1 = strtotime($date1);
$time2 = strtotime($date2);
return ($time2-$time1)/86400;
}
 ?>



 	</div>
</div>
</body>
</html>
