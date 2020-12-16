<?php

include '../conn.php';//引用数据库链接
$animate_id = $_GET['animate_id'];//获取当前信息id
$listhtml="";
//更新预数据
//当前id的信息的数据+1
//$P_Gou = $rsp["hits"] + 1;
//$sql="update php_news set hits='{$P_Gou}' where id='".$DpinglunId."'";
//$result = mysqli_query($conn,$sql);
//修改成功
$user_id = $_POST['user_id'];
$user_id = (int)$user_id;

$usersql="select * from likes where user_id='".$user_id."' and animate_id='$animate_id'";
$userresult=mysqli_query($conn,$usersql) or die("失败".$usersql);

if(mysqli_fetch_array($userresult)){
    $nolikesql = "delete from likes where user_id='".$user_id."'and animate_id='".$animate_id."'";
    $nolikeresult=mysqli_query($conn,$nolikesql) or die("失败".$nolikesql);

    $listhtml .= '<div class="btn_like">';
    $listhtml .= '<i></i>';
    $listhtml .= '追番';
    $listhtml .= '</div>';
}else{
    $likesql = "insert into likes values ('".$user_id."','".$animate_id."')";
    $likeresult=mysqli_query($conn,$likesql) or die("失败".$likesql);
    $listhtml .= '<div class="btn_like btn_liked">';
    $listhtml .= '<i></i>';
    $listhtml .= '已追番';
    $listhtml .= '</div>';
}



echo $listhtml;
//ajax_index.js

exit;