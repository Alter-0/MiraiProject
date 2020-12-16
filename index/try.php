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
	$sql="select * from animate where name like '%科学%'";
	$result=mysqli_query($conn,$sql);
	$season_version=-1;//类型
	$is_finish=-1;//是否完结
	$season_status=-1;//付费
	$startdate=-1;//时间
	$style=-1;//风格
	$copyright=-1;//版权
	
	$pageSize=12;
	$allNum =mysqli_num_rows($result);
	$endPage = ceil($allNum/$pageSize);
	$pageNum= empty($_GET["pageNum"])?1:$_GET["pageNum"];
	$sql.= " limit " . ($pageNum - 1) * $pageSize . "," .$pageSize;
	$result2=mysqli_query($conn,$sql);

	?>
	<div class="top">
		<iframe src="../header.php" class="header" scrolling="no"></iframe>
		<div class="img"><img src="../main/image/banner.png"></div>
		</div>
	<div class="index">
		<div class="left">
			<ul class="banner">
				<li class="list1">
					<i class="up"></i>
					<span>追番人数</span>
					<i class="down"></i>
				</li>
				<li class="list1">
					<i class="up"></i>
					<span>更新时间</span>
					<i class="down"></i>
				</li>
				<li class="list1">
					<i class="up"></i>
					<span>最高评分</span>
					<i class="down"></i>
				</li>
				<li class="list1">
					<i class="up"></i>
					<span>播放数量</span>
					<i class="down"></i>
				</li>
				<li class="list1">
					<i class="up"></i>
					<span>开播时间</span>
					<i class="down"></i>
				</li>
			</ul>
			<ul class="video">
				<?php if(mysqli_num_rows($result2)){
					while($row=mysqli_fetch_assoc($result2)){?>

				<li class="list2">
					<a class="V1"><img src="<?php echo $row['cover']; ?>"></a>
					<a class="V2"><?php echo $row['name']?></a>
					<a class="V3"><?php echo $row['index_show']?></a>
									
				</li>
				<?php }} ?>
				
			</ul>
			<div class="page">
				<a class="Next" href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
				<a class="first" href="?pageNum=1">1</a>
				<a class="next" href="?pageNum=2">2</a>
				<a class="next" href="?pageNum=3">3</a>
				<a class="next" href="?pageNum=4">4</a>
				<a class="next" href="?pageNum=5">5</a>
				<strong>...</strong>
				<a class="next" href="?pageNum=<?php echo $pageNum=$endPage ?>">end</a>
				<a class="Next" href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
			</div>
			
		</div>
		<div class="right">
			<div class="filter_title">筛选</div>
			<div class="filter_list">
				<div class="filter_block">
					<div class="filter_type">类型</div>
					<ul class="filter_content">
						<li class="all">全部</li>
						<li class="one">正片</li>
						<li class="one">电影</li>
						<li class="one">其他</li>
					</ul>
				</div>
				<div class="filter_block">
					<div class="filter_type">状态</div>
					<ul class="filter_content">
						<li class="all">全部</li>
						<li class="one">连载</li>
						<li class="one">完结</li>
					</ul>
				</div>
				<div class="filter_block">
					<div class="filter_type">版权</div>
					<ul class="filter_content">
						<li class="all">全部</li>
						<li class="one">独家</li>
						<li class="one">其他</li>
					</ul>
				</div>
				<div class="filter_block">
					<div class="filter_type">付费</div>
					<ul class="filter_content">
						<li class="all">全部</li>
						<li class="one">免费</li>
						<li class="one">付费</li>
					</ul>
				</div>
				<div class="filter_block">
					<div class="filter_type">时间</div>
					<ul class="filter_content">
						<li class="all">全部</li>
						<li class="one"><a href="#?startdate=2021">2021</a></li>
						<li class="one"><a href="#?startdate=2020">2020</a></li>
						<li class="one"><a href="#?startdate=2019">2019</a></li>
						<li class="one"><a href="#?startdate=2018">2018</a></li>
						<li class="one"><a href="#?startdate=2017">2017</a></li>
						<li class="one"><a href="#?startdate=2016">2016</a></li>
						<li class="one"><a href="#?startdate=2015">2015</a></li>
						<li class="one"><a href="#?startdate=2014">2014</a></li>
						<li class="one"><a href="#?startdate=2013">2013</a></li>
						<li class="one"><a href="#?startdate=2012">2012</a></li>
						<li class="one"><a href="#?startdate=2011">2011</a></li>
						<li class="one"><a href="#?startdate=2010">2010</a></li>
						<li class="one"><a href="#?startdate=1">更早</a></li>
					</ul>
				</div>
				<div class="filter_block">
					<div class="filter_type">风格</div>
					<ul class="filter_content">
						<li class="all">全部</li>
						<li class="one"><a href="#？style=1">奇幻</a></li>
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