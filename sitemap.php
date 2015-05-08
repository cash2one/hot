<?php

include("data/huoduan.config.php");
define('SYSPATH',$huoduan['path']);
include('inc/function.php');
function dir_path($path) { 
	$path = str_replace('\\', '/', $path); 
	if (substr($path, -1) != '/') $path = $path . '/'; 
	return $path; 
} 

function dir_list($path, $exts = '', $list = array()) { 
		$path = dir_path($path); 
		$files = glob($path . '*'); 
		foreach($files as $v) { 
		if (!$exts || preg_match("/\.($exts)/i", $v)) { 
		$list[] = $v; 
		if (is_dir($v)) { 
		$list = dir_list($v, $exts, $list); 
		} 
		} 
	} 
	return $list; 
} 
$filelist = dir_list('data/list/'); 


if(isset($_GET['type'])){
	$type = $_GET['type'];
}else{
	$type = 'xml';
}
if($type=='txt'){
	foreach($filelist as $k=>$v){
	     include($v);
		 foreach($topkey as $kk=>$vv){
			 echo 'http://'.$_SERVER['HTTP_HOST'].huoduansourl($vv)."\r\n";
		 }
     }
	
}else{
	header("Content-type: text/xml"); 
    echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<urlset>';
	 foreach($filelist as $k=>$v){
	     include($v);
		 foreach($topkey as $kk=>$vv){
			 echo '<loc>http://'.$_SERVER['HTTP_HOST'].huoduansourl($vv).'</loc>';
		 }
     }
	echo '</urlset>';
}
?>