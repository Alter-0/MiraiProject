<!doctype html>
<?php
session_start();
?>
<html>
<head>
	<script src="../js/jquery.js"></script>
    <meta charset="UTF-8">
    <title>user</title>
	<script src="../js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/default.css">
</head>
<style>
	#top2{
		width: auto;
		margin: 0 10%;
		height: 250px;
		margin-top:30px;
	}
	#main{
		width:100%;
		height: 250px;
/*		background: url("../image/new_banner1.png")*/
		background: url(<?php
				include "../conn.php";
			$user_id=$_SESSION['user_id'];
			$sql="select background from user where user_id='$user_id'";
			$result=mysqli_query($conn,$sql)or die("注册失败，请检查sql语句");
			$row=mysqli_fetch_assoc($result);
			if(empty($row['backgroud'])){
				echo "../image/new_banner1.png";
			}else{
			echo $row;
			}
			?>) center center;
		background-size: cover;
		border-radius: 10px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}
	#main_xinxi{
		width: auto;
		height: 64px;
		padding-top: 170px;
		margin-left: 30px;
		position: relative;
	}
	#touxiang{
/*		background-image: url("../image/001.jpg");*/
		background-image: url(<?php
			include "../conn.php";
			$user_id=$_SESSION['user_id'];
			$sql="select avatar from user where user_id='$user_id'";
			$result=mysqli_query($conn,$sql)or die("注册失败，请检查sql语句");
			$row=mysqli_fetch_assoc($result);
			if(empty($row['avatar'])){
				echo "../image/001.jpg";
			}else{
				echo $row;
			}
			?>);
		height: 64px;
		width: 64px;
		border-radius: 50%;
		box-shadow: rgba(255,255,255,0.7) 0px 0px 2px 3px;
		overflow: hidden;
		margin-right: 20px;
		background-size: cover;
		background-position: center;
		display: inline-block;
		float: left;
	}
	#name{
		display:inline-block;
		float: left;
	}
	#username{
		font-weight: 700;
		line-height: 18px;
		font-size: 18px;
		vertical-align: middle;
		color: rgb(255,255,255);
	}
	#dengji{
		background-color: rgb(45,183,245);
		margin-left: 10px;
		font-size: 12px;
		border: 1px solid #d9d9d9;
		border-radius: 4px;
	}
	#dengchu{
		background-color: rgb(255,85,0);
		font-size: 12px;
		margin-left: 8px;
		padding: 0 7px;
		border: 1px solid #d9d9d9;
		border-radius: 4px;
	}
	#dengchu:hover{
		background-color: burlywood;
	}
	#mid{
		height: 47px;
		width: auto;
		margin: 0 10%;
		margin-bottom: 30px;
	}
	#mid_main{
		width: 100%;
		height: 100%;
		border-radius: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
		background-color: #fff;
		margin-bottom: 30px;
		background-color:rgba(255,255,255,0.8);
		box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
	}
	.tab_de{
		height: 500px;
		width: 100%;
	}
	.bottom{
		height: 500px;
		width: auto;
		margin: 0 10%;
	}
	#bottom{
		width: 100%;
		height: 500px;;
		background-color: #fff;
		border-radius: 10px;
		background-color:rgba(255,255,255,0.8);
		box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
/*		margin-bottom: 30px;*/
	}
	#mid_main ul{
		margin-left: 40px;
		position: relative;
		top: 20px;
		font-size: 15px;
	}
	#mid_main ul li{
		float: left;
		color: #222;
		line-height: 5px;
		width: 92px;
		height: 40px;
	}
	#mid_main ul li+li{
		margin-left: 28px;
	}
	#mid_main ul li.on ,#mid_main ul li:hover{
		color:#0835EB;
/*
		border-bottom: 2px solid;
		border-bottom-color: #0835EB;
*/
	}
	#shezhi{
		width:100%;
		height: auto;
	}
	.bottom_label{
		width:100px;
		float: left;
		margin-top: 40px;
		margin-left: 30px;
	}
	.bottom_xinxi{
		margin-top: 30px;
		height: 200px;
		width: 430px;
		float: left;
	}
	.bottom_touxiang{
		margin-top: 30px;
		float: left;
	}
	#account{
		height: 40px;
		width: 100%;
		margin-bottom: 30px;
		background-color: #f5f5f5;
		border: 1px solid #F9F6F6;
		border-radius: 5px;
	}
	#email{
		height: 40px;
		width: 100%;
		margin-bottom: 30px;
		background-color: #f5f5f5;
		border: 1px solid #F9F6F6;
		border-radius: 5px;
	}
	#jianjie{
		width: 100%;
		height: 100px;
		border: 1px solid #C5AFAF;
		border-radius: 5px;
		margin-bottom: 30px;
	}
	#submit{
		border: 1px solid #d9d9d9;
		box-sizing: border-box;
		border-radius: 4px;
		transition: all .3s;
		line-height: 2;
		padding-left: 0px;
		width: 100px;
		height: 40px;
		margin-bottom: 20px;
		background-color: #1890ff;
	}
	#submit:hover{
		background-color: rgba(0,0,0,0.2);
	}
	#label_name{
		margin-bottom: 50px;
		text-align: right;
	}
	#label_pass{
		margin-bottom: 50px;
		text-align: right;
	}
	#label_jianjie{
		text-align: right;
	}
	#bottom1{
		width: 100%;
		height: 500px;
		background-color: #fff;
		border-radius: 5px;
		display: none;
		background-color:rgba(255,255,255,0.8);
		box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
/*		margin-bottom: 30px;*/
	}
	#shezhi2{
		width:auto;
		height: 400px;;
		margin: 0 3%;
	}
	.animate_over{
		width: 100%;
		padding-top: 20px;
		padding-bottom: 20px;
	}
	.animate_over ul li {
		padding-top: 10px;
		margin: 0 2%;
		width: auto;
		
	}
	
	#l{
		width:100px;
		float: left;
		margin-top: 40px;
		margin-left:60px;
		display: inline-block;
	}
	#r{
		margin-top: 30px;
		height: 20px;
		width: auto;
		float: left;
		display: inline-block;
	}
	#l ul{
		font-size: 14px;
	}
	#l ul li{
		float:inherit;
		color: #222;
		line-height: 5px;
		width: 92px;
		height: 40px;
		border-right: 2px solid #f4f5f7;
	}
	#l ul li:hover, #l ul li.on{
		color:#0835EB;
		border-right-color:  #0835EB ;
	}
	#bottom2{
		width: 100%;
		height: 500px;
		background-color: #fff;
		border-radius: 10px;
		display: none;
		background-color:rgba(255,255,255,0.8);
		box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
	}
	#shezhi3{
		width:100%;
		height: auto;
	}
	#l1{
		width:100px;
		float: left;
		margin-top: 40px;
		margin-left:60px;
		display: inline-block;
	}
	#r1{
		margin-top: 30px;
		height: 20px;
		width: auto;
		float: left;
		display: inline-block;
	}
	#l1 ul{
		font-size: 14px;
	}
	#l1 ul li{
		float:inherit;
		color: #222;
		line-height: 5px;
		width: 92px;
		height: 40px;
		border-right: 2px solid #f4f5f7;
	}
	#l1 ul li:hover{
		color:#0835EB;
		border-right:  #0835EB thick;
	}
	#shuju1{
		margin-left: 300px;
		margin-top: 30px;
		width: auto;
		height: auto;
		text-align:left;
	}
    .header {
            width: 100%;
            height: 50px;
            position: relative;
            z-index: 1000;
        }
	.footer {
        width: 100%;
        height: 165px;
        }
	#all{
		margin-bottom: 370px;
	}
  	.animate_cover{
     width: 50%;
     height: 50%;
     max-width: 150px;
     max-height: 200px;
     box-sizing: border-box;
     border-radius: 10px;
     box-shadow: 3px 3px 20px 3px rgba(0, 0, 0, 0.3);
     display: block;
     object-fit: cover;
     transition: all 0.5s;
     }
	.right{
		height: 280px;
		width: 100%;
		float: left;
	}
	.animate{
		height: 230px;
		width: 15%;
		padding-top: 10px;
		float: left;
		margin-left: 1%;
		margin-right: 1%;
	}
	.animate_cover{
		width: 100%;
		height: 200px;
	}
    .animate_name{
      	padding-top: 10px;
      	text-align: center;
      	font-size: 16px;
     }
	.animate_name a {
       color: black;
       text-decoration: none;
       transition: all 0.3s;
       display: block;
       z-index: 10;
     }
	.animate_over a img{
		width: 100%;
		height: 100%;
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 3px 3px 20px 3px rgba(0, 0, 0, 0.3);
	}
     .animate_name  a:hover {
            color: #37afff;
    }
	.animate_over a img:hover{
            filter: brightness(80%);
            transition: all 0.5s;
	}
	</style>
<body>
<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	$user_name=$_POST["account"];
	$user_email=$_POST["email"];
	$user_jianjie=$_POST["jianjie"];
	$user_id=$_SESSION["user_id"];
	//连接数据库
	include "../conn.php";
	$sql="select * from user where account=$user_name";
	$result=mysqli_query($conn,$sql) or die("查询失败，请检查SQL语法");
		if(mysqli_num_rows($result)>0){
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('用户已经注册，请设置其他用户名');";
			echo "</script>";
		}else{
		$sql="update user set username='$user_name',email='$user_email',introduction='$user_jianjie' where user_id='$user_id'";
		$result=mysqli_query($conn,$sql)or die("注册失败，请检查sql语句");
		}
	}
	?>
<div id="all">
	<iframe src="../header.php" class="header" scrolling="no"></iframe>
	<div id="top2">
		<div id="main">
			<div id="main_xinxi">
				<div id="touxiang" ></div>
				<div id="name">
					<span id="username">
						<?php
//						echo $_SESSION["user"];
						include "../conn.php";
						$user_id=$_SESSION['user_id'];
						$sql="select * from user where user_id='$user_id'";
						$result=mysqli_query($conn,$sql)or die("注册失败，请检查sql语句");
						$row=mysqli_fetch_assoc($result);
						if(empty($row['username'])){
							echo $row['account'];
						}else{
							echo $row['username'];
						}
						?>
						<span id="dengji">lv1</span>
						<a  href="../main/main.php" id="dengchu" style="color: #fff">登出</a>
					</span>
				</div>
				</div>
		</div>
	</div>
	<div id="mid">
		<div id="mid_main">
		<ul class="ul">
			<li onClick="changeTab(this)" class="on">设置</li>
			<li onClick="changeTab(this)">订阅</li>
			<li onClick="changeTab(this)">账号</li>
			</ul>
		</div>
	</div>
	<div class="bottom">
		<div class="tab_de">
		<div id="bottom">
			<div id="shezhi">
				<div class="bottom_label">
					<div id="label_name">用户名：</div>
					<div id="label_pass">邮箱：</div>
					<div id="label_jianjie">简介：</div>
				</div>
				<div class="bottom_xinxi">
					<div id="form">
						<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
							<input type="text" name="account" id="account"><br>
							<input type="email" name="email" id="email"><br>
							<textarea id="jianjie" name="jianjie"></textarea><br>
							<input type="submit" name="submit" id="submit" value="提交">
						</form>

					</div>
				</div>
				<div class="bottom_touxiang"></div>
			</div>
	</div>
		<div id="bottom1">
				<div id="shezhi2">
				<div class="animate_over">
					<ul>
						<li>
						<div class="right">
						
						<?php
                        $user_id=$_SESSION["user_id"];
                        $sql="select * from likes,animate where user_id='$user_id' and likes.animate_id=animate.animate_id";
                        $result=mysqli_query($conn,$sql)or die("请检查sql语句");

                        while($row=mysqli_fetch_assoc($result)){
                            $cover=$row['cover'];
                            $name=$row['name'];
                            $animate_id=$row['animate_id'];
                            echo"
							<div class='animate'>
								<div class='animate_cover'>
									<a href='../animate/detail.php?animate_id=$animate_id'>
									<img src='$cover' alt=''>
									</a>
								</div>
								<div class='animate_name'>
									<a href='../animate/detail.php?animate_id=$animate_id'>$name</a>
								</div>
								</div>
							";
                       
						}
						?>
						</div>
						</li>
					</ul>
				</div>
		</div>
		</div>
		<div id="bottom2">
		<div id="shezhi3">
		<div id="l1">
			<ul>
				<li>等级余额</li>
				<li>套餐升级</li>
				<li>历史订单</li>
			</ul>
		</div>
		<div id="r1">
			<div id="shuju1">暂无数据</div>
		</div>
		</div>
		</div>
		</div>
	</div>
</div>
<iframe src="../footer.html" class="footer" scrolling="no"></iframe>
<script>
	var tabs = document.getElementById('mid_main').getElementsByTagName('li');
    var contents=document.querySelectorAll(".tab_de>div");


    function changeTab(tab) {
        for(var i = 0, len = tabs.length; i < len; i++) {
            if(tabs[i] === tab) {
                tabs[i].className = 'on';
                contents[i].style.display = 'block';

            } else {
                tabs[i].className = '';
                contents[i].style.display = 'none';
            }
        }
    }
</script>
</body>
</html>