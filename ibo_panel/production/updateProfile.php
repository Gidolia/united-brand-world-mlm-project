<?php 
include "config.php";
if($_GET[n]=='s'){
    top_structure('Profile Update', 1, 'success', 'Success!', 'Profile Updated Successfully');
}elseif($_GET[n]=='f'){
    top_structure('Profile Update', 1, 'error', 'Failed!', 'Plz Try Again! Query Failed');
}
else{
    top_structure('Profile Update', 0, '', '', '');
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
                          <input type="text" class="form-control" name="ifbo_id" value="DA<?php echo $_SESSION[d_id];?>" readonly>
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
                          <input type="text" class="form-control" name="mobile" value="<?php echo $d_detail[mobile];?>" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-md-3 col-sm-3 col-xs-3"> State</label>-->
<!--                        <div class="col-md-9 col-sm-9 col-xs-9">-->
                          <!--<input type="text" class="form-control" name="state" required value="<?php echo $d_detail[state];?>" >-->
<!--                          <select class="form-control" name="state" required>-->
<!--                       <option value="">Select State</option>-->
<!--                       <option value="Andhra Pradesh">Andhra Pradesh</option>-->
<!--<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>-->
<!--<option value="Arunachal Pradesh">Arunachal Pradesh</option>-->
<!--<option value="Assam">Assam</option>-->
<!--<option value="Bihar">Bihar</option>-->
<!--<option value="Chandigarh">Chandigarh</option>-->
<!--<option value="Chhattisgarh">Chhattisgarh</option>-->
<!--<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>-->
<!--<option value="Daman and Diu">Daman and Diu</option>-->
<!--<option value="Delhi">Delhi</option>-->
<!--<option value="Lakshadweep">Lakshadweep</option>-->
<!--<option value="Puducherry">Puducherry</option>-->
<!--<option value="Goa">Goa</option>-->
<!--<option value="Gujarat">Gujarat</option>-->
<!--<option value="Haryana">Haryana</option>-->
<!--<option value="Himachal Pradesh">Himachal Pradesh</option>-->
<!--<option value="Jammu and Kashmir">Jammu and Kashmir</option>-->
<!--<option value="Jharkhand">Jharkhand</option>-->
<!--<option value="Karnataka">Karnataka</option>-->
<!--<option value="Kerala">Kerala</option>-->
<!--<option value="Madhya Pradesh">Madhya Pradesh</option>-->
<!--<option value="Maharashtra">Maharashtra</option>-->
<!--<option value="Manipur">Manipur</option>-->
<!--<option value="Meghalaya">Meghalaya</option>-->
<!--<option value="Mizoram">Mizoram</option>-->
<!--<option value="Nagaland">Nagaland</option>-->
<!--<option value="Odisha">Odisha</option>-->
<!--<option value="Punjab">Punjab</option>-->
<!--<option value="Rajasthan">Rajasthan</option>-->
<!--<option value="Sikkim">Sikkim</option>-->
<!--<option value="Tamil Nadu">Tamil Nadu</option>-->
<!--<option value="Telangana">Telangana</option>-->
<!--<option value="Tripura">Tripura</option>-->
<!--<option value="Uttar Pradesh">Uttar Pradesh</option>-->
<!--<option value="Uttarakhand">Uttarakhand</option>-->
<!--<option value="West Bengal">West Bengal</option>-->
<!--                   </select>-->
                          
                          <!--<span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>-->
<!--                        </div>-->
<!--                      </div>-->
                      
                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"> District</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="district" required value="<?php echo $d_detail[district];?>" >
                          <span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"> City</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="city" required value="<?php echo $d_detail[city];?>" <?php echo $a;?>>
                          <span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
            
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
                          <input type="email" class="form-control" name="sponser_id" readonly value="<?php echo $mjhy[name]." (DA".$d_detail[s_id].")";?>">
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
                         $city="UPDATE `distributor` SET `city` = '$_POST[city]' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                        //  $state="UPDATE `distributor` SET `state` = '$_POST[state]' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                         $district="UPDATE `distributor` SET `district` = '$_POST[district]' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                        
                         if($con->query($email)===TRUE && $con->query($city)===TRUE && $con->query($district)===TRUE )
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