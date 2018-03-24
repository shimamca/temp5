<?php $required = "<font color='#FF0000' size='1'>*</font>";?>
<?php
$id=$_REQUEST['id'];
$res = $adminObj->getAdminUserById($id);
$admin_id = md5($res['oDATA'][0]['admin_id']);
$admin_user = stripslashes($res['oDATA'][0]['admin_user']);
$admin_name = stripslashes($res['oDATA'][0]['admin_name']);
$admin_email = stripslashes($res['oDATA'][0]['admin_email']);
$admin_phone = stripslashes($res['oDATA'][0]['admin_phone']);
$admin_type = stripslashes($res['oDATA'][0]['admin_type']);
?>
<div class="content_header">
  <div class="heading fleft">Update Administrator</div>
  <div class="heading fright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
<div id="validation_div" class="validation_error"></div>
  <form name="frm" action="AdminAction.php" method="post" onsubmit="return editadmin_valid(this)">
    <input type="hidden" name="act" value="editadmin" />
    <input type="hidden" name="admin_id" value="<?=$admin_id?>" />
	<input type="hidden" name="admin_type" value="2" />
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td width="150" align="left" class="label">Name <?=$required?></td>
          <td width="10" align="center">:</td>
          <td align="left"><input type="text" name="name" id="name" size="40" value="<?=$admin_name?>" /></td>
        </tr>
        <tr>
          <td align="left" class="label">User Name <?=$required?></td>
          <td align="center">:</td>
          <td align="left"><input type="text" name="uname" id="uname" size="40" value="<?=$admin_user?>" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Email <?=$required?></td>
          <td align="center">:</td>
          <td align="left"><input type="text" name="email" id="email"size="40" value="<?=$admin_email?>" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Phone <?=$required?></td>
          <td align="center">:</td>
          <td align="left"><input type="text" name="phone" size="40" value="<?=$admin_phone?>" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="left"><input type="submit" name="submit" value="Update" class="button" /></td>
        </tr>
      </table>
    </div>
  </form>
</div>
