  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
       Manage Listings
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><a href="<?php echo base_url('admin/mng_listing') ?>"><i class="fa fa-th"></i> Manage Listings</li></a>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row" id="main">
        <div class="col-xs-12">
          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Listing Table</h3>
              <a href="<?php echo base_url('admin/create_listing') ?>" class="btn btn-success pull-right" title="Create a New Property">Create Listing</a>
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
                    
                    foreach($fetch_data->result() as $row)
                    {
                      ?>
                        <tr>
                          <td><?php echo $row->property_title; ?></td>
                          <td><center>
                            <img  src="<?php echo base_url('uploads/'.$row->property_title_slug.'/facade/'.$row->property_facade)?>" style='height: 110px; width: 150px;'>
                          </center></td>
                          <td><?php echo $row->property_price; ?></td>
                          <td><?php echo $row->property_status; ?></td>
                          <td><center>
                            <?php 
                                if($row->property_system_status == '1')
                                {//active to the website
                                  ?>
                                    <a href='javascript:;' class='btn btn-danger btn-xs item-hide' id='hide' data="<?php echo $row->property_id;?>" title="Hide your property from the website"><i class='fa fa-eye-slash'></i> Hide </a>&nbsp;
                                  <?php
                                }
                                elseif($row->property_system_status == '2')
                                  {//hidden to the website
                                  ?>
                                  <a href='javascript:;' class='btn btn-primary btn-xs item-unhide ' id='unhide'  data="<?php echo $row->property_id;?>" title="Let your property be seen in the website" ><i class='fa fa-eye'></i> Unhide </a>&nbsp;
                                  <?php
                                }
                             ?>
                              <a href='<?php echo base_url('Admin/edit_property/'.$row->property_id.'/'.$row->property_title_slug) ?>' class='btn btn-success btn-xs item-view' title="See full details of the property"><i class='fa fa-folder-open'></i>View</a>
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
       $('#properties').on('click', '.item-hide', function(){
        var id = $(this).attr('data');
        $('#modal-default').modal('show');
        $('#modal-default').find('.modal-title').text('Hide Property');
        $('#modal-default').find('.modal-body').text('Are you sure you want to Hide this Property?');
        $('#btnyes').click(function(){
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
                  $('#modal-default').modal('show');
                  
                   alert('success');  
                   window.location.reload();
                 }
                 else
                 {
                    alert('Could not Hide the Property');
                    $('#modal-default').modal('hide');
                 }
              },
              error: function()
              {
                alert('Could not Unhide the Property');
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