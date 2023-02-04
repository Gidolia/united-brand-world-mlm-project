<?php 
include "config.php";
if($_GET[n]=='c'){
    top_structure('Request Clear Pan Card', 1, 'success', 'Success!', 'Pan Card Approved Successfully');
}elseif($_GET[n]=='n'){
    top_structure('Request Clear Pan Card', 1, 'warning', 'Rejected', 'Pan Card Rejected Successfully');
}elseif($_GET[n]=='f'){
    top_structure('Request Clear Pan Card', 1, 'warning', 'Query Failed', 'Try Again Later');
}
else{
    top_structure('Request Clear Pan Card', 0, '', '', '');
}
sidebar();
header_bar();?>


<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pan Card Request Management</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Pan Card Request</h2>
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
                          <th>D ID</th>
                          <th>Name</th>
                          <th>Pan Number</th>
                          <th>Date / Time</th>
                          <th>Pan Image</th>
                          
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `kyc_pan` WHERE `status`='p'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                
                                ?>
                                    <tr>
                                        <td> <?php echo $R['kp_id']; ?></td>
                                <td>
                                    <?php echo "DA".$R['d_id']; ?>
                                </td>
                                <td>
                                    <?php echo $ssss['name']; ?>
                                </td>
                                <td>
                                  <?php echo $R['pan_no'];?>
                                </td>
                                
                                <td>
                                    <?php echo $R['date']." / ".$R['time']; ?>
                                </td>
                                <td>
                                    <a href ="../../../ibo_panel/production/pan_card_img/<?php echo $R['pan_img']; ?>" target="_blank">Click here to view pan card image</a>
                                </td>
                                
                                <td>
                                    <?php echo $R['status']; ?>
                                </td>
                                <form method="post">
                                
                                <td>
                                    <input type="hidden" name="kp_id" value="<?php echo $R['kp_id']; ?>">
                                <input type="hidden" name="d_id" value="<?php echo $R['d_id']; ?>">
                                
                                
                                <input type="submit" name="clear_submit" value="Approve" class="btn btn-success">
                                <input type="submit" name="clear_reject" value="Reject" class="btn btn-danger">
                                
                                </td>
                                </form>
                                <?php 
                                } ?>
                      </tbody>
                    </table>
                     
                     <?php 
                     if(isset($_POST[clear_submit]))
                     {
                         $csc="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf=$con->query($csc);
                         $cdcdc=mysqli_fetch_assoc($dscsdf);
                         // $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         
                         
                       $sql="UPDATE `kyc_pan` SET `status` = 'c' WHERE `kyc_pan`.`kp_id` = '$_POST[kp_id]';";
                       
                    
                        if ($con->query($sql) === TRUE) {
                          echo "<script>
                          location.href='request_clear_pan_card.php?n=c'</script>";
                        } else {
                          echo "<script>
                          location.href='request_clear_pan_card.php?n=f'</script>";
                        }
                     }
                     if(isset($_POST[clear_reject]))
                     {
                         $csc1="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf1=$con->query($csc1);
                         $cdcdc1=mysqli_fetch_assoc($dscsdf1);
                         // $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         
                         
                       $sql1="UPDATE `kyc_pan` SET `status` = 'n' WHERE `kyc_pan`.`kp_id` = '$_POST[kp_id]';";
                       
                      
                       
                        if ($con->query($sql1) === TRUE) {
                          echo "<script>
                          location.href='request_clear_pan_card.php?n=n'</script>";
                        } else {
                          echo "<script>
                          location.href='request_clear_pan_card.php?n=f'</script>";
                        }
                     }
                     
                     ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pan Card Request History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <table id="datatable-keytable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>D ID</th>
                          <th>Name</th>
                          <th>Pan Number</th>
                          <th>Date / Time</th>
                          <th>Pan Image</th>
                          
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                            
                                $e="SELECT * FROM `kyc_pan` WHERE `status`!='p'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                
                                ?>
                                    <tr>
                                        <td> <?php echo $R['kp_id']; ?></td>
                                <td>
                                    DA<?php echo $R['d_id']; ?>
                                </td>
                                <td>
                                    <?php echo $ssss['name']; ?>
                                </td>
                                <td>
                                  <?php echo $R['pan_no'];?>
                                </td>
                                
                                <td>
                                    <?php echo $R['date']." / ".$R['time']; ?>
                                </td>
                                <td>
                                    <a href ="../../../ibo_panel/production/pan_card_img/<?php echo $R['pan_img']; ?>" target="_blank">Click here to view pan card image</a>
                                </td>
                                
                                <td>
                                    <?php echo $R['status']; ?>
                                </td>
                                <form method="post">
                                
                                <td>
                                    <input type="hidden" name="kp_id" value="<?php echo $R['kp_id']; ?>">
                                <input type="hidden" name="d_id" value="<?php echo $R['d_id']; ?>">
                                
                                
                                <input type="submit" name="clear_submit" value="Approve" class="btn btn-success">
                                <input type="submit" name="clear_reject" value="Reject" class="btn btn-danger">
                                
                                </td>
                                </form>
                                <?php 
                                } ?>
                      </tbody>
                    </table>
                     
                     <?php 
                     if(isset($_POST[clear_submit]))
                     {
                         $csc="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf=$con->query($csc);
                         $cdcdc=mysqli_fetch_assoc($dscsdf);
                         // $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         
                         
                       $sql="UPDATE `kyc_pan` SET `status` = 'c' WHERE `kyc_pan`.`kp_id` = '$_POST[kp_id]';";
                       
                    
                        if ($con->query($sql) === TRUE) {
                          echo "<script>alert('Pan Card Approved successfully');
                          location.href='request_clear_pan_card.php'</script>";
                        } else {
                          echo "<script>alert('Query Failed, Please try again');
                          location.href='request_clear_pan_card.php'</script>";
                        }
                     }
                     if(isset($_POST[clear_reject]))
                     {
                         $csc1="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                         $dscsdf1=$con->query($csc1);
                         $cdcdc1=mysqli_fetch_assoc($dscsdf1);
                         // $amt=$cdcdc[withdrawal_wallet]-$_POST[amount];
                         
                         
                       $sql1="UPDATE `kyc_pan` SET `status` = 'n' WHERE `kyc_pan`.`kp_id` = '$_POST[kp_id]';";
                       
                      
                       
                        if ($con->query($sql1) === TRUE) {
                          echo "<script>alert('Pan Card Rejected successfully');
                          location.href='request_clear_pan_card.php'</script>";
                        } else {
                          echo "<script>alert('Query Failed, Please try again');
                          location.href='request_clear_pan_card.php'</script>";
                        }
                     }
                     
                     ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>









         
<?php 
bottom_structure('Digitalasset.org.in');

?>