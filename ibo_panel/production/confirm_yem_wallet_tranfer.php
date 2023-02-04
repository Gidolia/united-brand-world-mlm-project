<?php 
include "config.php";
   
top_structure('Confirm yem Wallet transfer || Digital Asset', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Transfer Wallet Confirmation asked</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Check Detail Of transfering</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
<?php

    function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }
    
    $string=$_POST[to_d_id];
       
    $chars = '';
    $to_d_id = '';
    for ($index=0;$index<strlen($string);$index++) {
        if(isNumber($string[$index]))
        {
            $to_d_id .= $string[$index];
        }
        else {
            $chars .= $string[$index];}
    }
             $sqk="SELECT * FROM `distributor` WHERE `d_id`='$to_d_id'";
                $dcccc=$con->query($sqk);
                $sss=mysqli_fetch_assoc($dcccc);
             ?>
                      
            <table class="table table-striped table-bordered">
            <tr><th>From ID</th><td><?php echo $d_detail[name]." (DA".$_SESSION[d_id].")";?></td></tr>
            <tr><th>To ID</th><td><?php echo $sss[name]." (".$_POST[to_d_id].")";?></td></tr>
            <tr><th>Amount</th><td><?php echo $_POST[amount];?></td></tr>
            </table>
           <form action="process_transfer_wallet.php" method="post">
               <input type="hidden" name="to_d_id" value="<?php echo $_POST[to_d_id];?>">
               <input type="hidden" name="amount" value="<?php echo $_POST[amount];?>">
               <input type="submit" name="transfer_amount">
           </form>
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
