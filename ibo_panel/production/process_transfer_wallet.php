<?php
include "config.php";
if(isset($_POST[transfer_amount]))
{
    function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }
    
    $string=$_POST[to_d_id];
       
    $chars = '';
    $to_d_id = '';
    for ($index=0;$index<strlen($string);$index++) {
        if(isNumber($string[$index]))
        {
            $to_d_id .= $string[$index];
        }
        else {
            $chars .= $string[$index];}
    }
    ////////////////////////from d_id
if($to_d_id!=$_SESSION[d_id])
{
    $saasasd="SELECT * FROM `distributor` WHERE `d_id`='$to_d_id'";
    $xopmlk=$con->query($saasasd);
    if($xopmlk->num_rows>0){
    $a_pin=$d_detail[yem_wallet]-$_POST[amount];
    if($a_pin>=0)
    {
        $up_que="UPDATE `distributor` SET `yem_wallet` = '$a_pin' WHERE `distributor`.`d_id` = $_SESSION[d_id];";
        
        $his_que="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`) VALUES (NULL, '$_SESSION[d_id]', '-', '$_POST[amount]', '$a_pin', 'transfered', '$to_d_id', '$_SESSION[d_id]', 'transfer', '$date', '$time');";
        
        /*$his_que="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '$_POST[pins]', '', '$to_d_id', 'n', '-', 'Transfered', '');";*/
        
        //////////////to d id
        $cd="SELECT * FROM `distributor` WHERE `d_id`='$to_d_id'";
        $sc=$con->query($cd);
        $fet=mysqli_fetch_assoc($sc);
        
        $a_pind=$fet[yem_wallet]+$_POST[amount];
        $up_quew="UPDATE `distributor` SET `yem_wallet` = '$a_pind' WHERE `distributor`.`d_id` = $to_d_id;";
        
        $his_quew="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`) VALUES (NULL, '$to_d_id', '+', '$_POST[amount]', '$a_pind', 'transfered', '', '$_SESSION[d_id]', 'transfer', '$date', '$time');";
        /*$his_quew="INSERT INTO `pin_wallet` (`pw_id`, `date`, `time`, `d_id`, `pin_qty`, `from_d_id`, `to_d_id`, `admin`, `type`, `note`, `req_no`) VALUES (NULL, '$date', '$time', '$to_d_id', '$_POST[pins]', '$_SESSION[d_id]', '', 'n', '+', 'Received', '');";*/
        
        if($con->query($up_que)===TRUE && $con->query($his_que)===TRUE && $con->query($up_quew)===TRUE && $con->query($his_quew)===TRUE)
        {
            ////////////////////for sending sms
    //         $message='DA'.$_SESSION[d_id].' You Have Transfer '.$_POST[amount].'/- to DA'.$to_d_id.' Digital Assets Sure';
    //         send_sms($d_detail[mobile], $message, 'Withdrawal Transfered', $_SESSION[d_id]);
    // 		///////////
    // 		////////////////////for sending sms
    //         $message='DA'.$_SESSION[d_id].' Your Withdrawal wallet Debited with '.$_POST[amount].' Now Your Withdrawal Wallet is '.$a_pin.', Dreamsway Sure';
    //         send_sms($d_detail[mobile], $message, 'Withdrawal Wallet', $_SESSION[d_id]);
    // 		///////////
    // 		////////////////////for sending sms
    //         $message='DS'.$to_d_id.' Your Withdrawal Wallet Credited with '.$_POST[amount].' Now Your Withdrawal Wallet is '.$a_pind.', Dreamsway Sure';
    //         send_sms($fet[mobile], $message, 'Withdrawal Wallet', $to_d_id);
    		///////////
            
            echo "<script>alert('amount Transfered sucessfully'); location.href='yem_wallet_transfer.php';</script>";
        }
        else{
            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'transfering amount query');";
    	        $con->query($fail);
            echo "<script>alert('Failed ! to transfer amount plz try again'); location.href='yem_wallet_transfer.php';</script>";
        }
    }else{
    echo "<script>alert('Failed! You Dont have balance to Transfer'); location.href='yem_wallet_transfer.php';</script>";
}
}else{
    echo "<script>alert('Failed! Plz Check ID No.'); location.href='yem_wallet_transfer.php';</script>";
}
}else{
    echo "<script>alert('Failed! You cannot transfer this amount to your self'); location.href='yem_wallet_transfer.php';</script>";
    }
}