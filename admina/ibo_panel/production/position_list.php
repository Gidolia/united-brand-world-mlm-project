<?php 
include "config.php";
top_structure('All Distributers List', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>
<!--Page Content-->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Distributor LIST</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Distributor List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="card-box table-responsive"> 
                     <table id="datatable-buttons" class="table table-striped jambo_table" >
                      <thead>
                        <tr class="headings">
                          <th>#</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Password</th>
                          <th>date/time</th>
                          <th>City</th>
                          <!--<th>pin</th>-->
                          
                          <th>Status</th>
                       
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                        //   WHERE `position`='$_GET[position]'
                                $au=1;
                                $e="SELECT * FROM `distributor`";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                $es="SELECT * FROM `distributor` WHERE `d_id`='$R[placement_id]'";
                                $ds=$con->query($es);
                                $vc=$ds->fetch_assoc();
                                ?>
                                    <tr>
                                        <td <?php if($R[block_status]=='Y'){?>
                                        bgcolor="red"
                                        <?php }?>
                                        > <?php echo $au; ?></td>
                                <td>
                                   <a href="open_user_panel.php?id=<?php echo $R['d_id'];?>&password=<?php echo $R['password']; ?>">   <?php echo $R["d_id"]; ?></a>
                                </td>
                                <td>
                                  <a href="d_detail.php?d_id=<?php echo $R['d_id'];?>">  <?php echo $R['name'];?></a>
                                </td>
                                <!--<td>-->
                                <!--    <?php echo $R['placement_id']."( ".$vc[name]." )"; ?>-->
                                <!--</td>-->
                                <td>
                                    <?php echo $R["email"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["mobile"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["password"]; ?>
                                </td>
                                <td><?php echo $R["r_date"]." / ". $R["r_time"]; ?></td>
                                <td><?php echo $R["city"]; ?></td>
                                
                                
                                <!--<td><?php echo $R["pin_wallet"]; ?></td>-->
                                
                                <td><?php if($R[status]=='1') {echo "<button type='button' class='btn btn-success'>Activated</button>";}
                                    else {?> <button type="button" class="btn btn-danger">Not Active</button>
                                    <?php    
                                    } 
                                 ?></td>
                                 
                                </tr>
                                <?php $au++;     
                                } ?>
                      </tbody>
                    </table>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         
<?php 
bottom_structure('Digitalasset.org.in');

?>