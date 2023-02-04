<?php 
include "config.php";

top_structure('Yem Wallet View', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Purchased YEM</h3>
              </div>
              <div class="title_right">

              </div>
            </div>
<div class="row">
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                <div class="tile-stats" >
                  <div class="count" > 
                  
                  <?php
            $toty=0;
            $g="SELECT * FROM `pw_history` WHERE `a_d_id`='$_SESSION[d_id]';";
             
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            {
                $toty=$toty+$d[yem_transfered_qty];
            }
            echo $toty+0;
            ?>
                  
                  </div>
                  <h3>Total Yem Purchased</h3>
                </div>
            </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Your YEM Purchased View </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
            <div class="card-box table-responsive">
        <table class="table table-striped table-bordered jambo_table " id="datatable">
            <thead>
                <tr class="headings">
                    <th width="5%">#</th>
                    <th>Date/Time</th>
                    <th>Buy Amount</th>
                    <th>Bonus Amount</th>
                    
                    <th>Total Amount</th>
                    <th>YEM Rate</th>
                    <th>Purchased YEM Coin</th>
                    <th>Total YEM Coin </th>
                    
                    
                </tr>
            </thead>
            <tbody>
            <?php
            $a=0;
            $g="SELECT * FROM `pw_history` WHERE `a_d_id`='$_SESSION[d_id]';";
            $dc=$con->query($g);
            $mn=0;
            while($d=$dc->fetch_assoc())
            { $a++; 
                $mn=$mn+$d[yem_transfered_qty];                            
            ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date]." / ".$d[time];?></td>
             
                <th><?php echo $d[pw_type]*4000;?>/-</th>
                <td><?php echo ($d[pw_type]*4000)*$d[yem_bonus]/100;?>/-</td>
                <td><?php echo ($d[pw_type]*4000)+(($d[pw_type]*4000)*$d[yem_bonus]/100);?>/-</td>
                <td><?php echo $d[yem_at_price_in_doll]*80;?>/-</td>
                <td><?php echo "<b style='color:green;'>+".$d[yem_transfered_qty]."</b>";?></td>
                <td><?php echo $mn;?></td>
                
                
                
            </tr>
            <?php 
            }?>
            </tbody>
        </table>
        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- page content -->
         

                    
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
