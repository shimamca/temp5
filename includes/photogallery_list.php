<script language="javascript">
function deleteMessage(u_id){
	if(confirm("Are you sure to delete this photo ?")){
		document.location.href="PhotoAction.php?act=delphoto&id="+u_id;
	}
}
</script>
<?php
$cid = isset($_GET['id'])?$_GET['id']:0;

$total_page = $phoObj->getTotalPhotoGallery($cid); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['photo-gallery']['orderby'])?$_SESSION[SES]['photo-gallery']['orderby']:"photo_id";
$order = isset($_SESSION[SES]['photo-gallery']['order'])?$_SESSION[SES]['photo-gallery']['order']:"desc";
$res = $phoObj->getAllPhotoGallery($page*PAGE_LIMIT,$orderby, $order,$cid); 
$total = $res['NO_OF_ITEMS'];

$res_1 = $phoObj->getCategoryById($cid); 
$category_name = outText($res_1['oDATA'][0]['category_name']);
?>
  <div class="col-12">
  <div class="pull-left"><h4> <?=$category_name?> Gallery Management </h4></div>
  <div class="pull-right"> <a href="<?=$_curpage?>">&laquo; Back</a>
  <?php if($total_page>1){?>
  <select name="page" onchange="document.location.href='photo-gallery.php?page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select> |
		<?php }?>
		  <a href="photo-gallery.php?q=addphoto&id=<?=$cid?>">Add New Photo</a> </div>

  <div class="clearfix"></div>
 <hr/>
  <?php if($total>0) {?>
  <form action="PhotoAction.php" method="post" >
<input type="hidden" name="act" value="sort_photolist" />
  <table class="table table-bordered">
    <tr>
      <th width="30">S.N.</th>
      <th width="250">Name</th>
	   <th width="150">Publish Date</th>
      <th align="center">Photo</th>

       <th width="30">Edit</th>
	   <th width="30">Delete</th>
	  <th width="30">Sorting</th>
    </tr>
    <?php			
for($i=0;$i<$total;$i++) { 
$id = $res['oDATA'][$i]['photo_id'];
$photo_caption = outText($res['oDATA'][$i]['photo_caption']);
$photo_file = outText($res['oDATA'][$i]['photo_file']);
$publish_date = outText($res['oDATA'][$i]['publish_date']);
$status = outText($res['oDATA'][$i]['photo_status']);
$sort_order = outText($res['oDATA'][$i]['sort_order']);
$image = "../photo/".$photo_file;
$img = showImage($image,$width="",$height="150",$alt="IMG",$title="$photo_caption",$parameters="0");
?>
    <tr>
      <td align="center"><?=($page*PAGE_LIMIT)+$i+1?></td>
      <td align="left"><?=$photo_caption?></td>
	   <td align="left"><?=$publish_date?></td>
      <td align="center"><?=$img?></td>
      <td width="25" align="center"><a href="<?=$_curpage?>?q=editphoto&id=<?=md5($id)?>&cid=<?=$cid?>"> <i class="fa fa-fw fa-edit">&nbsp;</i></a></td>
      
      
	   <td width="25" align="center"><a href="javascript:void(0)"> <i class="fa fa-fw fa-trash" onClick="deleteMessage(<?=$id?>)">&nbsp;</i></a> </td>
	  <td width="25" align="center"><input type="text" class="minitbox" value="<?=$sort_order?>" name="sortorder[j<?=$id?>]" size="1"/></td>
    </tr>
    <?php } ?>
  </table>
   <div align="right"><input type="submit" value="Update Sort Order" class="btn btn-primary"/></div>
  </form>
  <?php } ?>
</div>
