<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>UBW || Downline List</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
     <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <?php include "include/sidebar.php";?>
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Direct IDs</h3>
              </div>
            </div>

            <div class="clearfix"></div>


<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Direct ID Leg View</h2>
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
        <table class="table table-striped table-bordered">
            <thead ><tr><th>LEG</th><th>D ID</th><th>Name</th><th>D.O.J</th><th>Direct Total ID</th><th> Direct Activated ID</th><th> Direct Inactive ID</th></tr></thead>
            <?php
            $g1="SELECT * FROM `distributor` WHERE `d_id`='$d_detail[left_id]'";
       
        $dc1=$con->query($g1);
            $d=$dc1->fetch_assoc();
        ?>
          
            <tr>
                <th>LEFT LEG</th>
                <td><?php echo "OR".$d[d_id];?></td>
                <td><?php echo $d[name];?></td>
                
                <td><?php echo $d[r_date];?></td>
                <td><?php echo for_finding_under_direct_id_number($d[d_id], $_SESSION[d_id]);?></td>
                <td><?php echo for_finding_under_direct_activated_id_number($d[d_id], $_SESSION[d_id]);?></td>
                <td><?php echo for_finding_under_direct_id_number($d[d_id], $_SESSION[d_id])-for_finding_under_direct_activated_id_number($d[d_id], $_SESSION[d_id]);?></td>
               
            </tr>
            <tr>
                <?php
            $g="SELECT * FROM `distributor` WHERE `d_id`='$d_detail[right_id]'";
       
        $dc=$con->query($g);
            $d=$dc->fetch_assoc();
        ?>
                <th>RIGHT LEG</th>
                <td><?php echo "OR".$d[d_id];?></td>
                <td><?php echo $d[name];?></td>
            
                <td><?php echo $d[r_date];?></td>
                <td><?php echo for_finding_under_direct_id_number($d[d_id], $_SESSION[d_id]);?></td>
                <td><?php echo for_finding_under_direct_activated_id_number($d[d_id], $_SESSION[d_id]);?></td>
                <td><?php echo for_finding_under_direct_id_number($d[d_id], $_SESSION[d_id])-for_finding_under_direct_activated_id_number($d[d_id], $_SESSION[d_id]);?></td>
            </tr>
         
        </table>
                  </div>
                </div>
              </div>
            </div>







            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Direct IDs List</h2>
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
                        
                        
                            
        <div class="card-box table-responsive">
        <table class="table table-striped table-bordered" id="datatable">
            <thead>
                                        <tr>
                                          
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Placement ID</th>
                                            <th>Side</th>
                                            <th>Joining Date</th>
                                            <th>Activation Date</th>
                                            <th>ID Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php

	
$sel1="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]';";
$que1=$con->query($sel1);
$c=$que1->num_rows;
if($c!=0){

while($fet1=mysqli_fetch_assoc($que1))
{

$sels="SELECT * FROM `distributor` WHERE `d_id`='$fet1[placement_id]';";
$ques=$con->query($sels);
$ibo_d=mysqli_fetch_assoc($ques);?>
                        <tr>
                          
                          <td>OR<?php echo $fet1[d_id];?></td>
                          <td><?php echo $fet1[name];?></td>
                          <td>OR<?php echo $ibo_d[d_id];?> (<?php echo $ibo_d[name];?>)</td>
                          <td><?php 
                          if(for_finding_under_id_number($d_detail[left_id], $fet1[d_id])==1)
                          {echo "Left";}
                          elseif($d_detail[left_id]==$fet1[d_id]){
                              echo "Left";
                          }else{echo "Right";}
                          ?>
                          </td>
                          <td><?php echo $fet1[r_date];?></td>
                          <td><?php echo $fet1[a_date];?></td>
                          <td><?php 
                          if($fet1[a_status]=="y")
                          {?>
                              <button type="button" class="btn btn-success">Active</button>
                              <?php
                          }
                          else{
                          ?>
                          <button type="button" class="btn btn-danger">Not Active</button>
                          <?php }?>
                          
                          </td>
                          
                          
                        </tr>

	<?php
	
}
}
?>
                           
                                    </tbody>
        </table></div>       
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?php include "include/footer.php";?>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>