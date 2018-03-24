<?php $required = "<font color='#FF0000' size='1'>*</font>";?>
<div class="content_header">
  <div class="heading fleft">Add New Administrator</div>
  <div class="heading fright"><a href="<?=$_curpage?>">&laquo; Back</a></div>
</div>
<div class="bodycontent">
<div id="validation_div" class="validation_error"></div>
  <form name="frm" action="AdminAction.php" method="post" onsubmit="return addadmin_valid(this)">
    <input type="hidden" name="act" value="addadmin" />
	<input type="hidden" name="admin_type" value="2" />
    <div class="box01">
      <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
        <tr>
          <td width="150" align="left" class="label">Name  <?=$required?></td>
          <td width="8" align="center">:</td>
          <td align="left"><input type="text" name="name" id="name" value="" size="40"/></td>
        </tr>
        <tr>
          <td align="left" class="label">User Name  <?=$required?></td>
          <td align="center" class="label">:</td>
          <td><input type="text" name="uname" id="uname" size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Password  <?=$required?></td>
          <td align="center">:</td>
          <td><input type="password" name="pass" id="pass" size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Confirm Password  <?=$required?></td>
          <td align="center">:</td>
          <td><input type="password" name="repass" id="repass" size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Email  <?=$required?></td>
          <td align="center">:</td>
          <td><input type="text" id="email" name="email"size="40" value="" /></td>
        </tr>
        <tr>
          <td align="left" class="label">Phone</td>
          <td align="center">:</td>
          <td><input type="text" name="phone" size="40" value="" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td align="left"><input type="submit" name="submit" value="Submit" class="button" /></td>
        </tr>
      </table>
    </div>
  </form>
</div>
