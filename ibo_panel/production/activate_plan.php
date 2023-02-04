<?php 
include "config.php";
 if($_GET[n]=='s'){
    top_structure('Packages || Digital Assets', 1, 'success', 'Success!', 'Id Activated Successfully');
}elseif($_GET[n]=='f'){
    top_structure('Packages || Digital Assets', 1, 'warning', 'Not Matched', 'Id Activate Fail');
}
else{
   top_structure('Packages || Digital Assets', 0, 'error', 'Success', 'done');
}
sidebar();
header_bar();?>

    <!-- page content -->
    <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Packages</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel" style="height:auto;">
                    
                  <div class="x_title">
                    <!--<h2>Pricing Tables Design</h2>-->
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6  ">
                          <div class="pricing">
                            <div class="title">
                              <h2>Package 1</h2>
                              <h1>₹4,000/- or <br>50 USD</h1>
                              <!--<h1></h1>-->
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                  
                                    <li><i class="fa fa-check text-success"></i>  <strong>YEM Digital currency value ₹4,000</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>10% YEM  Bonus</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>1 Point (Reward)</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>FREE AUTO POOL Id-1</strong></li>
                                   
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a class="btn btn-success btn-block" role="button" style="color:white;">Pin Balance=<span><?php echo $d_detail[pw_1]+0;?></span></a>   
                                <a href="activate_id.php?pw_type=1&pt=0.5" class="btn btn-success btn-block" role="button">Activate <span>Id</span></a>
                                <a href="request_pin.php?pw_type=1" class="btn btn-success btn-block" role="button">Request <span> Pin</span></a>
                                <!--<p>-->
                                   <a href="package_ledger_view.php?pw_type=1" class="btn btn-primary btn-block" role="button">Ledger View</a>
                                <!--</p>-->
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6  ">
                          <div class="pricing ui-ribbon-container">
                            <div class="ui-ribbon-wrapper">
                              <!--<div class="ui-ribbon">-->
                              <!--  30% Off-->
                              <!--</div>-->
                            </div>
                            <div class="title">
                              <h2>Package 2</h2>
                              <h1>₹8,000/- or<br>100 USD</h1>
                              
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i>  <strong>YEM Digital currency value ₹8,000</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong> 10% YEM Bonus</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong>2 Point (Reward)</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> FREE AUTO POOL ID-2</strong></li>
                                   
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                   <a class="btn btn-success btn-block" role="button" style="color:white;">Pin Balance=<span><?php echo $d_detail[pw_2]+0;?></span></a>
                                 <a href="activate_id.php?pw_type=2&pt=1" class="btn btn-success btn-block" role="button">Activate <span> Id</span></a>
                                <!--<p>-->
                                <a href="request_pin.php?pw_type=2" class="btn btn-success btn-block" role="button">Request <span> Pin</span></a>
                                  <a href="package_ledger_view.php?pw_type=2" class="btn btn-primary btn-block" role="button">Ledger View</a>
                                <!--</p>-->
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6  ">
                          <div class="pricing">
                            <div class="title">
                              <h2>Package 3</h2>
                              <h1>₹16,000/- or<br>200 USD</h1>
                              
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i>  <strong>YEM Digital currency value  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹16,000</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong> 15% YEM Bonus</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> 4 Point (Reward)</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> FREE AUTO POOL ID-4</strong></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                   <a class="btn btn-success btn-block" role="button" style="color:white;">Pin Balance=<span><?php echo $d_detail[pw_3]+0;?></span></a>
                               <a href="activate_id.php?pw_type=3&pt=2" class="btn btn-success btn-block" role="button">Activate <span> Id</span></a>
                                <!--<p>-->
                                <a href="request_pin.php?pw_type=3" class="btn btn-success btn-block" role="button">Request <span> Pin</span></a>
                                   <a href="package_ledger_view.php?pw_type=3" class="btn btn-primary btn-block" role="button">Ledger View</a>
                                <!--</p>-->
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6  " >
                          <div class="pricing">
                            <div class="title">
                              <h2>Package 4</h2>
                              <h1>₹32,000/- or<br>400 USD</h1>
                              
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i>  <strong>YEM Digital currency value  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹32,000</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong> 15% YEM Bonus</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> 8 Point (Reward)</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> FREE AUTO POOL ID-8</strong></li>
                                    
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                   <a class="btn btn-success btn-block" role="button" style="color:white;">Pin Balance=<span><?php echo $d_detail[pw_4]+0;?></span></a>
                               <a href="activate_id.php?pw_type=4&pt=4" class="btn btn-success btn-block" role="button">Activate <span> Id</span></a>
                                <!--<p>-->
                                <a href="request_pin.php?pw_type=4" class="btn btn-success btn-block" role="button">Request <span> Pin</span></a>
                              <a href="package_ledger_view.php?pw_type=4" class="btn btn-primary btn-block" role="button">Ledger View</a>
                                <!--</p>-->
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->
                        
                        
                        
                     
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    
                    
                  </div>
                  
                  

                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6  ">
                          <div class="pricing">
                            <div class="title">
                              <h2>Package 5</h2>
                              <h1>₹64,000/- or<br>800 USD</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                  <li><i class="fa fa-check text-success"></i>  <strong>YEM Digital currency value  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹64,000</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong> 20% YEM Bonus</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong>16 Point (Reward)</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> FREE AUTO POOL Id-16</strong></li>
                                   
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                   <a class="btn btn-success btn-block" role="button" style="color:white;">Pin Balance=<span><?php echo $d_detail[pw_5]+0;?></span></a>
                                <a href="activate_id.php?pw_type=5&pt=8" class="btn btn-success btn-block" role="button">Activate <span> Id</span></a>
                                <!--<p>-->
                                <a href="request_pin.php?pw_type=5" class="btn btn-success btn-block" role="button">Request <span> Pin</span></a>
                                  <a href="package_ledger_view.php?pw_type=5" class="btn btn-primary btn-block" role="button">Ledger View</a>
                                <!--</p>-->
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6  ">
                          <div class="pricing ui-ribbon-container">
                            <!--<div class="ui-ribbon-wrapper">-->
                            <!--  <div class="ui-ribbon">-->
                            <!--    30% Off-->
                            <!--  </div>-->
                            <!--</div>-->
                            <div class="title">
                              <h2>Package 6</h2>
                              <h1>₹1,28,000/- or<br>1600 USD</h1>
                              
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                    <ul class="list-unstyled text-left">
                                  <li><i class="fa fa-check text-success"></i>  <strong>YEM Digital currency value &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ₹1,28,000</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong> 20% YEM Bonus</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> 32 Point (Reward)</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> FREE AUTO POOL Id-32</strong></li>
                                   
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a class="btn btn-success btn-block" role="button" style="color:white;">Pin Balance=<span><?php echo $d_detail[pw_6]+0;?></span></a>
                               <a href="activate_id.php?pw_type=6&pt=16" class="btn btn-success btn-block" role="button">Activate <span> Id</span></a>
                                <a href="request_pin.php?pw_type=6" class="btn btn-success btn-block" role="button">Request <span> Pin</span></a>
                                   <a href="package_ledger_view.php?pw_type=6" class="btn btn-primary btn-block" role="button">Ledger View</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6  ">
                          <div class="pricing">
                            <div class="title">
                              <h2>Package 7</h2>
                              <h1>₹2,56,000/- or <br>3200 USD</h1>
                              
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                   <li><i class="fa fa-check text-success"></i>  <strong>YEM Digital currency value &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹2,56,000</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>25% YEM Bonus</strong> </li>
                                    <li><i class="fa fa-check text-success"></i>  <strong>64 Point (Reward)</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong> FREE AUTO POOL Id-64</strong></li>
                                   
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                   <a class="btn btn-success btn-block" role="button" style="color:white;">Pin Balance=<span><?php echo $d_detail[pw_7]+0;?></span></a>
                               <a href="activate_id.php?pw_type=7&pt=32" class="btn btn-success btn-block" role="button">Activate <span> Id</span></a>
                                <!--<p>-->
                                <a href="request_pin.php?pw_type=7" class="btn btn-success btn-block" role="button">Request <span> Pin</span></a>
                                 <a href="package_ledger_view.php?pw_type=7" class="btn btn-primary btn-block" role="button">Ledger View</a>
                                <!--</p>-->
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6  ">
                          <div class="pricing">
                            <div class="title">
                              <h2>Package 8</h2>
                              <h1>₹5,12,000/- or<br> 6400 USD</h1>
                              
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i>  <strong>YEM Digital currency value&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹5,12,000</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>25% YEM Bonus</strong> </li>
                                    <li><i class="fa fa-check text-success"></i>  <strong>128 Point (Reward)</strong></li>
                                    <li><i class="fa fa-check text-success"></i>  <strong>FREE AUTO POOL Id-128</strong></li>
                                    
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                   <a class="btn btn-success btn-block" role="button" style="color:white;">Pin Balance=<span><?php echo $d_detail[pw_8]+0;?></span></a>
                               <a href="activate_id.php?pw_type=8&pt=64" class="btn btn-success btn-block" role="button">Activate <span> Id</span></a>
                               <a href="request_pin.php?pw_type=8" class="btn btn-success btn-block" role="button">Request <span> Pin</span></a>
                                <a href="package_ledger_view.php?pw_type=8" class="btn btn-primary btn-block" role="button">Ledger View</a>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->
                        
                        
                        
                     
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
