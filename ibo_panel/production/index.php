<?php 
include "config.php";
    if(isset($_POST['btn_wallet'])){
        $res=$con->query("UPDATE `distributor` SET `yem_wallet_id`='$_POST[wallet_id]' WHERE `d_id`='$_SESSION[d_id]'");
        if($res===TRUE){
            echo "<script>location.href='index.php?n=s';</script>";
        }else{
            echo "<script>location.href='index.php?n=f';</script>";
        }
    }

top_structure('Index || Digital Asset', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
       <div class="right_col" role="main">
        
            
            <h2 style="text-align: left;background-color:#6DE9FF;"><marquee><span class="" style="color: rgb(230, 21, 28);"><strong>WELCOME TO DIGITAL ASSETS</strong></span></marquee></h2>
          <br />
       
            <div class="row">
               <div class="offset-md-3 col-md-6 offset-md-3 ">
                        <div class="x_panel fixed_height_400">
                          <div class="x_content">

                            <div class="flex">
                              <ul class="list-inline widget_profile_box" style="background-color:#6DE9FF;">
                                <li>
                                  <!--<a>-->
                                  <!--  <i class="fa fa-facebook"></i>-->
                                  <!--</a>-->
                                </li>
                                <?php
                if($d_detail[profile_photo]=="y")
                {
                    $imgsrc="profile_photo/".$_SESSION[d_id].".jpg";
                }
                else{
                    $imgsrc="https://i.postimg.cc/yNnXqtPQ/YDC-250.gif";
                }
                ?>
                <li > 
                  <center>
                      
                      <img src="<?php echo $imgsrc;?>" alt="<?php echo $imgsrc;?>" class="img-circle profile_img" ></center>
                 <center > 
                
                 <?php echo "<h3>".$d_detail[name]."</h3>".
                 "<h2><b>(DA".$_SESSION[d_id].")"."</b></h2>";?> </center>
                </li>
                <li>
                </li>
                <li>
                  
                </li>
              </ul>
            </div>
                  <table class="table">
                        <tr>
                            <th colspan="2"><center>
                                <a href="updateProfile.php"><button class="btn btn-info">Edit Profile</button></a>
                                <a href="change_profile_photo.php"><button class="btn btn-info">Change Profile Photo</button></a></center></th>
                            <!--<td><center></center></td>-->
                        </tr>
                        <tr><th>Membership :</th><td><span style="font-size:15px;color:red;text-align:center;">Co-Founder</span></td></tr>
                        <tr><th>Reward Level :</th><td><span style="font-size:15px;color:red;text-align:center;">-</span></td></tr>
                        <tr><th>Id Status:</th>
                        <td>
                            <?php
                            if($d_detail[status]=="1"){
                            ?>
                            <button class="btn btn-success" >Active</button></td></tr>
                        <?php
                            }else{
                        ?>
                        <button class="btn btn-danger" >Inactive</button></td></tr>
                        <?php }  ?>
                        <tr><th>Digital Wallet Address</th>
                        <?php
                            if($d_detail[yem_wallet_id]!=""){
                            ?>
        <td><button class="btn btn-success"><?php echo$d_detail[yem_wallet_id];?></button></td>
        <?php }?>
        </tr>
        <tr>
            <td>Your Joining Link</td>
            <td><textarea  id="myInput" readonly>http://digitalasset.org.in/register.php?d_id=DA<?php echo $_SESSION[d_id];?></textarea>
                    <button onclick="myFunctionr()" class="btn btn-primary" >Copy Joining Link</button></div></span>
                     <script>
function myFunctionr() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard
      .writeText(copyText.value)
      .then(() => {
        alert("successfully copied");
      })
      .catch(() => {
        alert("something went wrong");
      });
}
</script></td>
        
        </tr>
        <tr>
            <td> <a href="whatsapp://send?text=http://digitalasset.org.in/register.php?d_id=DA<?php echo $_SESSION[d_id];?>" data-action="share/whatsapp/share"><span class="badge badge-primary" style="background-color: green;">Share Joinnig Link On Whats App</span></a></td>
        </tr>
                 
                    </table>
                          </div>
                        </div>
                      </div>
                      
                      
                      
           <div class="offset-md-2 col-md-8 col-sm-12 ">
            <div class="row tile_count">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <a href="purchased_bill.php">
                <div class="tile-stats" style="background:#6DE9FF">
                  
                  <div class="count" style="color:white;"><img src="./images/yem.jpeg" style="height:35px;width:30px;border-radius:5px;"> <?php echo $d_detail[yem_wallet]+0;?> </div>
                  <h4 style="color:white;"> &nbsp;YEM Reference Value</h4>
                </div></a>
              </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <a href="withdrawl_wallet_ledger.php">
                <div class="tile-stats" style="background:#6DE9FF">
                  
                 <div class="count" style="color:white;"><i class="fa fa-inr" style="color:white;"></i> <?php echo $d_detail[withdrawal_wallet]+0;?> </div>
                  <h4 style="color:white;"> &nbsp;INR Wallet</h4>
                </div></a>
              </div>
          
             <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <a href="package_ledger_view.php?pw_type=1">
                <div class="tile-stats" style="background:#6DE9FF">
                  
                 <div class="count" style="color:white;">PIN <?php echo $d_detail[pw_1]+0;?> </div>
                  <h4 style="color:white;"> &nbsp;Package 1 Pin</h4>
                </div></a>
              </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
     </div>
    </div>
    </div>
</div>
<script>
        function myFunction() {
          /* Get the text field */
          var copyText = document.getElementById("myInput");
        
          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /* For mobile devices */
        
          /* Copy the text inside the text field */
          navigator.clipboard.writeText(copyText.value);
          
          /* Alert the copied text */
          alert("Copied the text: " + copyText.value);
        }
</script>
    <!-- page content -->

<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
