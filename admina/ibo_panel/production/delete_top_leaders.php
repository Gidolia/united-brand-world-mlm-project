<?php
include "config.php";
$sel="DELETE FROM `front_top_leaders` WHERE `front_top_leaders`.`ftl_id` = $_GET[id]";
if($con->query($sel)===TRUE){

     echo "<script>alert('Deleted');
                          location.href='top_leaders.php'</script>";
}else{
     echo "<script>alert('Failed');
                          location.href='top_leaders.php'</script>";
}


?>