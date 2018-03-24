<?php

function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    // Uncomment one of the following alternatives
   $bytes /= pow(1024, $pow);
   $bytes = ceil($bytes);
   // $bytes /= (1 << (10 * $pow)); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
} 

function formatDate($date) {
	$pieces = explode("-",$date);
	$dt = date("d-m-Y H:i",strtotime($date));
	return $dt;
}
function redirect($page="") {
	if($page=="") return false;
	else @header("Location: ".$page);
}
function inText($str) {
	$str = addslashes(strip_tags($str));
	return $str;
}

function inHTML($str) {
	$str = addslashes($str);
	return $str;
}
function outText($str) {
	$str = stripslashes($str);
	return $str;
}
function getMessage() {
	if(isset($_SESSION[SES]['adminmsg'])) {
		echo $_SESSION[SES]['adminmsg'];
		unset($_SESSION[SES]['adminmsg']);
	}			
}
function setMessage($msg,$type='correct') {
	$_SESSION[SES]['adminmsg'] = '<div class="'.$type.'">'.$msg.'</div>';
}
function notNull($str) {
	if(trim($str)!="") return true;
	else return false;
}
function currentURL() {
	$currentpageurl = $_SERVER['PHP_SELF'];
	if($_SERVER['QUERY_STRING']) $currentpageurl .= '?'.$_SERVER['QUERY_STRING'];
	return $currentpageurl;
}
function currentPage() {
	$currentpageurl = $_SERVER['PHP_SELF'];
	return $currentpageurl;
}
function resizeImage ($image,$w=0,$h=0) {
	if(file_exists($image)) {
		list($width, $height, $type, $attr) = getimagesize($image);
		
		$new_height = 0;	$new_width = 0;
		if($w>0) {
			$new_height = ceil(($w/$width)*$height);
			$new_width = $w;
		}
		elseif($h>0) {
			$new_width = ceil(($h/$height)*$width);
			$new_height = $h;
		}
		$ret = array("width"=>$new_width, "height"=>$new_height);
		return $ret;
	}
	else {
		false;
	}
}
function showImage($image,$width="",$height="",$alt="",$title="",$parameters="") {
	list($orwidth, $orheight) = @getimagesize($image);
	if($orwidth!=0 && $orheight!=0) {		
		$img = "<img src='$image' ";
		if(notNull($alt)) $img .= "alt='$alt' ";
		if(notNull($title)) $img .= "title='$title' ";
		if(notNull($width)) {
			$img .= "width='$width' ";
			if(!notNull($height)) {
				$height = ceil(($width/$orwidth)*$orheight);
				$img .= "height='$height' ";
			}
		}
		if(notNull($height)) {
			$img .= "height='$height' ";
			if(!notNull($width)) {
				$width = ceil(($height/$orheight)*$orwidth);
				$img .= "width='$width' ";
			}
		}
		if(notNull($parameters)) $img .= $parameters;
		
		$img .= " border='0' />";
	}
	else {
		$img = "";
	}
	return $img;
}
function loginValidate() {
	if(!isLoggedin()) {
		redirect ("login.php");
	}
}
function isLoggedin() {
	if( isset($_SESSION[SES]['admin']) && count($_SESSION[SES]['admin'])>0 ) {
		return true;
	}
	else {
		return false;
	}
}
?>