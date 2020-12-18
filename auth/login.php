<!doctype html>
<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
    <title>Mirai-登录</title>
	  <link rel="shortcut icon" href="../image/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/default.css">
    <link rel="stylesheet" type="text/css" href="../css/loading.css">

    <script src="../js/jquery.js"></script>
    <script src="../js/loading.js"></script>
    <script src="../js/sakura.js"></script>
    <script src="../js/mouse_click.js"></script>
</head>
<style>
	*{
		margin: 0;
		padding: 0;
		border: 0;
	}
	#mid{
		height: 80%;
		width: auto;
		margin: 0 10%;
		position: relative;
		white-space: nowrap;
		margin-top: 5%;
		margin-bottom: 5%;
		box-sizing: border-box;
	}
	.left{
		height: 100%;
		width: 60%;
		float: left;
		background: url("../image/user_background.jpg") center center;
		background-size: cover;
		box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
		border-radius: 15px;
		border-top-right-radius: 0;
		border-bottom-right-radius: 0;
	}
	#img1{
		height: 100%;
		width: 100%; 
	}
	#right{
		height: 100%;
		width: 40%;
		background-color: #ffffff;
		float: left;
		overflow: hidden;
		background-color:rgba(255,255,255,0.8);
		box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
		border-radius: 15px;
		border-top-left-radius: 0;
		border-bottom-left-radius: 0;
	}
	#table{
		width: 80%;
		height: 80%;
		padding:10% 10%;
	}
	#logo{
		width: 100%;
		height: 20%;
		margin-bottom: 10%;
		margin-left: 32%;
		margin-top: 10%;
	}
	.img{
		height: 40px;
		margin: auto auto;
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
		width: 75%;
		height: 40px;
		margin-bottom: 24px;
		display: block;
		margin-left: 10%;
		
	}
	#pass{
		border: 1px solid #d9d9d9;
		box-sizing: border-box;
		border-radius: 4px;
		transition: all .3s;
		line-height: 2;
		color: (0,0,0,.65);
		background: url("../image/search.png") 3px 3px no-repeat;
		width: 75%;
		height: 40px;
		margin-bottom: 24px;
		display: block;
		margin-left: 10%;
		padding-left: 30px;
	}
	#submit{
		border: 1px solid #d9d9d9;
		box-sizing: border-box;
		border-radius: 4px;
		transition: all .3s;
		line-height: 2;
		margin-bottom: 105px;
		background-color: #1890ff;
		width: 75%;
		height: 40px;
		display: block;
		margin-left: 10%;
	}
	#submit:hover{
		background-color: rgba(0,0,0,0.2);
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
	#btm a:hover{
		color: darkred;
	}
    .header {
            width: 100%;
            height: 50px;
            position: relative;
            z-index: 1000;
        }
	</style>
<body>
<iframe src="../header.php" class="header" scrolling="no"></iframe>
<div class="main" >
		<div id="mid" class="main">
			<img alt=""  class="left" id="">
			<div id="right">
				<div id="table">
				<div id="logo"  >
					<img class="img" alt="" src="../image/logo.png">
					</div>
				<div id="form">
				<form id="login-form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<input type="text" id="name" name="user_name"  value="" placeholder="用户名" >
					<input type="password" id="pass" value=""  name="user_pass" placeholder="密码">
					<input type="submit" id="submit" value="登录">
				</div>
				<div id="btm">
				<a href="reg.php">注册</a>
				</div>
			</div>
			</div>		
	</div>
</div>
<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	$user_name=$_POST["user_name"];
	$user_pass=$_POST["user_pass"];
	include "../conn.php";
	$sql="Select * from user where account='$user_name' and password='$user_pass'";
	$result=mysqli_query($conn,$sql)or die("查询失败，请检查sql语句");
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0){
			$_SESSION["user_id"]=$row['user_id'];
			header("location:../main/main.php");
	}else{
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('用户名或密码错误');";
			echo "</script>";
	}
	}
	?>
</body>
<script>
    const bg_card = document.getElementsByClassName('main')[0];

    var normalWidth = window.innerWidth;
    var normalHeight = window.innerHeight;

    $(window).on('load', function () {
        bg_card.style.height = normalHeight - 50 + "px";
    });

    window.onresize = function () {
        if (normalWidth > window.innerWidth || normalHeight < normalHeight.innerHeight) {
            bg_card.style.height = window.innerHeight - 50 + "px";
        }
        if (normalWidth < window.innerWidth || normalHeight > normalHeight.innerHeight) {
            bg_card.style.height = window.innerHeight - 50 + "px";
        }
    }


</script>
</html>