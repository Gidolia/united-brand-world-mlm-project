<?php 
include "config.php";
if($_GET[n]=='s'){
    top_structure('Update Profile', 1, 'success', 'Success!', 'Profile Updated Successfully');
}elseif($_GET[n]=='f'){
    top_structure('Update Profile', 1, 'warning', 'Not Matched', 'Profile Update Fail');
}
else{
    top_structure('Update Profile', 0, '', '', '');
}
sidebar();
header_bar();?>
<!--Content-->
     
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Profile</h3>
              </div>
            </div>
                  <div class="x_content">
                    <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
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
                    <form class="form-horizontal form-label-left" method="post">
                      
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="ifbo_id" value="OR<?php echo $_SESSION[d_id];?>" readonly>
                          <input type="hidden" class="form-control" name="ibo_id" value="<?php echo $_SESSION[d_id];?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="ibo_name" value="<?php echo $d_detail[name];?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="mobile" value="<?php echo $d_detail[mobile];?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                       
                     
                      <!-- <div class="form-group">-->
                      <!--  <label class="control-label col-md-3 col-sm-3 col-xs-3"> Addreass</label>-->
                      <!--  <div class="col-md-9 col-sm-9 col-xs-9">-->
                      <!--    <input type="text" class="form-control" name="addreass" required value="<?php echo $d_detail[addreass];?>" <?php echo $a;?>>-->
                      <!--    <span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>-->
                      <!--  </div>-->
                      <!--</div>-->
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"> City</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="city" required value="<?php echo $d_detail[city];?>" <?php echo $a;?>>
                          <span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                <!--       <div class="form-group">-->
                <!--        <label class="control-label col-md-3 col-sm-3 col-xs-3">State</label>-->
                <!--        <div class="col-md-9 col-sm-9 col-xs-9">-->
                      
			            	<!--<input type="text" class="form-control" name="state" value="<?php echo $d_detail[state];?>" required >-->
                <!--          <span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>-->
                <!--        </div>-->
                <!--      </div>-->
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="email" class="form-control" name="email" value="<?php echo $d_detail[email];?>" required >
                          <span class="fa fa-email form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <?php
                          $pn="SELECT * FROM `kyc_pan` WHERE `d_id`='$_SESSION[d_id]'";
                      $gb=$con->query($pn);
                      $mjh=mysqli_fetch_assoc($gb);
                      ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pancard No.</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="pancard" value="<?php echo $mjh[pan_no];?>" required readonly>
                          <span class="fa fa-card form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <?php
                      $sqlwwww="SELECT * FROM `distributor` WHERE `d_id`='$d_detail[s_id]'";
                      $gbk=$con->query($sqlwwww);
                      $mjhy=mysqli_fetch_assoc($gbk);
                      
                   
                      ?>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"> My Sponser Detail</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="email" class="form-control" name="sponser_id" readonly value="<?php echo $mjhy[name]." (OR".$d_detail[s_id].")";?>">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Update Profile" name="submit_profile">
                        </div>
                      </div>
                     </form>
                     
                     <?php
                     if(isset($_POST[submit_profile]))
                     {
                         $email="UPDATE `distributor` SET `email` = '$_POST[email]' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                        //  $add="UPDATE `distributor` SET `addreass` = '$_POST[addreass]' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                         $city="UPDATE `distributor` SET `city` = '$_POST[city]' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                        //  $state="UPDATE `distributor` SET `state` = '$_POST[state]' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                         if($con->query($email)===TRUE && $con->query($city)===TRUE)
                         {
                             echo "<script>location.href='updateProfile.php?n=s';</script>";
                         }
                         else{
                             echo "<script>location.href='updateProfile.php?n=f';</script>";
                         }
                         
                     }
                     ?>
            
</div></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       



<!--Content Ends-->
<?php 
bottom_structure('Digitalasset.org.in');

?>