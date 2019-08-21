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
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">


             <input type="file" name="upload[]" required multiple>
             <button id="btn_upload">Upload Files</button>
          
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
  
   <!-- /.modal-dialog -->
 </div>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
	$(function(){
		$('#btn_upload').click(function(){

			var form_data = new FormData();
			var files_image = $('#upload')[0].files[0];

			for(var x = 0; x < files_images.length ; x++)
			{
				form_data.append('files[]', files_image[$x]);
			}

			$.ajax({
				data: form_data,
				type: 'POST',
				url : '<?php echo base_url()?>property/ajax',
				crossOrigin:  false,
				contentType: false,
				processData: false,
				beforeSend : function(){
					$('#btn_upload').prop('disabled', true);
					$('#btn_upload').html('Uploading');
				},
				success: function(){
					$('#btn_upload').removeAttr('disabled');
					$('#btn_upload').html('Uploaded');
				},
			});

		});
	})


</script>