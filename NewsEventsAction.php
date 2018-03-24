<?php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/News.cls.php");

loginValidate();
$db = new SiteData();
$newsObj = new News();

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$ext = array("html", "htm", "php");
define("ROOT_PATH","./");
$location = "news-events.php";
switch($act) {
	case "addnews": {
		$newsObj->addNews($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
		
	case "updatenews": {
		$newsObj->updateNews($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	
	case "del": {
		$id = (int)$_REQUEST['id'];
		$newsObj->deleteNews($id);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "disable":{		
		$respond = $newsObj->disableStatus($_REQUEST['id']);
	}break;
	case "enable":{		
		$respond = $newsObj->enableStatus($_REQUEST['id']);
	}break;
	case "sort_order": {				
			if(isset($_REQUEST['sortorder'])) {	
				foreach($_REQUEST['sortorder'] as $k=>$v) {
					$x = substr($k,1,strlen($k));
					$aid = (int)$x;
					$sql = "UPDATE ".NEWS_EVENTS." set sort_order=$v where id='$aid'";
					$db->update($sql);
				}				
			}
	}break;
	
	default : break;
}
redirect ($location);
?>