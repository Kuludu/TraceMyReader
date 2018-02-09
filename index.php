<?php
if(isset($_GET["vid"])) {
 	$path = dirname(__FILE__);
 	$vid = $_GET["vid"];
 	
 	//checkPermission
 	$ifCheck = 0;
 	
 	$permissionfile = $path."/data/permission.cfg";
 	$fpermissionfile = fopen($permissionfile,"r");
	
 	while (($temp = fgets($fpermissionfile)) !== false) {
 		if($temp === $vid) $ifCheck = 1;
 	}
 	
 	fclose($fpermissionfile);
 	
 	if(!$ifCheck) die("Invalid Visitor ID");
 	
 	//getUserINFO
 	
 	$ua = strip_tags($_SERVER['HTTP_USER_AGENT']);
 	if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
 		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
 	} else {
 		$ip = $_SERVER["REMOTE_ADDR"];
 	}
 	
 	//witeData
 	
 	$data = $path."/data/".$vid."_1.html";
 	
 	$i = 1;
 	if(file_exists($data)) {
 		while(file_exists($data)) {
 			$i++;
 			$data = $path."/data/".$vid."_".$i.".html";
 		}
 	}
 	
 	$fdata = fopen($data,"w");
 	
 	$content = "IP:".$ip."<br/>UA:".$ua;
 	
 	fwrite($fdata,$content);
	fclose($fdata);
 }
 
 ?>
Kuludu Reader Tracker