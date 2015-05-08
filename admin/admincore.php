<?php
//ads
if(isset($_GET['act']) && $_GET['act']=='ads' &&isset($_POST['edit']) && $_POST['edit']==1){
	file_put_contents('../data/huoduan.ads.php',"<?php\n \$ads =  ".var_export($_POST['ads'],true).";\n?>");
	
	$datas = $_POST;
    $myads = $datas['myads'];
	foreach($myads as $k=>$v){
		$v = htmlspecialchars_decode($v);
		if (get_magic_quotes_gpc()) {
			$v = stripslashes($v);
		}
		file_put_contents('../data/huoduan.'.$k.'.php',$v);
	}
	$ads['search'] =$_POST['ads']['search'];
    $tips = '<span class="green" style="font-size:18px; margin-bottom:15px; display:block;">修改成功！</span>';
}

//plus
if( isset($_GET['act']) && $_GET['act']=='plus' && isset($_POST['edit']) && $_POST['edit']==1){
	
	$datas = $_POST;
    $plus = $datas['plus'];
	//print_r($plus);
	foreach($plus['key'] as $k=>$v){
		$plus['value'][$k] = htmlspecialchars_decode($plus['value'][$k]);
		if (get_magic_quotes_gpc()) {
			$plus['value'][$k] = stripslashes($plus['value'][$k]);
		}
		if($plus['key'][$k]==''){
			unset($plus['type'][$k]);
			unset($plus['key'][$k]);
			unset($plus['value'][$k]);
		}
		if($plus['type'][$k]==3){
			//$plus['key'][$k] = stripslashes($plus['key'][$k]);
			$plus['key'][$k] = str_replace('\\\\','\\',$plus['key'][$k]);
		}
	}
	if(file_put_contents('../data/huoduan.plus.php',"<?php\n \$plus =  ".var_export($plus,true).";\n?>")){
		$tips = '<span class="green" style="font-size:18px; margin-bottom:15px; display:block;">修改成功！</span>';
	}else{
	    $tips = '<span class="red" style="font-size:18px; margin-bottom:15px; display:block;">修改失败！</span>';	
	}
    
}
//setting
if( isset($_GET['act']) && $_GET['act']=='setting' && isset($_POST['edit']) && $_POST['edit']==1){
	$datas = $_POST;
	$data = $datas['huoduan'];
	
	$data['description'] = strip_tags($data['description']);
	$data['foot'] = htmlspecialchars_decode($data['foot']);
	if (get_magic_quotes_gpc()) {
		$data['foot'] = stripslashes($data['foot']);
	}
	$data['sort'] = trim($data['sort'],',');
	if($data['sort']==''){
	   $data['sort'] = '1,2,3,4,5,6,7,8,9,10';	
	}
    if(!isset($datas['huoduan']['joinhotkey'])){
		$data['joinhotkey']='0';
	}
	if($data['admin_pass']==''){
		$data['admin_pass'] = $huoduan['admin_pass'];
	}else{
	    $data['admin_pass'] = a($data['admin_pass']);	
	}
	
	if(file_put_contents('../data/huoduan.config.php',"<?php\n \$huoduan =  ".var_export($data,true).";\n?>")){
		$tips = '<span class="green" style="font-size:18px; margin-bottom:15px; display:block;">修改成功！</span>';
	}else{
		$tips = '<span class="red" style="font-size:18px; margin-bottom:15px;display:block;">修改失败！可能是文件权限问题，请给予data/huoduan.config.php写入权限</span>';
	}
	$diykey = $_POST['diykey'];
	file_put_contents('../data/huoduan.diykey.php',trim($diykey,"\r\n"));
     $huoduan = $data;
}
$file_inc = file_get_contents('inc.php');
if(!strpos($file_inc,base64_decode('UG93ZXJlZCBieSBodW9kdWFuLmNvbTwvdGl0bGU+'))){
	echo '1';exit;
}
$file_index = file_get_contents('index.php');
if(!strpos($file_index,base64_decode('aHR0cDovL3d3dy5odW9kdWFuLmNvbQ==')) || !strpos($file_index,base64_decode('OTA5NTE2ODY2'))|| !strpos($file_index,base64_decode('54Gr56uv572R57uc'))){
	echo '1';exit;
}
class huoduan_del {  
//循环目录下的所有文件  
function delFileUnderDir( $dirName="../cache/" ,$time=0)  
{  
if ( $handle = opendir( "$dirName" ) ) {  
   $u=1;

   while ( false !== ( $item = readdir( $handle ) ) ) {  
       if ( $item != "." && $item != ".." ) {  
		   if ( is_dir( "$dirName/$item" ) ) {  
				 delFileUnderDir( "$dirName/$item" );  
		   }else{  
			  $file = $dirName.$item;
			  $mtime = filemtime($file);
			    if($time==0){
					if(unlink($file)){
					  //echo "Deleted: $file"." ".date("Y-m-d H:i:s",$mtime)." "."<br />\n"; 
				   }
				}else{
					if(is_file($file) && (time()-filemtime($file))>$time){
					   if(unlink($file)){
						  //echo "Deleted: $file"." ".date("Y-m-d H:i:s",$mtime)." "."<br />\n";
						 
					   }
					}
				}
			}  
	   }  
   }  
   echo '<span style="font-size:22px; color:green">清除完毕！</span>';
   closedir( $handle );  
}  
}  
}  



?>