<!doctype html>
<html>
<head>
<meta charset="utf-8" name="referrer" content="never">
<title>Mirai (゜-゜)つロ 干杯~</title>
	<link href="main.css" type="text/css" rel="stylesheet"/>

    <script src="../js/main.js"></script>
    <!-- 引用部分@blueberry -->
</head>

<body>
	<?php 
	include "../conn.php"
	?>
	<!-- top begin-->
	<div class="top">
      <iframe  scrolling="no" src="../header.php"></iframe>
      <div class="img1"><img src="image/banner.png" alt=""></div>	
	</div>
      <!-- top end-->
      <!-- index begin-->
      <div class="index">
          <div class="fenlei">
              <ul>
               <li><a>全部</a></li>
               <li><a >连载动画</a></li>
               <li><a >完结动画</a></li>
               <li><a href="../index/index.html" target="_blank">番剧索引</a></li>
              </ul>		
              <div class="logo1"><img src="#" alt=""/></div>	
          </div>
		  
          <div class="wrap" id="wrap">
			<ul>
				<li><img src="image/1.png" alt=""></li>
				<li><img src="image/2.jpg" alt=""></li>
				<li><img src="image/3.png" alt=""></li>
				<li><img src="image/4.png" alt=""></li>
			</ul>
            <a  class="left">
                &lt;
            </a>
            <a  class="right">
                &gt;
            </a>            
			<ol id="list">
            </ol>
          </div>
      </div>
	<!-- index end-->
	
    <!--new begin-->
	<div class="new">
		<div class="nl">
			<div class="title">
				<span>最近更新</span>
				<span><a href="../animate/new.php" target="_blank">新番时间表</a></span>
			</div>
			<div class="content">
				<table>
			<?php
                $sql="select * from animate order by start_date DESC limit 12;";
				$result=mysqli_query($conn,$sql) or die("数据库查询失败");
				$cover=array();
				$name=array();
				$index_show=array();
				$animate_id=array();
				if(mysqli_num_rows($result)){
					while($row=mysqli_fetch_assoc($result)){
							$cover[]=$row['cover'];
							$name[]=$row['name'];
							$index_show[]=$row['index_show'];
							$animate_id[]=$row['animate_id'];
					}}
				?>					
					<tr>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[0];?>" target="_blank">
										<img src="<?php echo $cover[0]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[0];?>" target="_blank"><span><?php echo $name[0]; ?></span></a></p></div>
									<p><?php echo $index_show[0]; ?></p>
								</div>								
							</div>
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[1];?>" target="_blank">
										<img src="<?php echo $cover[1]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[1];?>" target="_blank"><span><?php echo $name[1]; ?></span></a></p></div>
									<p><?php echo $index_show[1]; ?></p>
								</div>								
							</div>							
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[2];?>" target="_blank">
										<img src="<?php echo $cover[2]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[2];?>" target="_blank"><span><?php echo $name[2]; ?></span></a></p></div>
									<p><?php echo $index_show[2]; ?></p>
								</div>								
							</div>						
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[3];?>" target="_blank">
										<img src="<?php echo $cover[3]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[3];?>" target="_blank"><span><?php echo $name[3]; ?></span></a></p></div>
									<p><?php echo $index_show[3]; ?></p>
								</div>								
							</div>						
						</td>
					</tr>
					<tr>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[4];?>" target="_blank">
										<img src="<?php echo $cover[4]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[4];?>" target="_blank"><span><?php echo $name[4]; ?></span></a></p></div>
									<p><?php echo $index_show[4]; ?></p>
								</div>								
							</div>						
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[5];?>" target="_blank">
										<img src="<?php echo $cover[5]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[5];?>" target="_blank"><span><?php echo $name[5]; ?></span></a></p></div>
									<p><?php echo $index_show[5]; ?></p>
								</div>								
							</div>							
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[6];?>" target="_blank">
										<img src="<?php echo $cover[6]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[6];?>" target="_blank"><span><?php echo $name[6]; ?></span></a></p></div>
									<p><?php echo $index_show[6]; ?></p>
								</div>								
							</div>						
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[7];?>" target="_blank">
										<img src="<?php echo $cover[7]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[7];?>" target="_blank"><span><?php echo $name[7]; ?></span></a></p></div>
									<p><?php echo $index_show[7]; ?></p>
								</div>								
							</div>						
						</td>
					</tr>
					<tr>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[8];?>" target="_blank">
										<img src="<?php echo $cover[8]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[8];?>" target="_blank"><span><?php echo $name[8]; ?></span></a></p></div>
									<p><?php echo $index_show[8]; ?></p>
								</div>								
							</div>						
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[9];?>" target="_blank">
										<img src="<?php echo $cover[9]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[9];?>" target="_blank"><span><?php echo $name[9]; ?></span></a></p></div>
									<p><?php echo $index_show[9]; ?></p>
								</div>								
							</div>						
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[10];?>" target="_blank">
										<img src="<?php echo $cover[10]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[10];?>" target="_blank"><span><?php echo $name[10]; ?></span></a></p></div>
									<p><?php echo $index_show[10]; ?></p>
								</div>								
							</div>						
						</td>
						<td>
							<div class="fan">
								<div class="fan-left">
									<a href="../animate/detail.php?animate_id=<?php echo $animate_id[11];?>" target="_blank">
										<img src="<?php echo $cover[11]; ?>" alt="" />
									</a>
								</div>
								<div class="fan-right">
									<div><p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[11];?>" target="_blank"><span><?php echo $name[11]; ?></span></a></p></div>
									<p><?php echo $index_show[11]; ?></p>
								</div>								
							</div>						
						</td>
					</tr>					
				</table>
			</div>			
		</div>
		<div class="nr">
			<div class="nr-t">
				<span>我的追番</span>
				<span><a>更多</a></span>				
			</div>	
			<div class="myfan">
				<table>
			<?php
/*				$_SESSION['username']*/
/*                $sql="select * from animate,likes,user where likes.animate_id=animate.animate_id and likes.user_id=".$username." limit 4;";*/
				$sql="select * from animate order by start_date DESC limit 4;";
				$result=mysqli_query($conn,$sql) or die("数据库查询失败");
				if(mysqli_num_rows($result)){
					while($row=mysqli_fetch_assoc($result)){
						echo "<tr>";
						echo "<td><div class='myfan-left'>";
						echo " <a href='../animate/detail.php?animate_id=".$row['animate_id']."' target='_blank'><img src='".$row['cover']."' alt=''/></a>";
						echo "</div>";
						echo "<div class='myfan-right'>";
						echo "<div><p><a href='../animate/detail.php?animate_id=".$row['animate_id']."' target='_blank'><span>".$row['name']."</span></a></p></div>";
						echo "<p>".$row['index_show']."</p>";
                        echo "</div></td></tr>";							
					}}
			?>						
<!--		     <tr>
					 <td>
                      <div class="myfan-left">
                          <a href="" target="_blank">
                              <img src="image/banner.png" alt="" />
                          </a>
                      </div>
                      <div class="myfan-right">
                          <p><a href="" target="_blank"><span>title</span></a></p>
                          <p>更新至</p>
                      </div>						 
					 </td>
				</tr>
				<tr>
					 <td>
                      <div class="myfan-left">
                          <a href="" target="_blank">
                              <img src="image/banner.png" alt="" />
                          </a>
                      </div>
                      <div class="myfan-right">
                          <p><a href="" target="_blank"><span>title</span></a></p>
                          <p>更新至10话</p>
                      </div>						 
					 </td>
				</tr>	
					 <td>
                      <div class="myfan-left">
                          <a href="" target="_blank">
                              <img src="image/banner.png" alt="" />
                          </a>
                      </div>
                      <div class="myfan-right">
                          <p><a href="" target="_blank"><span>akjbdjkzbfusbafbadjfbijadbfojasdbuo</span></a></p>
                          <p>更新至10话</p>
                      </div>						 
					 </td>
				<tr>
					 <td>
                      <div class="myfan-left">
                          <a href="" target="_blank">
                              <img src="image/banner.png" alt="" />
                          </a>
                      </div>
                      <div class="myfan-right">
                          <p><a href="" target="_blank"><span>title</span></a></p>
                          <p>更新至</p>
                      </div>						 
					 </td>
				 </tr>-->
				</table>
			</div>
		</div>
	
	</div>
	<!--new end-->
	
	<!-- label begin-->
	<div class="label">
		<div class="label1">
			<div class="label2">
				<span>热播</span>
				<a href="" target="_blank">全部</a>
			</div>
			<div class="label3">
				<a href="" target="_blank">追番人数</a>
				<a href="" target="_blank">最高评分</a>
				<a href="" target="_blank">播放数量</a>
			</div>
		</div>
		<div class="label1">
			<div class="label2">
				<span>时间</span>
				<a href="" target="_blank">全部</a>
			</div>
			<div class="label3">
				<a href="" target="_blank">2021</a>
				<a href="" target="_blank">2020</a>
				<a href="" target="_blank">2019</a>
				<a href="" target="_blank">2018</a>
				<a href="" target="_blank">2017</a>
				<a href="" target="_blank">2016</a>
				<a href="" target="_blank">2015</a>
				<a href="" target="_blank">2014-2010</a>
			</div>		
		</div>
		<div class="label1">
			<div class="label2">
				<span>风格</span>
				<a href="" target="_blank">全部</a>
			</div>
			<div class="label3">
				<a href="" target="_blank">原创</a>
				<a href="" target="_blank">漫画改</a>
				<a href="" target="_blank">小说改</a>
				<a href="" target="_blank">游戏改</a>
				<a href="" target="_blank">布袋改</a>
				<a href="" target="_blank">热血</a>
				<a href="" target="_blank">穿越</a>
				<a href="" target="_blank">奇幻</a>
			</div>			
		</div>
	</div>
	<!-- label end-->
	<!-- bfzg begin -->
    <?php
        $sql="select * from animate order by views DESC limit 12;";
        $result=mysqli_query($conn,$sql) or die("数据库查询失败");
        $cover=array();
        $name=array();
        $animate_id=array();	
        if(mysqli_num_rows($result)){
            while($row=mysqli_fetch_assoc($result)){
                    $cover[]=$row['cover'];
                    $name[]=$row['name'];
					$animate_id[]=$row['animate_id'];
            }}
    ?>
	<div class="bfzg">
		<div class="bfzg_t">
			<span>播放最高</span>
			<a href="" target="_blank">查看更多</a>
		</div>	
		<div class="bfzg_v">
			<ul>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[0];?>"  target="_blank"><img src="<?php echo $cover[0]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[0];?>"  target="_blank"><?php echo $name[0]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[1];?>"  target="_blank"><img src="<?php echo $cover[1]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[1];?>"  target="_blank"><?php echo $name[1]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[2];?>"  target="_blank"><img src="<?php echo $cover[2]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[2];?>"  target="_blank"><?php echo $name[2]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[3];?>"  target="_blank"><img src="<?php echo $cover[3]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[3];?>"  target="_blank"><?php echo $name[3]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[4];?>"  target="_blank"><img src="<?php echo $cover[4]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[4];?>"  target="_blank"><?php echo $name[4]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[5];?>" target="_blank"><img src="<?php echo $cover[5]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[5];?>" target="_blank"><?php echo $name[5]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[6];?>" target="_blank"><img src="<?php echo $cover[6]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[6];?>" target="_blank"><?php echo $name[6]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[7];?>" target="_blank"><img src="<?php echo $cover[7]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[7];?>" target="_blank"><?php echo $name[7]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[8];?>" target="_blank"><img src="<?php echo $cover[8]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[8];?>" target="_blank"><?php echo $name[8]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[9];?>" target="_blank"><img src="<?php echo $cover[9]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[9];?>" target="_blank"><?php echo $name[9]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[10];?>" target="_blank"><img src="<?php echo $cover[10]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[10];?>" target="_blank"><?php echo $name[10]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[11];?>" target="_blank"><img src="<?php echo $cover[11]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[11];?>" target="_blank"><?php echo $name[11]; ?></a></p>
				</li>				
			</ul>
		</div>
	</div>
	<!-- bfzg end-->
	
	<!-- pfzg begin-->
    <?php
    $sql="select * from animate order by score DESC limit 12;";
    $result=mysqli_query($conn,$sql) or die("数据库查询失败");
    $cover=array();
    $name=array();
    $animate_id=array();
    if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_assoc($result)){
                $cover[]=$row['cover'];
                $name[]=$row['name'];
				$animate_id[]=$row['animate_id'];
        }}
    ?>
	<div class="pfzg">
		<div class="pfzg_t">
			<span>评分最高</span>
			<a href="" target="_blank">查看更多</a>
		</div>	
		<div class="pfzg_v">
			<ul>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[0];?>" target="_blank"><img src="<?php echo $cover[0]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[0];?>" target="_blank"><?php echo $name[0]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[1];?>" target="_blank"><img src="<?php echo $cover[1]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[1];?>" target="_blank"><?php echo $name[1]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[2];?>" target="_blank"><img src="<?php echo $cover[2]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[2];?>" target="_blank"><?php echo $name[2]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[3];?>" target="_blank"><img src="<?php echo $cover[3]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[3];?>" target="_blank"><?php echo $name[3]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[4];?>" target="_blank"><img src="<?php echo $cover[4]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[4];?>" target="_blank"><?php echo $name[4]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[5];?>" target="_blank"><img src="<?php echo $cover[5]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[5];?>" target="_blank"><?php echo $name[5]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[6];?>" target="_blank"><img src="<?php echo $cover[6]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[6];?>" target="_blank"><?php echo $name[6]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[7];?>" target="_blank"><img src="<?php echo $cover[7]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[7];?>" target="_blank"><?php echo $name[7]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[8];?>" target="_blank"><img src="<?php echo $cover[8]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[8];?>" target="_blank"><?php echo $name[8]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[9];?>" target="_blank"><img src="<?php echo $cover[9]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[9];?>" target="_blank"><?php echo $name[9]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[10];?>" target="_blank"><img src="<?php echo $cover[10]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[10];?>" target="_blank"><?php echo $name[10]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[11];?>" target="_blank"><img src="<?php echo $cover[11]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[11];?>" target="_blank"><?php echo $name[11]; ?></a></p>
				</li>				
			</ul>
		</div>
	</div>
	<!-- pfzg end-->
	<!-- tj begin-->
    <?php
      $sql="select * from animate order by likes limit 12;";
      $result=mysqli_query($conn,$sql) or die("数据库查询失败");
      $cover=array();
      $name=array();
      $animate_id=array();
      if(mysqli_num_rows($result)){
          while($row=mysqli_fetch_assoc($result)){
                  $cover[]=$row['cover'];
                  $name[]=$row['name'];
			  	  $animate_id[]=$row['animate_id'];
          }}
    ?>	
	<div class="tj">
		<div class="tj_t">
			<span>好番推荐</span>
			<a href="" target="_blank">查看更多</a>
		</div>	
		<div class="tj_v">
			<ul>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[0];?>" target="_blank"><img src="<?php echo $cover[0]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[0];?>" target="_blank"><?php echo $name[0]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[1];?>" target="_blank"><img src="<?php echo $cover[1]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[1];?>" target="_blank"><?php echo $name[1]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[2];?>" target="_blank"><img src="<?php echo $cover[2]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[2];?>" target="_blank"><?php echo $name[2]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[3];?>" target="_blank"><img src="<?php echo $cover[3]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[3];?>" target="_blank"><?php echo $name[3]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[4];?>" target="_blank"><img src="<?php echo $cover[4]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[4];?>" target="_blank"><?php echo $name[4]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[5];?>" target="_blank"><img src="<?php echo $cover[5]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[5];?>" target="_blank"><?php echo $name[5]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[6];?>" target="_blank"><img src="<?php echo $cover[6]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[6];?>" target="_blank"><?php echo $name[6]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[7];?>" target="_blank"><img src="<?php echo $cover[7]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[7];?>" target="_blank"><?php echo $name[7]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[8];?>" target="_blank"><img src="<?php echo $cover[8]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[8];?>" target="_blank"><?php echo $name[8]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[9];?>" target="_blank"><img src="<?php echo $cover[9]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[9];?>" target="_blank"><?php echo $name[9]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[10];?>" target="_blank"><img src="<?php echo $cover[10]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[10];?>" target="_blank"><?php echo $name[10]; ?></a></p>
				</li>
				<li>
				  <div><a href="../animate/detail.php?animate_id=<?php echo $animate_id[11];?>" target="_blank"><img src="<?php echo $cover[11]; ?>" alt=""/></a></div>
				  <p><a href="../animate/detail.php?animate_id=<?php echo $animate_id[11];?>" target="_blank"><?php echo $name[11]; ?></a></p>
				</li>				
			</ul>
		</div>
	</div>
	<!-- tj end-->	
	<iframe  scrolling="no" class="bottom" src="../footer.html"></iframe>
</body>
	
<script>
window.addEventListener('load', function() {
    var left = document.querySelector('.left');
    var right = document.querySelector('.right');
    var wrap = document.querySelector('.wrap');
    wrap.addEventListener('mouseenter', function() {
        left.style.display = 'block';
        right.style.display = 'block';
        clearInterval(timer);
        timer = null;
    })
    wrap.addEventListener('mouseleave', function() {
        left.style.display = 'none';
        right.style.display = 'none';
        timer = setInterval(function() {
            right.click();
        }, 2000);
    })
    // 动态生成圆点
    var ul = wrap.querySelector('.wrap ul');
    var ol = wrap.querySelector('.wrap ol');
	var wrapWidth = wrap.offsetWidth;
	/*	alert(wrapWidth);*/
	
    for (var i = 0; i < ul.children.length; i++) {
        // 创建节点
        var li = document.createElement('li');
        // 插入节点
        ol.appendChild(li);
        // 设置自定义属性
        li.setAttribute('index', i);
        // 绑定点击事件
        li.addEventListener('mouseover', function() {
            // 排他思想
            for (var i = 0; i < ol.children.length; i++) {
                ol.children[i].className = '';
            }
            this.className = 'on';
            // 点击圆圈移动图片，ul
            //animate(obj,target,callback)
            // 获取轮播区域宽度
            var index = this.getAttribute('index');
            var num = index;
            circle = index;
            // console.log(index);
            // 拿到索引号
            // console.log(wrapWidth);
            animate(ul, -index * wrapWidth);
        })
    }
    // 设置当前类名
    ol.children[0].className = 'on';
    // 克隆第一张图片
    var first = ul.children[0].cloneNode(true);
    ul.appendChild(first);
    // 点击右侧按钮，滚动图片
    var num = 0;
    var circle = 0;
    var flag = true;
    right.addEventListener('click', function() {
			 wrap = document.querySelector('.wrap');
			 wrapWidth = wrap.offsetWidth;
        if (flag) {
            flag = false;
            // 无缝滚动
            if (num == ul.children.length -1) {
                ul.style.left = 0;
                num = 0;
            }
            num++;
            animate(ul, -num * wrapWidth, function() {
                flag = true; //打开节流阀
            });
            // 点击按钮使圆圈相应变化
            circle++;
            // 排他思想
            if (circle == ol.children.length) {
                circle = 0;
            }
            circleChange();
		
        }
    });
    // 左侧按钮
    left.addEventListener('click', function() {
			 wrap = document.querySelector('.wrap');
			 wrapWidth = wrap.offsetWidth;
        if (flag) {
            flag = false;
            // 无缝滚动
            if (num == 0) {
                num = ul.children.length - 1;
                ul.style.left = -num * wrapWidth + 'px';
            }
			
            num--;
            animate(ul, -num * wrapWidth, function() {
                flag = true;
            });
            // 点击按钮使圆圈相应变化
            circle--;
            // 排他思想
            // if (circle < 0) {
            //     circle = ol.children.length - 1;
            // }
            circle = circle < 0 ? ol.children.length - 1 : circle;
            circleChange();
        }
    })
    function circleChange() {
        for (var i = 0; i < ol.children.length; i++) {
            ol.children[i].className = '';
        }
        ol.children[circle].className = 'on';
    }

    // 自动播放
    var timer = setInterval(function() {
        right.click();
    }, 2000);
    // 节流阀，防止轮播过快（回调函数）


})
	function animate(obj, target, callback) {
    // console.log(callback);  callback = function() {}  调用的时候 callback()

    // 先清除以前的定时器，只保留当前的一个定时器执行
    clearInterval(obj.timer);
    obj.timer = setInterval(function() {
        // 步长值写到定时器的里面
        // 把我们步长值改为整数 不要出现小数的问题
        // var step = Math.ceil((target - obj.offsetLeft) / 10);
        var step = (target - obj.offsetLeft) / 10;
        step = step > 0 ? Math.ceil(step) : Math.floor(step);
        if (obj.offsetLeft == target) {
            // 停止动画 本质是停止定时器
            clearInterval(obj.timer);
            // 回调函数写到定时器结束里面
            // if (callback) {
            //     // 调用函数
            //     callback();
            // }
            callback && callback();
        }
        // 把每次加1 这个步长值改为一个慢慢变小的值  步长公式：(目标值 - 现在的位置) / 10
        obj.style.left = obj.offsetLeft + step + 'px';
    }, 15);
}		
</script>	
</html>