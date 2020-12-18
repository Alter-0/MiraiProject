<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>header</title>
    <style>

        body {
            font-family: "微软雅黑", Arial, Helvetica, sans-serif;
            font-size: 18px;
        }

        a {
            color: #ffffff;
            text-decoration: none;
            transition: all 0.3s;
        }

        a:hover {
            color: #6cc4ff;
            transition: all 0.3s;
        }

        section {
            height: 50px;
        }

        header {
            width: 100%;
            height: 50px;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
            position: absolute;
            top: 0;
            left: 0;
            z-index: 100;
        }

        header .con {
            width: auto;
            height: 50px;
            margin: 0 10%;
            text-align: center;
            position: relative;
        }

        header .con .left {
            float: left;
        }

        header .con .right {
            float: right;
        }

        header .con a {
            height: 50px;
            text-align: center;
            vertical-align: middle;
            padding-left: 15px;
        }

        header .con .right img {
            height: 40px;
            width: 40px;
            border: 1px solid #fff;
            border-radius: 50px;
            box-sizing: border-box;
            margin: 5px;
        }

        header .con .middle {
            display: inline-block;
            margin: 10px 10px 10px 0;
            opacity: 0.5;
            transition: all .5s;
        }

        header .con .middle:hover {
            opacity: 1;
            transition: all .5s;
        }

        header .con .middle input {
            width: 240px;
            height: 30px;
            border: 1px solid #fff;
            border-radius: 15px;
            color: #ffffff;
            line-height: 30px;
            background: rgba(0, 0, 0, 0);
            padding-left: 30px;
            box-sizing: border-box;
            background: url(image/search.png) 3px 3px no-repeat;
            margin: 0 auto;
            outline: none;
        }

        input::-webkit-input-placeholder {
            color: #fff;
        }

        * {
            cursor: url(image/mouse/arrow.cur), default;
        }

        img {
            transition: all 0.5s;
        }

        img:hover {
            filter: brightness(80%);
            transition: all 0.5s;
        }
    </style>
</head>

<?php
include "conn.php";
session_start();
if (empty($_SESSION["user_id"])) {
    $is_login = false;
    $url = "image/akari.jpg";
} else {
    $is_login = true;
    $user_id = $_SESSION["user_id"];
    $sql = "select avatar from user where user_id='$user_id'";
    $result = mysqli_query($conn, $sql) or die("数据查询失败");
    $row = mysqli_fetch_assoc($result);
    if(empty($row[0])){
        $url = "image/akari.jpg";
    }else{
        $url = $row[0];
    }

}

?>

<body>
<header>
    <div class="con">
        <section class="left">
            <!--logo-->
            <a href="main/main.php" target="_top">
                <img src="image/logo.png" alt="logo" height="50px" width="122px">
            </a>
            <!--新番-->
            <a href="animate/new.php" target="_top" class="text">
                新番
            </a>
        </section>

        <section class="right">
            <!--头像-->
            <a href="<?php
            if ($is_login == true) {
                echo "auth/user.php";
            } else {
                echo "auth/login.php";
            }
            ?>" target="_top">
                <img src="
                    <?php
                echo "$url";
                ?>" alt="">
            </a>
            <!--追番 若未登录则显示登录-->
            <a href="
                <?php
            if ($is_login == true) {
                echo "auth/user.php";
            } else {
                echo "auth/login.php";
            }
            ?>" target="_top" class="text">
                <?php
                if ($is_login == true) {
                    echo "追番";
                } else {
                    echo "登录";
                }
                ?>
            </a>
        </section>

        <section class="middle">
            <form action="index/index.php" target="_top" method="get">
                <label>
                    <input type="text" value="" name="key" placeholder="请输入要搜索的番剧">
                </label>
            </form>
        </section>
    </div>
</header>
</body>
</html>