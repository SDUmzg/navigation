<!DOCTYPE html>
<html>
<head>
	<title>私の天地</title>
	<link rel="stylesheet" type="text/css" href="event.css">
</head>
<body>
	<div id="container">
		<div id="top">
			<div id="t_left">
				<p class="head_line">私の覚書</p>
			</div>
			<div id="t_right">
				<p class="head_line">私の随筆</p>
			</div>
		</div>
		<div id="left">
			<a href="memo.html" class="button" id="memo_button">添加备忘</a>
			<div class="content">
			 	<table id="mytable" cellspacing="0" style="float: right;">   
				<caption> </caption>   
				<tr>   
					<th scope="col">时间</th>   
					<th scope="col">事件</th>   
					<th scope="col">备注</th>   
				</tr>   
				<tr>   
					<td class="row">时 とき</td>   
					<td class="row">できごと</td>   
					<td class="row">別の</td>  
				</tr>


					<?php 
					include("function_package.php");
					$user_id=$_COOKIE["Login_Id"];
					$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
					$memo_id_select="select * from u_memo where  u_id='$user_id' order by m_id desc;";
					$user_memo=mysql_select($memo_id_select,$dbh);
					foreach ($user_memo AS $row)
					{
						echo "<tr>";
						$memo_id=$row[1];
						$memo_content_select="select * from memo where  id='$memo_id' ;";
						$memo_content=mysql_select($memo_content_select,$dbh);
						foreach ($memo_content AS $row1){
							echo "<td class='row'>",$row1[1],"</td>";
							echo "<td class='row'>",$row1[2],"</td>";
							echo "<td class='row'>",$row1[3],"</td>";

						}
						echo "</tr>";

					}			



					 ?>

				   
				</table>   
			</div>
		</div>
		<div id="right">
			<a href="essay.html" class="button" id="essay_button">添加随笔</a>
			<a href="../index.html" class="button" id="index_button">返回主页</a>
			<div class="content">
				<table id="mytable" cellspacing="0" >   
				<caption> </caption>   
				<tr>   
					<th scope="col">内容</th>   
					<th scope="col">时间</th>   
				</tr>   
				<tr>   
					<td class="row">ないよう</td>   
					<td class="row">时 とき</td>    
				</tr>   
					
					<?php 
					$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
					$user_id=$_COOKIE["Login_Id"];
					$essay_id_select="select * from u_essay where  u_id='$user_id' order by e_id desc ;";
					$user_essay=mysql_select($essay_id_select,$dbh);
					foreach ($user_essay AS $row)
					{
						echo "<tr>";
						$essay_id=$row[1];
						$essay_content_select="select * from essay where  id='$essay_id' ;";
						$essay_content=mysql_select($essay_content_select,$dbh);
						foreach ($essay_content AS $row1){
							echo "<td class='row'>",$row1[2],"</td>";
							echo "<td class='row'>",$row1[1],"</td>";

						}
						echo "</tr>";

					}			



					 ?>
					




				</table>   
			</div>
		</div>
	</div>
</body>
</html>