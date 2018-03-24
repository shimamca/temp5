<nav class="navbar navbar-expand-sm bg-light" id="mainNav">
<?php if(isLoggedin()) { ?>
       
         <a class="navbar-brand" href="index.html">Welcome <?=$_SESSION[SES]['admin']['admin_name']?> </a>
         
       
        <?php } else {echo '&nbsp';}?>	

   
  
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
		
		<?php if(isLoggedin()) { ?>
       
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal" onclick="document.location.href='logout.php'">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
       
        <?php } else {echo '&nbsp';}?>	
         
        </li>
      </ul>
    </div>
  </nav>