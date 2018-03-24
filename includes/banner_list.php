<script language="javascript">
function deletePhoto(u_id){
	if(confirm("Are you sure to delete this?")){
		document.location.href="BannerAction.php?act=del&id="+u_id;
	}
}
</script>
 <?php
$total_page = $bannerObj->getTotalPages(); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['banner']['orderby'])?$_SESSION[SES]['banner']['orderby']:"photo_id";
$order = isset($_SESSION[SES]['banner']['order'])?$_SESSION[SES]['banner']['order']:"desc";
$res = $bannerObj->getAllBanners($page*PAGE_LIMIT,$orderby, $order); 
$total = $res['NO_OF_ITEMS'];
?>
<div class="col-12">
  <div class="pull-left"><h4>Banners</h4></div>
  <div class="pull-right"><a href="<?=$_curpage?>?q=add">Add New</a> | <?php if($total_page>1){?><select name="page" onchange="document.location.href='<?=$_curpage?>?page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select> <?php }?>
		</div>
 <div class="clearfix"></div>
  <hr/>

<?php if($total>0) {?>
<form action="BannerAction.php" method="post" >
<input type="hidden" name="act" value="sort_events" />
<table class="table table-bordered">
	<tr>
		<th width="30">SL.No</th>
		<th>Caption</th>
		<th width="200">Photo</th>
		<th width="100">Date</th>
		 <th width="30">Edit</th>
	   <th width="30">Delete</th>
	  <th width="30">Sorting</th>
	</tr>
	<?php			
for($i=0;$i<$total;$i++) { 
	$photo_id = $res['oDATA'][$i]['photo_id'];
	$photo_file = outText($res['oDATA'][$i]['photo_file']);
	$photo_caption = outText($res['oDATA'][$i]['photo_caption']);
	$photo_date = outText($res['oDATA'][$i]['photo_date']);
	$sort_order = outText($res['oDATA'][$i]['sort_order']);
	$status = outText($res['oDATA'][$i]['status']);
	if($photo_file!="") {
		$image = "<img src='../photo/".$photo_file."' height='100' width='200' border='0' />";
	}
	else {$image = "";}
?>		
	<tr>
		<td align="center" width="5%"><?=($i+1)?></td>
		<td align="center" ><?=($photo_caption)?></td>
		<td align="center"><?=$image?></td>
		<td align="center" width="90"><?=$photo_date?></td>
		
		<td width="50" height="25" align="center"><a href="<?=$_curpage?>?q=edit&id=<?=md5($photo_id)?>"><i class="fa fa-fw fa-edit">&nbsp;</i></a></td>
		<td width="53" height="25" align="center"><a href="javascript:void(0)" onClick="deletePhoto(<?=$photo_id?>)"><i class="fa fa-fw fa-trash">&nbsp;</i></a></td>
		<td width="25" align="center"><input type="text" class="minitbox" value="<?=$sort_order?>" name="sortorder[j<?=$photo_id?>]" size="2"/></td>
	</tr>
<?php } ?>          
</table>
<div align="right"><input type="submit" value="Update Sort Order" class="btn btn-primary"/></div>
</form>
  <?php } ?>
</div>
