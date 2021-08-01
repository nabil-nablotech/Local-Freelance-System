<?php
   require_once "../config.php";
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <style>
         .fakeimg {
         height: 200px;
         background: #aaa;
         }
         .navbar-light .navbar-toggler {
         color: black;
         border-color: black;
         font-weight: bolder;
         }
         .navbar-light .navbar-nav .nav-link {
         color: #007bff!important;
         text-decoration: none;
         background-color: transparent;
         }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-expand-sm bg-dark navbar-light fixed-top" style="background-color:whitesmoke!important;">
         <a class="navbar-brand" href="#"><img src="../Image/Seralance logo.png"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
         <span class="navbar-toggler-icon " style="color: black!important;"></span>
         </button>
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ">
            <li class="nav-item">
                  <a class="nav-link" href="Home.php"><?php  echo $lang['home'];?>  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="Home.php"><?php  echo $lang['Hsp'];?>  </a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link" href="Announce_project.php"><?php echo $lang['Ap'];?>  </a>
               </li>
               <li class="nav-item   " >
                  <a class="nav-link " href="Transaction.php"><i class="fa fa-money-check-alt"></i><?php echo $lang['Tra']; ?> </a>
               </li>
        
               <!-- drop down -->
               
               <li class="nav-item dropdown  " style="list-style-type: none;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa  fa-x fa-gift" aria-hidden="true"></i> <?php
                     echo $lang['project'];
                     ?>  
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#CCE5FF">
                     <a class="dropdown-item" href="completedProject.php">completed projects</a> 
                     <a class="dropdown-item" href="ongoingProject.php">Ongoing projects</a>
                     <a class="dropdown-item" href="terminatedproject.php">Terminated Projects</a>
                     <a class="dropdown-item" href="offeredproject.php">Offered Projects</a>
                     <a class="dropdown-item" href="announcedproject.php">Announced Projects</a>
                  </div>
               </li>
               <li class="nav-item  ">
                  <a class="nav-link" href="#faq"> <i class="fa fa-comment" aria-hidden="true"></i><?php
                     echo $lang['Message'];
                     ?>
                  <span class="badge rounded-pill badge-notification bg-danger" style="color: whitesmoke;">1</span>
                  </a>
               </li>
               <li class="nav-item dropdown " style="list-style-type: none;margin-left:0px;">
                  <a class="nav-link dropdown-toggle" href="Notification/fetch.php" id="navbarDropdown" role="button" 
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa  fa-x fa-bell" aria-hidden="true"></i> <?php
                     echo $lang['Notification'];
                     ?>  
                    
                     <span class="badge rounded-pill label-danger count badge-notification bg-danger"
                     style="color: whitesmoke;">1</span>   
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#CCE5FF">
      </ul>
               </li>
               <!--  -->
               <form class="form-inline my-2   my-lg-0 ">
                  <li class="nav-item dropdown" style="list-style-type: none;">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa  fa-x fa-user-circle" aria-hidden="true"></i> muleA
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#CCE5FF">
                        <a class="dropdown-item" href="updateprofile.php">profile</a> 
                        <a class="dropdown-item" href="Dispute.php">Dispute</a>
                        <a class="dropdown-item" href="index.php?lang=en"> ticket</a>
                        <a class="dropdown-item" href="index.php?lang=en">FAQ</a>
                        <a class="dropdown-item" href="index.php?lang=en">Policy</a>
                        <a class="dropdown-item" href="changepassword.php">change password</a>
                        <a class="dropdown-item" href="index.php?lang=en">Logout</a>
                     </div>
                  </li>
               </form>
            </ul>
         </div>
      </nav>
      <!--  -->
      <script>
         const $dropdown = $(".dropdown");
             const $dropdownToggle = $(".dropdown-toggle");
             const $dropdownMenu = $(".dropdown-menu");
             const $dropdownSubMenu = $(".dropdown-submenu");
             const showClass = "show";
             $(window).on("load resize", function() {
                 if (this.matchMedia("(min-width: 768px)").matches) {
                     $dropdown.hover(
                         function() {
                             const $this = $(this);
                             $this.addClass(showClass);
                             $this.find($dropdownToggle).attr("aria-expanded", "true");
                             $this.find($dropdownMenu).addClass(showClass);
                             $this.find($dropdownSubMenu).addClass(showClass);
                         },
                         function() {
                             const $this = $(this);
                             $this.removeClass(showClass);
                             $this.find($dropdownToggle).attr("aria-expanded", "false");
                             $this.find($dropdownMenu).removeClass(showClass);
                             $this.find($dropdownSubMenu).removeClass(showClass);
                         }
                     );
                 } else {
                     $dropdown.off("mouseenter mouseleave");
                 }
             });
      </script>

<!--  -->
<!--  -->

<script type = "text/javascript">
$(document).ready(function(){
	
	function load_unseen_notification(view = '')
	{
		$.ajax({
			url:"../Notification/fetch.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data)
			{
			$('.dropdown-menu').html(data.notification);
			if(data.unseen_notification > 0){
			$('.count').html(data.unseen_notification);
			}
			}
		});
	}
 
	load_unseen_notification();
 
	$('#add_form').on('submit', function(event){
		event.preventDefault();
		if($('#title').val() != '' && $('#message').val() != ''){
		var form_data = $(this).serialize();
		$.ajax({
			url:"../Nootification/add_notification.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
			$('#add_form')[0].reset();
			load_unseen_notification();
			}
		});
		}
		else{
			alert("Enter Data First");
		}
	});
 
	$(document).on('click', '.dropdown-toggle', function(){
	$('.count').html('');
	load_unseen_notification('yes');
	});
 
	setInterval(function(){ 
		load_unseen_notification();; 
	}, 5000);
 
});
</script>
<!--  -->

<!--  -->
   </body>
</html>