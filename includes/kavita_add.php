<?php 
$required = "<font color='#FF0000' size='1'>*</font>";
?>
<div class="col-12">
  <div class="pull-left"><h4>Add Kavita</h4></div>
  <div class="pull-right"><a href="<?=$_curpage?>">&laquo; Back</a></div>
<div class="clearfix"></div>
  <hr/>
  <div id="validation_div" class="validation_error" align="center"></div>
  <form name="frm" action="KavitaAction.php" method="post" onsubmit="return news_valid(this)" enctype="multipart/form-data" class="form-inline">
    <input type="hidden" name="act" value="addnew" />
    <div id="validation_div" class="validation_error" align="center"></div>
     <table class="table table-bordered">
      
      <tr>
        <td align="left">Publish Date 
          <?=$required?> </td>
		  <td align="left">
        <input type="text" id="publish_date" name="publish_date" readonly="true" value="" onclick="javascript:NewCssCal('publish_date','ddmmyyyy','dropdown',true,'12')" required/>
           
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
        <span style="color:#990000; font-style:italic;">(Only Image allowed)</span></td>
	  </tr>
	   <tr>
	  <td align="left">Title <?=$required?></td>
	  <td align="left"><textarea name="title" id="title" style="width:670px;height: 40px;" onblur="fillURL(this.value,'url')" required></textarea> </td>
	  </tr>
	  <tr>
	  <td align="left">URL <?=$required?></td>
	  <td align="left"><textarea name="url" id="url" style="width:670px;height: 40px;" required></textarea> </td>
	  </tr>
	   <tr>
	  <td align="left">Description</td>
	  <td align="left"><?php
		include_once("includes/fckeditor/fckeditor.php") ;
		echo "\n";
		$cntdesc = "";
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
