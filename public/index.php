<?php
    session_start();
    //$_SESSION['baseurl'] = "https://hostprovider.com/";

    /* When in local dev env */
    $_SESSION['baseurl'] = "http://10.9.223.173/seralance/";
    require_once('../app/init.php');
    $app = new App;    
?>