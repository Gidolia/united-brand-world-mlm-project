<?php
    include('./config.php');
 
    session_start();
    session_destroy();
    unset($_SESSION);
     echo "<script>alert('Logout Success');location.href='../../login.php?';</script>";

?>