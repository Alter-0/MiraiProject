<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="referrer" content="never">


    <?php
    include "../conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $video_id = $_GET["video_id"];
        //更新数据部分
        $sql = "update video set views=views+1 where video_id=$video_id";
        $result_update = mysqli_query($conn, $sql) or die("数据查询失败");

        //查询部分
        $sql = "select * from video where video_id=$video_id";
        $result_video = mysqli_query($conn, $sql) or die("数据查询失败");
        $row_video = mysqli_fetch_assoc($result_video);
        $animate_id = $row_video['animate_id'];

        $sql = "select * from animate where animate_id=$animate_id";
        $result_animate = mysqli_query($conn, $sql) or die("数据查询失败");
        $row_animate = mysqli_fetch_assoc($result_animate);

        $sql = "select * from video where animate_id=$animate_id";
        $result_video_list = mysqli_query($conn, $sql) or die("数据查询失败");
    } else {
        $video_id = 100001;
    }

    ?>
    <title>Mirai-
        <?php
        echo $row_animate['name'] . "-第" . $row_video['no'] . "集";
        ?></title>

    <!--引入dplayer-->
    <link rel="stylesheet" href="../res/DPlayer.min.css"/>
    <script src="../res/md5.js"></script>
    <script src="../res/flv.js"></script>
    <script src="../res/hls.js@latest.js"></script>
    <script src="../res/DPlayer.min.js"></script>

    <!-- 引用部分@blueberry -->
    <script src="../js/main.js"></script>
    <!-- 引用部分@blueberry -->
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
            box-shadow: 3px 3px 10px 3px rgba(0, 0, 0, 0.3);
            display: block;
            object-fit: cover;
            transition: all 0.5s;
            text-align: center;
            margin: 20px auto auto auto;
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
            grid-template-rows: 1fr auto;
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
        }

        .episode::-webkit-scrollbar {
            width: 0 !important;
        }

        .comment {
            background: rgba(255, 255, 255, 0.8);
            box-sizing: border-box;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
        }

        .info {
            background: rgba(255, 255, 255, 0.8);
            box-sizing: border-box;
            border-radius: 15px;
            padding: 10px;
            box-shadow: 5px 5px 20px 5px rgba(0, 0, 0, 0.3);
        }

        #dplayer {
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

        p {
            margin: 20px;
        }

        .episode {
            padding: 0;
            display: grid;
            gap: 10px;
            height: auto;
            overflow: auto;
        }

        .list {
            width: auto;
            height: auto;
            min-height: 60px;
            cursor: pointer;
            background-color: rgb(255, 255, 255);
            border: 1px solid rgb(255, 255, 255);
            border-radius: 4px;
            box-sizing: border-box;
            margin: 5px;
            transition: all .3s;
        }

        .list:hover {
            border: 1px solid rgb(55, 175, 255);
            box-shadow: 2px 2px 10px 2px rgba(55, 175, 255, 0.3);
            transition: all .3s;
        }

        .top {
            display: inline-block;
            width: 100%;
            height: 40px;
            line-height: 40px;
            cursor: pointer;
            text-align: center;
            border-bottom: 2px solid rgb(55, 175, 255);
            border-radius: unset;
            background: none;
            margin: 0 0 10px 0;
            padding: 0 10px 0 10px;
            box-shadow: none;
        }

        h3 {
            margin: 20px auto auto auto;
            font-weight: normal;
            text-align: center;
        }

        .introduce p {
            text-indent: 2em;
        }

        .list img {
            width: 90px;
            height: 50px;
            box-shadow: none;
            display: inline-block;
            margin: 5px 10px 5px 5px;
            vertical-align: center;
            float: left;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
            background-size: cover;
        }

        .list span {
            width: 100%;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .list .text {
            height: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            -webkit-box-pack: center;
            justify-content: center;
            align-items: flex-start;
        }

        .list a {
            height: 60px;
        }
    </style>
</head>

<body>

<div class="all">
    <div class="main">
        <iframe src="../header.php" class="header" scrolling="no"></iframe>

        <div class="container">
            <div class="player">
                <div id="dplayer"></div>
            </div>

            <div class="sidebar">
                <div class="top">
                    选集
                </div>
                <div class="episode">
                    <?php
                    while ($row_video_list = mysqli_fetch_assoc($result_video_list)) {
                        echo "
                        <div class='list'>
                            <a href='video.php?video_id=$row_video_list[video_id]' target='_self'>
                                <img src='$row_video_list[cover]' alt=''>
                                <div class='text'>
                                    <span>$row_video_list[no]-$row_video_list[name]</span>
                                </div>
                            </a>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>

            <div class="comment">
                <h1>
                    <?php
                    echo "第" . $row_video['no'] . "集-" . $row_video['name'];
                    ?>
                </h1>
                <div class="horizontal"></div>
                <p>
                    <span>播放量：
                        <?php
                        echo $row_video['views'];
                        ?>
                    </span>
                    <span><br><br>追番数：
                        <?php
                        echo $row_animate['likes'];
                        ?>
                    </span>
                </p>
            </div>

            <div class="info">
                <div class="cover">
                    <a href="
                    <?php
                    echo "detail.php?animate_id=" . $animate_id;
                    ?>">
                        <img src="
                        <?php
                        echo $row_animate['cover'];
                        ?>
                        " alt="">
                    </a>
                </div>
                <div class="title">
                    <a href="
                    <?php
                    echo "detail.php?animate_id=" . $animate_id;
                    ?>">
                        <h3>
                            <?php
                            echo $row_animate['name'];
                            ?>
                        </h3>
                    </a>
                </div>
                <div class="introduce">
                    <p>
                        <?php
                        echo $row_animate['introduction'];
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="content">

        </div>

    </div>
</div>

<iframe src="../footer.html" class="footer" scrolling="no"></iframe>

</body>

<!--js部分-->
<script type="text/javascript">
    const dp = new DPlayer({
        container: document.getElementById('dplayer'),
        screenshot: true,
        theme: 'white',
        preload: '60s',
        video: {
            url: '<?php echo $row_video['url'] ?>',
            pic: '<?php echo $row_video['cover'] ?>',
            thumbnails: 'thumbnails.jpg',
        },
        subtitle: {
            url: 'webvtt.vtt',
        },
        danmaku: {
            id: 'demo',
            api: 'https://api.prprpr.me/dplayer/',
            addition: ['https://danmu.u2sb.top/api/danmu/dplayer/v3/bilibili?aid=62996239'],
        },
    });

    const video_card = document.getElementsByClassName('dplayer')[0];
    const episode_card = document.getElementsByClassName('episode')[0];


    var normalWidth = window.innerWidth;
    var normalHeight = window.innerHeight;

    $(window).on('load', function () {
        episode_card.style.height = video_card.clientHeight - 46 + "px";
    });

    window.onresize = function () {
        if (normalWidth > window.innerWidth || normalHeight < normalHeight.innerHeight) {
            episode_card.style.height = video_card.clientHeight - 46 + "px";
        }
        if (normalWidth < window.innerWidth || normalHeight > normalHeight.innerHeight) {
            episode_card.style.height = video_card.clientHeight - 46 + "px";
        }
    }

</script>
</html>