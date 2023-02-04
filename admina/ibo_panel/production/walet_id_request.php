<?php 
include "config.php";
if($_GET[n]=="s"){
top_structure('Wallet Address Requests', 1, 'success', 'Success!', 'Approved');
}elseif($_GET[n]=="f"){
top_structure('Wallet Address Requests', 1, 'success', 'Success!', 'failed');
}elseif($_GET[m]=="s"){
top_structure('Wallet Address Requests', 1, 'success', 'Success!', 'Rejected');
}elseif($_GET[m]=="f"){
top_structure('Wallet Address Requests', 1, 'success', 'Success!', 'failed');
}else{
top_structure('Wallet Address Requests', 0, '', '', '');
}


if(isset($_POST[accept])){
    $r=$con->query("UPDATE `distributor` SET `yem_id_status`='c' WHERE `d_id`='$_POST[id]'");
    if($r===TRUE){
        echo "<script>location.href='walet_id_request.php?n=s';</script>";
    }else{
        echo "<script>location.href='walet_id_request.php?n=f';</script>";
    }
}

if(isset($_POST[reject])){
   $r=$con->query("UPDATE `distributor` SET `yem_id_status`='r' WHERE `d_id`='$_POST[id]'");
    if($r===TRUE){
        echo "<script>location.href='walet_id_request.php?m=s';</script>";
    }else{
        echo "<script>location.href='walet_id_request.php?m=f';</script>";
    }
}
sidebar();
header_bar();?>
<!--Page Content-->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Wallet Address Request List</h2>
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
                     <table id="datatable-buttons" class="table table-striped jambo_table" >
                      <thead>
                        <tr class="headings">
                          <th>#</th>
                          <th>D.Id</th>
                          <th>Name</th>
                          <th>Digital Wallet Address</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $qry="SELECT * FROM `distributor` WHERE `yem_id_status`='p' ";
                          $res=$con->query($qry);
                          $a=0;
                          while($val=$res->fetch_assoc()){
                          ?>
                         <tr>
                          <th><?php echo ++$a;?></th>
                          <th><?php echo "DA".$val[d_id];?></th>
                          <th><?php echo $val[name];?></th>
                          <th><?php echo $val[yem_wallet_id];?></th>
                          <th>
                          <?php 
                          if($val[yem_id_status]=="c"){ ?>
                          <button class="btn btn-success">Confirmed</button>
                          <?php }elseif($val[yem_id_status]=="r"){ ?>
                          <button class="btn btn-danger">Rejected</button>
                          <?php }elseif($val[yem_id_status]=="p"){?>
                          <button class="btn btn-warning">Pending</button>
                          <?php }?>
                          </th>
                          <th>
                          <form method="post">
                              <input type="hidden" name="id" value="<?php echo $val[d_id];?>">
                              <button class="btn btn-primary" name="accept">Accept</button>
                              <button class="btn btn-danger" name="reject">Reject</button>
                          </form>
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