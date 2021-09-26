<?php
    session_start();
    //$_SESSION['baseurl'] = "https://hostprovider.com/";

    /* When in local dev env */
    $_SESSION['baseurl'] = "http://localhost/seralance/";
    require_once('../app/init.php');
    $app = new App;    
?>