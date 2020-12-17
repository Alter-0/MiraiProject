<!doctype html>
<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
    <title>login</title>
	<link rel="stylesheet" type="text/css" href="../css/default.css">
</head>
<style>
	
	#top{
		width: 100%;
		height: 60px;
		position: relative;
	}
	#mid{
		height: 560px;
		width: 100%;
		position: relative;
	}
	#bottom{
		height: 150px;
		width: 100%;
		position: relative;
	}
	.left{
		height: 100%;
		width: 860px;
		margin-top: 0px;
		margin-left: 170px;
		float: left;
	}
	#right{
		height: 100%;
		width: 380px;
		float: left;
		background-color: #ffffff;
	}
	#table{
		width: 380px;
		padding: 20px 40px;
		margin-top: 60px;
	}
	#logo{
		margin-left: 130px;
		font-size: 5em;
		margin-bottom: 60px;
	}
	.img{
		height: 40px;
	}
	#name{
		border: 1px solid #d9d9d9;
		box-sizing: border-box;
		border-radius: 4px;
		transition: all .3s;
		line-height: 2;
		color: (0,0,0,.65);
		background: url("../image/search.png") 3px 3px no-repeat;
		padding-left: 30px;
		width: 300px;
		height: 40px;
		margin-bottom: 24px;
	}
	#pass{
		border: 1px solid #d9d9d9;
		box-sizing: border-box;
		border-radius: 4px;
		transition: all .3s;
		line-height: 2;
		color: (0,0,0,.65);
		background: url("../image/search.png") 3px 3px no-repeat;
		padding-left: 30px;
		width: 300px;
		height: 40px;
		margin-bottom: 24px;
	}
	#submit{
		border: 1px solid #d9d9d9;
		box-sizing: border-box;
		border-radius: 4px;
		transition: all .3s;
		line-height: 2;
		padding-left: 30px;
		width: 300px;
		height: 40px;
		margin-bottom: 24px;
		background-color: #1890ff;
	}
	#btm{
		width: 300px;
		display: flex;
		align-items: center;
		webkit-box-pack:justify;
		justify-content:space-between;
		webkit-box-align:center;
	}
	#btm a{
		color: #1890ff;
		text-decoration: none;
		background-color: transparent;
	}
    .header {
            width: 100%;
            height: 50px;
            position: relative;
            z-index: 1000;
        }
	</style>
<body>
<div id="main" >
	<iframe src="../header.php" class="header" scrolling="no"></iframe>
	<div id="top" align="center"></div>
		<div id="mid">
			<img alt=""  class="left" src="../image/background.jpg" id="">
			<div id="right">
				<div id="table">
				<div id="logo">
					<img  class="img" src="../image/003.jpg" alt="">
					</div>
				<div id="form">
				<form id="login-form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<span >
					<input type="text" id="name" name="user_name"  value="" placeholder="用户名" >
					</span><br>
					<span class="password">
					<span></span>
					<input type="password" id="pass" value=""  name="user_pass" placeholder="密码">
					</span>
					<input type="submit" id="submit" value="登录">
					</form>
				</div>
				<div id="btm">
				<a href="reg.php">注册</a>
				<a href="reg.php">重置密码</a>
				</div>
			</div>
			</div>		
	</div>
	<div id="bottom"></div>
</div>
<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	$user_name=$_POST["user_name"];
	$user_pass=$_POST["user_pass"];
	include "../conn.php";
	$sql="Select * from user where account='$user_name' and password='$user_pass'";
	$result=mysqli_query($conn,$sql)or die("查询失败，请检查sql语句");
	if(mysqli_num_rows($result)>0){
			$_SESSION["user"]=$user_name;
			header("location:http://localhost/MiraiProject/main/main.php");
	}else{
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('用户名或密码错误');";
			echo "</script>";
	}
	}
	?>
</body>
</html>