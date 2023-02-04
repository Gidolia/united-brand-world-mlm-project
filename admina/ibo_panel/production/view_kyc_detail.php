<?php 
include "config.php";
top_structure('Kyc Detail', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>

  
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>KYC DETAIL</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>KYC</h2>
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
<?php
$qry="SELECT * FROM `distributor` WHERE `d_id`='$_GET[did]'";
$mm=$con->query($qry);
$R=$mm->fetch_assoc();

?>
                    <tr>
                          <td colspan="2"><center ><b>WALLET DETAILS</b></center></td>
                      </tr>
                        <tr class="headings">
                            <th>YEM Wallet Id</th>
                            <th>
                                <?php 
                                if($R['yem_wallet_id']!=""){
                                    echo $R['yem_wallet_id'];
                                }else{
                                    echo "N/A";
                                }
                                ?>
                            </th>
                        </tr>
<?php
$qry="SELECT * FROM `kyc_adhar` WHERE `d_id`='$_GET[did]'";
$v=$con->query($qry);
$val=$v->fetch_assoc();

?>
                    
                      <tr>
                          <td colspan="2"><center ><b>ADHAR DETAILS</b></center></td>
                      </tr>
                        <tr class="headings">
                            <th>Adhar No.</th>
                            <th>
                                <?php 
                                if($val['adhar_no']!=""){
                                    echo $val['adhar_no'];
                                }else{
                                    echo "N/A";
                                }
                                ?>
                            </th>
                        </tr>
                        <tr class="headings">
                            <th>Front Image</th>
                            <th>
                            <?php 
                                if($val['adhar_front_img']!=""){
                            ?>
                                  <a href="../../../ibo_panel/production/adhar_card_img/<?php echo $val['adhar_front_img']; ?>" target="_blank">Click here to view front adhar image</a>
                                  </th> 
                            <?php
                            }else{
                                echo "N/A";
                            }
                            ?>
                                
                                
                        </tr>
                        <tr class="headings">
                            <th>Back Image</th>
                            <th>
                            <?php 
                                if($val['adhar_back_img']!=""){
                            ?>
                                  <a href="../../../ibo_panel/production/adhar_card_img/<?php echo $val['adhar_back_img']; ?>" target="_blank">Click here to view Back adhar image</a>
                                  </th> 
                            <?php
                            }else{
                                echo "N/A";
                            }
                            ?>
                                
                                
                        </tr>
                        <tr class="headings">
                            <th>Status</th>
                            <th>
                                <?php
                                if($val['status']=="c"){
                                echo "<button class='btn btn-primary'>Cleared</button>";
                                }else{
                                echo "<button class='btn btn-danger'>Not Cleared</button>";
                                }
                                ?>
                            </th>
                        </tr>
<?php
$qry="SELECT * FROM `kyc_pan` WHERE `d_id`='$_GET[did]'";
$v1=$con->query($qry);
$val1=$v1->fetch_assoc();

?>                      
                      
                      <tr>
                          <td colspan="2"><center ><b>PAN DETAILS</b></center></td>
                      </tr>
                        <tr class="headings">
                            <th>PAN No.</th>
                            <th>
                                <?php 
                                if($val1['pan_no']!=""){
                                    echo $val1['pan_no'];
                                }else{
                                    echo "N/A";
                                }
                                ?>
                            </th>
                        </tr>
                        <tr class="headings">
                            <th>Image</th>
                            <th>
                            <?php 
                                if($val1['pan_no']!=""){
                            ?>
                                   <a href ="../../../ibo_panel/production/pan_card_img/<?php echo $val1['pan_img']; ?>" target="_blank">Click here to view pan card image</a></th> 
                            <?php
                            }else{
                                echo "N/A";
                            }
                            ?>
                        </tr>
                        <tr class="headings">
                            <th>Status</th>
                            <th>
                                <?php
                                if($val1['status']=="c"){
                                echo "<button class='btn btn-primary'>Cleared</button>";
                                }else{
                                echo "<button class='btn btn-danger'>Not Cleared</button>";
                                }
                                ?>
                            </th>
                        </tr>
<?php
$qry="SELECT * FROM `kyc_bank` WHERE `d_id`='$_GET[did]'";
$v2=$con->query($qry);
$val2=$v2->fetch_assoc();

?>                                        
                         <tr>
                          <td colspan="2"><center ><b>BANK DETAILS</b></center></td>
                      </tr>
                        <tr class="headings">
                            <th>Account No.</th>
                            <th><?php 
                                if($val2['bank_acc_no']!=""){
                                    echo $val2['bank_acc_no'];
                                }else{
                                    echo "N/A";
                                }
                                ?></th>
                        </tr>
                        <tr class="headings">
                            <th>IFSC Code</th>
                            <th><?php 
                                if($val2['ifsc_code']!=""){
                                    echo $val2['ifsc_code'];
                                }else{
                                    echo "N/A";
                                }
                                ?></th>
                        </tr>
                        <tr class="headings">
                            <th>Bank Name</th>
                            <th><?php 
                                if($val2['bank_name']!=""){
                                    echo $val2['bank_name'];
                                }else{
                                    echo "N/A";
                                }
                                ?></th>
                        </tr>
                        <tr class="headings">
                            <th>Image</th>
                            <th>
                            <?php 
                                if($val2['bank_img']!=""){
                            ?>
                                   <a href ="../../../ibo_panel/production/bank_img/<?php echo $val2['bank_img']; ?>" target="_blank">Click here to view Passbook image</a>
                                   </th> 
                            <?php
                            }else{
                                echo "N/A";
                            }
                            ?>
                        </tr>
                        <tr class="headings">
                            <th>Status</th>
                            <th><?php
                                if($val2['status']=="c"){
                                echo "<button class='btn btn-primary'>Cleared</button>";
                                }else{
                                echo "<button class='btn btn-danger'>Not Cleared</button>";
                                }
                                ?></th>
                        </tr>
                      
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