<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="referrer" content="never">
    <title>Mirai-新番时间表</title>
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <style>
        .all {
            min-height: 100%;
            flex: 1;
            margin-bottom: -165px;
        }

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
            margin: 20px 20px 20px 20px;
            padding-top: 30px;
            box-sizing: content-box;
            /*border-left: 2px solid #8c9299;*/
            overflow: hidden;
        }

        li {
            height: 280px;
            text-align: left;
            vertical-align: top;
            padding-top: 10px;
            margin-left: 2%;
            margin-right: 2%;
            font-size: 20px;
            /*list-style-type: disc;*/
        }

        li:after {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            left: -5.5px;
            top: 10px;
            box-sizing: border-box;
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
            position: relative;
        }

        .out_right {
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
            z-index: 10;
        }

        a:hover {
            color: #37afff;
        }

        .fan {
            position: relative;
        }

        .over {
            width: 40px;
            height: 30px;
            background: rgba(101, 101, 101, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 20;
            box-sizing: border-box;
            border-radius: 10px 0 10px 0;
            text-align: center;
            vertical-align: center;
            color: white;
            font-size: 20px;
        }

    </style>
</head>

<?php


function animate($week)
{
    include "../conn.php";
    $sql = "select animate_id,name,cover,up_date,is_finish,index_show from animate where is_finish=0";
    $result = mysqli_query($conn, $sql) or die("数据查询失败");

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['is_finish'] == 0) {
            if (strcmp($row['up_date'], $week) == 0) {
                $num = $row['index_show'];
                preg_match_all('/\d+/', $num, $res);
                $num = join('', $res[0]);
                echo "
                <div class='right'>
                    <div class='fan'>
                        <div class='over'>
                        $num
                        </div>
                        <a href='detail.php?animate_id=$row[animate_id]'>
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
                            <span <?php
                            if (date("w", time()) == 1) {
                                echo "style='color: rgb(244, 115, 115)'";
                            }
                            ?>>周一</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周一'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span <?php
                            if (date("w", time()) == 2) {
                                echo "style='color: rgb(244, 115, 115)'";
                            }
                            ?>
                            >周二</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周二'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span <?php
                            if (date("w", time()) == 3) {
                                echo "style='color: rgb(244, 115, 115)'";
                            }
                            ?>
                            >周三</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周三'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span <?php
                            if (date("w", time()) == 4) {
                                echo "style='color: rgb(244, 115, 115)'";
                            }
                            ?>
                            >周四</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周四'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span <?php
                            if (date("w", time()) == 5) {
                                echo "style='color: rgb(244, 115, 115)'";
                            }
                            ?>
                            >周五</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周五'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span <?php
                            if (date("w", time()) == 6) {
                                echo "style='color: rgb(244, 115, 115)'";
                            }
                            ?>
                            >周六</span>
                        </div>
                        <div class="out_right">
                            <?php animate('周六'); ?>
                        </div>
                    </li>
                    <li>
                        <div class="week">
                            <span <?php
                            if (date("w", time()) == 0) {
                                echo "style='color: rgb(244, 115, 115)'";
                            }
                            ?>
                            >周日</span>
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