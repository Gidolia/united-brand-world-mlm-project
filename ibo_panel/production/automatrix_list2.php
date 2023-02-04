<?php 
include "config.php";
top_structure('Automatrix', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>
<!-- page content -->

<div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Level</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Automatrix List</h2>
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
        $g="SELECT * FROM `auto_matrix_2_tree` WHERE `d_id`='$_SESSION[d_id]'";
        $dc=$con->query($g);
?>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead ><tr><th>Amt ID</th><th>View</th><th>Level Completed</th><th>Next Level To Complete</th></tr></thead>
<?php
            $a=0;
            while($d=$dc->fetch_assoc())
            { $a++; 
?>
            
            <tr>
                <td><?php echo $d[amt_id];?></td>
                
               <td><a href="automatrix_tree_view2.php?amt_id=<?php echo $d[amt_id];?>"><button type='button' class='btn btn-success'>View</button></a></td>
               <td>
                   <?php 
                        
                        echo "Level ".$d[i_level_distribute]." completed";
                        
                   ?>
                   
               </td>
               <td>
               
                   <?php
                   switch ($d[i_level_distribute]){
                    case "1":
                        $lp=auto_l_2($d[amt_id]);
                        $perc=($lp/4)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 4 <br>
                    Level = <?php echo $d[i_level_distribute]+1;?>
                    <?php   
                    break;
                    case "2":
                        $lp=auto_l_3($d[amt_id]);
                        $perc=($lp/8)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 8 <br>
                    Level = <?php echo $d[i_level_distribute]+1;?>
                    <?php   
                    break;
                    case "3":
                        $lp=auto_l_4($d[amt_id]);
                        $perc=($lp/16)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 16 <br>
                    Level = <?php echo $d[i_level_distribute]+1;?>
                    <?php   
                    break;
                    case "4":
                        $lp=auto_l_5($d[amt_id]);
                        $perc=($lp/32)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 32 <br>
                    Level = <?php echo $d[i_level_distribute]+1;?>
                    <?php   
                    break;
                    case "5":
                        $lp=auto_l_6($d[amt_id]);
                        $perc=($lp/64)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 64 <br>
                    Level = <?php echo $d[i_level_distribute]+1;?>
                    <?php   
                    break;
                    case "6":
                        $lp=auto_l_7($d[amt_id]);
                        $perc=($lp/128)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 128 <br>
                    Level = <?php echo $d[i_level_distribute]+1;?>
                    <?php   
                    break;
                   }
                   ?>
               </td>
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