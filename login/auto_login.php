<?php 
header('Content-Type:text/html;charset=utf-8');
session_start();
/*function checklogin(){  
	//检查一下session是不是已经配置
    if(empty($_SESSION['user_info'])){    
    	//如果session为空，并且用户没有选择记录登录状  
    	if(empty($_COOKIE['Login_Id']) || empty($_COOKIE['Login_Password'])){  
    		//转到登录页面，记录请求的url，登录后跳转过去，用户体验好。
    		header("location:login.html?req_url=".$_SERVER['REQUEST_URI']);  
    	}else{   
    		//用户选择了记住登录状态  
     		$user = getUserInfo($_COOKIE['Login_Id'],$_COOKIE['Login_Password']);   //去取用户的个人资料  
     		//用户名密码不对没到取到信息，转到登录页面  
     		if(empty($user)){    
     			header("location:login.html?req_url=".$_SERVER['REQUEST_URI']);  
     		}else{  //用户名和密码对了，把用户的个人资料放到session里面
     			$_SESSION['user_info'] = $user;     
     		}  
     	}  
    }  
}*/
function check_login(){
	if(empty($_SESSION['user_info'])){
		if((!empty($_COOKIE['Login_Id'])) && (!empty($_COOKIE['Login_Password']))){
			$user = getUserInfo($_COOKIE['Login_Id'],$_COOKIE['Login_Password']);
			if(!empty($user)){
				$_SESSION['user_info'] = $user;
				echo $_COOKIE['Login_Id'];
			}else{
				echo "null";
			}
		}else{
			echo "null";
		}
	}else{
		if((!empty($_COOKIE['Login_Id'])) && (!empty($_COOKIE['Login_Password']))){
			if(($_SESSION['user_info']['id']==$_COOKIE['Login_Id'])&&($_SESSION['user_info']['password']==$_COOKIE['Login_Password'])){
				echo $_COOKIE['Login_Id'];
			}else{
				echo "null";
			}
		}else{
			echo "null";
		}
	}
	
}
function getUserInfo($id,$paw){
	$dbh=new PDO('mysql:host=localhost;dbname=navigation;port=3306','myroot','1666188');
	$query="select * from user where  id='$id' ;";
	$result=$dbh->query($query);
	foreach ($result AS $row){
		if ($row[2]==$paw){
			return $row;
		}else{
			return FALSE;
		}
	}
}
check_login();
/*empty()函数详解
    * 格式：bool empty ( mixed var )
    * 功能：检查一个变量是否为空
    * 返回值：
    * 若变量不存在则返回 TRUE
    * 若变量存在且其值为""、0、"0"、NULL、、FALSE、 array()、var $var; 以及没有任何属性的对象，则返回 TURE
    * 若变量存在且值不为""、0、"0"、NULL、、FALSE、 array()、var $var; 以及没有任何属性的对象，则返回 FALSE
*/
?>