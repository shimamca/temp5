<?php $admin_type = $_SESSION[SES]['admin']['admin_type'];?>
 <nav class="navbar navbar-default">
 <ul class="nav">
	<li><a href="index.php">Home</a></li>
	<li><a href="photo-gallery.php">Photo Gallery</a></li>
	<li><a href="banner.php">Banner Images</a></li>
	<li><a href="news-events.php">Article & Events</a></li>	
	<li style="margin-top:6px;"><a href="welogs.php" target="_blank">Website Logs</a></li>
</ul>
</nav>
<script type="text/javascript">
var file, n;
file = window.location.pathname;
n = file.lastIndexOf('/');
if (n >= 0) {
    file = file.substring(n + 1);
}
var flag=0;
$('.navbar').children('ul').each(function () {
    if($(this).children('li').attr("href")==file) {		
		$(this).addClass("active");
		flag=1;
	}
});
if(file=="") {
	$('.nav div:first-child(1)').addClass("active");
}
</script>