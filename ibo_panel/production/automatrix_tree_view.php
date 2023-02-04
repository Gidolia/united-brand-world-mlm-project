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
        $sql="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$amt_id'";
        $que=$con->query($sql);
        $fet=$que->fetch_assoc();
        //////////////level 1
        $temp=array();
        $tempw=array();
        $sql1="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$fet[amt_id]'";
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
         $sql11="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp[0]'";
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
         $sql12="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp[1]'";
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
        $sql11="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp1[0]'";
        $que11=$con->query($sql11);
        while($fet11=$que11->fetch_assoc())
        {
            $temp3[]=$fet11[amt_id];
            $tempw3[]=$fet11[d_id];
        }
        }
        
        if(isset($temp1[1]))
        {
         $sql12="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp1[1]'";
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
        $sql11="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp2[0]'";
        $que11=$con->query($sql11);
        while($fet11=$que11->fetch_assoc())
        {
            $temp3[]=$fet11[amt_id];
            $tempw3[]=$fet11[d_id];
        }
        }
        
        if(isset($temp2[1]))
        {
         $sql12="SELECT * FROM `auto_matrix_tree` WHERE `s_id`='$temp2[1]'";
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
            <a href="automatrix_tree_view.php?amt_id=<?php echo $fet[amt_id];?>">
            <?php 
            $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$fet[amt_id]'";
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
            <a href="automatrix_tree_view.php?amt_id=<?php echo $temp[0];?>">
                
            <?php 
            $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp[0]'";
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
            <a href="automatrix_tree_view.php?amt_id=<?php echo $temp[1];?>">
                
            <?php 
            $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp[1]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp1[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp1[0]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp1[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp1[1]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp2[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp2[0]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp2[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp2[1]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp3[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp3[0]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp3[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp3[1]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp3[2];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp3[2]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp3[3];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp3[3]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp3[4];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp3[4]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp3[5];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp3[5]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp3[6];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp3[6]'";
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
                    <a href="automatrix_tree_view.php?amt_id=<?php echo $temp3[7];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `auto_matrix_tree` WHERE `amt_id`='$temp3[7]'";
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
            </div>
            </div>
        
<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
