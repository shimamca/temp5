<?php $required = "<font color='#FF0000' size='1'>*</font>";?>

<div class="col-12">
  <div class="pull-left"><h4>Add New</h4> </div>
  <div class="pull-right"><a href="<?=$_curpage?>">&laquo; Back</a></div>
<div class="clearfix"></div>
  <hr/>
	<div id="validation_div" class="validation_error"></div>

  <form action="BannerAction.php" method="post" enctype="multipart/form-data" name="addphotofrm" onsubmit="return add_photo_valid(this);">
<input type="hidden" name="act" value="add" />
 <table class="table table-bordered">
  <tr>
    <td>Enter Caption <?=$required?></td>
    <td><textarea name="photo_caption" rows="2" cols="45" required></textarea></td>
  </tr>
  <tr>
    <td>Select Image <?=$required?></td>
    <td><input type="file" name="photo_file" required/>
	<div><i style="color:#CC0000;">Image Dimensions should be 500 &times; 500 px</i></div>
	</td>
  </tr> 
   
   <tr>    
    <td colspan="2" align="center" height="50" valign="bottom">
	<input name="submit" type="submit" value="Add Photo" class="btn btn-primary"/> &nbsp; &nbsp;
	<input name="reset" type="reset" value="Reset" class="btn btn-primary" />
	</td>
  </tr>
</table>
</form>
</div>