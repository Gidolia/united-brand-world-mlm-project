<?php
include "config.php";

$selx="SELECT * FROM `pw_history` WHERE `pwh_id`='$_POST[pwh_id]'";
$def=$con->query($selx);
$sapm=$def->fetch_assoc();

$d_sel="SELECT * FROM `distributor` WHERE `d_id`='$sapm[a_d_id]'";
$dque=$con->query($d_sel);
$d_fet=$dque->fetch_assoc();


$bonus_perc=$_POST[yem_bonus];
$amount=$_POST[amount];
$at_price=$_POST[price];

$p_y_p= 1/$at_price;

$ex_bo = $amount*$bonus_perc/100;
$dp=$at_price*80;
echo $amount;
$tp_am= $p_y_p*((floatval($ex_bo) + floatval($amount))/80);

$yem_up_bonus="UPDATE `pw_history` SET `yem_bonus` = '$bonus_perc', `yem_delivered` = '1', `yem_at_price_in_doll` = '$at_price', `transfer_date_yem` = '$date', `transfer_time_yem`='$time', `yem_transfered_qty`='$tp_am', `yem_wallet_id` = '$d_fet[yem_wallet_id]' WHERE `pw_history`.`pwh_id` = '$_POST[pwh_id]';";
$a_yem=$d_fet[yem_wallet]+$tp_am;
$yem_wal="UPDATE `distributor` SET `yem_wallet` = '$a_yem' WHERE `distributor`.`d_id` = '$sapm[a_d_id]';";

$yem_wal_h="INSERT INTO `yem_wallet` (`yw_id`, `d_id`, `date`, `time`, `amount`, `b_bal`, `a_bal`, `type`, `note`, `pwh_id`) VALUES (NULL, '$sapm[a_d_id]', '$date', '$time', '$tp_am', '$d_fet[yem_wallet]', '$a_yem', '+', 'New Purchased', '$_POST[pwh_id]');";
if($con->query($yem_up_bonus)==TRUE && $con->query($yem_wal_h)==TRUE && $con->query($yem_wal)==TRUE){
    echo "<script>alert('Yem Distributed Successfully');location.href='yem_delevery_history.php';</script>";
}else{
    $fd="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$sapm[d_id]', 'admin', '$url', '', '$_POST[pwh_id]', 'n');";
    $con->query($fd);
    echo "<script>alert('Failed Plz Try Again');location.href='yem_delevery_history.php';</script>";
}

