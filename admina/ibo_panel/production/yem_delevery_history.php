<?php 
include "config.php";
top_structure('Yem Wallet History', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>


          <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>YEM Coin Requests</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>YEM Coin Request</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <form method="post" name="formwer">
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Request ID</th>
                          <th>D.ID</th>
                          <th>Name</th>
                          <th>Date / Time</th>
                          <th>Purchased</th>
                          
                          <th>Yem Wallet ID</th>
                          
                          
                          <th>#</th>
                        </tr>
                      </thead>

                      <tbody>
                          <?php $n=0;
                            
                                $e="SELECT * FROM `pw_history` WHERE `yem_delivered`='0' AND `note`='Id Activation'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){
                                    $n++;
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[a_d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                ?>
                                <tr>
                                        <td> <?php echo $R['pwh_id']; ?></td>
                                <td>
                                    <?php echo "DA".$R['a_d_id']; ?>
                                </td>
                                <td>
                                  <?php echo $ssss['name'];?>
                                </td>
                                <td>
                                    <?php echo $R['date']." / ".$R['time']; ?>
                                </td>
                                <td><?php echo $R['pw_type']*4000; ?>/-</td>
                                
                                <td>
                                    <?php echo $ssss['yem_wallet_id']; ?>
                                </td>
                                
                                <td>
                                    <a href="yem_delivery_panel.php?pwh_id=<?php echo $R['pwh_id']; ?>">View</a>
                                </td>
                                <?php 
                                } ?>
                               
                      </tbody>
                    </table>
                    </form> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Yem Delivered History</h2>
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
            
        <table id="datatable-buttons" class="table table-striped jambo_table" >
            <thead>
                <tr>
                    <tr>
                          <th>Request ID</th>
                          <th>D.ID</th>
                          <th>Name</th>
                          <th>Date / Time</th>
                          <th>Purchased</th>
                          
                          <th>Yem Wallet ID</th>
                          <th>Yem Bonus</th>
                          <th>Yem Transfered</th>
                          <th>c date</th>
                          
                          
                        </tr>
                </tr>
            </thead>
            <tbody>
                          <?php $n=0;
                            
                                $e="SELECT * FROM `pw_history` WHERE `yem_delivered`='1' AND `note`='Id Activation'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){
                                    $n++;
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[a_d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                ?>
                                <tr>
                                        <td> <?php echo $R['pwh_id']; ?></td>
                                <td>
                                    <?php echo "DA".$R['a_d_id']; ?>
                                </td>
                                <td>
                                  <?php echo $ssss['name'];?>
                                </td>
                                <td>
                                    <?php echo $R['date']." / ".$R['time']; ?>
                                </td>
                                <td><?php echo $R['pw_type']*4000; ?>/-</td>
                                
                                <td>
                                    <?php echo $R['yem_wallet_id']; ?>
                                </td>
                                <td>
                                    <?php echo $R['yem_bonus']; ?>
                                </td>
                                <td>
                                    <?php echo $R['yem_transfered_qty']; ?>
                                </td>
                                <td>
                                    <?php echo $R['transfer_date_yem']." / ".$R['transfer_time_yem']; ?>
                                </td>
                                </tr>
                                
                                <?php 
                                } ?>
                               
                      </tbody>
        </table>
                  </div>
                </div>
              </div>
            
            
            
            
          </div>
        </div>
        <!-- /page content -->
        <script>
        //showHint(3);
function showHint(str) {
  
    var bonus = document.forms["Formwer"]["yem_bonus" + str].value;
 	var price = document.forms["Formwer"]["price" + str].value;
 	document.getElementById("yem" + str).value = 1;
  
}</script>

<?php 
bottom_structure('Digitalasset.org.in');
?>