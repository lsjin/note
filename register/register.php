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
		
		//异常情况判断，避免错误输入
		if(!$user)
		{
			echo "用户名不能为空！<br/>";
		}
		else if((!$psw)||(!$psw_confirm))
		{
			echo "密码不能为空！<br/>";
		}
		
		$con=mysqlconnect($host_name,$user_name,$db_password);		//连接数据库
		if($con)
			echo "数据库连接成功啦！<br/>";
		//createdatabase($con,$db_name);				//创建数据库
		mysql_close($con);						//关闭数据库
	}
	//echo "here";
	//echo $db_password;
?>
