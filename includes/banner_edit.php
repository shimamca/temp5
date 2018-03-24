<?php $required = "<font color='#FF0000' size='1'>*</font>";?>
<?php
$id=$_REQUEST['id'];
$res = $bannerObj->getPhotoById($id);
$total = $res['NO_OF_ITEMS'];
if($total>0) {
	$photo_id = $res['oDATA'][0]['photo_id'];
	$photo_file = outText($res['oDATA'][0]['photo_file']);
	$photo_caption = outText($res['oDATA'][0]['photo_caption']);
	$sort_order = outText($res['oDATA'][0]['sort_order']);
	$photo_date = outText($res['oDATA'][0]['photo_date']);
	if($photo_file!="") {
		$img_file ="../photo/".$photo_file;
	}
}
?>
<div class="col-12">
  <div class="pull-left"><h4>Update <?=$photo_caption?></h4> </div>
  <div class="pull-right"><a href="<?=$_curpage?>">&laquo; Back</a></div>
<div class="clearfix"></div>
  <hr/>
	<div id="validation_div" class="validation_error"></div>

  <form action="BannerAction.php" method="post" enctype="multipart/form-data" name="addphotofrm" onsubmit="return edit_photo_valid(this);">
<input type="hidden" name="act" value="edit" />
 <input type="hidden" name="photo_id" value="<?=$photo_id?>" />
	 <table class="table table-bordered">
            <tr>
              <td>Caption <?=$required?></td>
              <td><textarea name="photo_caption" rows="2" cols="45" required><?=$photo_caption?></textarea></td>
            </tr>
            <tr>
              <td>Select Image </td>
              <td><input type="file" name="photo_file" />
                <a href="<?=$img_file?>" target="_blank" style="color:#CC0000">View</a>
					<div><i style="color:#CC0000;">Image Dimensions should be 500 &times; 500 px</i></div>
					<div><img src="<?=$img_file?>" width="50" height="50" alt="<?=$img_file?>" title="<?=$img_file?>"/></div>
				</td>
            </tr>
          
            
            <tr>
              <td colspan="2" align="center" height="50" valign="bottom"><input name="submit" type="submit" value="Update" class="btn btn-primary"/>
                &nbsp; &nbsp;
                <input name="cancel" type="button" value="Cancel" class="btn btn-primary" onclick="document.location.href='<?=$_SERVER['PHP_SELF']?>'"/>
              </td>
            </tr>
          </table>
</form>
</div>