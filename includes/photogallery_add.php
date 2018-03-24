<?php $required = "<font color='#FF0000' size='1'>*</font>";
$id = $_REQUEST['id'];
$res = $phoObj->getCategoryById($id); 
$category_id = $res['oDATA'][0]['category_id'];
$category_name = outText($res['oDATA'][0]['category_name']);
?>
  <div class="col-12">
  <div class="pull-left"><h4>
    Add New Photo
	</h4>
  </div>
  <div class="pull-right">  <a href="photo-gallery.php?q=photogallery&id=<?=$id?>">&laquo; Back</a></div>
<div class="clearfix"></div>
  <hr/>

  <form name="frm" action="PhotoAction.php" method="post" onsubmit="return photo_valid()" enctype="multipart/form-data">
    <input type="hidden" name="act" value="addphoto" />
	 <input type="hidden" name="photo_category" value="<?=$category_id?>" />
    <div id="validation_div" class="validation_error" align="center"></div>
	<div style="width:700px;">
      <table width="100%" border="0" class="table table-bordered" cellspacing="0" cellpadding="3" align="center" id="gal"> 

        <tr>
          <th align="center" class="label">S.N.</th>
          <th align="left" class="label">Title <?=$required?></th>
          <th align="left" class="label">Upload Photo <?=$required?></th>
		   <th align="left" class="label">Publish Date <?=$required?></th>
        </tr>
		<tr>
          <td align="left">1</td>
          <td align="left"><input type="text" name="photo_caption[]" size="40" value="" /></td>
          <td align="left"><input type="file" name="photo_file[]" onchange="javascript:return validNewsFile(this.value)" value=""/></td>
		   <td align="left"><input type="text" id="publish_date" name="publish_date[]" readonly="true" value="" onclick="javascript:NewCssCal('publish_date','ddmmyyyy','dropdown',true,'12')"/>
          </td>
		  
        </tr>
      </table>
	  <div style="margin:6px 0;"> <a href="javascript:void(0)" onclick="addPhotoGalleryRow('gal')"> <b>+</b> Add Another Row</a><span id="delrow"> | <a href="javascript:void(0)" onclick="deletehotoGalleryRow('gal')"><b>-</b>Delete Last Row</a></span> </div>
	  <div align="center"><input type="submit" name="submit" value="Add Photo" class="btn btn-primary" />
	  <div style="color:#990000; font-style:italic; padding:5px;">Only Image with 1mb size allowed.</div>
	  </div>
	  <div>&nbsp;</div>
	  </div>
  </form>

</div>