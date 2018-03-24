<?php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
require_once("../includes/classes/Banner.cls.php");
loginValidate();
$bannerObj = new Banner();
$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$location = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:"index.php";
switch($act) {
		
	case "add": {
		$respond = $bannerObj->saveImage($_REQUEST);
	}break;
	case "edit": {
		$respond = $bannerObj->editImage($_REQUEST);
	}break;
	
	case "del": {
		$id = ($_REQUEST['id']);
		$sql="select * from ".BANNER." where photo_id='$id'";	
		$res = $bannerObj->getData($sql);
		$photo_data = $res['oDATA'][0]['photo_file'];
		$myFile = "../photo/$photo_data";
		$sql = "DELETE from ".BANNER." where photo_id='$id'";
		$res = $bannerObj->deleterecord($sql);
		@unlink($myFile);
		$msg = "<div>Photo Deleted .</div>";
		setMessage($msg);
	}break;
	case "sort_events": {	
			if(isset($_REQUEST['sortorder'])) {			
				foreach($_REQUEST['sortorder'] as $k=>$v) {
					$x = substr($k,1,strlen($k));
					$photo_id = (int)$x;
					$sql = "UPDATE ".BANNER." set sort_order=$v where photo_id=$photo_id";	
					$res= $bannerObj->update($sql);
				}				
			}
		}break;
	case "disable":{		
		$id = (int)($_REQUEST['id']);		
		$sql = "UPDATE ".BANNER." set status='0' where photo_id='$id'";
		$res = $bannerObj->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	
	case "enable":{		
		$id = (int)($_REQUEST['id']);	
		$sql = "UPDATE ".BANNER." set status='1' where photo_id='$id'";
		$res = $bannerObj->update($sql);
		if($res['oDATA']==1) {
			$msg="Status Updated Successfully.";
			setMessage($msg, "correct");
		}
		$location = $_SERVER['HTTP_REFERER'];
	}break;
	default : break;
}

header("location:".$_SERVER['HTTP_REFERER']);
?>