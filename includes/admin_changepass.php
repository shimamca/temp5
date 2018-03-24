<?php
$required = "<font color='#FF0000' size='1'>*</font>";
$id=$_REQUEST['id'];
$res = $adminObj->getAdminUserById($id);
$admin_id = $res['oDATA'][0]['admin_id'];
$admin_user = stripslashes($res['oDATA'][0]['admin_user']);
?>
<div class="content_header">
  <div class="heading fleft">Change Administrator Password</div>
  <div class="heading fright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
<div id="validation_div" class="validation_error"></div>
  <form name="frm" action="adminAction.php" method="post" onsubmit="return adminPassword(this);">
    <input type="hidden" name="act" value="changeadminLspass" />
    <input type="hidden" name="admin_id" value="<?=$admin_id?>" />
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td align="left" width="130" class="label">New Password <?=$required?></td>
          <td align="left" width="10">:</td>
          <td align="left"><input type="password" name="newpass" id="newpass" size="20" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Confirm Password <?=$required?></td>
          <td align="left">:</td>
          <td align="left"><input type="password" name="conpass" id="conpass" size="20" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left"></td>
          <td align="left" ><input type="submit" name="submit" value="Update" class="button"/></td>
        </tr>
      </table>
    </div>
  </form>
</div>