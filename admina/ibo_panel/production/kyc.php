<?php 
include "config.php";
top_structure('KYC', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>
<!--Content-->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>KYC</h3>
              </div>

            </div>

            <div class="clearfix"></div>
<div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Submit Pan Card Detail</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php
                  
$zx="SELECT * FROM `kyc_pan` WHERE `d_id`='$_SESSION[d_id]' AND `status`='c'";
                  $xz=$con->query($zx);
	if($xz->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-success"><b>SUCCESS !</b> Pan Card Detail Submited Successfully</div>
<?php
} else{
$x="SELECT * FROM `kyc_pan` WHERE `d_id`='$_SESSION[d_id]' AND `status`='n'";
                  $z=$con->query($x);
	if($z->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-danger"><b>sorry !</b> you have not provided actual information try again or photo is not clear</div>
<?php
}
                  $s="SELECT * FROM `kyc_pan` WHERE `d_id`='$_SESSION[d_id]' AND `status`='p'";
                  $k=$con->query($s);
	if($k->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-info"><b>submited!</b> this photo may take some hour for verification</div>
<?php
}
else{ ?> 
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pan Card photo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="pan" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">PAN Card Number</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="pan_no" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          
                          <input type="submit" class="btn btn-success" value="Submit Pan Detail" name="pan_submit">
                        </div>
                      </div>
                     </form>
<?php } } ?>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Submit Adhar Card</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php
                  
$zx="SELECT * FROM `kyc_adhar` WHERE `d_id`='$_SESSION[d_id]' AND `status`='c'";
                  $xz=$con->query($zx);
	if($xz->num_rows !=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-success"><b>SUCCESS !</b> Adhar Card Detail Submited Successfully</div>
<?php
} else{
$x="SELECT * FROM `kyc_adhar` WHERE `d_id`='$_SESSION[d_id]' AND `status`='n'";
                  $z=$con->query($x);
	if($z->num_rows !=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-danger"><b>Sorry !</b> you have not provided actual information try again</div>
<?php
}
                  $s="SELECT * FROM `kyc_adhar` WHERE `d_id`='$_SESSION[d_id]' AND `status`='p'";
                  $k=$con->query($s);
	if($k->num_rows !=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-info"><b>submited!</b> this photo may take some hour for verification</div>
<?php
}
else{ ?> 
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Adhar Card Front</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="adharf" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Adhar Card Back</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="adharb" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Adhar Card Number</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="adhar_no" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          
                          <input type="submit" class="btn btn-success" value="Submit Adharcard" name="submit_adhar">
                        </div>
                      </div>
                     </form>
<?php } }?>
                    </div>
                  </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Submit Bank Detail</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php
                  
$zx="SELECT * FROM `kyc_bank` WHERE `d_id`='$_SESSION[d_id]' AND `status`='c'";
                  $xz=$con->query($zx);
	if($xz->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-success"><b>SUCCESS !</b> Bank Detail Submited Successfully</div>
<?php
} else{
$x="SELECT * FROM `kyc_bank` WHERE `d_id`='$_SESSION[d_id]' AND `status`='n'";
                  $z=$con->query($x);
	if($z->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-danger"><b>sorry !</b> you have not provided actual information try again or photo is not clear</div>
<?php
}
                  $s="SELECT * FROM `kyc_bank` WHERE `d_id`='$_SESSION[d_id]' AND `status`='p'";
                  $k=$con->query($s);
	if($k->num_rows!=0)
	{ ?>
                  <br>&nbsp;<br>
             <div class="alert alert-info"><b>submited!</b> this photo may take some hour for verification</div>
<?php
}
else{ ?> 
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank Passbook photo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="bank_pass" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="bank_name" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Bank ACC No.</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="acc_no" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">IFSC Code.</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="ifsc" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          
                          <input type="submit" class="btn btn-success" value="Submit Bank Detail" name="bank_submit">
                        </div>
                      </div>
                     </form>
<?php } } ?>
                    </div>
                  </div>
                </div>
            </div>
            
            
            
            
            
            </div>
                   <?php 
            
            
   ////////////////////////////////////////////////////////////////
   ////////////////////////////////////////////////////////////////////////////
            if(isset($_POST[submit_adhar]))
            {
            echo "123";
            	if (file_exists("adhar_card_img/" .$_SESSION['d_id']."f.jpg"))
        {
        unlink("adhar_card_img/" .$_SESSION['d_id']."f.jpg");
          echo $_SESSION['d_id']."f.jpg" . " already exists. ";
        }
        if (file_exists("adhar_card_img/" .$_SESSION['d_id']."b.jpg"))
        {
        unlink("adhar_card_img/" .$_SESSION['d_id']."b.jpg");
          echo $_SESSION['d_id']."b.jpg" . " already exists. ";
        }
        
        if(move_uploaded_file($_FILES["adharf"]["tmp_name"], "adhar_card_img/".$_SESSION['d_id']."f.jpg"))
		{
		if(move_uploaded_file($_FILES["adharb"]["tmp_name"], "adhar_card_img/".$_SESSION['d_id']."b.jpg"))
		{
            echo "Stored in: " . "adhar_card_img/".$fileName;
            
            $que="INSERT INTO `kyc_adhar` (`ka_id`, `d_id`, `adhar_no`, `adhar_front_img`, `adhar_back_img`, `date`, `time`, `status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[adhar_no]', '$_SESSION[d_id]f.jpg', '$_SESSION[d_id]b.jpg', '$date', '$time', 'p');";
            if($con->query($que)===TRUE)
            {
            echo "<script>alert('adhar submited Sucessfully');
		location.href='kyc.php';</script>";
            }
            else{ echo "<script>alert('Query failed please try again');
		location.href='kyc.php';</script>";}
            }
            }
            }
  ///////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
         if(isset($_POST[bank_submit]))
            {
            echo "123";
            	if (file_exists("bank_img/" .$_SESSION['d_id'].".jpg"))
        {
        unlink("bank_img/" .$_SESSION['d_id'].".jpg");
          echo $_SESSION['d_id'].".jpg" . " already exists. ";
        }
        if(move_uploaded_file($_FILES["bank_pass"]["tmp_name"], "bank_img/".$_SESSION['d_id'].".jpg"))
		{
            echo "Stored in: " . "bank_img/".$fileName;
            $que1="INSERT INTO `kyc_bank` (`kb_id`, `d_id`, `bank_acc_no`, `bank_name`, `bank_img`, `ifsc_code`, `date`, `time`, `status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[acc_no]', '$_POST[bank_name]', '$_SESSION[d_id].jpg', '$_POST[ifsc]', '$date', '$time', 'p');";
            if($con->query($que1)==TRUE)
            {
                echo "<script>alert('bank detail submited Sucessfully');
		location.href='kyc.php';</script>";
            }
            else{ echo "<script>alert('Query failed please try again');
		location.href='kyc.php';</script>";}
            }
            }
            
            ///////Pan Card Details
            if(isset($_POST[pan_submit]))
            {
            echo "123";
            	if (file_exists("pan_card_img/" .$_SESSION['d_id'].".jpg"))
        {
        unlink("pan_card_img/" .$_SESSION['d_id'].".jpg");
          echo $_SESSION['d_id'].".jpg" . " already exists. ";
        }
        if(move_uploaded_file($_FILES["pan"]["tmp_name"], "pan_card_img/".$_SESSION['d_id'].".jpg"))
		{
            echo "Stored in: " . "pan_card_img/".$fileName;
            $que1="INSERT INTO `kyc_pan` (`kp_id`, `d_id`, `pan_no`, `pan_img`,  `date`, `time`, `status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[pan_no]', '$_SESSION[d_id].jpg', '$date', '$time', 'p');";
            if($con->query($que1)==TRUE)
            {
                echo "<script>alert('Pan detail submited Sucessfully');
		location.href='kyc.php';</script>";
            }
            else{ echo "<script>alert('Query failed please try again');
		location.href='kyc.php';</script>";}
            }
            }
            ?>     
            

            

            </div>
            </div>

            
            </div>
          </div>
        </div>
        <!-- /page content -->
<!--Content Ends-->
<?php 
bottom_structure('Digitalasset.org.in');

?>