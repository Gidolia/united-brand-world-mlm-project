<?php 
include "config.php";
top_structure('Activate Id || Digital Asset', 0, 'error', 'Success', 'done');
sidebar();
header_bar();

?>
<script>
   function validateForm() {
 	var ser_name = document.forms["myForm"]["s_name"].value;
	if(ser_name == "")
		{
			document.getElementById("upline_msg").innerHTML = "";
			return false;
		}
	if(ser_name == "")
		{
			document.getElementById("upline_msg").innerHTML = "";
			return false;
		}
		
	
}
 function showHint(str) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").value = this.responseText;
		 // document.getElementById("txtg").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "get_name_a.php?q=" + str, true);
    xmlhttp.send();
  
}

</script>



<!-- page content -->
        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Activate ID</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Activate ID</h2>
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
            <thead><tr><th>Your Pin Balance</th>
            <th>
                <?php if($_GET[pw_type]=="1"){
                    $pin=$d_detail[pw_1]+0;
                }elseif($_GET[pw_type]=="2"){
                    $pin=$d_detail[pw_2]+0;
                }elseif($_GET[pw_type]=="3"){
                    $pin=$d_detail[pw_3]+0;
                }elseif($_GET[pw_type]=="4"){
                    $pin=$d_detail[pw_4]+0;
                }elseif($_GET[pw_type]=="5"){
                    $pin=$d_detail[pw_5]+0;
                }elseif($_GET[pw_type]=="6"){
                    $pin=$d_detail[pw_6]+0;
                }elseif($_GET[pw_type]=="7"){
                    $pin=$d_detail[pw_7]+0;
                }elseif($_GET[pw_type]=="8"){
                    $pin=$d_detail[pw_8]+0;
                }else{
                    $pin="0";
                }
                
                echo $pin;
                ?>
                
            </th>
            </tr>
            </thead>
           
            
            </table>
                  <form class="form-horizontal form-label-left"  method="post" name="myForm" onsubmit="return validateForm()">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Activating ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="a_d_id" onKeyUp="showHint(this.value)" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <input type="hidden" name="d_id" value="<?php echo $d_detail[d_id];?>" required>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="s_name" id="txtHint" readonly>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <span id="upline_msg" style="color: red"></span>
                      </div>
                       <?php
            if($pin>="0" AND $pin!="" ){
            ?>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Activate ID" name="confirm_activate">
                     </div>
                      </div>
            <?php
            }else{
            ?>
                 <div class="form-group" ><center>
                        <div class="col-md-9 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Activate ID" name="confirm_activate" disabled><br>
                          <span style="color:red;">You dont have pin to activate</span>
                     </div></center>
                      </div>
            <?php
            }
            ?>           
            <input type="hidden" name="pw_type" value="<?php echo $_GET[pw_type];?>">
            <input type="hidden" name="pt" value="<?php echo $_GET[pt];?>">
                </form>
           
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ID Activation History</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="card-box table-responsive">
                                          <table id="datatable-keytable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S.no </th>
                           <th>Date / Time</th>
                          <th>Activating ID</th>
                          <th>Reference</th>
                          <th>Pin type</th>
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Available Pin</th>
                         
                          
                        </tr>
                      </thead>
                        <tbody>
                            <?php
                            $qry="SELECT `pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id` FROM `pw_history`  WHERE `pw_type`='$_GET[pw_type]' AND `d_id`='$_SESSION[d_id]' AND `a_d_id`!=''  ORDER BY `pwh_id` DESC";
                            $r=$con->query($qry);
                            while($val=$r->fetch_assoc()){
                                $a=1;
                            ?>
                   <tr>
                          <td><?php echo $a++;?></td>
                          <td><?php echo $val[date]?> / <?php echo $val[time]?></td>
                          <th><?php echo "DA".$val[a_d_id]?></th>
                          <td><?php echo $val[note]?></td>
                          <td><?php 
                          if($_GET[pw_type]=="1"){
                              echo "₹4,000";
                          }elseif($_GET[pw_type]=="2"){
                              echo "₹8,000";
                          }elseif($_GET[pw_type]=="3"){
                              echo "₹16,000";
                          }elseif($_GET[pw_type]=="4"){
                              echo "₹32,000";
                          }elseif($_GET[pw_type]=="5"){
                              echo "₹64,000";
                          }elseif($_GET[pw_type]=="6"){
                              echo "₹1,28,000";
                          }elseif($_GET[pw_type]=="7"){
                              echo "₹2,56,000";
                          }elseif($_GET[pw_type]=="8"){
                              echo "₹5,12,000";
                          }
                          ?></td>
                           <th><?php
                          if($val[type]=="-"){
                              echo "<span style='color:red;'>-".$val[pin]."</span>";
                          }
                          ?></th>
                          <th><?php
                          if($val[type]=="+"){
                              echo "<span style='color:green;'>+".$val[pin]."</span>";
                          }
                          ?></th>
                          
                          <td><?php echo $val[a_pin]?></td>
                          
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                               
                    </table>
                     
                     
                     </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        
<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');
if(isset($_POST[confirm_activate])){
function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }

$string=$_POST[a_d_id];
    
    $chars = '';
    $d_id = '';
    for ($index=0;$index < strlen($string); $index++) {
        if(isNumber($string[$index]))
        {
            $d_id .= $string[$index];
            
        }
        else {
            $chars .= $string[$index];}
        
    }
    //session_start();
    if($chars=="DA" || $chars=="da" || $chars=="Da")
    {
    
    
    if($_POST[pw_type]=="1"){
        $type="4000";
        $point=$_POST[pt];
        $value=$d_detail[pw_1]-1;
        
        distribute_level_commission($d_id,$type,$point);
        insert_d_id($d_id);
        $r=$con->query("UPDATE `distributor` SET `pw_1`='$value' WHERE `d_id`='$_SESSION[d_id]'");
        $qry="INSERT INTO `pw_history`(`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`, `yem_delivered`) VALUES (NULL,'$_SESSION[d_id]','1','$date','$time','1','$d_detail[pw_1]','$value','-','Id Activation','','','$d_id', '0');";
       
        $s=$con->query($qry);
        
        if($r===TRUE AND $s===TRUE){
            echo "<script>location.href='activate_id.php?pw_type=1&pt=0.5&n=s';</script>";
        }else{
             echo "<script>location.href='activate_id.php?pw_type=1&pt=0.5&n=f';</script>";
        }
    }elseif($_POST[pw_type]=="2"){
        $type="8000";
        $value=$d_detail[pw_2]-1;
        $point=$_POST[pt];
        
        distribute_level_commission($d_id,$type,$point);
        insert_d_id($d_id);
        insert_d_id($d_id);
        $r=$con->query("UPDATE `distributor` SET `pw_2`='$value' WHERE `d_id`='$_SESSION[d_id]'");
         $qry="INSERT INTO `pw_history`(`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`, `yem_delivered`) VALUES (NULL,'$_SESSION[d_id]','2','$date','$time','1','$d_detail[pw_2]','$value','-','Id Activation','','','$d_id', '0');";
       
        $s=$con->query("$qry");
        
         if($r===TRUE AND $s===TRUE){
            echo "<script>location.href='activate_id.php?pw_type=2&pt=1&n=s';</script>";
        }else{
             echo "<script>location.href='activate_id.php?pw_type=2&pt=1&n=f';</script>";
        }
    }elseif($_POST[pw_type]=="3"){
            $type="16000";
        $point=$_POST[pt];
        $value=$d_detail[pw_3]-1;
        
        distribute_level_commission($d_id,$type,$point);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        $r=$con->query("UPDATE `distributor` SET `pw_3`='$value' WHERE `d_id`='$_SESSION[d_id]'");
        $qry="INSERT INTO `pw_history`(`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`, `yem_delivered`) VALUES (NULL,'$_SESSION[d_id]','3','$date','$time','1','$d_detail[pw_3]','$value','-','Id Activation','','','$d_id', '0');";
       
        $s=$con->query("$qry");
        
         if($r===TRUE AND $s===TRUE){
            echo "<script>location.href='activate_id.php?pw_type=3&pt=2&n=s';</script>";
        }else{
             echo "<script>location.href='activate_id.php?pw_type=3&pt=2&n=f';</script>";
        }
    }elseif($_POST[pw_type]=="4"){
            $type="32000";
        $point=$_POST[pt];
        $value=$d_detail[pw_4]-1;
        
        distribute_level_commission($d_id,$type,$point);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        $r=$con->query("UPDATE `distributor` SET `pw_4`='$value' WHERE `d_id`='$_SESSION[d_id]'");
         $qry="INSERT INTO `pw_history`(`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL,'$_SESSION[d_id]','4','$date','$time','1','$d_detail[pw_4]','$value','-','Id Activation','','','$d_id');";
       
        $s=$con->query("$qry");
        
        if($r===TRUE AND $s===TRUE){
            echo "<script>location.href='activate_id.php?pw_type=4&pt=4&n=s';</script>";
        }else{
             echo "<script>location.href='activate_id.php?pw_type=4&pt=4&n=f';</script>";
        }
    }elseif($_POST[pw_type]=="5"){
            $type="64000";
        $point=$_POST[pt];
        $value=$d_detail[pw_5]-1;
        
        distribute_level_commission($d_id,$type,$point);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        $r=$con->query("UPDATE `distributor` SET `pw_5`='$value' WHERE `d_id`='$_SESSION[d_id]'");
        $qry="INSERT INTO `pw_history`(`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL,'$_SESSION[d_id]','5','$date','$time','1','$d_detail[pw_5]','$value','-','Id Activation','','','$d_id');";
       
        $s=$con->query("$qry");
        
        if($r===TRUE AND $s===TRUE){
            echo "<script>location.href='activate_id.php?pw_type=5&pt=8&n=s';</script>";
        }else{
             echo "<script>location.href='activate_id.php?pw_type=5&pt=8&n=f';</script>";
        }
    }elseif($_POST[pw_type]=="6"){
            $type="128000";
        $point=$_POST[pt];
        $value=$d_detail[pw_6]-1;
        
        distribute_level_commission($d_id,$type,$point);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        $r=$con->query("UPDATE `distributor` SET `pw_6`='$value' WHERE `d_id`='$_SESSION[d_id]'");
         $qry="INSERT INTO `pw_history`(`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL,'$_SESSION[d_id]','6','$date','$time','1','$d_detail[pw_6]','$value','-','Id Activation','','','$d_id');";
       
        $s=$con->query("$qry");
        
         if($r===TRUE AND $s===TRUE){
            echo "<script>location.href='activate_id.php?pw_type=6&pt=16&n=s';</script>";
        }else{
             echo "<script>location.href='activate_id.php?pw_type=6&pt=16&n=f';</script>";
        }
    }elseif($_POST[pw_type]=="7"){
            $type="216000";
        $point=$_POST[pt];
        $value=$d_detail[pw_7]-1;
        
        distribute_level_commission($d_id,$type,$point);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        $r=$con->query("UPDATE `distributor` SET `pw_7`='$value' WHERE `d_id`='$_SESSION[d_id]'");
         $qry="INSERT INTO `pw_history`(`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL,'$_SESSION[d_id]','7','$date','$time','1','$d_detail[pw_7]','$value','-','Id Activation','','','$d_id');";
       
        $s=$con->query("$qry");
        
          if($r===TRUE AND $s===TRUE){
            echo "<script>location.href='activate_id.php?pw_type=7&pt=32&n=s';</script>";
        }else{
             echo "<script>location.href='activate_id.php?pw_type=7&pt=32&n=f';</script>";
        }
    }elseif($_POST[pw_type]=="8"){
            $type="512000";
        $point=$_POST[pt];
        $value=$d_detail[pw_8]-1;
        
        distribute_level_commission($d_id,$type,$point);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        insert_d_id($d_id);
        $r=$con->query("UPDATE `distributor` SET `pw_8`='$value' WHERE `d_id`='$_SESSION[d_id]'");
        $qry="INSERT INTO `pw_history`(`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL,'$_SESSION[d_id]','8','$date','$time','1','$d_detail[pw_8]','$value','-','Id Activation','','','$d_id');";
       
        $s=$con->query("$qry");
        
          if($r===TRUE AND $s===TRUE){
            echo "<script>location.href='activate_id.php?pw_type=8&pt=64&n=s';</script>";
        }else{
             echo "<script>location.href='activate_id.php?pw_type=8&pt=64&n=f';</script>";
        }
    }
    $upd="UPDATE `distributor` SET `a_date`='$date', `a_time`='$time', `a_status`='y', `status`='1' WHERE `distributor`.`d_id` = '$d_id';";
    $con->query($upd);
}

}
?>
