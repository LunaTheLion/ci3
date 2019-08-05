  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Owners
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       
        <li class="active"><i class="fa fa-pie-chart"></i> Manage Owners</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Owner Table</h3>
              <a href="javascript:;" class="btn btn-success pull-right" id="createOwner">Create Owner</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>Name</center></th>
                  <th><center>Property</center></th>
                  <th><center>Email</center></th>
                  <th><center>Contact</center></th>
                  <th><center>Activity</center></th>
                </tr>
                </thead>
                <tbody id="owners">
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
                          <td><?php echo $row->owner_name; ?></td>
                          <td><?php echo $row->owner_property ?></td>
                          <td><?php echo $row->owner_email ?></td>
                          <td><?php echo $row->owner_contact_no; ?></td>
                          <td><center>
                            <a href='javascript:;' class='btn btn-success btn-xs' id="view" data="<?php echo $row->owner_id?>" title="See full details of the owner"><i class='fa fa-folder-open'></i> View</a>

                            <a href='javascript:;' class='btn btn-danger btn-xs item-hide' id="delete" data="<?php echo $row->owner_id;?>" title="Delete from table"><i class='fa fa-eye-slash'></i> Delete </a>&nbsp;
                            
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
                  <th><center>Name</center></th>
                  <th><center>Property</center></th>
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

 <div class="modal fade" id="modal-default">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">Create Owner</h4>
       </div>
       <div class="modal-body">
         <form method="post" action="<?php echo base_url('admin/create_owner') ?>" id="myForm">
            <div class="form-group">
              <label for="name">Input Owners' Name</label>
              <input type="text" class="form-control" name="name" placeholder="Input Owners Name">
            </div>
            <input type="hidden" name="ownerID">
            <div class="form-group">
              <label for="email">Input Owners' Email</label>
              <input type="email" class="form-control" name="email" placeholder="Input Owners Email">
            </div>
            <div class="form-group">
              <label for="contact">Input Owners' Contact</label>
              <input type="number" class="form-control" name="contact" placeholder="Input Owners Contact">
            </div>
            <div class="form-group">
              <label for="property">Input Owners' Property</label>
              <input type="text" class="form-control" name="property" placeholder="Input Owners Property" required>
            </div>
     <!--        <div class="form-group">
              <label for="propertyType">Input Owners' Property Type</label>
              <select name="propertyType" class="form-control">
                <option value="Condo">Condo</option>
                <option value="House and Lot">House and Lot</option>
                <option value="Lot">Lot</option>
              </select>
            </div>
            <div class="form-group">
              <label for="propertyStatus">Input Owners' Property Status</label>
              <select name="propertyStatus" class="form-control">
                <option value="Rent Only">Rent Only</option>
                <option value="Sale Only">Sale Only</option>
                <option value="Rent and Sale">Rent and Sale</option>
              </select>
            </div> -->
            <div class="form-group">
              <label for="message">Input Owners' Message</label>
              <textarea class="form-control" name="message"></textarea>
            </div>
         
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         <button type="submit" id="btnyes" class="btn btn-success">Yes</button>
         </form>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <div class="modal modal-danger fade" id="modal-danger">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title">Delete Owner</h4>
       </div>
       <div class="modal-body">
         <p>Are you sure you want to delete this owner? <b id="ownername"></b> </p> 
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
         <button type="button" id="btnDelete" class="btn btn-outline">Delete</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
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
  $('document').ready(function(){

//owners table view owner
$('#owners').on('click' , '#view', function(){
    var id = $(this).attr('data');
    $('#modal-default').modal('show');
    $('#modal-default').find('.modal-title').text('View Owner');
    $('#myForm').attr('action', '<?php echo base_url('admin/update_owner')?>');
    $.ajax({
      type:'ajax',
      method: 'get',
      url: '<?php echo base_url('admin/view_owner')?>',
      data:{id,id},
      async: false,
      dataType: 'json',
      success: function(data)
      {
        $('input[name=name]').val(data.owner_name);
        $('input[name=email]').val(data.owner_email);
        $('input[name=contact]').val(data.owner_contact_no);
        $('textarea[name=message]').val(data.owner_message);
        $('input[name=property]').val(data.owner_property);
        $('input[name=ownerID]').val(data.owner_id);
        $('#modal-default').find('.btn-success').text('Update');
      },
      error: function() 
      {
        alert('Could not Update');
      }
    });
});
//owners table view owner
$('#owners').on('click', '#delete', function(){
           var id = $(this).attr('data');
           $('#modal-danger').modal('show');
           $('#btnDelete').click(function(){

              $.ajax({
                type:'ajax',
                method: 'get',
                url: '<?php echo base_url('admin/delete_owner')?>',
                data:{id,id},
                async: false,
                dataType: 'json',
                success: function(response)
                {
                  if(response.success)
                  {
                  $('#modal-danger').modal('hide');
                     alert('success');  
                    window.location.reload();
                  }
                  else
                  {
                     $('#modal-danger').modal('hide');
                     alert('Pwede na kaso may kulang');
                     window.location.reload();
                  }

                },
                error: function() 
                {
                  alert('Could not Delete');
                  $('#modal-danger').modal('hide');
                }
           });
      });
});    



    $('#createOwner').click(function(){
      $('#modal-default').modal('show');
    });
 
});
</script>