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
        $g="SELECT * FROM `auto_matrix_tree` WHERE `d_id`='$_SESSION[d_id]'";
        $dc=$con->query($g);
?>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead ><tr><th>Amt ID</th><th>View</th></tr></thead>
<?php
            $a=0;
            while($d=$dc->fetch_assoc())
            { $a++; 
?>
            
            <tr>
                <td><?php echo $d[amt_id];?></td>
                
               <td><a href="automatrix_tree_view.php?amt_id=<?php echo $d[amt_id];?>"><button type='button' class='btn btn-success'>View</button></a></td>
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