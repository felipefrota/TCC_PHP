<?php 
    // session_start();
    // unset($_SESSION["user_portal"]);
    // header("location: Index/Index.php")


    session_start(); 
    session_destroy(); 
    header("location: Index/Index.php");exit; 

?>