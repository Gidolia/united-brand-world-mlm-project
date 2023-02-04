<?php 
include "config.php";
 if($_GET[n]=='s'){
    top_structure('Pin Requests List', 1, 'success', 'Success!', 'Pin Request Approved ');  
}elseif($_GET[n]=='f'){
top_structure('Pin Requests List', 1, 'warning', 'Failed', 'Pin Request FAiled');
}elseif($_GET[m]=='s'){
    top_structure('Pin Requests List', 1, 'success', 'Success!', 'Pin Requested Rejected');  
}elseif($_GET[m]=='f'){
top_structure('Pin Requests List', 1, 'warning', 'Failed', 'Pin Request FAiled');
}else{
top_structure('Pin Requests List', 0, '', '', '');
}

if(isset($_POST[approve])){
      $v=$con->query("SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'");
      $value=$v->fetch_assoc();
      
       if($_POST[p_type]=="1"){
           $pins=$value[pw_1]+$_POST[order];
            $res=$con->query("UPDATE `pin_requests` SET `status`='y' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
           $abc=$con->query("UPDATE `distributor` SET `pw_1`='$pins' WHERE `d_id`='$_POST[d_id]'");
           $ins_hist="INSERT INTO `pw_history` (`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[p_type]', '$date', '$time', '$_POST[order]', '$value[pw_1]', '$pins', '+', 'Pin Requested', '', '', '');";
         
       }elseif($_POST[p_type]=="2"){
           $pins=$value[pw_2]+$_POST[order];
            $res=$con->query("UPDATE `pin_requests` SET `status`='y' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
            $abc=$con->query("UPDATE `distributor` SET `pw_2`='$pins' WHERE `d_id`='$_POST[d_id]'");
            $ins_hist="INSERT INTO `pw_history` (`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[p_type]', '$date', '$time', '$_POST[order]', '$value[pw_2]', '$pins', '+', 'Pin Requested', '', '', '');";
       }elseif($_POST[p_type]=="3"){
           $pins=$value[pw_3]+$_POST[order];
            $res=$con->query("UPDATE `pin_requests` SET `status`='y' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
            $abc=$con->query("UPDATE `distributor` SET `pw_3`='$pins' WHERE `d_id`='$_POST[d_id]'");
            $ins_hist="INSERT INTO `pw_history` (`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[p_type]', '$date', '$time', '$_POST[order]', '$value[pw_3]', '$pins', '+', 'Pin Requested', '', '', '');";
       }elseif($_POST[p_type]=="4"){
           $pins=$value[pw_4] + $_POST[order];
            $res=$con->query("UPDATE `pin_requests` SET `status`='y' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
            $abc=$con->query("UPDATE `distributor` SET `pw_4`='$pins' WHERE `d_id`='$_POST[d_id]'");
            $ins_hist="INSERT INTO `pw_history` (`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[p_type]', '$date', '$time', '$_POST[order]', '$value[pw_4]', '$pins', '+', 'Pin Requested', '', '', '');";
       }elseif($_POST[p_type]=="5"){
           $pins=$value[pw_5]+$_POST[order];
            $res=$con->query("UPDATE `pin_requests` SET `status`='y' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
            $abc=$con->query("UPDATE `distributor` SET `pw_5`='$pins' WHERE `d_id`='$_POST[d_id]'");
            $ins_hist="INSERT INTO `pw_history` (`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[p_type]', '$date', '$time', '$_POST[order]', '$value[pw_5]', '$pins', '+', 'Pin Requested', '', '', '');";
       }elseif($_POST[p_type]=="6"){
           $pins=$value[pw_6]+$_POST[order];
            $res=$con->query("UPDATE `pin_requests` SET `status`='y' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
           $abc=$con->query("UPDATE `distributor` SET `pw_6`='$pins' WHERE `d_id`='$_POST[d_id]'");
           $ins_hist="INSERT INTO `pw_history` (`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[p_type]', '$date', '$time', '$_POST[order]', '$value[pw_6]', '$pins', '+', 'Pin Requested', '', '', '');";
       }elseif($_POST[p_type]=="7"){
           $pins=$value[pw_7]+$_POST[order];
            $res=$con->query("UPDATE `pin_requests` SET `status`='y' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
            $abc=$con->query("UPDATE `distributor` SET `pw_7`='$pins' WHERE `d_id`='$_POST[d_id]'");
            $ins_hist="INSERT INTO `pw_history` (`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[p_type]', '$date', '$time', '$_POST[order]', '$value[pw_7]', '$pins', '+', 'Pin Requested', '', '', '');";
       }elseif($_POST[p_type]=="8"){
           $pins=$value[pw_8]+$_POST[order];
            $res=$con->query("UPDATE `pin_requests` SET `status`='y' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
            $abc=$con->query("UPDATE `distributor` SET `pw_8`='$pins' WHERE `d_id`='$_POST[d_id]'");
            $ins_hist="INSERT INTO `pw_history` (`pwh_id`, `d_id`, `pw_type`, `date`, `time`, `pin`, `b_pin`, `a_pin`, `type`, `note`, `from_d_id`, `to_d_id`, `a_d_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[p_type]', '$date', '$time', '$_POST[order]', '$value[pw_8]', '$pins', '+', 'Pin Requested', '', '', '');";
       }
       
      
       if($res===TRUE && $abc===TRUE && $con->query($ins_hist)===TRUE){
           echo "<script>location.href='pin_requests.php?n=s';</script>";
       }else{
           echo "<script>location.href='pin_requests.php?n=f';</script>";
       }
   }
   
   if(isset($_POST[reject])){
       $res=$con->query("UPDATE `pin_requests` SET `status`='n' WHERE `pr_id`='$_POST[pr_id]' AND  `d_id`='$_POST[d_id]' ");
       if($res===TRUE){
           echo "<script>location.href='pin_requests.php?m=s';</script>";
       }else{
           echo "<script>location.href='pin_requests.php?m=f';</script>";
       }
   }
   
   
                   
                   

sidebar();
header_bar();?>
<!--Page Content-->

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pin Request </h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pending Request</h2>
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
                                          <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S.no </th>
                          <th>D ID</th>
                          <th>Name</th>
                          <th>Pin type</th>
                          <th>Pin Order</th>
                          <th>Screen Shot</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <tbody>
                            <?php
                            $qry="SELECT `pr_id`, `d_id`, `name`, `pin_order`, `pin_type`, `screenshot`, `status` FROM `pin_requests` WHERE `status`='p' ORDER BY `pr_id` DESC";
                            $r=$con->query($qry);
                            while($val=$r->fetch_assoc()){
                                $ar++;
                            ?>
                   <tr>
                          <th><?php echo $ar;?></th>
                          <th><?php echo "DA".$val[d_id]?></th>
                          <th><?php echo $val[name]?></th>
                          <th><?php echo $val[pin_type]?></th>
                         
                          <th><?php echo $val[pin_order]?></th>
                          <th><a href="../../../ibo_panel/production/screenShot/<?php echo $val['screenshot']; ?>" target="_blank">Click here to view ScreenShot</a><th><?php 
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
                              <form method="post">
                                
                                <td>
                                    <input type="hidden" name="p_type" value="<?php echo $val[pin_type]; ?>">
                                 <input type="hidden" name="order" value="<?php echo $val[pin_order]; ?>">
                                <input type="hidden" name="d_id" value="<?php echo $val['d_id']; ?>">
                                <input type="hidden" name="pr_id" value="<?php echo $val['pr_id']; ?>">
                                
                              <input type="submit" name="approve" value="Approve" class="btn btn-success">
                                <input type="submit" name="reject" value="Reject" class="btn btn-danger">
                                
                                </td>
                                </form>
                
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
                            $qry="SELECT `pr_id`, `d_id`, `name`, `pin_order`, `pin_type`, `screenshot`, `status` FROM `pin_requests` WHERE `status`!='p'  ORDER BY `pr_id` DESC";
                            $r=$con->query($qry);
                            while($val=$r->fetch_assoc()){
                                $a++;
                            ?>
                   <tr>
                          <th><?php echo $a;?></th>
                          <th><?php echo $val[d_id]?></th>
                          <th><?php echo $val[name]?></th>
                          <th><?php echo $val[pin_type]?></th>
                         
                          <th><?php echo $val[pin_order]?></th>
                          <th><a href="../../../ibo_panel/production/screenShot/<?php echo $val['screenshot']; ?>" target="_blank">Click here to view ScreenShot</a><th><?php 
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




          
<?php 
bottom_structure('Digitalasset.org.in');

?>