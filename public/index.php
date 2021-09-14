<?php
    session_start();
    $_SESSION['baseurl'] = "http://10.9.223.216/seralance/";
    require_once('../app/init.php');
    $app = new App;    
?>