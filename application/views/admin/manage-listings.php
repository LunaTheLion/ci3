  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Listings
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       
        <li class="active">Manage Listings</li>
      </ol>
      <br>
      <a href="<?php echo base_url('admin/create_listing') ?>" class="btn btn-success">Create Listing</a>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
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
               
<!--                 <tr>
                  <td>Sample House in Makati</td>
                  <td>
                    <img class="img-responsive pad" src="<?php echo base_url('assets/dist/img/photo2.png') ?>" alt="Photo" style="height: 100px; width: 150px;">
                  </td>
                  <td>50,000 || 700 sqm</td>
                  <td>Sale</td>
                  <td>
                    <center>
                    <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-eye-slash"></i> Hide</button>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Unhide</button>
                    <button type="button" class="btn btn-success btn-xs"><i class="fa fa-folder-open"></i>View</button>
                    </center>
                  </td>
                </tr>
                <tr>
                  <td>Sample Unit in Makati</td>
                  <td>
                    <img class="img-responsive pad" src="<?php echo base_url('assets/dist/img/photo2.png') ?>" alt="Photo" style="height: 100px; width: 150px;">
                  </td>
                  <td>50,000 || 7 m</td>
                  <td>Rent and Sale</td>
                  <td><center>
                    <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-eye-slash"></i> Hide</button>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Unhide</button>
                    <button type="button" class="btn btn-success btn-xs"><i class="fa fa-folder-open"></i>View</button>
                  </center></td>
                </tr>
                <tr>
                  <td>Sample House in BGC</td>
                  <td>
                    <img class="img-responsive pad" src="<?php echo base_url('assets/dist/img/photo2.png') ?>" alt="Photo" style="height: 100px; width: 150px;">
                  </td>
                  <td>50,000 || 7 m</td>
                  <td>Rent and Sale</td>
                  <td><center>
                    <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-eye-slash"></i> Hide</button>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Unhide</button>
                    <button type="button" class="btn btn-success btn-xs"><i class="fa fa-folder-open"></i>View</button>
                  </center></td>
                </tr>
                <tr>
                  <td>Sample House in Makati</td>
                  <td>
                    <img class="img-responsive pad" src="<?php echo base_url('assets/dist/img/photo2.png') ?>" alt="Photo" style="height: 100px; width: 150px;">
                  </td>
                  <td>50,000 || 7 m</td>
                  <td>Rent and Sale</td>
                  <td><center>
                    <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-eye-slash"></i> Hide</button>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Unhide</button>
                    <button type="button" class="btn btn-success btn-xs"><i class="fa fa-folder-open"></i>View</button>
                  </center></td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 2.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 3.0</td>
                  <td>Win 2k+ / OSX.3+</td>
                  <td>1.9</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.0</td>
                  <td>OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Camino 1.5</td>
                  <td>OSX.3+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape 7.2</td>
                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                  <td>1.7</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape Browser 8</td>
                  <td>Win 98SE+</td>
                  <td>1.7</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Netscape Navigator 9</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.0</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.1</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.1</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.2</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.2</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.3</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.3</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.4</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.4</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Mozilla 1.5</td>
                  <td>Win 95+ / OSX.1+</td>
                  <td>1.5</td>
                  <td>A</td>
                </tr> -->
               
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
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
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
    // window.onload = function(){
    //   get_properties();
    //   function get_properties()
    //   {
    //     $.ajax({
    //       type: 'ajax',
    //       url:'<?php echo base_url()?>Admin/get_properties',
    //       async:false,
    //       dataType:'json',
    //       success: function(data){
    //         console.log(data);
    //       },
    //       error: function()
    //       {
    //         alert("Uhm, another try?");
    //       }
    //     })
    //   }
    // }
    window.onload = function() {
        get_properties();
       function get_properties()
       {
          $.ajax({
            type: 'ajax',
            url: '<?php echo base_url()?>Admin/get_properties',
            async: false,
            dataType: 'json',
            success: function(data)
            {
              console.log(data);
              var html = '';
              var i;
              for(i=0; i<data.length; i++)
              {
                html +=  "<tr>"+
                      "<td>"+data[i].property_title+"</td>"+
                      "<td><img  src='<?php echo base_url('uploads/')?>"+data[i].property_title_slug+"/facade/"+data[i].property_facade+"' style='height: 100px; width: 150px;'/>"+
                      "<td>"+data[i].property_price+"</td>"+
                      "<td>"+data[i].property_status+"</td>"+
                      "<td>"+
                     
                       "<center>"+
                    "<a href='javascript;:' class='btn btn-danger btn-xs item-hide' data="+data[i].property_id+"><i class='fa fa-eye-slash'></i> Hide</a>"+
                    "<a href='' class='btn btn-primary btn-xs item-unhide' data="+data[i].property_id+"><i class='fa fa-eye'></i> Unhide</a>"+
                    "<a href='<?php echo base_url('Admin/edit_property/') ?>"+data[i].property_id+"/"+data[i].property_title_slug+"' class='btn btn-success btn-xs item-view'><i class='fa fa-folder-open'></i>View</a>"+
                    "</center>"+

                    "</tr>";
                    
              }$('#properties').html(html);
            },
            error: function()
            {
              alert('Could not load data');
            }
          })
       }
       $('#inquiries').on('click', '.item-delete', function(){
        var id = $(this).attr('data');
        $('#deleteModal').modal('show');
        $('#deleteModal').find('.modal-title').text('Delete Project');
        $('#btnDelete').click(function(){
          $.ajax({
             type: 'ajax',
             method: 'get',
             async: false,
             url:'<?php echo base_url() ?>admin/delete_project/',
             data:{id,id},
             dataType: 'json',
             success: function(response)
             {
              if(response.success)
              {
                $('#deleteModal').modal('hide');
                $('.alert-success').html('Project is deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                window.location.reload();
              }
              else
              {
                alert('Error');
              }
             },
             error: function()
             {
              alert('Could not Delete Project')
             },

          })
        })
       })
    }
  });
 
</script>