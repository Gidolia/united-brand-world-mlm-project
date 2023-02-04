<?php 
include "config.php";
top_structure('Index', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>

  
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Withdrawl Cleared Requests</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Withdrawl Cleared Requests</h2>
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
                             
        $g="SELECT * FROM `withdrawal_request` WHERE `status`='Y'";
        $dc=$con->query($g);
        
    ?>
        
        <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>Sr. no.</th><th>Name (ID)</th><th>Withdrawl Request Date / Time</th><th>Status</th><th>Clearance Date / Time</th><th>Transaction ID</th><th>amount</th></tr></thead>
            <?php
            $a=0;
            while($d=$dc->fetch_assoc())
            {
                $fvf="SELECT * FROM `distributor` WHERE `d_id`='$d[d_id]'";
                                $dch=$con->query($fvf);
                                $ssss=mysqli_fetch_assoc($dch);
            $a++; 
            ?>
          
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $ssss[name]."( DA".$d[d_id].")";?></td>
                <td><?php echo $d[r_date]." / ".$d[r_time];?></td>
                <td><?php echo $d[status];?></td>
                <td><?php echo $d[c_date]." / ".$d[c_time];?></td>
                <td><?php echo $d[txn_id];?></td>
                <td><?php echo $d[amount];?></td>
                
            </tr>
            <?php
            }?>
        </table>
                    
                    
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

  

<?php 
bottom_structure('Digitalasset.org.in');

?>