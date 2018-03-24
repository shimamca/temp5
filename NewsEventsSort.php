<?php
session_start();
require_once("../includes/settings.php");
require_once("includes/functions/common.php");

$_SESSION[SES]['news_events']['orderby'] = isset($_GET['orderby'])?$_GET['orderby']:"id";
if( isset($_SESSION[SES]['news_events']['order']) ) {
	if($_SESSION[SES]['news_events']['order'] == "asc" ) $_SESSION[SES]['news_events']['order'] = "desc";
	else $_SESSION[SES]['news_events']['order'] = "asc";
}
else {
	$_SESSION[SES]['news_events']['order'] = "desc";
}
redirect ($_SESSION[SES]['curpage']);
?>