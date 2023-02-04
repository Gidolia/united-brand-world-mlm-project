<?php 
include "config.php";
top_structure('Network List', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>
<!-- page content -->
        <!-- page content -->
        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Downline/Network List</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Downline List</h2>
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
function printtree($sponsor_no)
{
    global $con, $date, $time;
	if($sponsor_no==0)
	{$tr=$_SESSION[d_id];}else{$tr=$sponsor_no;}
	
$sel1="SELECT * FROM `distributor` WHERE `s_id`='$tr';";
$que1=$con->query($sel1);
$c=$que1->num_rows;
if($c!=0){

while($fet1=mysqli_fetch_assoc($que1))
{

$sels="SELECT * FROM `distributor` WHERE `d_id`='$fet1[s_id]';";
$ques=$con->query($sels);
$ibo_d=mysqli_fetch_assoc($ques);?>
                        <tr>
                          
                          <td>DA<?php echo $fet1[d_id];?></td>
                          <td><?php echo $fet1[name];?></td>
                          <td>DA<?php echo $ibo_d[d_id];?> (<?php echo $ibo_d[name];?>)</td>
                          <td><?php echo $fet1[r_date];?></td>
                          <td><?php echo $fet1[a_date];?></td>
                          <td><?php 
                          if($fet1[status]=="1")
                          {?>
                              <button type="button" class="btn btn-success">Active</button>
                              <?php
                          }
                          else{
                          ?>
                          <button type="button" class="btn btn-danger">Not Active</button>
                          <?php }?>
                          
                          </td>
                          <td><a href="network_list.php?d_id=<?php echo $fet1[d_id];?>"><button type="button" class="btn btn-primary">Downline List</button></a></td>
                          
                        </tr>

	<?php
	printtree($fet1[d_id]);
}
}
}
?>
        <div class="card-box table-responsive">
        <table class="table table-striped table-bordered" id="datatable">
            <thead>
                                        <tr>
                                          
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Placement ID</th>
                                            <th>Joining Date</th>
                                            <th>Activation Date</th>
                                            <th>ID Status</th>
                                            <th>Downline</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                     if(isset($_GET[d_id])){
                                     echo printtree($_GET[d_id]);
                                     }else{
                                        echo printtree($_SESSION[ibo_id]);
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

<?php 
bottom_structure('Digitalasset.org.in');

?>