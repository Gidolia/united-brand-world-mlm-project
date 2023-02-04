<?php 
include "config.php";
top_structure('Auto Matix List', 0, 'warning', 'Success', 'done');
sidebar();
header_bar();?>
<!--Page Content-->
 <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Auto Matrix List</h2>
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
                          <th>D. ID</th>
                          <th>Amount</th>
                          <th>Date / Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                        
                                $au=1;
                                $e="SELECT * FROM `auto_matrix_income` ";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                ?>
                                <tr>
                               <td>
                                    <?php echo $au++; ?>
                                </td>
                                <td>
                                    <?php echo "DA".$R["d_id"]; ?>
                                </td>
                                <td>
                                    <?php echo "₹".$R["amount"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["date"]; ?> / <?php echo $R["time"]; ?>
                                </td>
                               <td>
                                <a href="delete_auto_matrix_list.php?id=<?php echo $R[ami_id]?>"><button class="btn btn-danger">Delete</button></a>
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
        </div>
         
<?php 
bottom_structure('Digitalasset.org.in');

?>