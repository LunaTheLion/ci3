  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
       Manage Rents
      
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       
        <li><i class="fa fa-th"></i> Manage Home</li>
        <li class="active"> Manage Rents</li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row" id="main">

        <div class="col-xs-12">
         

          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Rent Listing Table</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th><center>Property Image</center></th>
                  <th><center>Property Details</center></th>
                  
                  <th><center>Status</center></th>
                  <th><center>Activity</center></th>

                </tr>
                </thead>
                <tbody id="properties">
                  <?php 
                  if($fetch_data->num_rows() > 0)
                  {
                    foreach($fetch_data->result() as $row)
                    {
                      ?>
                        <tr>
                          <td><center><img  src="<?php echo base_url('uploads/'.$row->property_title_slug.'/facade/'.$row->property_facade)?>" style='height: 110px; width: 150px;'></center></td>
                          <td><center><b>Rent: <?php echo $row->property_price; ?> /mo</b>
                            <?php 
                              if(empty($row->property_sample_view))
                              {
                                ?><br><br>
                                  <a href='javascript:;' class='btn btn-warning btn-xs item-createview' id='createview' data="<?php echo $row->property_id;?>"><i class='fa fa-eye-slash'></i> Create Preview Details </a>&nbsp;
                                <?php
                              }
                              else
                              {
                                echo $row->property_sample_view;
                              }
                           ?>
                          </center></td>
                          <td><center><?php echo $row->property_status; ?></center></td>
                          <td><center><br>
                            <?php 
                                if($row->property_system_status == '1')
                                {//active to the website
                                  ?>
                                  
                                    <a href='javascript:;' class='btn btn-danger btn-xs item-hide' id='hide' data="<?php echo $row->property_id;?>"><i class='fa fa-eye-slash'></i> Hide </a>&nbsp;
                                  <?php
                                }
                                elseif($row->property_system_status == '2')
                                  {//hidden to the website
                                  ?>

                                  <a href='javascript:;' class='btn btn-primary btn-xs item-unhide ' id='unhide'  data="<?php echo $row->property_id;?>" ><i class='fa fa-eye'></i> Unhide </a>&nbsp;
                                  <?php
                                }


                             ?>
                              
                              
                              <a href='<?php echo base_url('Admin/edit_property/'.$row->property_id.'/'.$row->property_title_slug) ?>' class='btn btn-success btn-xs item-view'><i class='fa fa-folder-open'></i>View</a>
                          </center></td>
                        </tr>

                      <?php
                    }


                  }
                    else
                    {
                      ?>
                        <tr>
                          <td colspan="5"><center>No Results Found</center></td>
                        </tr>
                      <?php
                    }

                   ?>
                </tbody>
                <tfoot>
                <tr>
                  <th><center>Property Image</center></th>
                  <th><center>Property Details</center></th>
                  <th><center>Status</center></th>
                  <th><center>Activity</center></th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade " id="modal-default">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Compose Property Details</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/send_message') ?>" method="POST" id="messageForm">
           <div class="form-group">
               <textarea class="textarea" name="propertyDescription" placeholder="Place Details here"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btnsubmit" class="btn btn-primary"> <i class="fa fa-envelope"></i>Submit</button>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  $('document').ready(function(){
   $('#mnghome').css('display','block');

   $('#mngrents').addClass('active');
    window.onload = function() {
       $('#properties').on('click', '.item-hide', function(){
        var id = $(this).attr('data');
        alert(id+' is now Hidden');
        // $('#hide').hide();
        $.ajax({
          type:'ajax',
          method: 'get',
          async : false,
          url: '<?php echo base_url()?>admin/hide_property',
          data: {id,id},
          dataType: 'json',
          success: function(response)
          {
              console.log(id);
              if(response.success)
              {
                alert('success');
                window.location.reload();
              }

          },
          error: function()
          {
            alert('Could not Hide the Property');
          }
        })


       });

       $('#properties').on('click', '.item-unhide', function(){
        var id = $(this).attr('data');
        alert(id+' is now Active');
        $.ajax({
          type:'ajax',
          method: 'get',
          async : false,
          url: '<?php echo base_url()?>admin/unhide_property',
          data: {id,id},
          dataType: 'json',
          success: function()
          {
              console.log(id);
              if(response.success)
              {
                alert('success');
                window.location.reload();
              }
          },
          error: function()
          {
            alert('Could not Hide the Property');
          }
        })
       });
       $('#properties').on('click', '.item-createview', function(){
        var id = $(this).attr('data');
        // alert(id+' Create View?');
        $('#modal-default').modal('show');
        // $.ajax({
        //   type:'ajax',
        //   method: 'get',
        //   async : false,
        //   url: '<?php echo base_url()?>admin/unhide_property',
        //   data: {id,id},
        //   dataType: 'json',
        //   success: function()
        //   {
        //       console.log(id);
        //       if(response.success)
        //       {
        //         alert('success');
        //         window.location.reload();
        //       }
        //   },
        //   error: function()
        //   {
        //     alert('Could not Hide the Property');
        //   }
        // });
       });
    }
  });
 
</script>