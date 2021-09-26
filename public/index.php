<?php
    session_start();
    $_SESSION['baseurl'] = "http://192.168.1.3/seralance/";
    require_once('../app/init.php');
    $app = new App;    
?>