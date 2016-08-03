<?php
/*--------------------------------------------
数据库函数
依赖：mysql_account.php
函数：
1.mysqlconnect()    //连接数据库
2.creatdatabase()	//新建数据库

修改日期：2016.07.30
--------------------------------------------*/

//include '../mysql_lib/mysql_account.php';


function mysqlconnect($host_name,$user_name,$db_password)
{
	$con = mysql_connect($host_name,$user_name,$db_password);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	else{
		//echo "连接成功";
		return $con;
	}
}

function createdatabase($con,$db_name)
{
	if(mysql_query("CREATE DATABASE $db_name",$con))
	{
		echo "Database created";
	}
	else
	{
		echo "Error creating database: " .mysql_error();
	}
}

//------------------------ Test -----------------------------
//mysqlconnect($host_name,$user_name,$db_password);

?>