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
$_curpage = currentPage();
$_SESSION[SES]['curpage'] = currentURL();
$login_uid = $_SESSION[SES]['admin']['admin_id'];
$logout_date_time= date("d-m-Y h:i");
//Select login details
$sql = "SELECT * from admin_logs where login_uid='$login_uid' order by login_id desc limit 1"; 
$res = $db->getData($sql);
$login_id = outText($res['oDATA'][0]['login_id']);
$login_date_time = outText($res['oDATA'][0]['login_date_time']);

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
        <div class="col-12"> <h4>Home</h4> <hr>
	<p>Welcome to Admin Panel</p>
	<p>Last Login Time : <?php echo $login_date_time;?></p>
        </div></div>
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
	document.location.href="BanerSort.php?orderby="+orderby;
} 
</script>

</body>

</html>
