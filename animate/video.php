<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="referrer" content="never">
    <title>Title</title>
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

        .container {
            display: grid;
            grid-template-columns: 3fr 1fr;
            grid-template-rows: 1fr 320px;
            gap: 30px;
            width: auto;
            margin: 30px 10%;
        }

        .player {
            background: rgba(255, 255, 255, 0.8);
            box-sizing: border-box;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
        }

        .sidebar {
            background: rgba(255, 255, 255, 0.8);
            box-sizing: border-box;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
            /*min-height: 480px;*/
            /*max-height: 600px;*/
            /*overflow: auto;*/
        }

        .episode::-webkit-scrollbar{
            width: 0!important;
        }

        .comment {
            background: rgba(255, 255, 255, 0.8);
            box-sizing: border-box;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
        }

        .introduction {
            background: rgba(255, 255, 255, 0.8);
            box-sizing: border-box;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
        }

        #dplayer {
            /*min-height: 720px;*/
            margin: 2px;
        }

        h1 {
            margin: 20px;
            font-weight: normal;
        }

        .horizontal {
            display: block;
            clear: both;
            width: auto;
            height: 1px;
            margin: 24px 20px 24px 20px;
            background: #939393;
            overflow: hidden;
        }

        p{
            margin: 20px;
        }

        .episode{
            padding: 0px;
            display: grid;
            gap: 10px;
            min-height: 480px;
            max-height: 600px;
            overflow: auto;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr 1fr;
        }

        .list{
            width: auto;
            height: auto;
            cursor: pointer;
            background-color: rgb(255, 255, 255);
            border: 1px solid rgb(255, 255, 255);
            border-radius: 4px;
            box-sizing: border-box;
            margin: 5px;
            /*box-shadow: 2px 2px 10px 2px rgba(0, 0, 0, 0.3);*/
            transition: all .3s;
        }

        .list:hover{
            border: 1px solid rgb(55, 175, 255);
            box-shadow: 2px 2px 10px 2px rgba(55, 175, 255, 0.3);
            transition: all .3s;
        }

        .top{
            display: inline-block;
            width: 100%;
            height: 40px;
            line-height: 40px;
            cursor: pointer;
            text-align: center;
            border-bottom: 2px solid transparent;
            background: white;
            margin: 5px 5px 5px 5px;
            box-shadow: 2px 2px 10px 2px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

<div class="all">
    <div class="main">
        <iframe src="../header.php" class="header" scrolling="no"></iframe>

        <!--        <div class="top">-->
        <!---->
        <!--        </div>-->

        <div class="container">
            <div class="player">
                <div id="dplayer"></div>
            </div>

            <div class="sidebar">
                <div class="top">
                    选集
                </div>
                <div class="episode">
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
<!--                    <div class="list"></div>-->
                </div>
            </div>

            <div class="comment">
                <h1>这里显示番剧标题</h1>
                <div class="horizontal"></div>
                <p>
                    <span>播放量：</span>
                    <span>追番数：</span>
                    <span>弹幕数：</span>
                </p>
            </div>

            <div class="introduction">

            </div>
        </div>

        <div class="content">

        </div>

    </div>
</div>

<iframe src="../footer.html" class="footer" scrolling="no"></iframe>

</body>


<!--js部分-->
<script src="../../node_modules/dplayer/dist/DPlayer.min.js"></script>
<script type="text/javascript">
    const dp = new DPlayer({
        container: document.getElementById('dplayer'),
        screenshot: true,
        video: {
            url: 'demo.mp4',
            pic: 'demo.jpg',
            thumbnails: 'thumbnails.jpg',
        },
        subtitle: {
            url: 'webvtt.vtt',
        },
        danmaku: {
            id: 'demo',
            api: 'https://api.prprpr.me/dplayer/',
        },
    });
</script>
</html>