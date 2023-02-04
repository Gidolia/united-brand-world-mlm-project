<?php
include "../../database_connect.php";
function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }
if(isset($_POST['btn_log'])){
    
    $string=$_POST[uid];
    
    $chars = '';
    $d_id = '';
    for ($index=0;$index < strlen($string); $index++) {
        if(isNumber($string[$index]))
        {
            $d_id .= $string[$index];
            
        }
        else {
            $chars .= $string[$index];}
        
    }
    //session_start();
    if($chars=="DA" || $chars=="da" || $chars=="Da")
    {
        session_start();
        $log="SELECT * FROM `distributor` WHERE `d_id`='$d_id' and `password`='$_POST[pwd]'";
        
        $res=$con->query($log);
        if($res->num_rows > 0){
          $_SESSION[d_id]=intval($d_id);
          $_SESSION[d_password]=$_POST[pwd];
        //echo $_SESSION[d_id];
         
           echo "<script>location.href='./index.php';</script>";
            }else{
                echo "<script>alert('Login Fail');location.href='../../login.php';</script>";
        }
    }
    else{
          	echo "<script>alert('Invalid user name or Password');
        	location.href='login.php';</script>";
        }
}   
?> 