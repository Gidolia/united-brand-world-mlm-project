<?php 
include "config.php";

top_structure('Pin Ledger View', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pin Ledger View</h3>
              </div>
              <div class="title_right">
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-6" >
               </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pin Ledger View </h2>
                  
              
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
            <br>
             <div class="card-box table-responsive">
        <table class="table table-striped table-bordered jambo_table table-responsive" id="datatable">
            <thead><tr class="headings">
                <th width="4%">#</th>
                <th>Request Id</th>
                <th>Request Date/Time</th>
                <th>Cleared Date/Time</th>
                <th>Amount</th>
                <th>Txn Id</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $a=0;
            $g="SELECT * FROM `pin requests` WHERE `d_id`='$_SESSION[d_id]';";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; 
            if($d[amount]>0){
            ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo "DA".$d[d_id];?></td>
                <td><?php echo $d[r_date]." / ".$d[r_time];?></td>
                <td><?php echo $d[c_date]." / ".$d[c_time];?></td>
                <td>
                <font style="color:green;"><center><?php echo "₹".$d[amount];?></center></font>
                </td>
                
                <td><?php echo $d[txn_id];?></td>
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
