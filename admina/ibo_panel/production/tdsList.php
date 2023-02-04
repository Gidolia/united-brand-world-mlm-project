<?php 
include "config.php";
top_structure('TDS Charges Report', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>

  
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>TDS Charges Report</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>TDS</h2>
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
                            <th>ID</th>
                            <th>Pan Number</th>
                          <th>Name</th>
                          <th>Total Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                                $au=1;
                                $e="SELECT * FROM `distributor`";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                if($R[tds_wallet]!="0" AND $R[tds_wallet]!=""){
                                    $ddd="SELECT * FROM `kyc_pan` WHERE `d_id`='$R[d_id]'";
                                    $hhh=$con->query($ddd);
                                    while($vv=$hhh->fetch_assoc()){
                                ?>
                                    <tr>
                                <td><?php echo "DA".$R['d_id']; ?></td>        
                                <td>
                                   <?php echo $vv['pan_no']; ?>
                                </td>
                                <td>
                                   <?php echo $R['name']; ?>
                                </td>
                                <td>
                                  <?php echo "₹".$R["tds_wallet"]; ?>
                                </td>
                                 
                                </tr>
                                <?php $au++;     
                                } } }?>
                      </tbody>
                    </table>
                    </div> 
                  </div>
        <!--        </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        </div>
<?php 
bottom_structure('Digitalasset.org.in');

?>