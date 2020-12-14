<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

        .top{
            width: auto;
            height: 300px;
            margin: 30px 10% 30px 10%;
            background: url(../image/new_banner1.png) center;
            background-size: cover;
            /*background: #fff;*/
            text-align: center;
            box-sizing: border-box;
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0,0,0,0.3);
        }

        .top .text{
            vertical-align: center;
        }

        .top h1{
            line-height: 300px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 80px;
            font-family: 幼圆;
            vertical-align: center;
            text-align: left;
            margin: 0 10%;
            position: relative;
            text-shadow: 10px 10px 20px rgba(0,0,0,0.8);
        }

        .content{
            width: auto;
            height: 2000px;
            margin: 30px 10% 200px 10%;
            background: rgba(255,255,255,0.8);
            text-align: center;
            box-sizing: border-box;
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0,0,0,0.3);
        }

        .header{
            width: 100%;
            height: 50px;
            position: relative;
            z-index: 1000;
        }

        .footer {
            width: 100%;
            height: 165px;
        }

        li{
            line-height: 250px;
            text-align: left;
            margin-left: 5%;
        }


    </style>
</head>
<body>
<div class="all">
    <div class="main">
        <iframe src="../header.php" class="header" scrolling="no"></iframe>
        <div class="top">
            <div class="text">
                <h1>新番导视</h1>
            </div>
        </div>

        <div class="content">
            <ul>
                <li>
                    周一
                </li>
                <li>
                    周二
                </li>
                <li>
                    周三
                </li>
                <li>
                    周四
                </li>
                <li>
                    周五
                </li>
                <li>
                    周六
                </li>
                <li>
                    周日
                </li>
            </ul>
        </div>

    </div>
</div>

<iframe src="../footer.html" class="footer" scrolling="no"></iframe>
</body>
</html>