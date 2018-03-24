<?php 
$required = "<font color='#FF0000' size='1'>*</font>";
$id = $_REQUEST['id'];
$res = $kavitaObj->getNewsById($id); 
$total = $res['NO_OF_ITEMS'];
$title = outText($res['oDATA'][0]['title']);
$category = outText($res['oDATA'][0]['category']);
$url = outText($res['oDATA'][0]['url']);
?>
<div class="col-12">
  <div class="pull-left"><h4>Update Kavita</h4></div>
  <div class="pull-right"><a href="<?=$_curpage?>">&laquo; Back</a></div>
<div class="clearfix"></div>
  <hr/>
  <div id="validation_div" class="validation_error" align="center"></div>
  <form name="frm" action="KavitaAction.php" method="post" onsubmit="return news_valid(this)" enctype="multipart/form-data" class="form-inline">
    <input type="hidden" name="act" value="updatenews" />
    <input type="hidden" name="id" value="<?=$res['oDATA'][0]['id'];?>" />
    <div id="validation_div" class="validation_error" align="center"></div>
     <table class="table table-bordered">
      
      <tr>
        <td align="left">Publish Date 
          <?=$required?> </td>
		  <td align="left">
        <input type="text" id="publish_date" name="publish_date" readonly="true" value="<?=outText($res['oDATA'][0]['publish_date']);?>" onclick="javascript:NewCssCal('publish_date','ddmmyyyy','dropdown',true,'12')" required/>
           
		  </td>
      </tr>
	  
	  <tr>
	  <td align="left">Category <?=$required?></td>
	  <td align="left">
		<?php
		 
		$already_selected_value = 1984;
		$earliest_year = 1950;

		print '<select name="category">';
		foreach (range(date('Y'), $earliest_year) as $x) {
		print '<option value="'.$x.'"'.($x == $category ? ' selected="selected"' : '').'>'.$x.'</option>';
		}
		print '</select>';
		?>
         </td>
	  </tr>
	  
	   <tr>
	  <td align="left">Upload file</td>
	  <td align="left"><input type="file" name="file_name" onchange="javascript:return validNewsFile(this.value)" value=""/>
        <span style="color:#990000; font-style:italic;">(Only Image allowed)</span> <a href="../documents/<?=outText($res['oDATA'][0]['file_name'])?>" target="_blank">view</a></td>
	  </tr>
	   <tr>
	  <td align="left">Title <?=$required?></td>
	  <td align="left"><textarea name="title" id="title" style="width:670px;height: 40px;"  onblur="fillURL(this.value,'url')" required><?=$title?></textarea> </td>
	  </tr>
	  <tr>
	  <td align="left">URL <?=$required?></td>
	  <td align="left"><textarea name="url" id="url" style="width:670px;height: 40px;" required><?=$url?></textarea> </td>
	  </tr>
	   <tr>
	  <td align="left">Description</td>
	  <td align="left"><?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = outText($res['oDATA'][0]['description']);
		$ctrl_name = 'description';
		$sBasePath = 'includes/fckeditor/';
		$oFCKeditor = new FCKeditor($ctrl_name);
		$oFCKeditor->Height = "400px";
		$oFCKeditor->Width = "100%";
		$oFCKeditor->BasePath = $sBasePath;
		$oFCKeditor->Value =$cntdesc;
		$oFCKeditor->Create();
	 ?></td>
	  </tr>
	   <tr>
	  <td align="center" colspan="2"> <input type="submit" name="submit" value="Update" class="btn btn-primary" />  </td>
	  </tr>
	  
    </table>
     
	
   
  </form>
</div>
