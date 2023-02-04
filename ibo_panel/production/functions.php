<?php
//include "config.php";
//////////////////////////function for distributing level commission
function distribute_level_commission($a_d_id, $a_amount, $point){
    global $con,$date,$time,$url;
    $sel="SELECT * FROM `distributor` WHERE `d_id`='$a_d_id'";
    $que=$con->query($sel);
    $fet=$que->fetch_assoc();
   
 
    /////////////////////////////////level 1
    $sel1="SELECT * FROM `distributor` WHERE `d_id`='$fet[s_id]'";
    $que1=$con->query($sel1);
    $fet1=$que1->fetch_assoc();
    $a1=$a_amount*10/100;
    $a_bal1=$fet1[withdrawal_wallet]+$a1;
    
   
    $ins_p1="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet1[d_id]', '$a_d_id', '$a_amount', '$point', '1', '$date', '$time', 'Level 1 Commission', '10', '$a1');";
    
    $ins_w1="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet1[d_id]', '+', '$a1', '$fet1[withdrawal_wallet]', '$a_bal1', 'Commission', '', '', '', '$date', '$time', '1', '$a_d_id');";
    $up_w1="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal1' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
    if($con->query($ins_p1)===TRUE && $con->query($ins_w1)===TRUE && $con->query($up_w1)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv1 query fail', '', '');";
        $con->query($ent);
    }
    /////////////////////////////////level 2
    $sel2="SELECT * FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
    $que2=$con->query($sel2);
    $fet2=$que2->fetch_assoc();
    $a2=$a_amount*5/100;
    $a_bal2=$fet2[withdrawal_wallet]+$a2;
    
    $ins_p2="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet2[d_id]', '$a_d_id', '$a_amount', '$point', '2', '$date', '$time', 'Level 2 Commission', '5', '$a2');";
    
    $ins_w2="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet2[d_id]', '+', '$a2', '$fet2[withdrawal_wallet]', '$a_bal2', 'Commission', '', '', '', '$date', '$time', '2', '$a_d_id');";
    $up_w2="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal2' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
    if($con->query($ins_p2)===TRUE && $con->query($ins_w2)===TRUE && $con->query($up_w2)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv2 query fail', '', '');";
        $con->query($ent);
    }
    /////////////////////////////////level 3
    $sel3="SELECT * FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
    $que3=$con->query($sel3);
    $fet3=$que3->fetch_assoc();
    $a3=$a_amount*5/100;
    $a_bal3=$fet3[withdrawal_wallet]+$a3;
    
    $ins_p3="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet3[d_id]', '$a_d_id', '$a_amount', '$point', '3', '$date', '$time', 'Level 3 Commission', '5', '$a3');";
    
    $ins_w3="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet3[d_id]', '+', '$a3', '$fet3[withdrawal_wallet]', '$a_bal3', 'Commission', '', '', '', '$date', '$time', '3', '$a_d_id');";
    $up_w3="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal3' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
    if($con->query($ins_p3)===TRUE && $con->query($ins_w3)===TRUE && $con->query($up_w3)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv3 query fail', '', '');";
        $con->query($ent);
    }
    /////////////////////////////////level 4
    $sel4="SELECT * FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
    $que4=$con->query($sel4);
    $fet4=$que4->fetch_assoc();
    $a4=$a_amount*3/100;
    $a_bal4=$fet4[withdrawal_wallet]+$a4;
    
    $ins_p4="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet4[d_id]', '$a_d_id', '$a_amount', '$point', '4', '$date', '$time', 'Level 4 Commission', '3', '$a4');";
    
    $ins_w4="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet4[d_id]', '+', '$a4', '$fet4[withdrawal_wallet]', '$a_bal4', 'Commission', '', '', '', '$date', '$time', '4', '$a_d_id');";
    $up_w4="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal4' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
    if($con->query($ins_p4)===TRUE && $con->query($ins_w4)===TRUE && $con->query($up_w4)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv4 query fail', '', '');";
        $con->query($ent);
    }
    
        /////////////////////////////////level 5
    $sel5="SELECT * FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
    $que5=$con->query($sel5);
    $fet5=$que5->fetch_assoc();
    $a5=$a_amount*2/100;
    $a_bal5=$fet5[withdrawal_wallet]+$a5;
    
    $ins_p5="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet5[d_id]', '$a_d_id', '$a_amount', '$point', '5', '$date', '$time', 'Level 5 Commission', '2', '$a5');";
    
    $ins_w5="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet5[d_id]', '+', '$a5', '$fet5[withdrawal_wallet]', '$a_bal5', 'Commission', '', '', '', '$date', '$time', '5', '$a_d_id');";
    $up_w5="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal5' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
    if($con->query($ins_p5)===TRUE && $con->query($ins_w5)===TRUE && $con->query($up_w5)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv5 query fail', '', '');";
        $con->query($ent);
    }
        /////////////////////////////////level 6
    $sel6="SELECT * FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
    $que6=$con->query($sel6);
    $fet6=$que6->fetch_assoc();
    $a6=$a_amount*1/100;
    $a_bal6=$fet6[withdrawal_wallet]+$a6;
    
    $ins_p6="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet6[d_id]', '$a_d_id', '$a_amount', '$point', '6', '$date', '$time', 'Level 6 Commission', '1', '$a6');";
    
    $ins_w6="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet6[d_id]', '+', '$a6', '$fet6[withdrawal_wallet]', '$a_bal6', 'Commission', '', '', '', '$date', '$time', '6', '$a_d_id');";
    $up_w6="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal6' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
    if($con->query($ins_p6)===TRUE && $con->query($ins_w6)===TRUE && $con->query($up_w6)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv6 query fail', '', '');";
        $con->query($ent);
    }
            /////////////////////////////////level 7
    $sel7="SELECT * FROM `distributor` WHERE `d_id`='$fet6[s_id]'";
    $que7=$con->query($sel7);
    $fet7=$que7->fetch_assoc();
    $a7=$a_amount*1/100;
    $a_bal7=$fet7[withdrawal_wallet]+$a7;
    
    $ins_p7="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet7[d_id]', '$a_d_id', '$a_amount', '$point', '7', '$date', '$time', 'Level 7 Commission', '1', '$a7');";
    
    $ins_w7="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet7[d_id]', '+', '$a7', '$fet7[withdrawal_wallet]', '$a_bal7', 'Commission', '', '', '', '$date', '$time', '7', '$a_d_id');";
    $up_w7="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal7' WHERE `distributor`.`d_id` = '$fet7[d_id]';";
    if($con->query($ins_p7)===TRUE && $con->query($ins_w7)===TRUE && $con->query($up_w7)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv7 query fail', '', '');";
        $con->query($ent);
    }
            /////////////////////////////////level 8
    $sel8="SELECT * FROM `distributor` WHERE `d_id`='$fet7[s_id]'";
    $que8=$con->query($sel8);
    $fet8=$que8->fetch_assoc();
    $a8=$a_amount*1/100;
    $a_bal8=$fet8[withdrawal_wallet]+$a8;
    
    $ins_p8="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet8[d_id]', '$a_d_id', '$a_amount', '$point', '8', '$date', '$time', 'Level 8 Commission', '1', '$a8');";
    
    $ins_w8="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet8[d_id]', '+', '$a8', '$fet8[withdrawal_wallet]', '$a_bal8', 'Commission', '', '', '', '$date', '$time', '8', '$a_d_id');";
    $up_w8="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal8' WHERE `distributor`.`d_id` = '$fet8[d_id]';";
    if($con->query($ins_p8)===TRUE && $con->query($ins_w8)===TRUE && $con->query($up_w8)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv8 query fail', '', '');";
        $con->query($ent);
    }
    
      /////////////////////////////////level 9
    $sel9="SELECT * FROM `distributor` WHERE `d_id`='$fet8[s_id]'";
    $que9=$con->query($sel9);
    $fet9=$que9->fetch_assoc();
    $a9=$a_amount*1/100;
    $a_bal9=$fet9[withdrawal_wallet]+$a9;
    
    $ins_p9="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet9[d_id]', '$a_d_id', '$a_amount', '$point', '9', '$date', '$time', 'Level 9 Commission', '1', '$a9');";
    
    $ins_w9="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet9[d_id]', '+', '$a9', '$fet9[withdrawal_wallet]', '$a_bal9', 'Commission', '', '', '', '$date', '$time', '9', '$a_d_id');";
    $up_w9="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal9' WHERE `distributor`.`d_id` = '$fet9[d_id]';";
    if($con->query($ins_p9)===TRUE && $con->query($ins_w9)===TRUE && $con->query($up_w9)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv9 query fail', '', '');";
        $con->query($ent);
    }
            /////////////////////////////////level 10
    $sel10="SELECT * FROM `distributor` WHERE `d_id`='$fet9[s_id]'";
    $que10=$con->query($sel10);
    $fet10=$que10->fetch_assoc();
    $a10=$a_amount*1/100;
    $a_bal10=$fet10[withdrawal_wallet]+$a10;
    
    $ins_p10="INSERT INTO `plan_income_manage` (`pim_id`, `d_id`, `off_d_id`, `a_package`, `point`, `level`, `date`, `time`, `note`, `percentage`, `amount`) VALUES (NULL, '$fet10[d_id]', '$a_d_id', '$a_amount', '$point', '10', '$date', '$time', 'Level 10 Commission', '1', '$a10');";
    
    $ins_w10="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$fet10[d_id]', '+', '$a10', '$fet10[withdrawal_wallet]', '$a_bal10', 'Commission', '', '', '', '$date', '$time', '10', '$a_d_id');";
    $up_w10="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal10' WHERE `distributor`.`d_id` = '$fet10[d_id]';";
    if($con->query($ins_p10)===TRUE && $con->query($ins_w10)===TRUE && $con->query($up_w10)===TRUE)
    {
        
    }
    else{
        $ent="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `f_amt_id`, `app`) VALUES (NULL, '$date', '$time', '$a_d_id', '', '$url', 'lv10 query fail', '', '');";
        $con->query($ent);
    }
    
   return 1; 
}
/*
/////////////////////////////////function for autopoool
/////////function for entering in auto matrix
//////////////////////////////////////////////function for inserting id
function insert_d_id($d_id)
{
    global $con, $date, $time;
    $sa="SELECT * FROM `auto_matrix_tree` WHERE `d_id`='$d_id';";
    $ax=$con->query($sa);
    
        
     
            //////////////////////for finding max amt_id
            
            $sqlkj="SELECT MAX(amt_id) as max FROM `auto_matrix_tree`";
      		$dfgh=$con->query($sqlkj);
    		$fdbv=mysqli_fetch_array($dfgh);
    		$amt_id=$fdbv[max]+1;
    		//echo "amt id ".$amt_id;
    		/////////////////////for finding placing id or sponser
    		$s_id=find_last_s_id_all();
    		$dfd="INSERT INTO `auto_matrix_tree` (`amt_id`, `s_id`, `d_id`, `id_type`, `e_date`, `e_time`, `i_distributed`) VALUES ('$amt_id', '$s_id', '$d_id', 'r', '$date', '$time', 'n');";
    		
    		if($con->query($dfd)===TRUE)
    		{
        		
    		}
    		else{
    		    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'auto_matrix_tree placing id fail');";
    	        $con->query($fail);
    		    //echo "fail";
    		}
        
}
///////////////////////////////////////////////function for finding last all s_id
function find_last_s_id_all()
{
    global $con;
    $sqlkj="SELECT MAX(amt_id) as max FROM `auto_matrix_tree`";
  	$dfgh=$con->query($sqlkj);
	$fdbv=mysqli_fetch_array($dfgh);
	$amt_id=$fdbv[max]+1;
	
	$fery="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fdbv[max]'";
	$edo=$con->query($fery);
	$fett=$edo->fetch_assoc();
	$last_s_idd=$fett[s_id];
	$ferys="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$fett[s_id]'";
	$edos=$con->query($ferys);
	if($edos->num_rows>1){
	    $s_id=$last_s_idd+1;
	}
	else{
	    $s_id=$last_s_idd;
	}
    return $s_id;  
}

////////////////////////////////////////////function for distributing automatrix income 

function find_autoatrix_income_to_distribute($amt_id){
    global $con, $date, $time;
    $a=0;
    $sel="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel);
    if($que->num_rows>1){
        $a=2;
        while($q=$que->fetch_assoc()){
            $selw="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$q[amt_id]'";
            $quew=$con->query($selw);
            while($rd=$quew->fetch_assoc()){
                $a++;
                $selwe="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$rd[amt_id]'";
                $quewe=$con->query($selwe);
                while($rde=$quewe->fetch_assoc()){
                    $a++;
                }
            }
        }
    }
    if($a>=14){$b=1;}else{$b=0;}
    return $b;
}
/////////////////////distributing automatrix
function distributing_automatrix_income(){
    global $con, $date, $time;
    $sel="SELECT * FROM `auto_matrix_tree` WHERE `i_distributed`='n'";
    $que=$con->query($sel);
    while($dd=$que->fetch_assoc()){
        $refff="SELECT * FROM `distributor` WHERE `d_id`='$dd[d_id]'";
        $sapo=$con->query($refff);
        $acop=$sapo->fetch_assoc();
        
        if(find_autoatrix_income_to_distribute($dd[amt_id])==1){
            $a_bal=$acop[withdrawal_wallet]+4000;
            $db="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$dd[d_id]', '+', '4000', '$acop[withdrawal_wallet]', '$a_bal', 'Automatrix Income', '', '', '$dd[amt_id]', '$date', '$time', '', '');";
            $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$dd[d_id]';";
            $ins="INSERT INTO `auto_matrix_income` (`ami_id`, `amt_id`, `d_id`, `amount`, `date`, `time`) VALUES (NULL, '$dd[amt_id]', '$dd[d_id]', '4000', '$date', '$time');";
            $rsaxax="UPDATE `auto_matrix_tree` SET `i_distributed` = 'y' WHERE `auto_matrix_tree`.`amt_id` = '$dd[amt_id]';";
            if($con->query($db)===TRUE && $con->query($up)===TRUE && $con->query($ins)===TRUE && $con->query($rsaxax)===TRUE){
                
            }else{
                $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$dd[amt_id]', '', '$url', 'auto matrix income');";
    	        $con->query($fail);
            }
        }
    }
}
*/
/////////////////////////////for automatrix second

//////////////////////////////////////////////function for inserting id
function insert_d_id($d_id)
{
    global $con, $date, $time;
    $sa="SELECT * FROM `auto_matrix_2_tree` WHERE `d_id`='$d_id';";
    $ax=$con->query($sa);
    
        
     
            //////////////////////for finding max amt_id
            
            $sqlkj="SELECT MAX(amt_id) as max FROM `auto_matrix_2_tree`";
      		$dfgh=$con->query($sqlkj);
    		$fdbv=mysqli_fetch_array($dfgh);
    		$amt_id=$fdbv[max]+1;
    		//echo "amt id ".$amt_id;
    		/////////////////////for finding placing id or sponser
    		$s_id=find_last_s_id_all();
    		$dfd="INSERT INTO `auto_matrix_2_tree` (`amt_id`, `s_id`, `d_id`, `id_type`, `e_date`, `e_time`, `i_distributed`) VALUES ('$amt_id', '$s_id', '$d_id', 'r', '$date', '$time', 'n');";
    		
    		if($con->query($dfd)===TRUE)
    		{
        		
    		}
    		else{
    		    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'auto_matrix_2_tree placing id fail');";
    	        $con->query($fail);
    		    //echo "fail";
    		}
        
}
///////////////////////////////////////////////function for finding last all s_id
function find_last_s_id_all()
{
    global $con;
    $sqlkj="SELECT MAX(amt_id) as max FROM `auto_matrix_2_tree`";
  	$dfgh=$con->query($sqlkj);
	$fdbv=mysqli_fetch_array($dfgh);
	$amt_id=$fdbv[max]+1;
	
	$fery="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$fdbv[max]'";
	$edo=$con->query($fery);
	$fett=$edo->fetch_assoc();
	$last_s_idd=$fett[s_id];
	$ferys="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$fett[s_id]'";
	$edos=$con->query($ferys);
	if($edos->num_rows>1){
	    $s_id=$last_s_idd+1;
	}
	else{
	    $s_id=$last_s_idd;
	}
    return $s_id;  
}

////////////////////////////////////////////function for distributing automatrix income 

function find_autoatrix_income_to_distribute($amt_id){
    global $con, $date, $time;
    $a=0;
    $sel="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel);
    if($que->num_rows>1){
        $a=2;
        while($q=$que->fetch_assoc()){
            $selw="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$q[amt_id]'";
            $quew=$con->query($selw);
            while($rd=$quew->fetch_assoc()){
                $a++;
                $selwe="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$rd[amt_id]'";
                $quewe=$con->query($selwe);
                while($rde=$quewe->fetch_assoc()){
                    $a++;
                }
            }
        }
    }
    if($a>=14){$b=1;}else{$b=0;}
    return $b;
}
/////////////////////distributing automatrix
function distributing_automatrix_income(){
    global $con, $date, $time;
    $sel="SELECT * FROM `auto_matrix_2_tree`";
    $que=$con->query($sel);
    while($dd=$que->fetch_assoc()){
        $refff="SELECT * FROM `distributor` WHERE `d_id`='$dd[d_id]'";
        $sapo=$con->query($refff);
        $acop=$sapo->fetch_assoc();
        switch ($dd[i_level_distribute]){
          case "0":
            if(auto_l_1($dd[amt_id])>=2){
                $a_bal=$acop[withdrawal_wallet]+120;
                $db="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$dd[d_id]', '+', '120', '$acop[withdrawal_wallet]', '$a_bal', 'Automatrix Income', '', '', '$dd[amt_id]', '$date', '$time', '1', '');";
                $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$dd[d_id]';";
                $cs="UPDATE `auto_matrix_2_tree` SET `i_level_distribute` = '1' WHERE `auto_matrix_2_tree`.`amt_id` = '$dd[amt_id]';";
                $ed="INSERT INTO `auto_matrix2_income` (`ami_id`, `amt_id`, `d_id`, `level`, `amount`, `date`, `time`, `l_person`) VALUES (NULL, '$dd[amt_id]', '$dd[d_id]', '1', '120', '$date', '$time', '2');";
                $con->query($cs);
                $con->query($ed);
                $con->query($db);
                $con->query($up);
            //echo $dd[amt_id]." LEvel = 1<br>";
            }
            break;
          case "1":
            if(auto_l_2($dd[amt_id])>=4){
                $a_bal=$acop[withdrawal_wallet]+240;
                $db="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$dd[d_id]', '+', '240', '$acop[withdrawal_wallet]', '$a_bal', 'Automatrix Income', '', '', '$dd[amt_id]', '$date', '$time', '2', '');";
                $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$dd[d_id]';";
                $cs="UPDATE `auto_matrix_2_tree` SET `i_level_distribute` = '2' WHERE `auto_matrix_2_tree`.`amt_id` = '$dd[amt_id]';";
                $ed="INSERT INTO `auto_matrix2_income` (`ami_id`, `amt_id`, `d_id`, `level`, `amount`, `date`, `time`, `l_person`) VALUES (NULL, '$dd[amt_id]', '$dd[d_id]', '2', '240', '$date', '$time', '4');";
                $con->query($cs);
                $con->query($ed);
                $con->query($db);
                $con->query($up);
            //echo $dd[amt_id]." LEvel = 2<br>";
            }
            break;
          case "2":
            if(auto_l_3($dd[amt_id])>=8){
                $a_bal=$acop[withdrawal_wallet]+480;
                $db="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$dd[d_id]', '+', '480', '$acop[withdrawal_wallet]', '$a_bal', 'Automatrix Income', '', '', '$dd[amt_id]', '$date', '$time', '3', '');";
                $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$dd[d_id]';";
                $cs="UPDATE `auto_matrix_2_tree` SET `i_level_distribute` = '3' WHERE `auto_matrix_2_tree`.`amt_id` = '$dd[amt_id]';";
                $ed="INSERT INTO `auto_matrix2_income` (`ami_id`, `amt_id`, `d_id`, `level`, `amount`, `date`, `time`, `l_person`) VALUES (NULL, '$dd[amt_id]', '$dd[d_id]', '3', '480', '$date', '$time', '8');";
                $con->query($cs);
                $con->query($ed);
                $con->query($db);
                $con->query($up);
            //echo $dd[amt_id]." LEvel = 3<br>";
            }
            break;
          case "3":
            if(auto_l_4($dd[amt_id])>=16){
                $a_bal=$acop[withdrawal_wallet]+960;
                $db="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$dd[d_id]', '+', '960', '$acop[withdrawal_wallet]', '$a_bal', 'Automatrix Income', '', '', '$dd[amt_id]', '$date', '$time', '4', '');";
                $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$dd[d_id]';";
                $cs="UPDATE `auto_matrix_2_tree` SET `i_level_distribute` = '4' WHERE `auto_matrix_2_tree`.`amt_id` = '$dd[amt_id]';";
                $ed="INSERT INTO `auto_matrix2_income` (`ami_id`, `amt_id`, `d_id`, `level`, `amount`, `date`, `time`, `l_person`) VALUES (NULL, '$dd[amt_id]', '$dd[d_id]', '4', '960', '$date', '$time', '16');";
                $con->query($cs);
                $con->query($ed);
                $con->query($db);
                $con->query($up);
            //echo $dd[amt_id]." LEvel = 4<br>";
            }
            break;
          case "4":
            if(auto_l_5($dd[amt_id])>=32){
                $a_bal=$acop[withdrawal_wallet]+1920;
                $db="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$dd[d_id]', '+', '1920', '$acop[withdrawal_wallet]', '$a_bal', 'Automatrix Income', '', '', '$dd[amt_id]', '$date', '$time', '5', '');";
                $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$dd[d_id]';";
                $cs="UPDATE `auto_matrix_2_tree` SET `i_level_distribute` = '5' WHERE `auto_matrix_2_tree`.`amt_id` = '$dd[amt_id]';";
                $ed="INSERT INTO `auto_matrix2_income` (`ami_id`, `amt_id`, `d_id`, `level`, `amount`, `date`, `time`, `l_person`) VALUES (NULL, '$dd[amt_id]', '$dd[d_id]', '5', '1920', '$date', '$time', '32');";
                $con->query($cs);
                $con->query($ed);
                $con->query($db);
                $con->query($up);
            //echo $dd[amt_id]." LEvel = 5<br>";
            }
            break;
          case "5":
            if(auto_l_6($dd[amt_id])>=64){
                $a_bal=$acop[withdrawal_wallet]+3840;
                $db="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$dd[d_id]', '+', '3840', '$acop[withdrawal_wallet]', '$a_bal', 'Automatrix Income', '', '', '$dd[amt_id]', '$date', '$time', '6', '');";
                $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$dd[d_id]';";
                $cs="UPDATE `auto_matrix_2_tree` SET `i_level_distribute` = '6' WHERE `auto_matrix_2_tree`.`amt_id` = '$dd[amt_id]';";
                $ed="INSERT INTO `auto_matrix2_income` (`ami_id`, `amt_id`, `d_id`, `level`, `amount`, `date`, `time`, `l_person`) VALUES (NULL, '$dd[amt_id]', '$dd[d_id]', '6', '3840', '$date', '$time', '64');";
                $con->query($cs);
                $con->query($ed);
                $con->query($db);
                $con->query($up);
            //echo $dd[amt_id]." LEvel = 5<br>";
            }
            break;
          case "6":
            if(auto_l_7($dd[amt_id])>=128){
                $a_bal=$acop[withdrawal_wallet]+7680;
                $db="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL, '$dd[d_id]', '+', '7680', '$acop[withdrawal_wallet]', '$a_bal', 'Automatrix Income', '', '', '$dd[amt_id]', '$date', '$time', '7', '');";
                $up="UPDATE `distributor` SET `withdrawal_wallet` = '$a_bal' WHERE `distributor`.`d_id` = '$dd[d_id]';";
                $cs="UPDATE `auto_matrix_2_tree` SET `i_level_distribute` = '7' WHERE `auto_matrix_2_tree`.`amt_id` = '$dd[amt_id]';";
                $ed="INSERT INTO `auto_matrix2_income` (`ami_id`, `amt_id`, `d_id`, `level`, `amount`, `date`, `time`, `l_person`) VALUES (NULL, '$dd[amt_id]', '$dd[d_id]', '7', '7680', '$date', '$time', '128');";
                $con->query($cs);
                $con->query($ed);
                $con->query($db);
                $con->query($up);
            //echo $dd[amt_id]." LEvel = 5<br>";
            }
            break;
          
        }
        
    }
}

/////////////////////////////////////////function for counting points
function find_leg_point($d_id){
        global $con;
        $g0="SELECT * FROM `distributor` WHERE `d_id`='$d_id'";
        $que0=$con->query($g0);
        $d0=$que0->fetch_assoc();
        if($d0[a_status]=='y'){$a_d=1;}else{$a_d=0;}
        $g="SELECT * FROM `distributor` WHERE `s_id`='$d_id'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            if($d[a_status]=='y'){$a_d++;}
            
            
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                if($d2[a_status]=='y'){$a_d++;}
                
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    if($d3[a_status]=='y'){$a_d++;}
                    
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                        if($d4[a_status]=='y'){$a_d++;}
                        $g5="SELECT * FROM `distributor` WHERE `s_id`='$d4[d_id]'";
                        $que5=$con->query($g5);
                        while($d5=$que5->fetch_assoc())
                        {
                            if($d5[a_status]=='y'){$a_d++;}
                            $g6="SELECT * FROM `distributor` WHERE `s_id`='$d5[d_id]'";
                            $que6=$con->query($g6);
                            while($d6=$que6->fetch_assoc())
                            {
                                if($d6[a_status]=='y'){$a_d++;}
                                $g7="SELECT * FROM `distributor` WHERE `s_id`='$d6[d_id]'";
                                $que7=$con->query($g7);
                                while($d7=$que7->fetch_assoc())
                                {
                                    if($d7[a_status]=='y'){$a_d++;}
                                    $g8="SELECT * FROM `distributor` WHERE `s_id`='$d7[d_id]'";
                                    $que8=$con->query($g8);
                                    while($d8=$que8->fetch_assoc())
                                    {
                                        if($d8[a_status]=='y'){$a_d++;}
                                        $g9="SELECT * FROM `distributor` WHERE `s_id`='$d8[d_id]'";
                                        $que9=$con->query($g9);
                                        while($d9=$que9->fetch_assoc())
                                        {
                                            if($d9[a_status]=='y'){$a_d++;}
                                            $g10="SELECT * FROM `distributor` WHERE `s_id`='$d9[d_id]'";
                                            $que10=$con->query($g10);
                                            while($d10=$que10->fetch_assoc())
                                            {
                                                if($d10[a_status]=='y'){$a_d++;}
                                                
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
     return $a_d;       
}
/////////////////////////////////////////function for counting points
function find_proposal_point($d_id){
        global $con;
        $a_d=0;
        $g="SELECT * FROM `distributor` WHERE `p_id`='$d_id'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            if($d[a_status]=='y'){$a_d++;}
            
        }
        
     return $a_d;       
}

///////////////////////////function for finding under id
function for_finding_under_id_number($d_id, $u_d_id)
{
    global $con;
    $sel="SELECT d_id,s_id FROM `distributor` WHERE `d_id`='$d_id'";
    $que=$con->query($sel);
    $fet=$que->fetch_assoc();
    
    
    /////////////////////////for level One
    $temp=array();
    $temp1=array();
    $a=0;
    $sel1="SELECT d_id,s_id,a_status FROM `distributor` WHERE `s_id`='$fet[d_id]'";
    $que1=$con->query($sel1);
    while($fet1=$que1->fetch_assoc())
    {
        
        $temp[]=$fet1[d_id];
        if($fet1[d_id]==$u_d_id)
        {
           $a=1;
        }
    }
    /////////////////////////for level second
    
    for($x=0;$x<count($temp);$x++)
    {
    	$sel3="SELECT d_id,s_id,a_status FROM `distributor` WHERE `s_id`='$temp[$x]'";
    	$que3=$con->query($sel3);
    	while($fet3=$que3->fetch_assoc())
    	{
    	    //echo "<br>".$fet3[d_id];
    		$temp1[]=$fet3[d_id];
    		if($fet3[d_id]==$u_d_id)
            {
               $a=1;
            }
    	}
    }
    unset($temp);
    $temp=array();
    /////////////////////////////////////////////////////////////////////////////////////////////level 3
    for($x=0;$x<count($temp1);$x++)
    {
    	$sel5="SELECT d_id,s_id,a_status FROM `distributor` WHERE `s_id`='$temp1[$x]'";
    	$que5=$con->query($sel5);
    	while($fet5=$que5->fetch_assoc())
    	{
    	//echo "<br>".$fet5[d_id];
    		$temp[]=$fet5[d_id];
    				//echo "&nbsp;B.V".find_own_rbv($fet5[ibo_id])."<br>";
    		if($fet5[d_id]==$u_d_id)
            {
               $a=1;
            }
    	}
    }
    unset($temp1);
    $temp1=array();
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    for ($rff = 0; $rff <= 150; $rff++)
    {   //echo $rff."rff<br>";
    //echo count($temp1)."temp1";
    if(count($temp)==0){ if(count($temp1)==0){ break;}}
    	for($x=0;$x<count($temp);$x++)
    	{
    
    	$sel13=$con->query("SELECT d_id,s_id,a_status FROM `distributor` WHERE `s_id`='$temp[$x]'");
    	
    		while($fet13=$sel13->fetch_assoc())
    		{
    			$temp1[]=$fet13[d_id];
    			if($fet13[d_id]==$u_d_id)
                {
                   $a=1;
                }
    		}
    	
    	}
    
    unset($temp);
    $temp=array();
    	  
    	  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    	  for($x=0;$x<count($temp1);$x++)
    	  {
    		 
    		  $sel5=$con->query("SELECT d_id,s_id,a_status FROM `distributor` WHERE `s_id`='$temp1[$x]'");
    	
    		  while($fet15=$sel5->fetch_assoc())
    		  {
    			  $temp[]=$fet15[d_id];
    			    if($fet15[d_id]==$u_d_id)
                    {
                       $a=1;
                    }
    		  }
    	
    	  }
    unset($temp1);
    $temp1=array();
    	
    }
    return $a;
}

//echo distribute_level_commission('123846', '4000', '0.5');
//echo find_last_s_id_all();
//echo insert_d_id('123846');
//echo find_autoatrix_income_to_distribute(1);
echo  distributing_automatrix_income();


////////////////function for counting automatrix income
function auto_l_1($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    $count=$que->num_rows;
    return $count;
}
function auto_l_2($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f[amt_id]'";
        $que2=$con->query($sel_d2);
        $count=$count+$que2->num_rows;
    }
    
    return $count;
}
function auto_l_3($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f1=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f1[amt_id]'";
        $que2=$con->query($sel_d2);
        while($f2=$que2->fetch_assoc()){
            $sel_d3="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f2[amt_id]'";
            $que3=$con->query($sel_d3);
            $count=$count+$que3->num_rows;
        }
    }
    
    return $count;
}
function auto_l_4($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f1=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f1[amt_id]'";
        $que2=$con->query($sel_d2);
        while($f2=$que2->fetch_assoc()){
            $sel_d3="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f2[amt_id]'";
            $que3=$con->query($sel_d3);
            while($f3=$que3->fetch_assoc()){
                $sel_d4="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f3[amt_id]'";
                $que4=$con->query($sel_d4);
                $count=$count+$que4->num_rows;
            }
        }
    }
    return $count;
}
function auto_l_5($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f1=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f1[amt_id]'";
        $que2=$con->query($sel_d2);
        while($f2=$que2->fetch_assoc()){
            $sel_d3="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f2[amt_id]'";
            $que3=$con->query($sel_d3);
            while($f3=$que3->fetch_assoc()){
                $sel_d4="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f3[amt_id]'";
                $que4=$con->query($sel_d4);
                while($f4=$que4->fetch_assoc()){
                    $sel_d5="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f4[amt_id]'";
                    $que5=$con->query($sel_d5);
                    $count=$count+$que5->num_rows;
                }
            }
        }
    }
    return $count;
}
function auto_l_6($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f1=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f1[amt_id]'";
        $que2=$con->query($sel_d2);
        while($f2=$que2->fetch_assoc()){
            $sel_d3="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f2[amt_id]'";
            $que3=$con->query($sel_d3);
            while($f3=$que3->fetch_assoc()){
                $sel_d4="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f3[amt_id]'";
                $que4=$con->query($sel_d4);
                while($f4=$que4->fetch_assoc()){
                    $sel_d5="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f4[amt_id]'";
                    $que5=$con->query($sel_d5);
                    while($f5=$que5->fetch_assoc()){
                        $sel_d6="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f5[amt_id]'";
                        $que6=$con->query($sel_d6);
                        $count=$count+$que6->num_rows;
                    }
                }
            }
        }
    }
    return $count;
}
function auto_l_7($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f1=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f1[amt_id]'";
        $que2=$con->query($sel_d2);
        while($f2=$que2->fetch_assoc()){
            $sel_d3="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f2[amt_id]'";
            $que3=$con->query($sel_d3);
            while($f3=$que3->fetch_assoc()){
                $sel_d4="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f3[amt_id]'";
                $que4=$con->query($sel_d4);
                while($f4=$que4->fetch_assoc()){
                    $sel_d5="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f4[amt_id]'";
                    $que5=$con->query($sel_d5);
                    while($f5=$que5->fetch_assoc()){
                        $sel_d6="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f5[amt_id]'";
                        $que6=$con->query($sel_d6);
                        while($f6=$que6->fetch_assoc()){
                            $sel_d7="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f6[amt_id]'";
                            $que7=$con->query($sel_d7);
                            $count=$count+$que7->num_rows;
                        }
                    }
                }
            }
        }
    }
    return $count;
}
function auto_l_8($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f1=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f1[amt_id]'";
        $que2=$con->query($sel_d2);
        while($f2=$que2->fetch_assoc()){
            $sel_d3="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f2[amt_id]'";
            $que3=$con->query($sel_d3);
            while($f3=$que3->fetch_assoc()){
                $sel_d4="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f3[amt_id]'";
                $que4=$con->query($sel_d4);
                while($f4=$que4->fetch_assoc()){
                    $sel_d5="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f4[amt_id]'";
                    $que5=$con->query($sel_d5);
                    while($f5=$que5->fetch_assoc()){
                        $sel_d6="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f5[amt_id]'";
                        $que6=$con->query($sel_d6);
                        while($f6=$que6->fetch_assoc()){
                            $sel_d7="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f6[amt_id]'";
                            $que7=$con->query($sel_d7);
                            while($f7=$que7->fetch_assoc()){
                                $sel_d8="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f7[amt_id]'";
                                $que8=$con->query($sel_d8);
                                $count=$count+$que8->num_rows;
                            }
                        }
                    }
                }
            }
        }
    }
    return $count;
}
function auto_l_9($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f1=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f1[amt_id]'";
        $que2=$con->query($sel_d2);
        while($f2=$que2->fetch_assoc()){
            $sel_d3="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f2[amt_id]'";
            $que3=$con->query($sel_d3);
            while($f3=$que3->fetch_assoc()){
                $sel_d4="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f3[amt_id]'";
                $que4=$con->query($sel_d4);
                while($f4=$que4->fetch_assoc()){
                    $sel_d5="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f4[amt_id]'";
                    $que5=$con->query($sel_d5);
                    while($f5=$que5->fetch_assoc()){
                        $sel_d6="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f5[amt_id]'";
                        $que6=$con->query($sel_d6);
                        while($f6=$que6->fetch_assoc()){
                            $sel_d7="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f6[amt_id]'";
                            $que7=$con->query($sel_d7);
                            while($f7=$que7->fetch_assoc()){
                                $sel_d8="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f7[amt_id]'";
                                $que8=$con->query($sel_d8);
                                while($f8=$que8->fetch_assoc()){
                                    $sel_d9="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f8[amt_id]'";
                                    $que9=$con->query($sel_d9);
                                    $count=$count+$que9->num_rows;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $count;
}
function auto_l_10($amt_id){
    global $con;
    $count=0;
    $sel_d="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$amt_id'";
    $que=$con->query($sel_d);
    while($f1=$que->fetch_assoc()){
        $sel_d2="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f1[amt_id]'";
        $que2=$con->query($sel_d2);
        while($f2=$que2->fetch_assoc()){
            $sel_d3="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f2[amt_id]'";
            $que3=$con->query($sel_d3);
            while($f3=$que3->fetch_assoc()){
                $sel_d4="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f3[amt_id]'";
                $que4=$con->query($sel_d4);
                while($f4=$que4->fetch_assoc()){
                    $sel_d5="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f4[amt_id]'";
                    $que5=$con->query($sel_d5);
                    while($f5=$que5->fetch_assoc()){
                        $sel_d6="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f5[amt_id]'";
                        $que6=$con->query($sel_d6);
                        while($f6=$que6->fetch_assoc()){
                            $sel_d7="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f6[amt_id]'";
                            $que7=$con->query($sel_d7);
                            while($f7=$que7->fetch_assoc()){
                                $sel_d8="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f7[amt_id]'";
                                $que8=$con->query($sel_d8);
                                while($f8=$que8->fetch_assoc()){
                                    $sel_d9="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f8[amt_id]'";
                                    $que9=$con->query($sel_d9);
                                    while($f9=$que9->fetch_assoc()){
                                        $sel_d10="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$f9[amt_id]'";
                                        $que10=$con->query($sel_d10);
                                        $count=$count+$que10->num_rows;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $count;
}
//echo auto_l_4(1);