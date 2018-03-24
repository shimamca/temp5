<?php
//school_add.php
$required = "<font color='#FF0000' size='1'>*</font>";
?>
  <div class="col-12">
  <div class="pull-left"><h4>
    Add New Category
	</h4>
  </div>
  <div class="pull-right"> <a href="<?=$_curpage?>">&laquo; Back</a></div>
 <div class="clearfix"></div>
  <hr/>


  <form action="PhotoAction.php" method="post" onsubmit="return validateCategory(this);" name="frm">
    <input type="hidden" name="act" value="addcategory" />
	<div id="validation_div" class="validation_error"></div>
	
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <tr>
        <td align="left" class="label">Category Name <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="category_name" id="category_name" value="" onblur="fillURL(this.value,'category_url')" required/></td>
      </tr>
      <tr>
        <td align="left" class="label">Category URL <?=$required?></td>
        <td align="center">:</td>
        <td align="left"><input type="text" name="category_url" id="category_url" value="" required/></td>
      </tr>
      <tr>
      
        <td align="center" valign="middle"  colspan="3"><input name="submit" type="submit" value="Add Category" class="btn btn-primary" />
        </td>
      </tr>
    </table>
	
  </form>
</div>