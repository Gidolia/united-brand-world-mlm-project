<?php 
include "config.php";
top_structure('Level 3', 0, 'warning', 'Success', 'done');
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
<script> function urlHandler(value) {                     
    window.location.assign(`${value}`);
}</script>
                    <form method="post" class="form-horizontal form-label-left" action="confirm_generate_pin.php">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Select Level</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select class="form-control" id="url" onchange="urlHandler(this.value)">
                        <option value="level1.php">Level 1</option>
                        <option value="level2.php">Level 2</option>
                        <option value="level3.php" selected>Level 3</option>
                        <option value="level4.php">Level 4</option>
                        <option value="level5.php">Level 5</option>
                        <option value="level6.php">Level 6</option>
                        <option value="level7.php">Level 7</option>
                        <option value="level8.php">Level 8</option>
                        <option value="level9.php">Level 9</option>
                        <option value="level10.php">Level 10</option>
                        
                    </select>
                          </span>
                        </div>
                      </div>
                    
                </form>
            
                  </div></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Level View 3</h2>
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
        $temp=array();
        $temp1=array();
        $temp2=array();
        $temp3=array();
        $temp4=array();
        $m=0;
        $g="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    $temp[]=$d3[d_id];
                    $temp1[]=$d3[name];
                    $temp2[]=$d3[mobile];
                    $temp3[]=$d3[r_date];
                    $temp4[]=$d3[status];
                    $m++;
                }
            }
        }
        
        ?>
                                      <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead ><tr><th>Sr. no.</th><th>D ID</th><th>Name</th><th>Mobile</th><th>D.O.J</th><th>Activate Status</th></tr></thead>
  <?php
            $a=0;
            for($x=0;$x<count($temp);$x++)
            { $a++;
?>                     
            
            <tr>
                <td><?php echo $a++;?></td>
                <td><?php echo "DA".$temp[$x];?></td>
                <td><?php echo $temp1[$x];?></td>
                <td><?php echo $temp2[$x];?></td>
                <td><?php echo $temp3[$x];?></td>
                     <td><?php if($temp4[$x]==1) {echo "<button type='button' class='btn btn-success'>Activated</button>";}
                                    else {?> <button type="button" class="btn btn-danger">Not Active</button>
                                    <?php    
                                    } 
                                 ?></td>
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