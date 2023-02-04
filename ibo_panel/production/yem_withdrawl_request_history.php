<?php 
include "config.php";
top_structure('INR Withdrawal Request || Digital Asset', 0, 'error', 'Success', 'done');

sidebar();
header_bar();?>

    <!-- page content -->
 <div class="right_col" role="main">
            <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>INR Withdrawal Request</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Request Withdrawal</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="post">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Amount</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="amount" min="500" max="<?php echo $d_detail[withdrawal_wallet]+0;?>" required placeholder="Enter Withdrawal Amount">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="offset-md-4 col-md-6 col-md-offset-3 mt-2">
                          <input type="submit" class="btn btn-success" value="Withdrawal Request" name="withdraw_request">
                        </div>
                      </div>
                     </form>

                    </div>
                    
                  </div>
                </div>
                
             <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6" >
                <div class="tile-stats" style="background:#6DE9FF;">
                  <div class="count" style="color:white;padding:0px 20px;"> 
                  <?php echo "₹".$d_detail[withdrawal_wallet]; ?> </div>
                  <h3 style="color:white;">INR Balance</h3>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Withdrawal Request History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <?php
                             
        $g="SELECT * FROM `withdrawal_request` WHERE `d_id`='$_SESSION[d_id]' ORDER BY `wr_id` DESC";
        $dc=$con->query($g);
        ?>
        <table class="table table-striped table-bordered" id="datatable">
            <thead>
                <tr>
                    <th>Sr. no.</th>
                    <th>D.ID</th>
                    <th>Date/Time</th>
                    <th>Request Amount</th>
                    <th>TDS Charge </th>
                    <th>Admin Charge </th>
                    <th>Net Charge</th>
                    <th>Status</th>
                    <th>Clear Date</th>
                    <th>TXN ID</th>
                </tr>
            </thead>
            <?php
                $a=0;
                $t1=0;
                $t2=0;
                while($d=$dc->fetch_assoc())
                { $a++; 
            ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo "DA".$d[d_id];?></td>
                <td><?php echo $d[r_date]." / ".$d[r_time];?></td>
                <td><?php echo "₹".$d[amount];?></td>
                <td><?php echo "₹".$d[tds_charge];?></td>
                <td><?php echo "₹".$d[admin_charge];?></td>
                <td><?php echo "₹".$d[net_amount];?></td>
                <td>
                   <?php if($d[status]=="p"){
                   ?><button class="btn btn-warning">Pending</button>
                   <?php }
                   elseif($d[status]=="r"){?>
                       <button class="btn btn-danger">Rejected</button>
                  <?php }
                   else{?>
                   <button class="btn btn-success">Completed</button>
                   <?php } ?>
                </td>
                <td><?php echo $d[c_date];?></td>
                <td><?php echo $d[txn_id];?></td>
            </tr>
            <?php
            }?>
        </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
<?php
if(isset($_POST[withdraw_request]))
{
    if($_POST[amount]>999){
        $withdraw_amount=$_POST[amount];//Requested amount
        $tds=$withdraw_amount*(5/100);//Tds Charge
        $admin_charge=$withdraw_amount*(5/100);//Admin charge
        $net_amount=$withdraw_amount - ($tds + $admin_charge);//Total amount
        $wallet=$d_detail[withdrawal_wallet]-$withdraw_amount;
        $final_tds=$d_detail[tds_wallet]+$tds;//old tds + new tds
        $final_admin_charge=$d_detail[admin_wallet]+$admin_charge;// old admin charge+ new admin charge
        
        if($d_detail[withdrawal_wallet]>0){
            
            $up="UPDATE `distributor` SET `withdrawal_wallet` = '$wallet',`tds_wallet`='$final_tds',`admin_wallet`='$final_admin_charge' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
            
            $ins="INSERT INTO `main_wallet`(`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL,'$_SESSION[d_id]','-','$withdraw_amount','$d_detail[withdrawal_wallet]','$wallet','Withdrawal','','','','$date','$time','','');";
            
            $sd="INSERT INTO `withdrawal_request` (`wr_id`, `d_id`, `amount`, `tds_charge`, `admin_charge`, `net_amount`, `r_date`, `r_time`, `status`, `c_date`, `c_time`, `txn_id`) VALUES (NULL, '$_SESSION[d_id]', '$withdraw_amount','$tds','$admin_charge','$net_amount', '$date', '$time', 'p', '', '', '');";
            if( $con->query($sd)===TRUE AND $con->query($up)===TRUE AND $con->query($ins)===TRUE)
            {
                 echo "<script>alert('Success! Your Withdrawal Requested Successfully'); location.href='yem_withdrawl_request_history.php';</script>";
            }
            }else{
                 $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '', 'withdrawal request query');";
    	        $con->query($fail);
                 echo "<script>alert('You Dont Have ballance'); location.href='yem_withdrawl_request_history.php';</script>";       
                
            }
    }
    else{
        
        echo "<script>alert('Amount Should be greater then 999/-'); location.href='yem_withdrawl_request_history.php';</script>";
    }
}
?>       
            
            </div>
          </div>
    
</div>
    <!-- page content -->

<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
