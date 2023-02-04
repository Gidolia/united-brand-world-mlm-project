<?php 
include "config.php";
top_structure('Contact List', 0, 'warning', 'Success', 'done');
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
                    <h2>All Contact List</h2>
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
                          <th>Subject</th>
                          <th>Message</th>
                          <th>date/time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                        //   WHERE `position`='$_GET[position]'
                                $au=1;
                                $e="SELECT * FROM `contact_us` ORDER BY `id` DESC ";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                ?>
                                <tr>
                               <td>
                                    <?php echo $au; ?>
                                </td>
                                <td>
                                    <?php echo $R["id"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["name"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["email"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["mobile"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["subject"]; ?>
                                </td>
                                <td>
                                    <?php echo $R["message"]; ?>
                                </td>
                                <td><?php echo $R["date"]." / ". $R["time"]; ?></td>
                                <td>
                                <a href="delete_contact.php?id=<?php echo $R[id]?>"><button class="btn btn-danger">Delete</button></a>
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