<nav class="navbar navbar-expand-sm bg-light" id="mainNav">
<?php if(isLoggedin()) { ?>
       
         <a class="navbar-brand" href="index.php">Welcome <?=$_SESSION[SES]['admin']['admin_name']?> </a>
         
       
        <?php } else {echo '&nbsp';}?>	

   
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">Menu</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="photo-gallery.php">
            
            <span class="nav-link-text">Photo Gallery</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="banner.php">
            
            <span class="nav-link-text">Home Banner</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="news-events.php">
            
            <span class="nav-link-text">Article & Events</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="kavita.php">
            
            <span class="nav-link-text">Kavita</span>
          </a>
        </li>
      </ul>
      
	  
	  
	  
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
		
		<?php if(isLoggedin()) { ?>
       
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal" onclick="document.location.href='logout.php'" title="Click me">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
       
        <?php } else {echo '&nbsp';}?>	
         
        </li>
      </ul>
    </div>
  </nav>