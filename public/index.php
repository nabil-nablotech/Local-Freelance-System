<?php
    session_start();
    $_SESSION['baseurl'] = "http://localhost/seralance/";
    require_once('../app/init.php');
    $app = new App;    
?>