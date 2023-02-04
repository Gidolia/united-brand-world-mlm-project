<?php 
include "config.php";
if($_GET[n]=='s'){
    top_structure('Top Leaders', 1, 'success', 'Success!', 'Top leaders Added Successfully');
}elseif($_GET[n]=='f'){
    top_structure('Top Leaders', 1, 'warning', 'Not Matched', 'Top leaders Added Fail');
}
else{
    top_structure('Top Leaders', 0, '', '', '');
}
sidebar();
header_bar();?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Top Leader</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Leader List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="name">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Photo</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" class="form-control" name="photo" >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Place</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="place" >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Message</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" name="message" >
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Submit" name="submit_profile">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            <?php
            if(isset($_POST[submit_profile]))
            {
function password_generate($chars) 
{
  $data = '123456789';
  return substr(str_shuffle($data), 0, $chars);
}

    //echo $x;
    $d_id=password_generate(15);
    
                if (file_exists("../../../top_leader/" .$d_id.".jpg"))
                {
                unlink("../../../top_leader/" .$d_id.".jpg");
                  echo $d_id.".jpg" . " already exists. ";
                }
                if(move_uploaded_file($_FILES["photo"]["tmp_name"], "../../../top_leader/".$d_id.".jpg"))
        		{
        		    $img=$d_id.".jpg";
                    $inse="INSERT INTO `front_top_leaders` (`ftl_id`, `date`, `name`, `place`, `photo`, `message`) VALUES (NULL, '$date', '$_POST[name]', '$_POST[place]', '$img', '$_POST[message]');";
                    if($con->query($inse)===TRUE)
                    {
                         echo "<script>location.href='top_leaders.php?n=s';</script>";
                    }else{
                        echo "<script>location.href='top_leaders.php?n=f';</script>";
                    }
                }
            }
            ?>
            
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top Leader List</h2>
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
                            <th>ID</th>
                          <th>Name</th>
                          <th>Photo</th>
                          <th>Place</th>
                          <th>Massage</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                                $au=1;
                                $e="SELECT * FROM `front_top_leaders`";
                                $d=$con->query($e);
                                while($R=$d->fetch_assoc()){ 
                                ?>
                                    <tr>
                                        
                                <td>
                                   <?php echo $R['ftl_id']; ?>
                                </td>
                                <td>
                                 <?php echo $R['name']; ?>
                                </td>
                                <td>
                                    <img src="../../../top_leader/<?php echo $R['photo']; ?>" height="100px" width="100px">
                                    
                                    
                                </td>
                                <td>
                                    <?php echo $R['place']; ?>
                                </td>
                                <td>
                                    <?php echo $R['message']; ?>
                                </td>
                                
                                 <td>
                                     <a href="delete_top_leaders.php?id=<?php echo $R[ftl_id]; ?>" class="btn btn-danger">Delete</a>
                                 </td>
                                </tr>
                                <?php 
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
        <!-- /page content -->
<?php 
bottom_structure('Digitalasset.org.in');

?>