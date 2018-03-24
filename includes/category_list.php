<script language="javascript">
function deleteMessage(u_id){
	if(confirm("Are you sure to delete this photo category?")){
		document.location.href="PhotoAction.php?act=del&id="+u_id;
	}
}
</script>
 <?php
$total_page = $phoObj->getTotalCategory(); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['photo-category']['orderby'])?$_SESSION[SES]['photo-category']['orderby']:"category_id";
$order = isset($_SESSION[SES]['photo-category']['order'])?$_SESSION[SES]['photo-category']['order']:"desc";
$res = $phoObj->getAllCategory($page*PAGE_LIMIT,$orderby, $order); 
$total = $res['NO_OF_ITEMS'];

?>
  <div class="col-12">
  <div class="pull-left"><h4>Photo Gallery Management</h4></div>
  <div class="pull-right">
   <?php if($total_page>1){?> 
  <select name="page" onchange="document.location.href='photo-gallery.php?page='+this.value" class="sel1"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select> |
		<?php }?>
		
		 <a href="photo-gallery.php?q=add">Add New Category</a> </div>

  <div class="clearfix"></div>
  <hr/>



<?php if($total>0) {?>
<form action="PhotoAction.php" method="post" >
<input type="hidden" name="act" value="sort_photocatagory" />
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
    <tr>
      <th width="30">S.N.</th>
      <th  class="sort" onclick="sortdata('category_name')">Category</th>
	   <th width="30">Photos</th>
      <th width="30">Edit</th>
	   <th width="30">Delete</th>
	  <th width="30">Sorting</th>
    </tr>
	 </thead>
    <?php			
for($i=0;$i<$total;$i++) { 
$id = $res['oDATA'][$i]['category_id'];
$category_name = outText($res['oDATA'][$i]['category_name']);
$category_url = outText($res['oDATA'][$i]['category_url']);
$status = outText($res['oDATA'][$i]['category_status']);
$sort_order = outText($res['oDATA'][$i]['sort_order']);
$total_photos = $phoObj->getTotalPhotoGalleryByCat($id); 
?>
    <tr>
      <td align="center"><?=($page*PAGE_LIMIT)+$i+1?></td>
      <td align="left"><a href="<?=$_curpage?>?q=photogallery&id=<?=md5($id)?>"><?=$category_name?> [<?php echo $total_photos;?>]</a></td>
	    <td width="25" align="center"><a href="<?=$_curpage?>?q=photogallery&id=<?=md5($id)?>">
 <i class="fa fa-fw fa-image">&nbsp;</i>
		</a></td>
      <td width="25" align="center"><a href="<?=$_curpage?>?q=edit&id=<?=md5($id)?>"> <i class="fa fa-fw fa-edit">&nbsp;</i></a></td>
      
      <td width="25" align="center"><a href="javascript:void(0)">
	  <i class="fa fa-fw fa-trash" onClick="deleteMessage(<?=$id?>)">&nbsp;</i>
	  </a> </td>
	  <td width="25" align="center"><input type="text" class="minitbox" value="<?=$sort_order?>" name="sortorder[j<?=$id?>]" size="1" /></td>
    </tr>
    <?php } ?>
  </table>
  <div align="right"><input type="submit" value="Update Sort Order" class="btn btn-primary"/></div>
  </form>
  <?php } ?>
</div>
