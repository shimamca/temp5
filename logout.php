<?php
//logout.php
session_start();
require_once("../includes/settings.php");
require_once("../includes/database.php");
require_once("../includes/classes/db.cls.php");
require_once("../includes/classes/sitedata.cls.php");
require_once("includes/functions/common.php");
$db = new SiteData();


unset($_SESSION[SES]['admin']);
unset($_SESSION[SES]);
redirect("login.php");
?>
