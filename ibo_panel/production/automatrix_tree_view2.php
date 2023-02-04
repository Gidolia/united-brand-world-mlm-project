<?php 
include "config.php";
top_structure('Tree View || Digital Asset', 0, 'error', 'Success', 'done');
sidebar();
header_bar();

?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Activate ID</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Downline Tree View</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <ul>
                          <li><i class="fa fa-user fa-2x blue"></i> ID</li>
                          
                          <li><i class="fa fa-user fa-2x"></i> Blank ID</li>
                      </ul>
          <div class="table-responsive">            
    <table class="table table-bordered">
        <?php 
        $amt_id=$_GET[amt_id];
        $sql="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$amt_id'";
        $que=$con->query($sql);
        $fet=$que->fetch_assoc();
        //////////////level 1
        $temp=array();
        $tempw=array();
        $sql1="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$fet[amt_id]'";
        $que1=$con->query($sql1);
        while($fet1=$que1->fetch_assoc())
        {
            $temp[]=$fet1[amt_id];
            $tempw[]=$fet1[d_id];
        }
        //////////////// level 2
        $temp1=array();
        $tempw1=array();
        if(isset($temp[0]))
        {
         $sql11="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$temp[0]'";
        $que11=$con->query($sql11);
        while($fet11=$que11->fetch_assoc())
        {
            $temp1[]=$fet11[amt_id];
            $tempw1[]=$fet11[d_id];
        }
        }
        ////////////////
        $temp2=array();
        $tempw2=array();
        if(isset($temp[1]))
        {
         $sql12="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$temp[1]'";
        $que12=$con->query($sql12);
        while($fet12=$que12->fetch_assoc())
        {
            $temp2[]=$fet12[amt_id];
            $tempw2[]=$fet12[d_id];
        }
        }
        //////////////// level 3
        $temp3=array();
        $tempw3=array();
        ///////////////for1
        if(isset($temp1[0]))
        {
        $sql11="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$temp1[0]'";
        $que11=$con->query($sql11);
        while($fet11=$que11->fetch_assoc())
        {
            $temp3[]=$fet11[amt_id];
            $tempw3[]=$fet11[d_id];
        }
        }
        
        if(isset($temp1[1]))
        {
         $sql12="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$temp1[1]'";
        $que12=$con->query($sql12);
        while($fet12=$que12->fetch_assoc())
        {
            $temp3[]=$fet12[amt_id];
            $tempw3[]=$fet12[d_id];
        }
        }
        ///////////////for2
        if(isset($temp2[0]))
        {
        $sql11="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$temp2[0]'";
        $que11=$con->query($sql11);
        while($fet11=$que11->fetch_assoc())
        {
            $temp3[]=$fet11[amt_id];
            $tempw3[]=$fet11[d_id];
        }
        }
        
        if(isset($temp2[1]))
        {
         $sql12="SELECT * FROM `auto_matrix_2_tree` WHERE `s_id`='$temp2[1]'";
        $que12=$con->query($sql12);
        while($fet12=$que12->fetch_assoc())
        {
            $temp3[]=$fet12[amt_id];
            $tempw3[]=$fet12[d_id];
        }
        }
        
        
        ?>
        <tr><td colspan="8" align="center">
            <?php if($que->num_rows>0)
            {?>
            <a href="automatrix_tree_view2.php?amt_id=<?php echo $fet[amt_id];?>">
            <?php 
            $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$fet[amt_id]'";
            $sq=$con->query($clcm);
            $xnm=$sq->fetch_assoc();
         ?>
            
            <i class="fa fa-user fa-4x blue"></i>
         <div class="media-body">
             <?php
             $der="SELECT * FROM `distributor` WHERE `d_id`='$fet[d_id]'";
             $fdc=$con->query($der);
             $cnm=$fdc->fetch_assoc();
            ?>
          <a class="title" href="#"><?php echo $cnm[name]." (DA".$fet[d_id].")";?></a>
          
         </div></a>
         <?php }else{ ?>
         <i class="fa fa-user fa-4x"></i>
         <?php }?>
         </td></tr>
        
        <tr>
            
            <td colspan="4" align="center">
                <?php if(isset($temp[0]))
            {?>
            <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp[0];?>">
                
            <?php 
            $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp[0]'";
            $sq=$con->query($clcm);
            $xnm=$sq->fetch_assoc();
          ?>
            
            <i class="fa fa-user fa-4x blue"></i>
         <div class="media-body">
             <?php
             $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw[0]'";
             $fdc=$con->query($der);
             $cnm=$fdc->fetch_assoc();
            ?>
          <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw[0].")";?></a>
          
         </div></a>
         <?php }else{ ?>
         <i class="fa fa-user fa-4x"></i>
         <?php }?>
            </td>
            
            
            <td colspan="4" align="center"><?php if(isset($temp[1]))
            {?>
            <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp[1];?>">
                
            <?php 
            $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp[1]'";
            $sq=$con->query($clcm);
            $xnm=$sq->fetch_assoc();
           ?>
            
            <i class="fa fa-user fa-4x blue"></i>
         <div class="media-body">
             <?php
             $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw[1]'";
             $fdc=$con->query($der);
             $cnm=$fdc->fetch_assoc();
            ?>
          <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw[1].")";?></a>
          
         </div></a>
         <?php }else{ ?>
         <i class="fa fa-user fa-4x"></i>
         <?php }?></td>
         
         
        </tr>
        
        <tr>
            <td colspan="2" align="center">
                    <?php if(isset($temp1[0]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp1[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp1[0]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   ?>
                    
                    <i class="fa fa-user fa-4x blue"></i>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw1[0]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw1[0].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td colspan="2" align="center">
                    <?php if(isset($temp1[1]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp1[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp1[1]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw1[1]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw1[1].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td colspan="2" align="center">
                 <?php if(isset($temp2[0]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp2[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp2[0]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw2[0]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw2[0].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td colspan="2" align="center">
                     <?php if(isset($temp2[1]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp2[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp2[1]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw2[1]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw2[1].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            
        </tr>
        <tr>
            <td align="center">
                    <?php if(isset($temp3[0]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp3[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp3[0]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   ?>
                    
                    <i class="fa fa-user fa-4x blue"></i>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[0]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw3[0].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                    <?php if(isset($temp3[1]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp3[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp3[1]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[1]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw3[1].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                 <?php if(isset($temp3[2]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp3[2];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp3[2]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[2]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw3[2].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp3[3]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp3[3];?>">
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp3[3]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[3]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw3[3].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp3[4]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp3[4];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp3[4]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[4]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw3[4].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp3[5]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp3[5];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp3[5]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[5]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw3[5].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp3[6]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp3[6];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp3[6]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[6]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw3[6].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp3[7]))
                    {?>
                    <a href="automatrix_tree_view2.php?amt_id=<?php echo $temp3[7];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$temp3[7]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[7]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DA".$tempw3[7].")";?></a>
                  
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            
        </tr>
    </table></div>
                  </div>
                </div>
              </div>
            </div>
            
            
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Automatrix List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<?php
        $g="SELECT * FROM `auto_matrix_2_tree` WHERE `amt_id`='$_GET[amt_id]'";
        $dc=$con->query($g);
?>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead><tr><th>Level</th><th>Progress Meter</th></tr></thead>
<?php
            $a=0;
            while($d=$dc->fetch_assoc())
            { $a++; 
            $level_t=$d[i_level_distribute]-1;
?>
            
            <tr>
                <td>1</td>
                
               <td>
                   <?php
                   if($d[i_level_distribute]>=1){?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <?php  
                   }elseif($d[i_level_distribute]==0){
                   
                        $lp=auto_l_1($d[amt_id]);
                        $perc=($lp/2)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 2
                    <?php   
                   }
                   ?>
               </td>
            </tr>
            <tr>
                <td>2</td>
                
               <td>
                   <?php
                   if($d[i_level_distribute]>=2){?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <?php  
                   }elseif($d[i_level_distribute]==1){
                   
                        $lp=auto_l_2($d[amt_id]);
                        $perc=($lp/4)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 4
                    <?php   
                   }
                   ?>
               </td>
            </tr>
            <tr>
                <td>3</td>
                
               <td>
                   <?php
                   if($d[i_level_distribute]>=3){?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <?php  
                   }elseif($d[i_level_distribute]==2){
                   
                        $lp=auto_l_3($d[amt_id]);
                        $perc=($lp/8)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 8
                    <?php   
                   }
                   ?>
               </td>
            </tr>
            <tr>
                <td>4</td>
                
               <td>
                   <?php
                   if($d[i_level_distribute]>=4){?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <?php  
                   }elseif($d[i_level_distribute]==3){
                   
                        $lp=auto_l_4($d[amt_id]);
                        $perc=($lp/16)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 16
                    <?php   
                   }
                   ?>
               </td>
            </tr>
            <tr>
                <td>5</td>
                
               <td>
                   <?php
                   if($d[i_level_distribute]>=5){?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <?php  
                   }elseif($d[i_level_distribute]==4){
                   
                        $lp=auto_l_5($d[amt_id]);
                        $perc=($lp/32)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 32
                    <?php   
                   }
                   ?>
               </td>
            </tr>
            <tr>
                <td>6</td>
                
               <td>
                   <?php
                   if($d[i_level_distribute]>=6){?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <?php  
                   }elseif($d[i_level_distribute]==5){
                   
                        $lp=auto_l_6($d[amt_id]);
                        $perc=($lp/64)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 64
                    
                    <?php   
                   }
                   ?>
               </td>
            </tr>
            <tr>
                <td>7</td>
                
               <td>
                   <?php
                   if($d[i_level_distribute]>=7){?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <?php  
                   }elseif($d[i_level_distribute]==6){
                   
                        $lp=auto_l_7($d[amt_id]);
                        $perc=($lp/128)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 128
                    
                    <?php   
                   }
                   ?>
               </td>
            </tr>
            <tr>
                <td>8</td>
                
               <td>
                   <?php
                   if($d[i_level_distribute]>=8){?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <?php  
                   }elseif($d[i_level_distribute]==7){
                   
                        $lp=auto_l_8($d[amt_id]);
                        $perc=($lp/256)*100;
                        ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $perc;?>%" aria-valuenow="<?php echo $perc;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    ID Count = <?php echo $lp;?> / 256
                    
                    <?php   
                   }
                   ?>
               </td>
            </tr>
<?php
}
?>
        </table></div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
        
<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
