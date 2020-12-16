<?php
include '../conn.php';//引用数据库链接
$animate_id =  $_GET['animate_id'];//获取当前信息id

$mode=$_POST['mode'];

$tagssql="select * from tags where animate_id='".$animate_id."' limit 10";
$tagsresult=mysqli_query($conn,$tagssql) or die("失败".$tagssql);
$tags=array();
$i=0;
while ($tagsinfo=mysqli_fetch_array($tagsresult)){
    $tags[$i]=$tagsinfo["tag"];
    $i+=1;
}
$seltag=$tags[array_rand($tags)];
if($mode=='detail'){
    $moresql="select * from tags,animate where tag='".$seltag."'and tags.animate_id=animate.animate_id and tags.animate_id!='".$animate_id."' limit 10";
}else{
    $moresql="select * from tags,animate where tag='".$seltag."'and tags.animate_id=animate.animate_id and tags.animate_id!='".$animate_id."' limit 21";

}


$moreresult=mysqli_query($conn,$moresql) or die("失败".$moresql);

$listhtml="";

//    <li  class="detail_more_item">
//        <div class="detail_more_item_slide_img">
//            <a href="http://i0.hdslb.com/bfs/bangumi/f5d5f51b941c01f8b90b361b412dc75ecc2608d3.png">
//                <div class="detail_more_item_img">
//                    <img alt src="http://i0.hdslb.com/bfs/bangumi/f5d5f51b941c01f8b90b361b412dc75ecc2608d3.png">
//                </div>
//            </a>
//        </div>
//        <div class="detail_more_item_slide_info">
//            <a href="http://i0.hdslb.com/bfs/bangumi/f5d5f51b941c01f8b90b361b412dc75ecc2608d3.png">
//                <div class="detail_more_item_title">
//                    鬼灭之刃
//                </div>
//            </a>
//        </div>
//    </li>


while ($moreinfo=mysqli_fetch_array($moreresult)){
    $listhtml.= '<li  class="detail_more_item">';
    $listhtml.= '<div class="detail_more_item_slide_img">';
    $listhtml.= '<a href="detail.php?animate_id='.$moreinfo["animate.animate_id"].'">';
    $listhtml.= '<div class="detail_more_item_img">';
    $listhtml.= '<img alt src="'.$moreinfo["cover"].'">';
    $listhtml.= '</div>';
    $listhtml.= '</a>';
    $listhtml.= '</div>';
    $listhtml.= '<div class="detail_more_item_slide_info">';
    $listhtml.= '<a href="detail.php?animate_id='.$moreinfo["animate.animate_id"].'">';
    $listhtml.= '<div class="detail_more_item_title">';
    $listhtml.= '鬼灭之刃';
    $listhtml.= '</div>';
    $listhtml.= '</a>';
    $listhtml.= '</div>';
    $listhtml.= '</li>';

}
echo $listhtml;
//ajax_index.js

exit;