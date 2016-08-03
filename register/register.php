<?php

include '../mysql_lib/mysql_account.php';
include '../mysql_lib/mysql_basic_lib.php';

	if(isset($_POST["Submit"]) && $_POST["Submit"]=="提交注册")
	{
		//POST获取注册信息：用户名、密码、密码确认、验证码
		$user=$_POST["username"];
		$psw=$_POST["password"];
		$psw_confirm=$_POST["confirm"];
		$id_code=$_POST["idcode"];
		
		//echo "test";
		
		$con=mysqlconnect($host_name,$user_name,$db_password);		//连接数据库
		if($con)
			echo "数据库连接成功！<br/>";
		//createdatabase($con,$db_name);							//创建数据库
	}
	//echo "here";
	//echo $db_password;
?>