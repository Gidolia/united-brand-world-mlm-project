<?php 
include "config.php";
top_structure('Level 1', 0, 'warning', 'Success', 'done');
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
                        <option value="level1.php" selected>Level 1</option>
                        <option value="level2.php">Level 2</option>
                        <option value="level3.php">Level 3</option>
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
                    <h2>Level View 1</h2>
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
        $g="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
        $dc=$con->query($g);
?>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead ><tr><th>Sr. no.</th><th>D ID</th><th>Name</th><th>Mobile</th><th>D.O.J</th><th>Activate Status</th><th></th></tr></thead>
<?php
            $a=0;
            while($d=$dc->fetch_assoc())
            { $a++; 
?>
            
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo "DA".$d[d_id];?></td>
                <td><?php echo $d[name];?></td>
                <td><?php echo $d[mobile];?></td>
                 <td><?php echo $d[r_date];?></td>
               <td><?php if($d[status]==1) {echo "<button type='button' class='btn btn-success'>Activated</button>";}
                                    else {?> <button type="button" class="btn btn-danger">Not Active</button>
                                    <?php    
                                    } 
                                 ?></td>
                                 <td><a href="network_list.php?d_id=<?php echo $d[d_id];?>"><button type="button" class="btn btn-primary">Downline List</button></a></td>
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