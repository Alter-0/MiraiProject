<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="referrer" content="never">
    <title>Mirai-新番时间表</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            list-style: none;
            user-select: none
        }

        body {
            background: url(../image/background.jpg) no-repeat center center fixed;
            /*background: #fff;*/
            background-size: cover;
            display: flex;
            flex-direction: column;
        }

        .all {
            min-height: 100%;
            flex: 1;
            /*position: relative;*/
            margin-bottom: -165px;
        }

        /*.main {*/
        /*    width: 100%;*/
        /*    height: 200px;*/
        /*    position: relative;*/
        /*}*/

        .top {
            width: auto;
            height: 300px;
            margin: 30px 10% 30px 10%;
            background: url(../image/new_banner1.png) center;
            background-size: cover;
            /*background: #fff;*/
            text-align: center;
            box-sizing: border-box;
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
        }

        .top .text {
            vertical-align: center;
        }

        .top h1 {
            line-height: 300px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 80px;
            font-family: 幼圆;
            vertical-align: center;
            text-align: left;
            margin: 0 10%;
            position: relative;
            text-shadow: 10px 10px 20px rgba(0, 0, 0, 0.8);
        }

        .content {
            width: auto;
            height: auto;
            margin: 30px 10% 200px 10%;
            background: rgba(255, 255, 255, 0.8);
            text-align: center;
            box-sizing: border-box;
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
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

        .box {
            height: auto;
            margin: 20px 20px 20px 40px;
            padding-top: 30px;
            box-sizing: content-box;
            border-left: 2px solid #8c9299;
            overflow: hidden;
        }

        li {
            height: 280px;
            text-align: left;
            vertical-align: top;
            padding-top: 10px;
            margin-left: 5%;
            font-size: 20px;
            /*list-style-type: disc;*/
        }

        .week {
            float: left;
            margin-right: 20px;
            display: block;
            clear: both;
        }

        .right {
            width: 160px;
            height: 280px;
            margin-left: 1%;
            float: left;
        }

        .out_right{
            height: auto;
            width: 100%;
            margin-left: 60px;
        }

        img {
            width: 100%;
            height: 100%;
            max-width: 150px;
            max-height: 200px;
            box-sizing: border-box;
            border-radius: 10px;
            box-shadow: 3px 3px 20px 3px rgba(0, 0, 0, 0.3);
            display: block;
            object-fit: cover;
            transition: all 0.5s;
        }

        img:hover {
            filter: brightness(80%);
            transition: all 0.5s;
        }

        .text {
            padding-top: 10px;
            text-align: center;
            font-size: 16px;
        }

        a {
            color: black;
            text-decoration: none;
            transition: all 0.3s;
            display: block;
        }

        a:hover {
            color: #37afff;
        }

    </style>
</head>

<?php


function animate($week)
{
    include "../conn.php";
    $sql = "select animate_id,name,cover,up_date,is_finish from animate where is_finish=0";
    $result = mysqli_query($conn, $sql) or die("数据查询失败");

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['is_finish'] == 0) {
            if (strcmp($row['up_date'], $week) == 0) {
                echo "
<div class='right'>
<div class='fan'>
<a href='detail.php?$row[animate_id]'>
<img src='$row[cover]' alt=''>
</a>
<div class='text'>
<a href='detail.php?$row[animate_id]'>$row[name]</a>
</div>
</div>
</div>";
            }
        }
    }
}

function week(){
    $weekarray=["周日",];
}

?>

<body>
<div class="all">
    <div class="main">
        <iframe src="../header.php" class="header" scrolling="no"></iframe>
        <div class="top">
            <div class="text">
                <h1>新 番 导 视</h1>
            </div>
        </div>

        <div class="content">
            <div class="box">
                <ul>
                    <li>
                        <div class="week">
                            <span>周一</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周一'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span>周二</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周二'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span>周三</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周三'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span>周四</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周四'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span>周五</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周五'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span>周六</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周六'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span>周日</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周日'); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<iframe src="../footer.html" class="footer" scrolling="no"></iframe>
</body>
</html>