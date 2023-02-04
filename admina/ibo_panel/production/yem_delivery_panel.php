<?php 
include "config.php";
top_structure('Yem Wallet History', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>
          <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>YEM Coin Requests</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>YEM Coin Request</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <form method="post" action="process_yem_delivered.php">
                     <table id="datatable" class="table table-striped table-bordered">
                         <input type="hidden" name="pwh_id" value="<?php echo $_GET[pwh_id];?>">
                          <?php $n=0;
                                $e="SELECT * FROM `pw_history` WHERE `pwh_id`='$_GET[pwh_id]'";
                                $d=$con->query($e);
                                $R=$d->fetch_assoc();
                                    $n++;
                                $fv="SELECT * FROM `distributor` WHERE `d_id`='$R[a_d_id]'";
                                $dc=$con->query($fv);
                                $ssss=mysqli_fetch_assoc($dc);
                                ?>
                                <tr>
                                    <th>Request ID</th>
                                    <td><?php echo $R['pwh_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>D ID</th>
                                    <td><?php echo "DA".$R['a_d_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo $ssss['name'];?></td>
                                </tr>
                                <tr>
                                    <th>Request Date</th>
                                    <td><?php echo $R['date']." / ".$R['time']; ?></td>
                                </tr>
                                <tr>
                                    <th>Pin Type</th>
                                    <td><?php echo $R['pw_type']*4000; ?>/-</td>
                                    <input type="hidden" value="<?php echo $R['pw_type']*4000; ?>" name="amount" id="amount">
                                </tr>
                                <tr>
                                    <th>Yem Wallet ID</th>
                                    <td><?php echo $ssss['yem_wallet_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Bonus</th>
                                    <td>%<input type="number" id="yem_bonus" name="yem_bonus"></td>
                                </tr>
                                <tr>
                                    <th>At Price In $</th>
                                    <td>$<input type="number" id="price" name="price" onkeyup="showHint()"></td>
                                </tr>
                                <tr> 
                                    <th>Yem Will Transfer</th>
                                    <td>=<input type="text" id="yem" name="yem"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit" class="form_control"></td>
                                </tr>
                    </table>
                    </form> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<script>
        //showHint();
function showHint() {
    var amount = document.getElementById("amount").value;
    var bonus = document.getElementById("yem_bonus").value;
 	var price = document.getElementById("price").value;
 	var p_y_p= 1/price;
 	var ex_bo = amount*bonus/100;
 	var dp=price*80;
 	var tp_am= p_y_p*((parseInt(ex_bo) + parseInt(amount))/80);
 	document.getElementById("yem").value = tp_am;
}</script>
<?php 
bottom_structure('Digitalasset.org.in');
?>