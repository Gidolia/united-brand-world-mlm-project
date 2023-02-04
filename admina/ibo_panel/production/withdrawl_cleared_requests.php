<?php 
include "config.php";
top_structure('INR Withdrawl Request', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>

          <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>INR Withdrawl Requests</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>INR Withdrawl Request</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>D.ID</th>
                          <th>Name</th>
                          <th>Withdrawal Balance</th>
                          <th>Withdrawal Amount</th>
                          <th>Account Number</th>
                          <th>Date / Time</th>
                          <th>Kyc</th>
                          <th>Enter TXN ID</th>
                          <th>Approved/Reject</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `withdrawal_request` WHERE `status`='p'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                ?>
                                <?php
                                  $s="SELECT * FROM `withdrawal_request` WHERE `status`='p'";
                                $r=$con->query($s);
                                while($bnk=$r->fetch_assoc()){ 
                                
                                $sd="SELECT * FROM `kyc_bank` WHERE `d_id`='$R[d_id]'";
                               
                                $rc=$con->query($sd);
                               
                                $rrrr=mysqli_fetch_assoc($rc);}
                                ?>
                                <tr>
                                        <td> <?php echo $R['wr_id']; ?></td>
                                <td>
                                    <?php echo "DA".$R['d_id']; ?>
                                </td>
                                <td>
                                  <?php echo $ssss['name'];?>
                                </td>
                                <td>
                                    <?php echo $ssss['withdrawal_wallet']; ?>
                                </td>
                                <td>
                                    <?php echo $R['net_amount']; ?>
                                </td>
                                <td>
                                    
                                    <h class="stat-text">Bank Name: <br>
                                    <p class="text-primary number"><?php echo $rrrr['bank_name']; ?></p>
                                    </h>
                                    <h class="stat-text">IFSC Code:<br>
                                    <p class="text-primary number"><?php echo $rrrr['ifsc_code']; ?></p>
                                    </h>
                                    <h class="stat-text">Bank A/C No.:<br>
                                    <p class="text-primary number"><?php echo $rrrr['bank_acc_no']; ?></p>
                                    </h>
                                    
                                </td>
                                <td>
                                
                                    <?php echo $R['r_date']." / ".$R['r_time']; ?>
                                </td>
                                <td><a href="view_kyc_detail.php?did=<?php echo $R['d_id'];?>"><button class="btn btn-info">View</button></a></td>
                                
                                
                                
                                
                                <form method="post">
                                <td>
                                <input type="text" class="form-control" name="txn_id">
                                <input type="hidden" name="wr_id" value="<?php echo $R['wr_id']; ?>">
                                <input type="hidden" name="d_id" value="<?php echo $R['d_id']; ?>">
                                <input type="hidden" name="amount" value="<?php echo $R['net_amount']; ?>">
                                <input type="hidden" name="namount" value="<?php echo $R['amount']; ?>">
                                 <input type="hidden" name="tds" value="<?php echo $R['tds_charge']; ?>">
                                  <input type="hidden" name="adminCharge" value="<?php echo $R['admin_charge']; ?>">
                                </td>
                                <td>
                                <input type="submit" value="Approved" name="clear_submit" class="btn btn-success">
                                <input type="submit" value="Reject" name="reject_submit" class="btn btn-danger">
                                </td>
                                </form>
                                <?php 
                                } ?>
                               
                      </tbody>
                    </table>
                     
                     <?php 
                
                     ?>
                     
                  </div>
                </div>
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
                             
        $g="SELECT * FROM `withdrawal_request`  ORDER BY `wr_id` DESC";
        $dc=$con->query($g);
        ?>
        <table id="datatable-buttons" class="table table-striped jambo_table" >
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
                <td><?php echo $d[net_amount];?></td>
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
        <!-- /page content -->

<?php 
bottom_structure('Digitalasset.org.in');
     if(isset($_POST[clear_submit]))
                     {
                         $csc="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf=$con->query($csc);
                         $cdcdc=mysqli_fetch_assoc($dscsdf);
                         $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         
                         $m="SELECT * FROM `admin_wallet`";
                         $n=$con->query($m);
                         $cdef=mysqli_fetch_assoc($n);
                         
                         $net_admin_wallet=$cdef[a_wallet]+$_POST[adminCharge];
                         
                       $sql="UPDATE `withdrawal_request` SET `txn_id` = '$_POST[txn_id]' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `status` = 'Y' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `c_date` = '$date' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `c_time` = '$time' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `admin_wallet` SET `a_wallet`='$net_admin_wallet';";
                       
                     $sql .="INSERT INTO `admin_wallet_history`(`awh_id`, `d_id`, `withdraw_amount`, `admin_charge`, `tds_charge`, `net_amount`, `date`, `time`, `note`) VALUES (NULL,'$_POST[d_id]','$_POST[namount]','$_POST[adminCharge]','$_POST[tds]','$_POST[amount]','$date','$time','Withdrawl Success');";
                      
                     
                        if ($con->multi_query($sql) === TRUE ) {
                          echo "<script>alert('Withdrawal amount Cleared successfully');
                          location.href='withdrawl_cleared_requests.php'</script>";
                        } else {
                            $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', '$d_detail[ap_id]', '', 'withdrawal request success query');";
    	                    $con->query($fail);
                          echo "Error: " . $sql . "<br>" . $con->error;
                        }
                     }
                     if(isset($_POST[reject_submit]))
                     {
                         $csc="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf=$con->query($csc);
                         $cdcdc=mysqli_fetch_assoc($dscsdf);
                         $tds=$cdcdc[tds_wallet]-($_POST[tds]);
                         $admin=$cdcdc[admin_wallet]-($_POST[adminCharge]);
                         $amt=$cdcdc[withdrawal_wallet]+$_POST[namount];
                         
                         $ins="INSERT INTO `main_wallet`(`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES (NULL,'$_POST[d_id]','+','$_POST[namount]','$cdcdc[withdrawal_wallet]','$amt','Withdrawal Rejected','','','','$date','$time','','');";
                      
                        $upd="UPDATE `distributor` SET `withdrawal_wallet`='$amt',`tds_wallet`='$tds',`admin_wallet`='$admin' WHERE `d_id`='$_POST[d_id]'";
                       
                       $sql="UPDATE `withdrawal_request` SET `status` = 'r' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `c_date` = '$date' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                       $sql .="UPDATE `withdrawal_request` SET `c_time` = '$time' WHERE `withdrawal_request`.`wr_id` = '$_POST[wr_id]';";
                       
                        if ($con->query($upd) === TRUE AND $con->query($ins) === TRUE AND $con->multi_query($sql) === TRUE ) {
                          echo "<script>alert('Withdrawal amount Cleared successfully');
                          location.href='withdrawl_cleared_requests.php'</script>";
                        } else {
                              $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', '$d_detail[ap_id]', '', 'withdrawal request reject query');";
    	                    $con->query($fail);
                          echo "Error: " . $sql . "<br>" . $con->error;
                        }
                     }

?>