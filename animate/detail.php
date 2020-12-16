<!DOCTYPE html>
<html lang="en">
<?php
//$conn = mysqli_connect("localhost", "root", "", "web_design") or die("数据库连接失败");
include "../conn.php";
mysqli_query($conn,'set names utf8');
if(empty($_GET["animate_id"])){
    die("出错！！！！！！");
}
$animate_id=$_GET["animate_id"];
//$animate_id="100001";
$infosql="select * from animate where animate_id='$animate_id'";
$result=mysqli_query($conn,$infosql) or die("失败".$infosql);
$animateinfo=mysqli_fetch_array($result);
$animatecover=$animateinfo["cover"];

$animatescore=(float)$animateinfo["score"];
$tagssql="select * from tags where animate_id='$animate_id'";
$tagsresult=mysqli_query($conn,$tagssql) or die("失败".$tagssql);


$user_id="100001";
$usersql="select * from likes where user_id='".$user_id."' and animate_id='$animate_id'";
$userresult=mysqli_query($conn,$usersql) or die("失败".$usersql);


?>
<head>
    <script src="../js/jquery.js"></script>

    <!-- 引用部分@blueberry -->
    <script src="../js/main.js"></script>
    <!-- 引用部分@blueberry -->

    <meta charset="UTF-8" name="referrer" content="never">
    <title><?php
        echo $animateinfo["name"];
        ?>_番剧_MIRAI</title>

    <style>
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
        .circle_process{

            position: absolute;
            top:20px;
            width: 199px;
            height : 200px;
            right: 0px;
        }
        .circle_process .wrapper{
            width: 100px;
            height: 200px;
            position: absolute;

            overflow: hidden;
        }
        .circle_process .wrapper.left{
            width: 100px;
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
            overflow: hidden;
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
            overflow: hidden;
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
            overflow: hidden;
        }
        @-webkit-keyframes circle_right{
            0%{
            -webkit-transform: rotate(-135deg);
            }
            50%,100%{
                -webkit-transform: rotate(<?php
                if ($animatescore<5){
                    echo (-135+(36*$animatescore));
                }elseif ($animatescore>=5){
                    echo 45;
                }
                 ?>deg);
            }
        }
        @-webkit-keyframes circle_left{
            0%,50%{
                -webkit-transform: rotate(-135deg);
            }
            100%{
                -webkit-transform: rotate(<?php
                if ($animatescore<5){
                    echo -135;
                }elseif ($animatescore>=5){
                    echo (-135+(36*($animatescore-5)));
                }
                 ?>deg);
            }
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
            -webkit-filter: blur(20px) brightness(50%);
            -moz-filter: blur(20px);
            -ms-filter: blur(20px);
            -o-filter: blur(20px);
            filter: blur(20px) brightness(50%);

            object-fit: cover;
            text-align: center;
            vertical-align:middle;
            z-index: -1;
            position:absolute;
            top: 0px;
        }
        .top{
            z-index: 1;
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
            z-index: 1;
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
            position: absolute;
            top: 80px;
            left: 290px;
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
            position:absolute ;
            top:105px;
            right: 87px;

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
            position: absolute;
            display: inline-block;
            top:175px;
            left: 300px;
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
            top:225px;
            left: 300px;
            height: 17px;
            color: #ffffff;
            font-size: 14px;
        }
        .intro_text{

        }
        .btns{

            float: left;
            display: inline-block;
            position: absolute;

            top:300px;
            left: 300px;

        }
        .btn_like:hover{
            background-color: rgb(255,133,173);
        }
        .btn_like{
            vertical-align: center;
            display: inline-block;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            line-height: 50px;
            color: #ffffff;
            font-size: 16px;
            transition: all .3s ease 0s;
            width:128px;
            height: 48px;
            background-color: #f36392;
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
        .btn_liked{
            width:120px;
            height: 40px;
            line-height: 42px;
            background-color: hsla(0,0%,100%,0.12);
            border: 4px solid hsla(0,0%,100%,0.5);
            text-shadow: 0 0 4px rgba(0,0,0,0.6);
        }
        .btn_liked:hover{
            background-color: hsla(0,0%,100%,0.12);
        }
        .btn_liked i{

            vertical-align: -6px;
            background-image: url(http://s1.hdslb.com/bfs/static/review/media/asserts/icons.png);
            background-position: -660px -1938px;

        }

        .tab_nav{
            position: relative;
            height: 60px;
            /*background-color: #FFFFFF;*/
            background: rgba(255,255,255,0.8);
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0,0,0,0.3);
            top:-40px;
            width: 80%;
            margin: 0 10% 11px 10%;
        }
        .tab_nav ul{
            font-size: 16px;
            margin-left: 40px;

            position: relative;
            top:-3px;
        }
        .clearfix{

        }

        .tab_nav ul li{
            cursor: pointer;
            float: left;
            padding: 0 6px 0px 6px;
            color: #222;
            transition: all 0.1s linear;
            border-bottom: 3px solid rgba(0,0,0,0);
            height: 60px;
            line-height:60px;
            /*position: relative;*/
            /*top:60px;*/
        }
        .tab_nav ul li+li{
            margin-left:28px ;
        }

        .tab_nav ul li.on , .tab_nav ul li:hover{
            color: #00a1d6;
            border-bottom-color:#00a1d6 ;
        }
        .clearfix:after{

            content: "";
            display: block;
            width: 0;
            height: 0;
            clear: both;
        }


        a { text-decoration: none}

        .content{
            /*visibility: hidden;*/
            /*display: none;*/
            position: relative;
            top: -40px;
            width: auto;
            height: 2000px;
            margin: 15px 10% 100px 10%;

        }

        .detail_card{
            padding: 25px;
            height: 100%;
            width: 70.7%;
            /*margin-right: 15px;*/
            /*min-width: 1078px;*/
            text-align: left;
            float: left;
            background: rgba(255,255,255,0.8);
            box-sizing: border-box;
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0,0,0,0.3);
        }
        .actors_card{
            width:27.3%;
            /*min-width: 415px;*/
            min-height: 500px;
            text-align: left;
            float: right;
            padding:25px 20px 25px 20px;
            line-height: 30px;
            font-size: 15px;
            background: rgba(255,255,255,0.8);
            box-sizing: border-box;
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0,0,0,0.3);
        }
        .actors_title{
            font-family: 幼圆, serif;
            font-size:20px;
            font-weight: 700;
        }
        .staff_card{
            width:27.3%;
            /*min-width: 415px;*/
            text-align: left;
            min-height: 500px;

            float: right;
            margin-top: 15px;
            padding:25px 20px 25px 20px;
            line-height: 30px;
            font-size: 15px;
            background: rgba(255,255,255,0.8);
            box-sizing: border-box;
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0,0,0,0.3);
        }
        .staff_title{
            font-family: 幼圆, serif;
            font-size:20px;
            font-weight: 700;
        }

        .more{
            display: none;
            visibility: visible;
            position: relative;
            top: -40px;
            width: auto;
            height: 2000px;
            margin: 15px 10% 200px 10%;
        }
        .morecard{
            height: 100%;
            background: rgba(255,255,255,0.8);
            box-sizing: border-box;
            border-radius: 15px;
            box-shadow: 5px 5px 20px 5px rgba(0,0,0,0.3);
        }

        .ep_nav_title{
            float: left;
            font-weight: 700;
            font-size: 19px;
            color: #212121;
            line-height: 25px;
        }
        .ep_nav{
            position: relative;
            height: 29px;
            margin-left: 60px;
            padding-right: 129px;
            overflow: hidden;
        }
        .slide_content{
            overflow: hidden;
        }
        .sl_nav_list{
            transition: transform 0.3s ease 0s;
            transform: translateX(0px);
        }
        .sl_nav_list li{
            position: relative;
            display: inline-block;
            vertical-align: top;
            margin: 2px 30px 0 0;
            line-height: 20px;
            height: 20px;
            border-bottom: 1px solid rgba(0,0,0,0);
            font-size: 12px;
            cursor: pointer;
        }
        .sl_nav_list .sl_nav_list_item.on{
            color: #00a1d6;
            border-bottom-color: #00a1d6;

        }
        .sl_nav_list .sl_nav_list_item.on:after{
            content: "";
            position: absolute;
            top:17px;
            left: 34px;
            transform: translateX(-3px);
            border-bottom: 3px solid #00a1d6;
            border-top: 0;
            border-left: 3px solid rgba(0,0,0,0);
            border-right: 3px solid rgba(0,0,0,0);
            box-sizing: border-box;

        }
        .sl_nav_list li:hover{
            color: #00a1d6;

        }
        .mode_select{
            position: absolute;
            right: 0;
            top:4px;
            padding-left: 10px;
            border-left: 2px solid #e5e9ef;
        }
        .mode_select li{
            width: 16px;
            height: 16px;
            float: left;
            margin-right: 10px;
            background-repeat: no-repeat;
            background-image: url(http://s1.hdslb.com/bfs/static/review/media/asserts/icons.png);
            cursor: pointer;
        }
        .mode_select li:last-child{
            margin-right: 0;
        }
        .mode_select li.simple_mode{
            background-position: -281px -1880px;
        }
        .mode_select li.simple_mode:hover,.mode_select li.simple_mode.selected{
            background-position: -345px -1880px;
        }

        .mode_select li.detail_mode{
            background-position: -279px -1815px;
        }
        .mode_select li.detail_mode:hover,.mode_select li.detail_mode.selected{
            background-position: -343px -1815px;
        }
        .sl_list{
            clear: both;
        }
        .sl_list ul{
            padding-top:10px;
            margin: 20px -20px 0 0;
            height: auto;
            overflow: hidden;
        }
        .misl_ep_item{
            position: relative;
            display: inline-block;
            vertical-align: top;
            margin: 10px 20px 20px 20px;
            width: 205px;
            height: 60px;
            cursor: pointer;
            background-color: #f4f5f7;
            border: 1px solid #f4f5f7;
            border-radius:4px;
            box-sizing: border-box;
            box-shadow: 3px 3px 20px 3px rgba(0, 0, 0, 0.3);
        }

        .misl_ep_item .misl_ep_img{
            position: relative;
            float: left;
            width: 96px;
            height: 60px;
            margin: -1px;
            border-radius: 4px 0 0 4px;
            overflow: hidden;
        }
        .misl_ep_item:hover img {
            filter: brightness(80%);
            transition: all 0.5s;
        }
        .common_lazy_img img{
            display: block;
            width: 100%;
            height: 100%;
        }
        .misl_ep_item .misl_ep_text{
            margin-left: 100px;
            padding-right: 9px;
        }
        .misl_ep_item .misl_ep_text .misl_ep_index,.misl_ep_item .misl_ep_text .misl_ep_title{
            font-size: 12px;
            line-height: 16px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .misl_ep_item:hover .misl_ep_text .misl_ep_index,.misl_ep_item:hover .misl_ep_text .misl_ep_title{
            color: #00a1d6;
        }
        .misl_ep_item .misl_ep_text .misl_ep_index{
            padding-top: 5px;
            color: #2d2d2d;
            height: 16px;
            white-space: nowrap;
        }
        .misl_ep_item .misl_ep_text .misl_ep_title{
            display: -webkit-box;
            -webkit-line-clamp:2;
            -webkit-box-orient:vertical;
            white-space: normal;
            margin-top: 1px;
            color: #6d757a;
            max-height: 32px;
            word-break: break-word;
        }
        .detail_more{
            vertical-align: top;
            border-top: 1px solid #e5e9ef;
            padding-top: 20px;
            margin-top: 20px;
            width: 100%;
        }
        .detail_more_title{
            display: inline-block;
            font-size: 18px;
            font-weight: 700;
            color: #222;
            height: 24px;
            line-height: 24px;
        }
        .detail_more_more{
            float: right;
            line-height: 22px;
            border: 1px solid #b7c0cc;
            border-radius: 4px;
            height: 22px;
            padding: 0 10px;
            font-size: 12px;
            color: #6e7579;
            cursor: pointer;
            margin: 0 0 0 10px;
        }
        .detail_more_more:hover{
            color: #00a1d6;
            border-color: #00a1d6;
        }
        .detail_more_wrapper{
            position: relative;
        }
        .detail_more_slider_content{
            width: 100%;
            /*overflow: auto;*/
        }
        .detail_more_slider_content li{
            margin-bottom: 0 !important;
        }

        .detail_more_lists{
            list-style: none;
            -webkit-transition: -webkit-transform .3s ease;
            transition: -webkit-transform .3s ease;
            -o-transition: transform .3s ease;

            transition: transform .3s ease,-webkit-transform .3s ease;

        }

        .more_more_lists{
            list-style: none;
            -webkit-transition: -webkit-transform .3s ease;
            transition: -webkit-transform .3s ease;
            -o-transition: transform .3s ease;

            transition: transform .3s ease,-webkit-transform .3s ease;

        }


        .detail_more_item{
            width: 160px;


            display: inline-block;

            margin: 20px 20px 20px 20px;
            border-radius: 4px;
        }
        .detail_more_item_slide_img{
            position: relative;
            width: 100%;
            height: 214px;
            margin-top: 20px;
            border-radius: 4px;
            background-color: #fff;
            cursor: pointer;
            box-shadow: 5px 5px 20px 5px rgba(0,0,0,0.3);
        }
        .detail_more_item_slide_img:hover{
            filter: brightness(80%);
            transition: all 0.5s;

        }

        .detail_more_item_img{
            background: 50% no-repeat;
            background-size: 50px;
            width: 100%;
            height: 100%;
            display: inline-block;
            vertical-align: top;
        }
        .detail_more_item_img img{
            width: 100%;
            height: 100%;
            border-radius: 4px;
        }
        .detail_more_item_title{
            text-align: center;
            font-size: 15px;
            line-height: 15px;
            height: 16px;
            color: #222222;
            padding-top: 8px;
            display: inline-block;
            vertical-align: top;







        }
        .more_more{
            /*margin: 50px auto;*/
            padding-top: 25px;
            vertical-align: top;
            width: 100%;
            margin: 0 auto;
        }
        .more_title{
            margin-left: 25px;
        }
        .more_more_lists{
            /*vertical-align: top;*/
            margin: 0 30px;
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
                    <img id="fj" src="<?php echo $animatecover;?>">
                </div>
                <div class="title">
                    <span class="title_name" ><?php echo $animateinfo["name"];?></span>
                    <span class="title_tags">

                        <?php
                        while($arr = mysqli_fetch_row($tagsresult))
                        {
                            echo "<span class='title_tag'>".$arr[0]."</span>";
                        }
                        ?>
                    </span>
                </div>
                <div class="data">
                    <div class="count">
                        <span class="plays">
                            <span class="playslabel">总播放数</span>
                            <br/>
                            <em><?php echo $animateinfo["views"];?></em>
                        </span>
                        <span class="likes">
                            <span class="likeslabel">追番人数</span>
                            <br/>
                            <em><?php echo $animateinfo["likes"];?></em>
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
                        <span class="scoretext"><?php echo $animateinfo["score"];?></span>
                    </div>
                </div>
                <div class="time">
                    <?php
                    $startdate=date("Y年m月d日",strtotime($animateinfo["start_date"]));
                    echo "<span>".$startdate."开播</span>";
                    if($animateinfo["is_finish"]){
                        echo "<span>已完结,".$animateinfo["index_show"]."</span>";
                    }
                    ?>

                </div>
                <div class="intro">
                    <span class="intro_text"><?php echo substr($animateinfo["introduction"],0,490);?>......</span>
                </div>

                <div onclick="changelike()" id="like_btn" class="btns">
                    <?php
                    if(mysqli_fetch_array($userresult)) {
                        $islike=1;
                        echo '<div class="btn_like btn_liked">';
                        echo '<i></i>';
                        echo '已追番';

                    }else{
                        $islike=0;
                        echo '<div class="btn_like">';
                        echo '<i></i>';
                        echo '追番';
                    }

                    ?>

                    </div>
                </div>
            </div>
            <img id="bg" src="<?php echo $animatecover;?>">
        </div>
        <div class="detail_tab">
            <div class="tab_nav">
                <ul  class="clearfix" >
                    <li onclick="changeTab(this)" class="on">番剧详情</li>
                    <li onclick="changeTab(this)" >更多推荐</li>

                </ul>

            </div>
            <div class="tab_de">
                <div class="content">
                    <div class="detail_card">
                        <div class="detail_ep">
                            <div class="ep_nav_title">
                                正片
                            </div>
                            <div class="ep_nav">
                                <div class="slide_wrapper">
                                    <div class="slide_content" >
                                        <ul class="sl_nav_list" >

                                            <?php
                                            $num=$animateinfo["index_show"];
                                            preg_match_all('/\d+/', $num, $res);
                                            $num = join('', $res[0]);
                                            if($num<=12){
                                                echo '<li onclick="getvideolist(this)" class="sl_nav_list_item on" id="on">第1话-第'.$num.'话</li>';
                                            }else{
                                                echo '<li onclick="getvideolist(this)" class="sl_nav_list_item on" id="on">第1话-第12话</li>';
                                                $j=24;
                                                while ($num>$j){
                                                    echo '<li  onclick="getvideolist(this)" class="sl_nav_list_item" >第'.($j-11).'话-第'.$j.'话</li>';
                                                    $j+=12;
                                                }
                                                echo '<li onclick="getvideolist(this)" class="sl_nav_list_item" >第'.($j-11).'话-第'.$num.'话</li>';
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="mode_select">
                                    <li title="详细模式" class="detail_mode selected"></li>
                                    <li title="精简模式" class="simple_mode"></li>
                                </ul>
                            </div>
                            <div class="sl_list">
                                <ul id="video_li">

                                </ul>

                            </div>



                        </div>
                        <div class="detail_more" >
                            <div class="detail_more_title">
                                更多推荐
                            </div>
                            <div class="detail_more_more">
                                更多
                            </div>
                            <div class="detail_mode_content">
                                <div class="detail_more_wrapper">
                                    <div class="detail_more_slider_content">
                                        <ul id="detail_list" class="detail_more_lists">

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="actors_card">
                        <div class="actors_title">
                            角色声优
                        </div>
                        <div class="actors_text">
<!--                            <p>灶门炭治郎：花江夏树<br>灶门祢豆子：鬼头明里<br>我妻善逸：下野纮<br>嘴平伊之助：松冈祯丞<br>富冈义勇：樱井孝宏<br>鳞泷左近次：大冢芳忠<br>锖兔：梶裕贵<br>真菰：加隈亚衣<br>不死川玄弥：冈本信彦<br>产屋敷耀哉：森川智之<br>产屋敷辉利哉：悠木碧<br>产屋敷雏衣：井泽诗织<br>钢铁冢萤：浪川大辅<br>鎹鸦：山崎巧<br>佛堂鬼：绿川光<br>手鬼：子安武人</p>-->
                            <p>
                                <?php echo nl2br($animateinfo["actors"]); ?>
                            </p>
                        </div>
                    </div>
                    <div class="staff_card">
                        <div class="staff_title">
                            STAFF
                        </div>
                        <div class="staff_text">
                            <p>
                                <?php echo nl2br($animateinfo["staff"])?>
                            </p>
<!--                            <p>原作：吾峠呼世晴（集英社《周刊少年JUMP》连载）<br>监督：外崎春雄<br>角色设计：松岛晃<br>副角色设计：佐藤美幸、梶山庸子、菊池美花<br>脚本制作：ufotable<br>概念美术：卫藤功二、矢中胜、竹内香纯、桦泽侑里<br>摄影监督：寺尾优一<br>3D监督：西胁一树<br>色彩设计：大前祐子<br>剪辑：神野学<br>音乐：梶浦由记、椎名豪<br>制作人：近藤光<br>动画制作：ufotable</p>-->
                        </div>
                    </div>



                </div>
                <div class="more">
                    <div class="morecard">
                        <div class="more_more">
                            <div class="more_title">
                                <div class="detail_more_title">
                                    相似推荐
                                </div>
                            </div>
                            <div class="more_an">
                                <div class="detail_mode_content">
                                    <div class="detail_more_wrapper">
                                        <div class="detail_more_slider_content">
                                            <ul id="more_list" class="more_more_lists">


                                            </ul>
                                        </div>
                        </div>

                    </div>
                </div>
            </div>

        </div >

    </div>
</div>

<script>
    // detail_card height 自适应
    const detail_card = document.getElementsByClassName('content')[0];
    const actors_card = document.getElementsByClassName('actors_card')[0];
    const staff_card = document.getElementsByClassName('staff_card')[0];

    detail_card.style.height=actors_card.clientHeight +staff_card.clientHeight +15+"px";



    const trueheight = detail_card.style.height;

    // tab 切换

    var tabs = document.getElementsByClassName('tab_nav')[0].getElementsByTagName('li');
    var contents=document.querySelectorAll(".tab_de>div");


    function changeTab(tab) {
        for(var i = 0, len = tabs.length; i < len; i++) {
            if(tabs[i] === tab) {
                tabs[i].className = 'on';
                contents[i].style.display = 'block';
                contents[i].style.height=trueheight;
            } else {
                tabs[i].className = '';
                contents[i].style.display = 'none';
            }
        }
    }
    // function imgover(hoverli){
    //     console.log("凄凄切切")
    //     var img=hoverli.getElementsByTagName('img');
    //     img.style.filter='brightness(80%)';
        // img.style.cssText="filter: brightness(80%);transition: all 0.5s;";
    // }
    // function imgoout(hoverli){
    //     var img=hoverli.getElementsByTagName('img');
    //     img.style.cssText="filter: "";transition: all 0.5s;";
    // }


    function getvideolist(tab){
        // var dang_Id = $(this).attr("data-id");//获取信息id
        // var Z_zong = $(this).attr("data-num");//获取数据
        if(tab!==""){
            var tabs = document.getElementsByClassName('sl_nav_list')[0].getElementsByTagName('li');

            for(var i = 0, len = tabs.length; i < len; i++) {
                if(tabs[i] === tab) {
                    tabs[i].className = 'sl_nav_list_item on';
                    tabs[i].id = 'on';

                } else {
                    tabs[i].id = '';
                    tabs[i].className = 'sl_nav_list_item';

                }
            }
        }


        var start_no_end=$("#on").text();
        var SNE=start_no_end.match(/\d+(.\d+)?/g);
        var startno=SNE[0]-1;
        var endno=12



        $.ajax({
            url : "video_detail_list.php?animate_id="+<?php echo $animate_id?>,//提交给ajax_index.php页面，后面跟随当前信息ID
            data : {
                sn:startno,
                en:endno
            }, //参数Json格式

            dataType : "html", //请求的返回类型
            type : "post",  //提交方式
            cache : false,  //是否异步提交true
            success : function(v){
                $("#video_li").html(v);
            }
        });
    }
    getvideolist("");
    function getmorean(con){

        if(con==="detail"){
            $.ajax({
                url : "getmore.php?animate_id="+<?php echo $animate_id?>,//提交给ajax_index.php页面，后面跟随当前信息ID
                data : {
                    mode:'detail'
                }, //参数Json格式

                dataType : "html", //请求的返回类型
                type : "post",  //提交方式
                cache : false,  //是否异步提交true
                success : function(v){
                    $("#detail_list").html(v);
                }
            });
        }else{
            $.ajax({
                url : "getmore.php?animate_id="+<?php echo $animate_id?>,//提交给ajax_index.php页面，后面跟随当前信息ID
                data : {
                    mode:'more'
                }, //参数Json格式

                dataType : "html", //请求的返回类型
                type : "post",  //提交方式
                cache : false,  //是否异步提交true
                success : function(v){
                    $("#more_list").html(v);
                }
            });

        }

    }
    getmorean("detail");
    getmorean("more");


    function changelike(){
        $.ajax({
            url : "userlike.php?animate_id="+<?php echo $animate_id?>,//提交给ajax_index.php页面，后面跟随当前信息ID
            data : {
                user_id:<?php echo $user_id ?>,
            }, //参数Json格式

            dataType : "html", //请求的返回类型
            type : "post",  //提交方式
            cache : false,  //是否异步提交true
            success : function(v){
                $("#like_btn").html(v);
            }
        });
    }


</script>

<iframe src="../footer.html" class="footer" scrolling="no"></iframe>
</body>
</html>