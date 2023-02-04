<?php 
include "config.php";

top_structure('Yem Wallet View', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>YEM Wallet View</h3>
              </div>
              <div class="title_right">

              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Your YEM Wallet View </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
            <div class="card-box table-responsive">
        <table class="table table-striped table-bordered jambo_table " id="datatable">
            <thead>
                <tr class="headings">
                    <th width="5%">#</th>
                    <th>Date/Time</th>
                    <th>Reference</th>
                    <th>Debit </th>
                     <th>Credit </th>
                    <th>YEM Balance</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            $a=0;
            $g="SELECT * FROM `yem_wallet` WHERE `d_id`='$_SESSION[d_id]';";
             $h="SELECT * FROM `stats` ";
             $r=$con->query($h);
             $res=$r->fetch_assoc();
             
 function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }
    $string=$res[current_price];
       
    $chars = '';
    $d_id = '';
    for ($index=0;$index<strlen($string);$index++) {
        if(isNumber($string[$index]))
        {
            $s_id .= $string[$index];
        }
        else {
            $chars .= $string[$index];}
    }                
             
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; 
            if($d[amount]>0){
            ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date]." / ".$d[time];?></td>
                <th><?php echo $d[note];?></th>
                
                
                <td><?php if($d[type]=="-"){?>
                <font style="color:red;"><center><?php 
                $val=$d[amount];
                
                echo "-".sprintf("%.6f",$val);?></center></font>
                <?php }else{ echo "<center>-</center>";}?>
                </td>
                <td><?php if($d[type]=="+"){?>
                <font style="color:green;"><center><?php
                
                $val=$d[amount];
                
                echo "+".sprintf("%.6f",$val);?></center></font>
                <?php }else{ echo "<center>-</center>";}?>
                </td>
                <td><center><?php 
                $val=$d[a_bal];
                echo sprintf("%.6f",$val);?></center></td>
                
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
