<?php $required = "<font color='#FF0000' size='1'>*</font>";
$cid = $_REQUEST['cid'];
$id = $_REQUEST['id'];
$res = $phoObj->getPhotoById($id); 
$photo_id = $res['oDATA'][0]['photo_id'];
$photo_caption = outText($res['oDATA'][0]['photo_caption']);
$publish_date = outText($res['oDATA'][0]['publish_date']);
$photo_file = outText($res['oDATA'][0]['photo_file']);
$image = "../photo/".$photo_file;
$img = showImage($image,$width="",$height="80",$alt="IMG",$title="$photo_caption",$parameters="0");
?>
 <div class="col-12">
  <div class="pull-left"><h4>
    Update Photo
	</h4>
  </div>
  <div class="pull-right"> <a href="photo-gallery.php?q=photogallery&id=<?=$cid?>">&laquo; Back</a></div>
 <div class="clearfix"></div>
  <hr/>

  <form name="frm" action="PhotoAction.php" method="post" onsubmit="return photo_editvalid(this)" enctype="multipart/form-data">
    <input type="hidden" name="act" value="editphoto" />
	 <input type="hidden" name="photo_id" value="<?=$photo_id?>" />
    <div id="validation_div" class="validation_error" align="center"></div>
      <table class="table table-bordered">
        
        <tr>
          <td align="left" class="label">Title <?=$required?></td>
          <td align="center" class="label">:</td>
          <td colspan="2"><input type="text" name="photo_caption" size="80" value="<?=$photo_caption?>" /></td>
        </tr>
		<tr>
          <td align="left" class="label">Publish Date <?=$required?></td>
          <td align="center" class="label">:</td>
          <td colspan="2"><input type="text" id="publish_date" name="publish_date" readonly="true" value="<?=$publish_date?>" onclick="javascript:NewCssCal('publish_date','ddmmyyyy','dropdown',true,'12')"/></td>
        </tr>
		
		 <tr>
          <td align="left" class="label">Upload Photo <?=$required?></td>
          <td align="center">:</td>
          <td>
			<input type="file" name="photo_file" onchange="javascript:return validNewsFile(this.value)" value=""/>	
		
			</td>
			<td><?php echo $img;?></td>
        </tr>
         
        <tr>
         
          <td align="center" colspan="4"><input type="submit" name="submit" value="Update Photo" class="btn btn-primary" />
	  	  <div style="color:#990000; font-style:italic; padding:5px;">Only Image with 1mb size allowed.</div>
		  </td>
        </tr>
      </table>
  </form>
</div>
