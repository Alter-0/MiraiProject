<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>reg</title>
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
		width: 100%;
		padding: 20px 40px;
		margin-top: 20px;
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
	#repass{
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
	#email{
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
	.tishi{
		color: #CC1F22;
	}
    .header {
            width: 100%;
            height: 50px;
            position: relative;
            z-index: 1000;
        }
	</style>
<body>
<?php 
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	$user_name=$_POST["user_name"];
	$user_pass=$_POST["user_pass"];
	$user_email=$_POST["user_email"];
	$user_repass=$_POST["user_repass"];
	//连接数据库
	include "../conn.php";
	$sql="select * from user where account=$user_name";
	$result=mysqli_query($conn,$sql) or die("查询失败，请检查SQL语法");
		if(mysqli_num_rows($result)>0){	
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('用户已经注册，请设置其他用户名');";
			echo "</script>";
		}else if($user_pass==$user_repass){
		$sql="insert into user(account,password,email)values('$user_name','$user_pass','$user_email');";
		$result=mysqli_query($conn,$sql)or die("注册失败，请检查sql语句");
		header("location:http://localhost/main/login.php");
		}else{
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('两次密码输入不一致');";
			echo "</script>";
		}
	}

?>
<div id="main" >
	<iframe src="../header.php" class="header" scrolling="no"></iframe>
	<div id="top" align="center"></div>
		<div id="mid">
			<img alt=""  class="left" src="../image/background.jpg" id="">
			<div id="right">
				<div id="table">
				<div id="logo">
					<img class="img" alt="" src="../image/003.jpg">
					</div>
				<div id="form">
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<span class="name">
					<input type="text" id="name" value="" name="user_name" placeholder="用户名">
					</span>
					<span class="password">
					<input type="password" id="pass" value="" name="user_pass"placeholder="密码">
					</span><br>
					<span class="password">
					<input type="password" id="repass" value="" name="user_repass" placeholder="再输入一次密码">
					</span><br>
					<span class="password">
					<input type="email" id="email" value=""  name="user_email" placeholder="邮箱">
					</span>
					<input type="submit" id="submit" value="注册">
					</form>
				</div>
				<div id="btm">
				<a href="login.php">登录</a>
				
				</div>
				</div>
			</div>
	</div>
	<div id="bottom"></div>	
</div>
</body>
</html>