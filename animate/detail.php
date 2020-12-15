<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="referrer" content="never">
    <title>Mirai-番剧详情</title>

    <style>
        .circle_process{

            position: relative;
            top:0px;
            width: 199px;
            height : 200px;
        }
        .circle_process .wrapper{
            width: 100px;
            height: 200px;
            /*position: absolute;*/

            overflow: hidden;
        }
        .circle_process .right{
            right:0;
        }
        .circle_process .left{
            left:0px;
        }
        .circle_process .circle{
            width: 160px;
            height: 160px;
            border:20px solid transparent;
            border-radius: 50%;
            position: absolute;
            top:0;
            transform : rotate(-135deg);
        }
        .circle_process .rightcircle{
            border-top:20px solid #ffa726;
            border-right:20px solid #ffa726;
            right:0;
            -webkit-animation-name: circle_right;
            -webkit-animation-duration: 1s;
            -webkit-animation-timing-function: linear;
            -webkit-animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }
        .circle_process .leftcircle{
            border-bottom:20px solid #ffa726;
            border-left:20px solid #ffa726;
            left:0;
            -webkit-animation-name: circle_left;
            -webkit-animation-duration: 1s;
            -webkit-animation-timing-function: linear;
            -webkit-animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }
        @-webkit-keyframes circle_right{
            0%{
            -webkit-transform: rotate(-135deg);
            }
            50%,100%{
                -webkit-transform: rotate(45deg);
            }
        }
        @-webkit-keyframes circle_left{
            0%,50%{
                -webkit-transform: rotate(-135deg);
            }
            100%{
                -webkit-transform: rotate(45deg);
            }
        }
        * {
            margin: 0;
            padding: 0;
            border: 0;
            list-style: none;
            font-family:Microsoft Yahei,Tahoma,Helvetica,Arial,"\5B8B\4F53",sans-serif
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

        .top{
            width: 100%;
            height: 440px;
            text-align: center;
            box-sizing: border-box;
            border-radius: 0px;
            position: relative;
            top: -55px;

            overflow:hidden;

        }
        .top #bg{
            margin: -30px 0px -30px -100px;
            width: 120%;
            height: 500px;
            display:block;
            overflow: hidden;
            -webkit-filter: blur(20px);
            -moz-filter: blur(20px);
            -ms-filter: blur(20px);
            -o-filter: blur(20px);
            filter: blur(20px);
            object-fit: cover;
            text-align: center;
            vertical-align:middle;
            z-index: -1;
            position:absolute;
            top: 0px;
        }
        .top .text{
            z-index: 1;
            vertical-align: center;
        }
        .top .nei{
            vertical-align: center;
            width: 80%;
            height: 390px;
            margin: 0px auto;
            display: table;
            position: absolute;
            top:50px;
            left: 50%;
            transform: translate(-50%,0%);

        }
        .fjimg{
            width: 280px;
            height: 390px;
            float: left;
        }
        .top .nei #fj{
            margin: 25px 0px;
            width: 255px;
            /*height: 300px;*/
            border:5px solid #ffffff;
            border-radius: 5px;
            float: left;

            z-index: 0;
        }
        .title {
            text-align: left;
            min-width: 1000px;
            float: left;
            position: relative;
            top: 25px;
            display: inline;
            width: border-box;
            overflow: hidden;
            margin: 0 0 5px 20px ;
        }
        .title .title_name{
            color: #ffffff;
            font-size: 22px;
            overflow: hidden;
            line-height: 25px;
            text-overflow: ellipsis;
            font-weight: 700;
        }
        .title .title_tags{
            margin: 0 0 0 20px;
        }
        .title_tag{
            width: 1000px;
            font-size: 12px;
            vertical-align: middle;
            margin-right: 10px;
            height: 20px;
            padding: 0 4px;
            line-height: 20px;
            color: #ffffff;
            border: 1px solid #ffffff;
            border-radius: 3px;
        }
        .title_tag:hover{

            color: #088bcf;
            border: 1px solid #088bcf;
        }
        .data{
            float: left;
            position: relative;
            top: 60px;
            left: 10px;
        }
        .count{
            display:inline-block;
        }
        .count *{
            color: #ffffff;
            font-size: 14px;

        }

        .count .plays{
            max-width: 76px;
            width: 76px;
            text-indent:0;
            border-right: 1px solid  #ffffff;
            display: block;
            float: left;
            padding-right: 20px;


        }

        .count .plays span{
            line-height: 12px;

        }

        .count .plays em{
            width: 76px;
            padding-top: 15px;
            line-height: 17px;
            font-style: normal;
            font-weight:700 ;


        }
        .count .likes{
            max-width: 76px;
            width: 76px;
            text-indent:0;

            display: block;
            float: left;
            margin-left: 20px;
        }
        .count .likes span{
            line-height: 12px;
        }
        .count .likes em{
            width: 76px;
            padding-top: 15px;
            line-height: 17px;
            font-style: normal;
            font-weight:700 ;
        }
        .score {
            float: right;
        }
        .score .scorenumber{
            position:relative ;
            top:-120px

        }
        .score .scorenumber .scoretext{
            font-size: 40px;
            /*color: #ffa726;*/
            color: #ffffff;
            line-height: 40px;
            font-weight: 900;

        }

        .time {
            float: left;
            position: relative;
            display: block;
            top:147px;
            left: -175px;
            height: 17px;
            color: #ffffff;
            font-size: 12px;
        }
        .time span{
            margin-right: 20px;
        }
        .intro {
            text-align: left;
            float: left;
            width: 950px;
            position: absolute;
            display: block;
            top:235px;
            left: 300px;
            height: 17px;
            color: #ffffff;
            font-size: 14px;
        }
        .intro_text{

        }
        .btns{
            text-align: center;

            float: left;
            width:128px;
            height: 48px;
            background-color: #f36392;
            position: absolute;
            border-radius: 8px;
            cursor: pointer;
            top:300px;
            left: 300px;
            color: #ffffff;
            font-size: 14px;
        }
        .btn_like{
            vertical-align: center;
            display: inline-block;
        }
        .btn_like i{
            display: inline-block;
            vertical-align: -5px;
            width: 24px;
            height: 24px;
            margin-right: 7px;
            background-image: url(http://s1.hdslb.com/bfs/static/review/media/asserts/heart-bangumi.svg);
            background-repeat: no-repeat;
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
            <div class="nei">
                <div class="fjimg">
                    <img id="fj" src="http://i0.hdslb.com/bfs/bangumi/image/4179b4398bad6f92e876e352cae21be7b8ceb8bf.png">
                </div>
                <div class="title">
                    <span class="title_name" >鬼灭之刃</span>
                    <span class="title_tags">
                        <span class="title_tag">漫画改</span>
                        <span class="title_tag">战斗</span>
                        <span class="title_tag">热血</span>
                        <span class="title_tag">声控</span>
                    </span>
                </div>
                <div class="data">
                    <div class="count">
                        <span class="plays">
                            <span class="playslabel">总播放数</span>
                            <em>5.7亿</em>
                        </span>
                        <span class="likes">
                            <span class="likeslabel">追番人数</span>
                            <em>954.2万</em>
                        </span>
                    </div>

                </div>
                <div class="score">
                    <div class="circle_process">
                        <div class="wrapper right">
                            <div class="circle rightcircle"></div>
                        </div>

                        <div class="wrapper left">
                            <div class="circle leftcircle" id="leftcircle"></div>
                        </div>
                    </div>
                    <div class="scorenumber">
                        <span class="scoretext">10.0</span>
                    </div>
                </div>
                <div class="time">
                    <span>2019年4月7日开播</span>
                    <span>已完结, 全26话</span>
                </div>
                <div class="intro">
                    <span class="intro_text">简介：大正时期，日本。心地善良的卖炭少年·炭治郎，有一天他的家人被鬼杀死了。而唯一幸存下来的妹妹——祢豆子变成了鬼。被绝望的现实打垮的炭治郎，为了寻找让妹妹变回人类的方法，决心朝着“鬼杀队”的道路前进。人与鬼交织的悲哀的兄妹的故事，现在开始！</span>
                </div>

                <div class="btns">
                    <div class="like">
                        <div class="btn_like">
                            <i></i>
                                追番
                        </div>
                    </div>
                </div>
            </div>
            <img id="bg" src="http://i0.hdslb.com/bfs/bangumi/image/4179b4398bad6f92e876e352cae21be7b8ceb8bf.png">
        </div>

        <div class="content">

        </div>

    </div>
</div>

<iframe src="../footer.html" class="footer" scrolling="no"></iframe>
</body>
</html>