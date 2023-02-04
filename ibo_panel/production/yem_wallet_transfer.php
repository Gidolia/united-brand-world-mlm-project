<?php 
include "config.php";

top_structure('Yem Withdrawal || Digital Asset', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="tile-stats">
                  
                  <div class="count"><i class="fa fa-money"></i> <?php echo $d_detail[yem_wallet]+0;?> </div>
                  <h3>YEM Wallet</h3>
                </div>
              </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
 <h4>
 Digital Wallet Address :    <?php echo $d_detail[yem_wallet_id]?><br>
 </h4> 
    <a href="change_wallet_id.php" style="color:red;">Click Here to Change Wallet Id</a>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form action="confirm_yem_wallet_tranfer.php" method="post">
        <table class="table table-striped table-bordered">
            
            <tr>
                <th>To ID</th>
                <td><input type="text" name="to_d_id"></td>
            </tr>
            <tr>
                <th>Amount To Transfer</th>
                <td><input type="text" name="amount"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" name="transfer_amount"></td>
            </tr>
            </table>
            </form>
            </div>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transfer History</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
        <table class="table table-striped table-bordered" value ="<h2>Withdrawl history</h2>" id="datatable">
            <thead><tr><th>Sr. no.</th><th>Date / Time</th><th>Amount</th><th>To Address</th><th>Txn Hash</th></tr></thead>
            <tbody>
            <?php
            $a=0;
            $g="SELECT * FROM `main_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='transfered' ORDER BY `mw_id` DESC";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date]." / ".$d[time];?></td>
                <th><?php echo $d[amount];?></th>
                
                <td><?php if($d[to_d_id]!=""){?> DA<?php echo $d[to_d_id];}?></td>
                <td></td>
            </tr>
            <?php
            }?></tbody>
        </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    
   
         


                  </div>
                </div>
              </div>
            </div>
     
        </div>
    </div>
    <!-- page content -->

<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
