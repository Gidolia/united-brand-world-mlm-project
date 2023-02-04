<?php 
include "config.php";
if($_GET[n]=='s'){
    top_structure('Edit Profile', 1, 'success', 'Success!', 'Edit Profile Successfully');
}elseif($_GET[n]=='f'){
    top_structure('Edit Profile', 1, 'warning', 'Not Matched', 'Edit Profile Failed');
}
else{
    top_structure('Edit Profile', 0, '', '', '');
}
sidebar();
header_bar();?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Profile</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     
                     <?php  $e="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
                                $d=$con->query($e);
                                
                                $R=mysqli_fetch_assoc($d); ?>
                     
                    <form class="form-horizontal form-label-left" method="post">
                      
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Distributor ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="d_id" value="<?php echo $_GET[d_id];?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Distributor Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="name" value="<?php echo $R[name];?>" >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="mobile" value="<?php echo $R[mobile];?>" >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                       
                     
                      <!-- <div class="form-group">-->
                      <!--  <label class="control-label col-md-3 col-sm-3 col-xs-3"> Address</label>-->
                      <!--  <div class="col-md-9 col-sm-9 col-xs-9">-->
                      <!--    <input type="text" class="form-control" name="addreass"  value="<?php echo $R[addreass];?>" <?php echo $a;?>>-->
                      <!--    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>-->
                      <!--  </div>-->
                      <!--</div>-->
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"> City</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="city"  value="<?php echo $R[city];?>" <?php echo $a;?>>
                          <span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                <!--       <div class="form-group">-->
                <!--        <label class="control-label col-md-3 col-sm-3 col-xs-3">State</label>-->
                <!--        <div class="col-md-9 col-sm-9 col-xs-9">-->
                      
			            	<!--<input type="text" class="form-control" name="state" value="<?php echo $R[state];?>"  >-->
                <!--          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>-->
                <!--        </div>-->
                <!--      </div>-->
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="email" class="form-control" name="email" value="<?php echo $R[email];?>" >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <!-- <div class="form-group">-->
                      <!--  <label class="control-label col-md-3 col-sm-3 col-xs-3"> Pan Card Number</label>-->
                      <!--  <div class="col-md-9 col-sm-9 col-xs-9">-->
                      <!--    <input type="text" class="form-control" name="pancard_no" value="<?php echo $R[pancard];?>"-->
                      <!--    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Update Profile" name="submit_profile">
                        </div>
                      </div>
                     </form>
                     <?php
            if(isset($_POST[submit_profile]))
            {
                $sql="UPDATE `distributor` SET `name` = '$_POST[name] ' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                $sql .="UPDATE `distributor` SET `mobile` = '$_POST[mobile]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                // $sql .="UPDATE `distributor` SET `addreass` = '$_POST[addreass]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                $sql .="UPDATE `distributor` SET `city` = '$_POST[city]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                // $sql .="UPDATE `distributor` SET `state` = '$_POST[state]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                
                $sql .="UPDATE `distributor` SET `email` = '$_POST[email]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                // $sql .="UPDATE `distributor` SET `pancard` = '$_POST[pancard_no]' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                
							if($con->multi_query($sql) === TRUE)
							{
								echo "<script>
		location.href='edit_profile.php?d_id=$_POST[d_id]&&n=s';</script>";
							}
						 	else
							{
							 	echo "<script>
		location.href='edit_profile.php?d_id=$_POST[d_id]&&n=f';</script>";
						 	}
            }
            ?>
                     
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
