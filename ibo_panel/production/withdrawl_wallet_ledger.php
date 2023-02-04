<?php 
include "config.php";

top_structure('INR Wallet Ledger', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>INR Wallet View</h3>
              </div>
              <div class="title_right">
              <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-6" >
                   <div class="tile-stats" style="background:#6DE9FF;">
                  
                  <div class="count" style="color:white;padding:0px 20px;"><i class="fa fa-inr" style="color:white;"></i> 
                  <?php
                  if($d_detail[withdrawal_wallet] !=""){
                  echo $d_detail[withdrawal_wallet];
                  }else{
                  echo "0";    
                  }
                  
                  ?> </div>
                  <h3 style="color:white;">INR Wallet Balance</h3>
                </div></div>
               </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Your INR Wallet Ledger View </h2>
                  
              
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
            <br>
             <div class="card-box table-responsive">
        <table class="table table-striped table-bordered jambo_table table-responsive" id="datatable">
            <thead><tr class="headings">
                    <th width="5%">txn id</th>
                    <th>D id</th>
                    <th>Date / Time</th>
                    <th>Reference</th>
                    <th>Debit</th>
                    <th>Credit</th>
                     <th>Available Balance</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $a=0;
            $g="SELECT * FROM `main_wallet` WHERE `d_id`='$_SESSION[d_id]' ORDER BY `mw_id` DESC;";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; 
            if($d[amount]>0){
            ?>
          <tr>
               <td><?php echo $a;?></td>
                <td><?php echo "DA".$d[d_id];?></td>
               <td><?php echo $d[date]." / ".$d[time];?></td>
               <td><?php echo $d[note]?></td>
                <td>
                <?php 
                if($d[type]=="-"){
                echo "<b style='color:red;'>-₹".$d[amount]."</b>";
                }
                ?>
                </td>
                <td>
                <?php 
                if($d[type]=="+"){
                echo "<b style='color:green;'>+₹".$d[amount]."</b>";
                }
                ?>
                </td>
                <td>
                <?php echo "₹".$d[a_bal];?>
                </td>
            </tr>
            <?php }
            }?>
            </tbody>
        </table>
        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- page content -->
         

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
                  </div>
                </div>
              </div>
            </div>
     
        </div>
    </div>
    <!-- page content -->

<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
