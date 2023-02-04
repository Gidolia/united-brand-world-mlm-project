<?php
include "config.php";


$sel="DELETE FROM `contact_us` WHERE `delete_auto_matrix_list.php`.`id` = $_GET[id]";
if($con->query($sel)===TRUE){

     echo "<script>alert('Deleted');
                          location.href='auto_matrix_list.php'</script>";
}else{
     echo "<script>alert('Failed');
                          location.href='auto_matrix_list.php'</script>";
}


?>