<div class="xhead"><div class="logo"><a href="/"><?=$huoduan['sitename']?></a></div><div class="gg"><?php 
include(ROOT_PATH.'/data/huoduan.ads_topr.php'); ?></div><div class="cl"></div></div>
<div class="head_tab_wrap">
	<div class="box">
    	<ul class="nav">
	<li<?php if($ishome){echo '  class="current"';}?>><a href="/"><em class="ico1">首页</em></a></li>
    <?php 
	  foreach($cat as $k=>$v){
	?>
         <li<?php if($topid==$k){echo '  class="current"';}?>><a href="<?=huoduancaturl($k)?>"><?=$catname[$k]?></a></li>
    <?php 
	  }
	?>
	
	</ul>
    </div>
</div>
<div class="gather_topmain clear">
	<div class="block_frame big_block_frame">
		<div class="block_con clear">
       <?php
	   if($topid==$sid){
		   foreach($cat[$topid] as $k=>$v){
		     echo '<a href="'.huoduancaturl($topid.'_'.$k).'">'.$v.'</a>&nbsp;&nbsp;'; 
		   }
	   }else{
		   foreach($cat as $k=>$v){
			   if(isset($v[$sid])){
				    foreach($cat[$k] as $kk=>$vv){
						if($sid==$kk){
							$astyle = ' style="color:#000"';
						}else{
							$astyle ='';
						}
		                 echo '<a'.$astyle.' href="'.huoduancaturl($k.'_'.$kk).'">'.$vv.'</a>&nbsp;&nbsp;'; 
					}
			   }
		   }
	   }
	   
	   ?>
		</div>
		<p class="block_foot"></p>
	</div>
</div>

<div style="width:960px; margin:0 auto;"><?php 
include(ROOT_PATH.'/data/huoduan.ads_top.php'); ?></div>