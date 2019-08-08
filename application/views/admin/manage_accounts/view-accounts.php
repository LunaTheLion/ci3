  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
       Manage Accounts
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="<?php echo base_url('admin/mng_view_accounts') ?>"><i class="fa fa-th"></i> Manage Accounts</li></a>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row" id="main">
        <div class="col-xs-12">
          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Admin Account Table</h3>
              <a href="<?php echo base_url('admin/add_new_account') ?>" class="btn btn-success pull-right" title="Create a New Property">Create Account</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>Email</center></th>
                  <th><center>Username</center></th>
                  <th><center>Admin Type</center></th>
                  <th><center>Password</center></th>
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
                          <td><?php echo $row->admin_email; ?></td>
                          <td><?php echo $row->admin_username ?></td>
                          <td><?php echo $row->admin_type; ?></td>
                          <td><?php echo $row->admin_password; ?></td>
                          <td><center>
                            <?php 
                                if($row->admin_status == '1')
                                {//active to the website
                                  ?>
                                    <a href='javascript:;' class='btn btn-danger btn-xs item-delete' id='delete' data="<?php echo $row->admin_id;?>" title="Hide your property from the website"><i class='fa fa-eye-slash'></i> Delete </a>&nbsp;
                                  <?php
                                }
                               
                             ?>
                              <a href='<?php echo base_url('Admin/edit_property/'.$row->admin_id) ?>' class='btn btn-success btn-xs item-view' title="See full details of the property"><i class='fa fa-folder-open'></i>View</a>
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
                  <th><center>Email</center></th>
                  <th><center>Username</center></th>
                  <th><center>Admin Type</center></th>
                  <th><center>Password</center></th>
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
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Default Modal</h4>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
            <input type="text" name="id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" id="btnyes" class="btn btn-success">Yes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
  $('document').ready(function(){
   
    window.onload = function() {
       $('#properties').on('click', '.item-delete', function(){
        var id = $(this).attr('data');
        $('#modal-default').modal('show');
        $('#modal-default').find('.modal-title').text('Delete Admin Account');
        $('#modal-default').find('.modal-body').text('Are you sure you want to Delete this Owner?');
        $('#btnyes').click(function(){
              
            $.ajax({
              type:'ajax',
              method: 'get',
              async : false,
              url: '<?php echo base_url()?>admin/delete_account',
              data: {id,id},
              dataType: 'json',
              success: function(response)
              {
                 // console.log(id);
                 // alert(id);
                 if(response.success)
                 {
                   alert('success');  
                  $('#modal-default').modal('hide');
                   window.location.reload();
                 }
                 else
                 {
                    alert('Could not Delete Account');
                    $('#modal-default').modal('hide');
                 }
              },
              error: function()
              {
                alert('Could not Delete Account haha');
              }
            })

        });

       });

       $('#properties').on('click', '.item-unhide', function(){
        var id = $(this).attr('data');
        $('#modal-default').modal('show');
        $('#modal-default').find('.modal-title').text('Hide Property');
        $('#modal-default').find('.modal-body').text('Are you sure you want to Hide this Property?');
        $('#btnyes').click(function(){
            $.ajax({
              type:'ajax',
              method: 'get',
              async : false,
              url: '<?php echo base_url()?>admin/unhide_property',
              data: {id,id},
              dataType: 'json',
              success: function(response)
              {
                 console.log(id);
                 if(response.success)
                 {
                  $('#modal-default').modal('show');
                   alert('success');
                   window.location.reload();
                 }
                 else
                 {
                    alert('Could not Unhide the Property');
                    $('#modal-default').modal('hide');
                 }
              },
              error: function()
              {
                alert('Could not Hide the Property');
              }
            })

        });

       

       });
    }
  });
 
</script>