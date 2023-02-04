<?php 
include "config.php";
top_structure('Reward Bonus', 0, 'error', 'Success', 'done');
sidebar();
header_bar();?>

    <!-- page content -->
       <div class="right_col" role="main">
            <h2 style="text-align: left;background-color:#6DE9FF;"><marquee><span class="" style="color: rgb(230, 21, 28);"><strong>WELCOME TO DIGITAL ASSETS</strong></span></marquee></h2>
          <br />
          
           <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Your Point</h2>
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

        <div class="table-responsive">
        <table class="table table-striped table-bordered jambo_table"  id="datatable">
            <thead >
                <tr>
                    <th hidden></th>
                    <th>Leg</th>
                    <th></th>
                    <th>Points</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $a=0;
                $t=array();
                $esp="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
                $dwpl=$con->query($esp);
                while($d=$dwpl->fetch_assoc()){
                    $espw="SELECT * FROM `distributor` WHERE `d_id`='$_SESSION[d_id]'";
                    $dwplw=$con->query($espw);
                    $s=$dwplw->fetch_assoc();
                    $point=0;
                    $point=find_leg_point($d[d_id]);
                $a++; ?>
            <tr>
                <td hidden><?php echo $a;?></td>
               <td style="font-size:20px;">Leg <?php echo $a;?></td>
               <td style="font-size:20px;"><?php echo $d[d_id];?>( <?php echo $s[name];?> )</td>
               <td style="font-size:20px;"><?php echo $point;?></td>
            </tr>
            <?php 
            $t[]=$point;
            $t_point=$t_point+$point;
            }?>
            </tbody>

        </table>
                      </div>
          <h3>Current Point Position</h3>            
        <div class="table-responsive">
        <table class="table table-striped table-bordered jambo_table"  id="datatable">
            <thead >
                <tr>
                    
                    <th>Total Leg Point</th>
                    <th>Big Leg Point</th>
                    <th>Current Point</th>
                </tr>
            </thead>
            <tbody>
                
            <tr>
                
               <td style="font-size:20px;"><?php echo $t_point;?></td>
               <td style="font-size:20px;"><?php echo max($t);?></td>
               <td style="font-size:20px;"><?php echo $t_point-max($t);?></td>
            </tr>
            
            </tbody>

        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
           <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rewards</h2>
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

        <div class="table-responsive">
        <table class="table table-striped table-bordered jambo_table"  id="datatable" style="font-size:15px;">
            <thead >
                <tr>
                    <th colspan="6"><center>LEADERSHIP REWARD BONUS (1 CRORE)</center></th>
                </tr>
                <tr>
                    <th>CLUB</th>
                    <th>POINT</th>
                    <th>REWARD</th>
                    <th>IMAGE</th>
                    <th>REWARD VALUE(INR)</th>
                    <th>TOTAL REWARD VALUE</th>
                </tr>
            </thead>
            <tbody>
            <tr>
               <td style="font-size:20px;">1</td>
               <td style="font-size:20px;">50</td>
               <td style="font-size:20px;">GIFT HAMPER</td>
               <td><center><img src="images/gift1.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹5,000/-</td>
               <td style="font-size:20px;">₹5,000/-</td>
            </tr>
            <tr>
               <td style="font-size:20px;">2</td>
               <td style="font-size:20px;">100</td>
               <td style="font-size:20px;">MOBILE</td>
               <td><center><img src="images/gift3.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹10,000/-</td>
               <td style="font-size:20px;">₹15,000/-</td>
            </tr><tr>
               <td style="font-size:20px;">3</td>
               <td style="font-size:20px;">200</td>
               <td style="font-size:20px;">T.V 32"</td>
               <td><center><img src="images/gift4.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹20,000/-</td>
               <td style="font-size:20px;">₹35,000/-</td>
            </tr><tr>
               <td style="font-size:20px;">4</td>
               <td style="font-size:20px;">500</td>
               <td style="font-size:20px;">LAPTOP</td>
               <td><center><img src="images/gift5.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹50,000/-</td>
               <td style="font-size:20px;">₹85,000/-</td>
            </tr><tr>
               <td style="font-size:20px;">5</td>
               <td style="font-size:20px;">1,000</td>
               <td style="font-size:20px;">TWO WHEELER</td>
               <td><center><img src="images/gift7.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹1,00,000/-</td>
               <td style="font-size:20px;">₹1,85,000/-</td>
            </tr><tr>
               <td style="font-size:20px;">6</td>
               <td style="font-size:20px;">2,500</td>
               <td style="font-size:20px;">GOLD SET</td>
               <td><center><img src="images/gift8.webp" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹2,50,000/-</td>
               <td style="font-size:20px;">₹4,35,000/-</td>
            </tr><tr>
               <td style="font-size:20px;">7</td>
               <td style="font-size:20px;">5,000</td>
               <td style="font-size:20px;">CAR</td>
               <td><center><img src="images/gift9.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹5,00,000/-</td>
               <td style="font-size:20px;">₹9,35,000/-</td>
            </tr><tr>
               <td style="font-size:20px;">8</td>
               <td style="font-size:20px;">10,000</td>
               <td style="font-size:20px;">SUV CAR</td>
               <td><center><img src="images/gift10.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹10,00,000/-</td>
               <td style="font-size:20px;">₹19,35,000/-</td>
            </tr><tr>
               <td style="font-size:20px;">9</td>
               <td style="font-size:20px;">25,000</td>
               <td style="font-size:20px;">FLAT</td>
               <td><center><img src="images/gift12.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹25,00,000/-</td>
               <td style="font-size:20px;">₹44,35,000/-</td>
            </tr>
            <tr>
               <td style="font-size:20px;">10</td>
               <td style="font-size:20px;">50,000</td>
               <td style="font-size:20px;">DUPLEX (VILLA)</td>
               <td><center><img src="images/gift11.jpg" style="height:100px;width:150px;"></center></td>
               <td style="font-size:20px;">₹50,00,000/-</td>
               <td style="font-size:20px;">₹94,35,000/-</td>
            </tr>
            <!--<tr>-->
            <!--   <td style="font-size:20px;">11</td>-->
            <!--   <td style="font-size:20px;">80,000</td>-->
            <!--   <td style="font-size:20px;">DUPLEX (VILLA)</td>-->
            <!--   <td><center><img src="images/gift11.jpg" style="height:100px;width:150px;"></center></td>-->
            <!--   <td style="font-size:20px;">₹50,00,000/-</td>-->
            <!--</tr>-->
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

<?php 
bottom_structure('Digital Asset All Right Reserved || Developed by <a href="http://eibo.in/" target="_blank">EIBO Software</a>');

?>
