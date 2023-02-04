<?php
include "config.php";
$sel="DELETE FROM `contact_us` WHERE `contact_us`.`id` = $_GET[id]";
if($con->query($sel)===TRUE){

     echo "<script>alert('Deleted');
                          location.href='contact.php'</script>";
}else{
     echo "<script>alert('Failed');
                          location.href='contact.php'</script>";
}


?>