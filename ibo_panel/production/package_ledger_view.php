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
              <div class="animated flipInY col-lg-6 col-md-4 col-sm-6 col-xs-6" >
                <div class="tile-stats" style="background:#6DE9FF;">
                  
                  <div class="count" style="color:white;padding:0px 10px;">
                  <?php
                  if($_GET[pw_type]=="1"){
                  echo "<center>".$d_detail[pw_1]."</center>";    
                  }elseif($_GET[pw_type]=="2"){
                  echo "<center>".$d_detail[pw_2]."</center>";    
                  }elseif($_GET[pw_type]=="3"){
                  echo "<center>".$d_detail[pw_3]."</center>";    
                  }elseif($_GET[pw_type]=="4"){
                  echo "<center>".$d_detail[pw_4]."</center>";    
                  }elseif($_GET[pw_type]=="5"){
                  echo "<center>".$d_detail[pw_5]."</center>";    
                  }elseif($_GET[pw_type]=="6"){
                  echo "<center>".$d_detail[pw_6]."</center>";    
                  }elseif($_GET[pw_type]=="7"){
                  echo "<center>".$d_detail[pw_7]."</center>";    
                  }elseif($_GET[pw_type]=="8"){
                  echo "<center>".$d_detail[pw_8]."</center>";    
                  }
                  
                  ?> </div>
                  <h3 style="color:white;text-align:center;">Pin wallet <?php echo $_GET[pw_type];?></h3>
                </div></div>
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
        <table class="table table-striped table-bordered jambo_table " id="datatable">
            <thead>
                <tr class="headings">
                    <th width="10%">S.No.</th>
                    <th>D Id</th>
                    <th>Activating D.Id</th>
                    <th>Date / Time</th>
                    <th>Reference</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <!--<th>Balanace Pin</th>-->
                    <th>Available Pin</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            $a=0;
            $g="SELECT * FROM `pw_history` WHERE `d_id`='$_SESSION[d_id]' AND `pw_type`='$_GET[pw_type]' ORDER BY `pw_history`.`pwh_id` DESC;";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; 
            
            ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo "DA".$d[d_id];?></td>
                <th><?php 
                if($d[a_d_id]!=""){
                echo "DA".$d[a_d_id];
                }else{
                 echo "-";
                }
                ?>
                </th>
                <th><?php echo $d[date]." / ".$d[time];?></th>
                <td><?php echo $d[note];?></td>
                <td><?php if($d[type]=="-"){?>
                <font style="color:red;"><center><?php echo "-".$d[pin];?></center></font>
                <?php }else{ echo "<center>-</center>";}?>
                </td>
                <td><?php if($d[type]=="+"){?>
                <font style="color:green;"><center><?php echo "+".$d[pin];?></center></font>
                <?php }else{ echo "<center>-</center>";}?>
                
                 <!--<th><center><?php echo $d[b_pin];?></center></th>-->
                <th><center><?php echo $d[a_pin];?></center></th>
                
            </tr>
            <?php 
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
  copyText.setSe
  lectionRange(0, 99999); /* For mobile devices */

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
