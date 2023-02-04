<?php 
include "config.php";
$res=$con->query("SELECT * FROM `stats` WHERE `s_id`=1");
$value=$res->fetch_assoc();

if($_GET[n]=='s'){
    top_structure('Statistics update', 1, 'success', 'Success!', 'Statistics updated Successfully');
}elseif($_GET[n]=='f'){
    top_structure('Statistics update', 1, 'warning', 'FAil !', 'Statistics updated Fail');
}
else{
    top_structure('Statistics update', 0, '', '', '');
}
sidebar();
header_bar();?>
<!--Content-->
   <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Statistics</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="offset-md-2 col-md-8 offset-md-2 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Statistics update</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                    <form class="form-horizontal form-label-left" method="post">
                      
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Current Price</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" name="current_price" value="<?php echo $value[current_price];?>">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Volume</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" name="volume" value="<?php echo $value[volume];?>">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Yem Holder</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" name="yem_hold" value="<?php echo $value[yem_hold];?>">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Projects</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" name="projects" value="<?php echo $value[projects];?>">
                          
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Update Statistics" name="submit_pass">
                        </div>
                      </div>
                     </form>

                    </div>
                  </div>
                </div>
            </div>
            

            <?php
            if(isset($_POST[submit_pass]))
            {
                $update_query="UPDATE `stats` SET `current_price` = '$_POST[current_price]',`volume`='$_POST[volume]',`yem_hold`='$_POST[yem_hold]',`projects`='$_POST[projects]' WHERE `s_id` = 1;";
				if($con->query($update_query) === TRUE)
				{
				    echo "<script>	location.href='update_statistics.php?n=s';</script>";
				}else{
				    echo "<script>	location.href='update_statistics.php?n=f';</script>";
				}
						 	
            }
                
                
                
                
            
            ?>
            
          
<?php 
bottom_structure('Digitalasset.org.in');

?>