<?php
//page_edit.php
$required = "<font color='#FF0000' size='1'>*</font>";
$id = isset($_GET['id'])?$_GET['id']:0;
$res = $phoObj->getCategoryById($id);
if($res['NO_OF_ITEMS']>0) {
	$id = $res['oDATA'][0]['category_id'];
	$category_name = outText($res['oDATA'][0]['category_name']);
	$category_url = outText($res['oDATA'][0]['category_url']);
}
?>
  <div class="col-12">
 <div class="pull-left"><h4>
    Update Category
	</h4>
  </div>
  <div class="pull-right"> <a href="<?=$_curpage?>">&laquo; Back</a></div>
<div class="clearfix"></div>
  <hr/>


  <form action="PhotoAction.php" method="post" onsubmit="return validateCategory(this);" name="frm">
    <input type="hidden" name="act" value="editcategory" />
	 <input type="hidden" name="id" value="<?=$id?>" />
		
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <tr>
        <td align="left" class="label">Category Name <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="category_name" id="category_name" value="<?=$category_name?>"  onblur="fillURL(this.value,'category_url')" required/></td>
      </tr>
      <tr>
        <td align="left" class="label">Category URL <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="category_url" id="category_url" value="<?=$category_url?>"  required/></td>
      </tr>
      <tr>
      
        <td align="center" valign="middle"  colspan="3"><input name="submit" type="submit" value="Update Category" class="btn btn-primary" />
        </td>
      </tr>
    </table>
	
  </form>
  </div>


