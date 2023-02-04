<?php 
include "config.php";
top_structure('Index', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>

  
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                <div class="count"><i class="fa fa-user"></i> <?php
                 $fvfdv="SELECT * FROM `distributor`";
                 $dc=$con->query($fvfdv);
                 echo $dc->num_rows;
                 ?> 
                 </div>
                  <h3>Total Team</h3>
                </div>
              </div>
            
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <div class="count"><i class="fa fa-user"></i> <?php
                 $fvfdv="SELECT * FROM `distributor` WHERE `r_date`='$date'";
                 $dc=$con->query($fvfdv);
                 echo $dc->num_rows;
                 ?> </div>
                  <h3>Today Joined Member</h3>
                  
                </div>
              </div>
        
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <div class="count"><i class="fa fa-user"></i> 
                 <?php
                 $fvfdv="SELECT * FROM `distributor` WHERE `a_date`='$date'";
                 $dc=$con->query($fvfdv);
                 echo $dc->num_rows;
                 ?>
                 </div>
                  <h3>Today Active Member</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <div class="count"><i class="fa fa-user"></i> 
                 <?php
                 $fvfdv="SELECT * FROM `distributor` WHERE `status`='1'";
                 $dc=$con->query($fvfdv);
                 echo $dc->num_rows;
                 ?></div>
                  <h3>Total Active Member</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <div class="tile-stats">
                  
                 <div class="count"><i class="fa fa-user"></i> <?php
                 $fvfdv="SELECT * FROM `distributor` WHERE `status`='0'";
                 $dc=$con->query($fvfdv);
                 echo $dc->num_rows;
                 ?> </div>
                  <h3>Total Inactive Member</h3>
                  
                </div>
              </div>
              
            </div>
          </div>
          
          
          
          
        </div>
        <!-- /page content -->

                
            
            <!-- Main content -->
            
        </div>
    </div>
  

<?php 
bottom_structure('Digitalasset.org.in');

?>