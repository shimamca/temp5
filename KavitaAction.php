<?php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/kavita.cls.php");

loginValidate();
$db = new SiteData();
$kavitaObj = new Kavita();

$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$ext = array("html", "htm", "php");
define("ROOT_PATH","./");
$location = "kavita.php";
switch($act) {
	case "addnew": {
		$kavitaObj->addNews($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
		
	case "updatenews": {
		$kavitaObj->updateNews($_REQUEST);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	
	case "del": {
		$id = (int)$_REQUEST['id'];
		$kavitaObj->deleteNews($id);
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	case "disable":{		
		$respond = $kavitaObj->disableStatus($_REQUEST['id']);
	}break;
	case "enable":{		
		$respond = $kavitaObj->enableStatus($_REQUEST['id']);
	}break;
	case "sort_order": {				
			if(isset($_REQUEST['sortorder'])) {	
				foreach($_REQUEST['sortorder'] as $k=>$v) {
					$x = substr($k,1,strlen($k));
					$aid = (int)$x;
					$sql = "UPDATE ".KAVITA." set sort_order=$v where id='$aid'";
					$db->update($sql);
				}				
			}
	}break;
	
	default : break;
}
redirect ($location);
?>