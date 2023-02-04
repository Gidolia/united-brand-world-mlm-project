<?php 
include "config.php";

top_structure('Change Profile Photo || Digital Asset', 0, 'error', 'Success', 'done');

sidebar();
header_bar();?>

   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Change Profile Photo</h3>
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
                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                      
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Profile Photo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="pan">
                          
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
                         if (file_exists("profile_photo/".$_SESSION['d_id'].".jpg"))
                        {
                            unlink("profile_photo/".$_SESSION['d_id'].".jpg");
                            echo $_SESSION['d_id'].".jpg" . " already exists. ";
                        }
                        if(move_uploaded_file($_FILES["pan"]["tmp_name"], "profile_photo/".$_SESSION['d_id'].".jpg"))
                		{
                            echo "Stored in: " . "profile_photo/".$fileName;
                             $state="UPDATE `distributor` SET `profile_photo` = 'y' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                             if($con->query($state)===TRUE)
                             {
                                 echo "<script>alert('Success! Updated Successfully');location.href='index.php?updated';</script>";
                             }
                             else{
                                 echo "<script>alert('Failed! Plz try Again');location.href='change_profile_photo.php?fail';</script>";
                             }
                        }
                     }
                     ?>
            
</div></div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
