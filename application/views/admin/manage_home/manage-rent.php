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

                  <th><center>Property Title</center></th>

                  <th><center>Image</center></th>
                  <th><center>Price</center></th>
                  <th><center>Status</center></th>
                  <th><center>Activity</center></th>

                </tr>
                </thead>
                <tbody id="properties">
                  <?php 
                  if($fetch_data->num_rows() > 0)
                  {
                    // echo "<pre>";
                    // print_r($fetch_data);
                    // echo "</pre>";
                    foreach($fetch_data->result() as $row)
                    {
                      ?>
                        <tr>
                          <td><?php echo $row->property_title; ?></td>
                          <td><img  src="<?php echo base_url('uploads/'.$row->property_title_slug.'/facade/'.$row->property_facade)?>" style='height: 110px; width: 150px;'></td>
                          <td><?php echo $row->property_price; ?></td>
                          <td><?php echo $row->property_status; ?></td>
                          <td><center>
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
                          <td colspan="3">No Results Found</td>
                        </tr>
                      <?php
                    }

                   ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Property Title</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Activity</th>
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>

      </div>

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  $('document').ready(function(){
   
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
          beforeSend: function(){
            //$('#main').html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
            //where id is = id , 
            // $('.a [data="'+id+'"]').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
          },
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
        // $('#unhide').hide();
        // $('#hide').show();

        $.ajax({
          type:'ajax',
          method: 'get',
          async : false,
          url: '<?php echo base_url()?>admin/unhide_property',
          data: {id,id},
          dataType: 'json',
          beforeSend: function(){
           
          },
          success: function()
          {
              console.log(id);
          },
          error: function()
          {
            alert('Could not Hide the Property');
          }
        })


       });
    }
  });
 
</script>