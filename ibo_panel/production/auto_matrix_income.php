<?php 
include "config.php";

top_structure('Auto Matrix Income', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
     <div class="right_col" role="main">
          <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Auto Matrix Income</h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                      
            <br>
            <div class="card-box table-responsive">
        <table class="table table-striped table-bordered jambo_table" id="datatable">
            <thead><tr class="headings">
            <th width="10%">Sr. no.</th>
            <th>Distributor Id</th>
            <th>Auto Matrix Id</th>
            <th>Amount</th>
            <th>Date / Time</th>
            
            <tbody>
            <?php
            $a=0;
            $g="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' ORDER BY `ami_id` DESC";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; 
            if($d[amount]>0){
            ?>
            <tr>
                <td><?php echo $a;?></td>
                <th><?php echo "DA".$d[d_id];?></th>
                <th><?php echo $d[amt_id];?></th>
                <th><?php echo "₹".$d[amount];?></th>
                <td><?php echo $d[date]." / ".$d[time];?></td>
                
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
