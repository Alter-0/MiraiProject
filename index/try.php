<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta charset="UTF-8" name="referrer" content="never">
<title>index</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
<?php
include "../conn.php";
$tagss=array("奇幻");
$sql = "select count(animate_id) from animate";
$iswhere = 0;
if ( !empty( $_GET[ "key" ] ) ) {
  $key = $_GET[ "key" ];

  $sql .= " where name like '%$key%'";
  $iswhere = 1;

}
if ( !empty( $_GET[ "start_date" ] ) ) {
  $start_date = $_GET[ "start_date" ];
  if ( $iswhere == 0 ) {
    $sql .= " where start_date like '%$start_date%'";
    $iswhere = 1;
  } else {
    $sql .= " and start_date like '%$start_date$'";
  }

}
if ( !empty( $_GET[ "is_finish" ] ) ) {
  $is_finish = $_GET[ "is_finish" ];
  if ( $iswhere == 0 ) {
    $sql .= " where is_finish=$is_finish";
    $iswhere = 1;
  } else {
    $sql .= " and is_finish=$is_finish";
  }

}
//if ( !empty( $_GET[ "animate_id" ] ) ) {
//  $animate_id = $_GET[ "animate_id" ];
//  if ( $iswhere == 0 ) {
//    $sql .= " where animate_id=$animate_id ";
//    $iswhere = 1;
//  } else {
//    $sql .= " and animate_id=$animate_id";
//  }
//}
	
if( !empty( $_GET["tags"])){
	$tag=$tagss[$_GET["tags"]];
	if($iswhere==0){
		$sql.=" where animate_id in (select animate_id from tags where tag='$tag') ";	
	}
}

$result = mysqli_query( $conn, $sql );

$pageSize = 12;
$allNum = mysqli_fetch_array($result);
$endPage = ceil( $allNum[0] / $pageSize );
$pageNum = empty( $_GET[ "pageNum" ] ) ? 1 : $_GET[ "pageNum" ];
$sql=str_replace("count(animate_id)","*",$sql);
$sql .= " limit " . ( $pageNum - 1 ) * $pageSize . "," . $pageSize;
$resultend = mysqli_query( $conn, $sql );
?>
<div class="top">
  <iframe src="../header.php" class="header" scrolling="no"></iframe>
  <div class="img"><img src="../main/image/banner.png"></div>
</div>
<div class="index">
  <div class="left">
    <ul class="banner">
      <li class="list1"> <i class="up"></i> <span>最高评分</span> <i class="down"></i> </li>
      <li class="list1"> <i class="up"></i> <span>播放数量</span> <i class="down"></i> </li>
      <li class="list1"> <i class="up"></i> <span>开播时间</span> <i class="down"></i> </li>
    </ul>
    <ul class="video">
      <?php
      while ( $row = mysqli_fetch_assoc( $resultend ) ) {
        ?>
      <li class="list2"> <a href="../animate/detail.php?animate_id=<?php echo($row['animate_id']) ?>" class="V1"><img src="<?php echo $row['cover']; ?>"></a> <a class="V2"><?php echo $row['name']?></a> <a class="V3"><?php echo $row['index_show']?></a> </li>
      <?php } ?>
    </ul>
    <div class="page"> <a class="Next" href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a> <a class="first" href="?pageNum=1">1</a> <a class="next" href="?pageNum=2">2</a> <a class="next" href="?pageNum=3">3</a> <a class="next" href="?pageNum=4">4</a> <a class="next" href="?pageNum=5">5</a> <strong>...</strong> <a class="next" href="?pageNum=<?php echo $pageNum=$endPage ?>">end</a> <a class="Next" href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a> </div>
  </div>
  <div class="right">
    <div class="filter_title">筛选</div>
    <div class="filter_list">
      <div class="filter_block">
        <div class="filter_type">状态</div>
        <ul class="filter_content">
          <li class="all">全部</li>
          <li class="one"><a href="?is_finish=0">连载</a></li>
          <li class="one"><a href="?is_finish=1">完结</a></li>
        </ul>
      </div>
      <div class="filter_block">
        <div class="filter_type">时间</div>
        <ul class="filter_content">
          <li class="all">全部</li>
          <li class="one"><a href="?start_date=2021">2021</a></li>
          <li class="one"><a href="?start_date=2020">2020</a></li>
          <li class="one"><a href="?start_date=2019">2019</a></li>
          <li class="one"><a href="?start_date=2018">2018</a></li>
          <li class="one"><a href="?start_date=2017">2017</a></li>
          <li class="one"><a href="?start_date=2016">2016</a></li>
          <li class="one"><a href="?start_date=2015">2015</a></li>
          <li class="one"><a href="?start_date=2014">2014</a></li>
          <li class="one"><a href="?start_date=2013">2013</a></li>
          <li class="one"><a href="?start_date=2012">2012</a></li>
          <li class="one"><a href="?start_date=2011">2011</a></li>
          <li class="one"><a href="?start_date=2010">2010</a></li>
          <li class="one"><a href="?start_date=10000">更早</a></li>
        </ul>
      </div>
      <div class="filter_block">
        <div class="filter_type">风格</div>
        <ul class="filter_content">
          <li class="all">全部</li>
          <li class="one"><a href="?tags=0">奇幻</a></li>
          <li class="one">战斗</li>
          <li class="one">搞笑</li>
          <li class="one">后宫</li>
          <li class="one">穿越</li>
          <li class="one">漫画改</li>
          <li class="one">小说改</li>
          <li class="one">游戏改</li>
          <li class="one">其他</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="mybottom">
  <iframe  scrolling="no" class="bottom" src="../footer.html"></iframe>
</div>
</body>
</html>