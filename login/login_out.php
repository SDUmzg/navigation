<?php 
setcookie("Login_Id", "", time()-3600,"/");
setcookie("Login_Password", "", time()-3600,"/");
setcookie("name", "", time()-3600,"/");
header("location:../index.html?req_url=".$_SERVER['REQUEST_URI']);
?>