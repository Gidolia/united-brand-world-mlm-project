<?php 
include "config.php";
top_structure('Level Commission', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>
<!-- page content -->

<div class="right_col" role="main">
    <?php
    $g="SELECT * FROM `plan_income_manage` WHERE `d_id`='$_SESSION[d_id]' ORDER BY `plan_income_manage`.`pim_id` DESC";
        $dc=$con->query($g);
        
            while($d=$dc->fetch_assoc())
            { 
                $toth=$toth+$d[amount];
            }
?>
    
            <div class="row">
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                <div class="tile-stats" >
                  <div class="count" > 
                  <?php echo "₹".$toth; ?> </div>
                  <h3>Total Level Commission</h3>
                </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Level Income View</h2>
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

        <div class="table-responsive">
        <table class="table table-striped table-bordered jambo_table"  id="datatable">
            <thead ><tr><th>Sr. no.</th><th>A ID</th><th>Package</th><th>Point</th><th>level</th><th>Date / Time</th><th>Amount</th></tr></thead>
<?php
$g="SELECT * FROM `plan_income_manage` WHERE `d_id`='$_SESSION[d_id]' ORDER BY `plan_income_manage`.`pim_id` DESC";
        $dc=$con->query($g);
            $a=0;
            while($d=$dc->fetch_assoc())
            { $a++; 
?>
            
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo "DA".$d[off_d_id];?></td>
                <td><?php echo $d[a_package];?>/-</td>
                <td><?php echo $d[point];?> PT</td>
                <td><?php echo $d[level];?> LV</td>
                <td><?php echo $d[date]." / ".$d[time];?></td>
               <th><?php echo $d[amount];?>/-</th>
            </tr>
<?php
}
?>
        </table></div>
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
bottom_structure('Digitalasset.org.in');

?>