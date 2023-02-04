<?php 
include "config.php";
if($_GET[a]=="s"){
top_structure('Update Wallet', 1, 'success', 'Amount Added', '');    
}elseif($_GET[a]=="f"){
top_structure('Update Wallet', 1, 'danger', 'Added Fail', '');    
}elseif($_GET[r]=="s"){
top_structure('Update Wallet', 1, 'success', 'Amount Removed', '');    
}elseif($_GET[r]=="f"){
top_structure('Update Wallet', 1, 'danger', 'Removal Fail', '');    
}else{
top_structure('Update Wallet', 0, 'warning', 'Success', 'done');    
}
sidebar();
header_bar();

?>
<!--Content-->
   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add / Remove</h3>
              </div>

            </div>

            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!--<h2>Update Wallet</h2>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                    <form class="form-horizontal form-label-left" method="post">
                      
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Distributer Id*</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="d_id" class="form-control" name="d_id" value="<?php echo $_GET['id'];?>" readonly>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Procedure</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select name="procedure" class="form-control">
                              <option value="+">Add</option>
                              <option value="-">Remove</option>
                          </select>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Amount</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" name="amt"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Note</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" name="note" value="Admin" >
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Update" name="btn">
                        </div>
                      </div>
                     </form>

                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                    <?php
                    $qryq=$con->query("SELECT `withdrawal_wallet` FROM `distributor`  WHERE `d_id`='$_GET[id]'");
                    $val=$qryq->fetch_assoc();
                    
                    ?>
                  <h3>Withdrawal Wallet  <?php echo "₹".$val['withdrawal_wallet'];?></h3>
                  </div>
                </div>
            </div>
            </div>
            
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add / Remove History</h2>
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
                             
        $g="SELECT * FROM `main_wallet`  WHERE `d_id`='$_GET[id]' ORDER BY `mw_id` DESC";
        $dc=$con->query($g);
        ?>
        <table id="datatable-buttons" class="table table-striped jambo_table" >
            <thead>
                <tr>
                    <th>Sr. no.</th>
                    <th>D.ID</th>
                    <th>Type</th>
                    <th>Amount </th>
                    <th>A Bal.</th>
                    <th>B Bal.</th>
                    <th>Note</th>
                    <th>Date / Time</th>
                </tr>
            </thead>
            <?php
                $a=0;
                while($d=$dc->fetch_assoc())
                { $a++; 
            ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo "DA".$d['d_id'];?></td>
                <td><?php echo $d['type'];?></td>
                <td><?php echo "₹".$d['amount'];?></td>
                <td><?php echo "₹".$d['a_bal'];?></td>
                <td><?php echo "₹".$d['b_bal'];?></td>
                <td><?php echo $d['note'];?></td>
                <td><?php echo $d['date'];?> / <?php echo $d['time'];?></td>
                
            </tr>
            <?php
            }?>
        </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
<?php
if(isset($_POST['btn'])){
    if($_POST['procedure']=="+"){
        //Find Withdrawal Amount ANd add Amount Sent by admin
        $qr="SELECT  `withdrawal_wallet` FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
        $qr1=$con->query($qr);
        $val=$qr1->fetch_assoc();
        $amount=$val['withdrawal_wallet'] + $_POST['amt'];
        
        // update Withdrawal Amount
        $qry1="UPDATE `distributor` SET `withdrawal_wallet`='$amount' WHERE `d_id`='$_POST[d_id]'";
        $qry2=$con->query($qry1);
        
        //Insert into main Wallet 
        $m_qry="INSERT INTO `main_wallet`(`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES ('NULL','$_POST[d_id]','+','$_POST[amt]','$val[withdrawal_wallet]','$amount','$_POST[note]','','','','$date','$time','','')";
        $qq=$con->query($m_qry);
        
        
        if($qr1==TRUE AND $qry2==TRUE AND $qq==TRUE){
            echo "<script>location.href='allusers.php?a=s';</script>";
        }else{
            echo "<script>location.href='allusers.php>a=f';</script>";
        }
        
        
    }elseif($_POST['procedure']=="-"){
         //Find Withdrawal Amount ANd add Amount Sent by admin
        $qr="SELECT  `withdrawal_wallet` FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
        $qr1=$con->query($qr);
        $val=$qr1->fetch_assoc();
        $amount=$val['withdrawal_wallet'] - $_POST['amt'];
        
        // update Withdrawal Amount
        $qry1="UPDATE `distributor` SET `withdrawal_wallet`='$amount' WHERE `d_id`='$_POST[d_id]'";
        $qry2=$con->query($qry1);
        
         //Insert into main Wallet 
        $m_qry="INSERT INTO `main_wallet`(`mw_id`, `d_id`, `type`, `amount`, `b_bal`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `level`, `of_d_id`) VALUES ('NULL','$_POST[d_id]','-','$_POST[amt]','$val[withdrawal_wallet]','$amount','$_POST[note]','','','','$date','$time','','')";
        $qq=$con->query($m_qry);
        
        if($qr1==TRUE AND $qry2==TRUE AND $qq==TRUE){
            echo "<script>location.href='allusers.php?r=s';</script>";
        }else{
            echo "<script>location.href='allusers.php?r=f';</script>";
        }
        
        
    }
}


?>            

            
          
<?php 
bottom_structure('Digitalasset.org.in');

?>