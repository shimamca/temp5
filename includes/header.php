<header class="container-fluid">
<div class="row">
<div class="col-sm-10"><div style="font-size:1.9em;line-height:2.0em">
            <?=PAGE_TITLE?>
          </div>
          <div style="font-size:1.5em; color:#FFFF00;">Content Management System</div>
        </div> </div>
		
<div class="col-sm-2"><?php if(isLoggedin()) { ?>
       
          <div class="headerlinks">Welcome</div>
          <div class="headerlinks">
            <?=$_SESSION[SES]['admin']['admin_name']?>
          </div>
          <div style="padding-top:8px;">
            <input type="button" class="btn btn-danger" value="Sign out" onclick="document.location.href='logout.php'"/>
          </div>
       
        <?php } else {echo '&nbsp';}?>	
		</div>	
		</div>	

</header>
<?php getMessage();?>
