<?php 
include "config.php";
top_structure('Block Reason List', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Block Reason LIST</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Block/Unblock Reason List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <table id="datatable-buttons" class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                            <th>sr no</th>
                          <th>ID</th>
                          <th>date/time</th>
                          
                          <th>status</th>
                          <th>reason</th>
                          
                          
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                                $au=1;
                                $e="SELECT * FROM `block_history` WHERE `d_id`='$_GET[d_id]'";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ ?>
                                    <tr>
                                        <td> <?php echo $au ?></td>
                                <td>
                                    <?php echo $R["d_id"]; ?>
                                </td>
                                <td><?php echo $R["date"]." / ". $R["time"]; ?></td>
                                
                                <td><?php if($R[status]=='unblock') {echo "<button type='button' class='btn btn-success'>Unblocked</button>";}
                                    else {?> <button type="button" class="btn btn-danger">Blocked</button>
                                    <?php    
                                    } 
                                 ?></td>
                                 <td>
                                    <?php echo $R["reason"]; ?>
                                </td>
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
              <!-- /page content -->

        
<?php 
bottom_structure('Digitalasset.org.in');

?>