<?php
//cho "fsdxasmxxz";

function top_structure($title, $n, $n_level, $n_heading, $n_message){
    global $con, $date, $time, $d_detail;
    ?>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title><?php echo $title;?></title>

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
   <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <?php

    if($n=='1'){
        $script="new PNotify({
             title: '".$n_heading."',
             text: '".$n_message."',
             type: '".$n_level."',
             styling: 'bootstrap3'
      });";
    }
    ?>
  </head>

  <body class="nav-md" onLoad="<?php echo $script;?>">
    <div class="container body">
      <div class="main_container">
    
    <?php
}


function sidebar(){
    global $con, $date, $time, $d_detail;
    ?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="https://i.postimg.cc/bvVQmMpQ/YDCF-310.gif" style="height:30px;width:30px;border-radius:50px;"> <span>Digital Assets</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $d_detail[name]."Admin";?></h2>
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a href="update_statistics.php"><i class="fa fa-home"></i> Update Statistics</a>
                  </li>
                  <li><a href="yem_delevery_history.php"><i class="fa fa-home"></i>YEM Delievery</a>
                  </li>
                  <li><a href="top_leaders.php"><i class="fa fa-home"></i> Top Leader</a>
                  </li>
                  
                  <li><a><i class="fa fa-sitemap"></i>My Network <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="./allusers.php">All Users</a></li>
                      <li><a href="active_users.php">Active Users</a></li>
                      <li><a href="inactive_users.php">Inactive Users</a></li>
                      <li><a href="position_list.php">Members Positions</a></li>
                    </ul>
                  </li>
                  
                  
                 
                  <li><a><i class="fa fa-sitemap"></i>Requests <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="withdrawl_cleared_requests.php">INR Withdrawal Requests</a></li>
                      
                       <li><a href="walet_id_request.php">Wallet ID Requests</a>
                        </li>
                        <li><a href="pin_requests.php">Pin Requests </a></li>
                    </ul>
                </ul>
                <ul class="nav side-menu">
                  
                  <li><a href="auto_matrix_list.php"><i class="fa fa-bug"></i>Auto Matrix Lists</a>
                  </li>
                  
                  <li><a href="contact.php"><i class="fa fa-bug"></i>Contact Lists</a></li>
                  
                </ul>
                
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i>Reports<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="yem_withdrawl_requests.php">INR Cleared Report</a></li>
                        <li><a href="adminChargeList.php">Admin Charges Report</a>
                        </li>
                        <li><a href="tdsList.php">TDS Charges Report</a>
                        </li>
                        
                    </ul>
                  </li>
                    
                    
                  <li><a><i class="fa fa-user"></i>KYC Requests<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="request_clear_adhar_card.php">Clear Adhar Card</a></li>
                        <li><a href="request_clear_pan_card.php">Clear Pan Card</a></li>
                        <li><a href="request_clear_bank_detail.php">Clear Bank Details</a></li>
                    </ul>
                  </li>
                 
                  <li><a><i class="fa fa-user"></i>Profile<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="./changePassword.php">Change Password</a></li>
                    </ul>
                  </li>                         
                  
                </ul>
              </div>
            </div>
            
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

 <?php   
}
function header_bar(){
    global $con, $date, $time, $d_detail;
    ?>
    <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo"Admin";?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item"  href="logout.php">Logout</a>
                    
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
    
    <?php
}

function bottom_structure($footer_heading){
    ?>
    
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?php echo $footer_heading;?>
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
    
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
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
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>


    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>

    
    
    
    
    <?php
    
}
?>