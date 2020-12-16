<?php
include '../conn.php';//引用数据库链接
$animate_id =  $_GET['animate_id'];//获取当前信息id

//更新预数据
//当前id的信息的数据+1
//$P_Gou = $rsp["hits"] + 1;
//$sql="update php_news set hits='{$P_Gou}' where id='".$DpinglunId."'";
//$result = mysqli_query($conn,$sql);
//修改成功
$SN=$_POST['sn'];
$intSN=(int)$SN;
$EN=$_POST['en'];
$intEN=(int)$EN;
$videosql="select * from video where animate_id='".$animate_id."' limit ".$intSN.",".$intEN;
$videoresult=mysqli_query($conn,$videosql) or die("失败".$videosql);

$listhtml="";


while ($videoinfo=mysqli_fetch_array($videoresult)){
    $listhtml.= '<a href="video.php?video_id='.$videoinfo["video_id"].'">';
    $listhtml.= '<li title="第'.$videoinfo["no"].'话" class="misl_ep_item">';
    $listhtml.= '<div class="misl_ep_img">';
    $listhtml.= '<div class="common_lazy_img">';
    $listhtml.= '<img alt="'.$videoinfo["no"].'" src="'.$videoinfo["cover"].'" >';
    $listhtml.= '</div>';
    $listhtml.= '</div>';
    $listhtml.= '<div class="misl_ep_text">';
    $listhtml.= '<div class="misl_ep_index">第'.$videoinfo["no"].'话</div>';
    $listhtml.= '<div class="misl_ep_title">'.$videoinfo["name"].'</div>';
    $listhtml.= '</div>';
    $listhtml.= '</li>';
    $listhtml.= '</a>';
}
echo $listhtml;
//ajax_index.js

exit;
