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
$_curpage = currentPage();
$_SESSION[SES]['curpage'] = currentURL();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?=PAGE_TITLE?> :: ADMIN PANEL</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  
</head>

<body>

	 <!-- Navigation-->
  <?php include('header.php');?>
  <?php getMessage();?>
  <div class="content-wrapper">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-12">
         <?php
		$q= isset($_GET['q'])?$_GET['q']:"";
		switch($q) {
			case "add" : {include_once("includes/news_events_add.php"); break;}
			case "edit" : {include_once("includes/news_events_edit.php"); break;}
			default:  {include_once("includes/news_events_list.php"); break;}
		}?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('footer.php');?>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <script type='text/javascript' src='js/common.js'></script>
	<script type="text/javascript">
	function sortdata(orderby) {
	document.location.href="NewsEventsSort.php?orderby="+orderby;
	} 
	</script>
	<script type='text/javascript' src='js/datetimepicker_css.js'></script>
	<script src="js/bootstrap.min.js"></script>

</body>

</html>
