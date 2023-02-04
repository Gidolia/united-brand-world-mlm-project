<?php 
include "config.php";
 if($_GET[m]=='s'){
    top_structure('Request Pin || Digital Asset', 1, 'success', 'Success!', 'Pin Requested Successfully');  
}elseif($_GET[m]=='f'){
top_structure('Request Pin || Digital Asset', 1, 'warning', 'Failed', 'Request FAiled');
}else{
top_structure('Request Pin || Digital Asset', 0, 'error', 'Success', 'done');
}

                     if(isset($_POST[req_pin]))
                     {      $num=rand(1000,99999);
                            $filename1 = "pinReq".$num.".jpg";
                            $tempname1 = $_FILES["pinReq"]["tmp_name"];
                            $folder1 = "./screenShot/" . $filename1;
                            move_uploaded_file($tempname1, $folder1);
                            
                            $qry="INSERT INTO `pin_requests`(`pr_id`, `d_id`, `name`, `pin_order`, `pin_type`, `screenshot`, `status`,`date`,`time`) VALUES (NULL,'$_SESSION[d_id]','$d_detail[name]','$_POST[pin_order]','$_POST[pin_type]','$filename1','p','$date','$time');";
                            if($con->query($qry)===TRUE){
                               echo "<script>location.href='request_pin.php?m=s&pw_type='+$_POST[pin_type];</script>";
                                
                            }else{
                                 echo "<script>location.href='activate_plan.php?m=f';</script>";
                            }
                            
                         
                     }
sidebar();
header_bar();?>

<!--Page Content-->
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Request Pin</h3>
              </div>
            </div>
                  <div class="x_content">
                    <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12">
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
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                       
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Order Pin</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="pin_order" placeholder="Enter No. of Pin to Buy" required>
                          <!--<span class=" form-control-feedback right" aria-hidden="true" ></span>-->
                        </div>
                      </div>
                      <?php
                      if($_GET[pw_type]=="1"){
                          $pin="4000";
                      }elseif($_GET[pw_type]=="2"){
                          $pin="8000";
                      }elseif($_GET[pw_type]=="3"){
                          $pin="16000";
                      }elseif($_GET[pw_type]=="4"){
                          $pin="32000";
                      }elseif($_GET[pw_type]=="5"){
                          $pin="64000";
                      }elseif($_GET[pw_type]=="6"){
                          $pin="128000";
                      }elseif($_GET[pw_type]=="7"){
                          $pin="216000";
                      }elseif($_GET[pw_type]=="8"){
                          $pin="512000";
                      }
                      ?>
                      
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pin Value</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" value="<?php echo $pin;?>" readonly>
                          <!--<span class="form-control-feedback right" aria-hidden="true"></span>-->
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Pin type</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="pin_type" value="<?php echo $_GET[pw_type];?>" readonly>
                          <!--<span class="form-control-feedback right" aria-hidden="true"></span>-->
                        </div>
                     </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Screenshot</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="pinReq" required>
                          <!--<span class="form-control-feedback right" aria-hidden="true"></span>-->
                        </div>
                      </div>
                   
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Submit" name="req_pin">
                        </div>
                      </div>
                     </form>
                      </div>
                    </div>
                 </div>
                   <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6" >
                <div class="tile-stats" style="background:#6DE9FF;">
                  
                  <div class="count" style="color:white;padding:0px 20px;"> 
                  <?php
                 if($_GET[pw_type]=="1"){
                     echo $d_detail[pw_1];
                 }elseif($_GET[pw_type]=="2"){
                     echo $d_detail[pw_2];
                 }elseif($_GET[pw_type]=="3"){
                     echo $d_detail[pw_3];
                 }elseif($_GET[pw_type]=="4"){
                     echo $d_detail[pw_4];
                 }elseif($_GET[pw_type]=="5"){
                     echo $d_detail[pw_5];
                 }elseif($_GET[pw_type]=="6"){
                     echo $d_detail[pw_6];
                 }elseif($_GET[pw_type]=="7"){
                     echo $d_detail[pw_7];
                 }elseif($_GET[pw_type]=="8"){
                     echo $d_detail[pw_8];
                 }
                  ?> </div>
                  <h3 style="color:white;">PIN Balance</h3>
                </div></div>
                </div>
              </div>
               <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pin Request History</h2>
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
                          <th>D ID</th>
                          <th>Name</th>
                          <th>Pin type</th>
                         
                          <th>Pin Order</th>
                          <th>Screen Shot</th>
                          <th>Status</th>
                          
                        </tr>
                      </thead>
                        <tbody>
                            <?php
                            $qry="SELECT `pr_id`, `d_id`, `name`, `pin_order`, `pin_type`, `screenshot`, `status` FROM `pin_requests` WHERE `d_id`= '$d_detail[d_id]' AND`pin_type`='$_GET[pw_type]'  ORDER BY `pr_id` DESC";
                            $r=$con->query($qry);
                            $a=0;
                            while($val=$r->fetch_assoc()){
                                
                            ?>
                   <tr>
                          <th><?php echo ++$a;?></th>
                          <th><?php echo "DA".$val[d_id]?></th>
                          <th><?php echo $val[name]?></th>
                          <th><?php echo $val[pin_type]?></th>
                         
                          <th><?php echo $val[pin_order]?></th>
                          <th><a href="screenShot/<?php echo $val['screenshot']; ?>" target="_blank">Click here to view ScreenShot</a><th><?php 
                          if($val[status]=="p"){
                            ?> 
                          <button class="btn btn-warning">Pending</button>
                          <?php
                          }elseif($val[status]=="y"){
                          ?>
                          <button class="btn btn-success">Approved</button>
                          <?php
                          }elseif($val[status]=="n"){
                          ?>
                          <button class="btn btn-danger">Rejected</button>
                          <?php
                          }
                          ?>
                          </th>
                             
                
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

            </div>
          </div>
<?php
?>
            


<!--Page Content-->
<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
