<?php 
include "config.php";
#top_structure('Wallet Address Change', 0, '', '', '');
if(isset($_POST['btn_wallet'])){
        $res=$con->query("UPDATE `distributor` SET `yem_wallet_id`='$_POST[wallet_id]',`yem_id_status`='' WHERE `d_id`='$_SESSION[d_id]'");
        if($res===TRUE){
            echo "<script>location.href='change_wallet_id.php?n=s';</script>";
        }else{
            echo "<script>location.href='change_wallet_id.php?n=f';</script>";
        }
    }
    
if(isset($_POST[request])){
     $res=$con->query("UPDATE `distributor` SET `yem_id_status`='p' WHERE `d_id`='$_SESSION[d_id]'");
        if($res===TRUE){
            echo "<script>location.href='change_wallet_id.php?r=s';</script>";
        }else{
            echo "<script>location.href='change_wallet_id.phpr=f';</script>";
        }
}
if($_GET[n]=='s'  ){
    top_structure('Digital Wallet Address ', 1, 'success', 'Success!', 'Wallet Id Added Successfully');
}elseif($_GET[n]=='f' ){
    top_structure('Digital Wallet Address', 1, 'error', 'Failed!', 'Plz Try Again! Query Failed');
}elseif($_GET[r]=='s'){
    top_structure('Digital Wallet Address ', 1, 'success', 'Success!', 'Requested Successfully');
}else{
    top_structure('Digital Wallet Address ', 0, '', '', '');
}

sidebar();
header_bar();?>
<!--Content-->
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Digital Wallet Address</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <?php  if($d_detail[yem_wallet_id]==''){?>
                      <div class="form-group">
                        <label class="control-label col-md-6 col-sm-3 col-xs-3 " > <h2>Digital Wallet Address</h2></label>
                         <div class="col-md-6 col-sm-12 col-xs-12">
                             <form method="post" class="">
                              <input type="number"  onKeyPress="if(this.value.length==10) return false;" name="wallet_id" class="form-control col-lg-12" min="999999999" placeholder="Create 10 digit Address / PERNUM ">
                              <button class="btn btn-info" name="btn_wallet">Add</button>
                            </form>
                        </div>
                    </div>
                     <div class="clearfix"></div>
                 <?php }else{?>
                  <label class="control-label col-md-6 col-sm-3 col-xs-3 " > <h2>Digital Wallet Address</h2></label>
                 <button class="btn btn-success"><?php echo$d_detail[yem_wallet_id];?></button>
                  <hr>
                <?php }?>
                 <?php  if($d_detail[yem_wallet_id]!=''){?>    
                    <h2>Change Digital Wallet Address </h2> &nbsp;&nbsp;                 <?php if($d_detail[yem_id_status]=="p"){ ?>
                      <button class="btn btn-warning"> Pending</button>
                      <?php }elseif($d_detail[yem_id_status]=="r"){ ?>
                      <button class="btn btn-danger"> Rejected</button>
                      <?php } ?>
                     <form class="form-horizontal form-label-left" method="post">
                     <?php 
                     if($d_detail[yem_id_status]=="c"){
                     ?>
                      <div class="form-group">
                        <!--<label class="control-label col-md-3 col-sm-3 col-xs-3">Wallet Address</label>-->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number"  value="<?php echo $d_detail[yem_wallet_id];?>" onKeyPress="if(this.value.length==10 ) return false;" name="wallet_id" class="form-control col-lg-8" min="999999999" >
                          
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <button class="btn btn-info " name="btn_wallet" >Change</button>
                        </div>
                      </div>
                      <?php }else{?>
                       <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <button class="btn btn-info " name="request" >Request</button>
                        </div>
                      </div>
                      
                      <?php
                      }
                      ?>
                     
                     </form>
                    <?php }?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                   

                    </div>
                  </div>
                </div>
            </div>
            </div>

            
</div>
<?php 
bottom_structure('Digitalasset.org.in');

?>