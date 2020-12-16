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
	$sql="select * from animate where name like '%公主%'";
	$result=mysqli_query($conn,$sql);
	$season_version=-1;//类型
	$is_finish=-1;//是否完结
	$season_status=-1;//付费
	$startdate=-1;//时间
	$style=-1;//风格
	$copyright=-1;//版权
	
	
	if(mysqli_num_rows($result)>0){
		 $cover=array();
		 $name=array();
	     $index_show=array();
				if(mysqli_num_rows($result)){
					while($row=mysqli_fetch_assoc($result)){
							$cover[]=$row['cover'];
							$name[]=$row['name'];
							$index_show[]=$row['index_show'];
					}
				}
	}
	else{
		echo "das";
	}
	?>
	
	
	<?php
	include "../conn.php";
	$startdate=$_GET['startdate'];
	if($startdate==1){
		$startdatesql="select * from animate where date_format(startdate,'%Y-%m-%d') like'%$startdate%' and $startdate<2010 ";
		$result1=mysqli_query($conn,$startdate);
	}
	else{
		$startdatesql="select * from animate where date_format(startdate,'%Y-%m-%d') like'%$startdate%'";
		
	}
	
	
	?>
	<div class="ONE">
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

				<li class="list2">
					
					<a class="V1"><img src="<?php echo $cover[0]; ?>"></a>
					<a class="V2"><?php echo $name[0]?></a>
					<a class="V3"><?php echo $index_show[0]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[1]; ?>"></a>
					<a class="V2"><?php echo $name[1]?></a>
					<a class="V3"><?php echo $index_show[1]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[2]; ?>"></a>
					<a class="V2"><?php echo $name[2]?></a>
					<a class="V3"><?php echo $index_show[2]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[3]; ?>"></a>
					<a class="V2"><?php echo $name[3]?></a>
					<a class="V3"><?php echo $index_show[3]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[4]; ?>"></a>
					<a class="V2"><?php echo $name[4]?></a>
					<a class="V3"><?php echo $index_show[4]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[5]; ?>"></a>
					<a class="V2"><?php echo $name[5]?></a>
					<a class="V3"><?php echo $index_show[5]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[6]; ?>"></a>
					<a class="V2"><?php echo $name[6]?></a>
					<a class="V3"><?php echo $index_show[6]?></a>
				</li>
				<<li class="list2">
					<a class="V1"><img src="<?php echo $cover[7]; ?>"></a>
					<a class="V2"><?php echo $name[7]?></a>
					<a class="V3"><?php echo $index_show[7]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[8]; ?>"></a>
					<a class="V2"><?php echo $name[8]?></a>
					<a class="V3"><?php echo $index_show[8]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[9]; ?>"></a>
					<a class="V2"><?php echo $name[9]?></a>
					<a class="V3"><?php echo $index_show[9]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[10]; ?>"></a>
					<a class="V2"><?php echo $name[10]?></a>
					<a class="V3"><?php echo $index_show[10]?></a>
				</li>
				<li class="list2">
					<a class="V1"><img src="<?php echo $cover[11]; ?>"></a>
					<a class="V2"><?php echo $name[11]?></a>
					<a class="V3"><?php echo $index_show[11]?></a>
				</li>
			</ul>
			<div class="page">
				<a class="Next">上一页</a>
				<a class="first">1</a>
				<a class="next">2</a>
				<a class="next">3</a>
				<a class="next">4</a>
				<a class="next">5</a>
				<strong>...</strong>
				<a class="next">200</a>
				<a class="Next">下一页</a>
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
						<li class="one">奇幻</li>
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
		</div>
	<div class="bottom">
		<iframe  scrolling="no" class="bottom" src="../footer.html"></iframe>
	</div>
	
	
	
</body>
</html>