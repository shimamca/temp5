<?php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/PhotoGalleries.cls.php");

loginValidate();
$db = new SiteData();
$phoObj = new PhotoGalleries();

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$ext = array("html", "htm", "php");
define("ROOT_PATH","./");
$location = "photo-gallery.php";
switch($act) {
	case "addphoto": {
		$phoObj->addPhoto($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "editphoto": {
		$phoObj->editPhoto($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "addcategory": {
		$phoObj->addCategory($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
		
	case "editcategory": {
		$phoObj->updateCategory($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	
	case "del": {
		$id = (int)$_REQUEST['id'];
		$phoObj->deleteCategory($id);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "disable":{		
		$respond = $phoObj->disableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "enable":{		
		$respond = $phoObj->enableStatus($_REQUEST['id']);
		header("location:".$location);
	}break;
	case "delphoto": {
		$id = (int)$_REQUEST['id'];
		$phoObj->deletePhoto($id);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "disablephoto":{		
		$respond = $phoObj->disableStatusPhoto($_REQUEST['id']);
		$cid = ($_REQUEST['cid']);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "enablephoto":{		
		$respond = $phoObj->enableStatusPhoto($_REQUEST['id']);
		$cid = ($_REQUEST['cid']);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "sort_photocatagory":{		
		$respond = $phoObj->sortPhotocatagory($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "sort_photolist":{		
		$respond = $phoObj->sortPhotolist($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	default : break;
}
redirect ($location);
?>