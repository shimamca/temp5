<script language="javascript">
function deleteMessage(u_id){
	if(confirm("Are you sure to delete this ?")){
		document.location.href="KavitaAction.php?act=del&id="+u_id;
	}
}
</script>
 <?php
$total_page = $kavitaObj->getTotalPages(); 
$page = isset($_GET['page'])?(int)$_GET['page']:0;
$orderby = isset($_SESSION[SES]['news_events']['orderby'])?$_SESSION[SES]['news_events']['orderby']:"id";
$order = isset($_SESSION[SES]['news_events']['order'])?$_SESSION[SES]['news_events']['order']:"desc";
$res = $kavitaObj->getAllNews($page*PAGE_LIMIT,$orderby, $order); 
$total = $res['NO_OF_ITEMS'];
?>

  <div class="col-12">
  <div class="pull-left"><h4>Kavita</h4></div>
  <div class="pull-right"><a href="<?=$_curpage?>?q=add">Add New</a> |
  <?php if($total_page>1){?><select name="page" onchange="document.location.href='<?=$_curpage?>?page='+this.value"><?php
		for($i=0;$i<ceil($total_page/PAGE_LIMIT);$i++) {			
			if(isset($_GET['page']) && $_GET['page']!="" && $_GET['page']==$i) {
			echo '<option value="'.$i.'" selected="selected">Page '.($i+1).'</option>';}
			else {echo '<option value="'.$i.'">Page '.($i+1).'</option>';}
		} ?></select> <?php }?>
		</div>
		<div class="clearfix"></div>
  <hr/>
<?php if($total>0) {?>
<form action="KavitaAction.php" method="post" >
<input type="hidden" name="act" value="sort_order" />
  <table class="table table-bordered">
   <thead>
    <tr>
      <th>S.N.</th>
      <th class="sort" onclick="sortdata('publish_date')">Publish Date</th>
      <th class="sort" onclick="sortdata('title')">Title</th>
       <th class="sort" onclick="sortdata('category')">Category</th>
       <th>Edit</th>
	   <th>Delete</th>	  
	   <th>Sorting</th>
    </tr>
	 </thead>
    <?php			
for($i=0;$i<$total;$i++) { 
$id = $res['oDATA'][$i]['id'];
$publish_date = outText($res['oDATA'][$i]['publish_date']);
$title = outText($res['oDATA'][$i]['title']);
$status = outText($res['oDATA'][$i]['status']);
$sort_order = (int)$res['oDATA'][$i]['sort_order'];
$category = outText($res['oDATA'][$i]['category']);
?>
    <tr>
      <td align="center"><?=($page*PAGE_LIMIT)+$i+1?></td>
      <td align="left"><?=$publish_date?></td>
      <td align="left"><?=$title?></td>
        <td align="left"><?=$category?></td>
      <td width="25" align="center"><a href="<?=$_curpage?>?q=edit&id=<?=md5($id)?>"><i class="fa fa-fw fa-edit">&nbsp;</i></a></td>
      
      <td width="25" align="center"><a href="javascript:void(0)"><i class="fa fa-fw fa-trash" onClick="deleteMessage(<?=$id?>)">&nbsp;</i></a> </td>
	  
	  <td width="20" align="center"><input type="text" class="minitbox" value="<?=$sort_order?>" name="sortorder[j<?=$id?>]" size="1"/></td>
    </tr>
    <?php } ?>
  </table>
   <div align="right"><input type="submit" value="Update Sort Order" class="btn btn-primary"/></div>
  </form>
  <?php } ?>
</div>
