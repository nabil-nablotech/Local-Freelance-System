<!DOCTYPE html>
<?php include "../config.php" ?>
<html>

<head>
<title><?php echo $lang['title'] ?></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap.min.js">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<style>
ul{
  list-style: none;
  padding: 0;
  margin: 0;
}
ul li{
  float: left;
  margin: 0 5px;
}
ul li a{
  text-decoration:none;

}
ul li:hover{
  border-bottom: 2px solid black;
}

.form-inline a.nav-link:hover{
  border-bottom: 2px solid black;

 }
</style>

</head>

<body>
<!--  navigation bar -->

<nav class="navbar navbar-expand-lg fixed-top " style="background-color: whitesmoke!important;">
  <a class="navbar-brand" href="#"><img src="Image\Seralance logo.png"></a>
  <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color:blue"> 
    <span class="dark-blue-text"><i
        class="fas fa-bars fa-1x"></i></span>
        </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><bold><?php echo $lang['home'] ?> |</bold> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#how"><?php echo $lang['howitworks'] ?> |</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#offer"><?php echo $lang['whatwoweoffer'] ?> |</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about"><?php echo $lang['aboutus'] ?> |</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact"><?php echo $lang['contactus'] ?> |</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#faq"><?php echo $lang['FAQ'] ?> |</a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="#faq"><?php echo $lang['policy'] ?></a>
      </li>   
    </ul>
    <form class="form-inline my-2 my-lg-0 ">
    <li class="nav-item"  style="list-style-type: none;">
        <a class="nav-link" href="\LocalFreelanceSystem\registration\login-user.php"  ><?php echo $lang['signin'] ?> </a>
      </li>
    <li class="nav-item dropdown" style="list-style-type: none;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $lang['join'] ?> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">|
          <a class="dropdown-item" href="../registration\singupnew.php" style="margin-top:-30px;"><?php echo $lang['provider'] ?>  </a>
          <a class="dropdown-item" href="#"><?php echo $lang['seeker'] ?> </a>
        </div>
        
      </li>

      <li class="nav-item dropdown" style="list-style-type: none;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $lang['language'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?lang=am"><?php echo $lang['lang_am'] ?></a> 
          <a class="dropdown-item" href="index.php?lang=en"><?php echo $lang['lang_en'] ?></a>
        </div>
      </li>
    </form>
  </div>
</nav>
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