
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Articles
        <small>Control panel</small>
        
      </h1>
               <p><?php 
       // echo "<pre>";
       // print_r($this->session->userdata());
       // echo "</pre>";
      ?></p>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Manage Article</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="row" id="main">
        <div class="col-xs-12">
          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Listing Table</h3>
              <a href="<?php echo base_url('admin/create_article') ?>" class="btn btn-success pull-right" title="Create a New Property">Create Article</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
            <input type="file" name="upload[]" id="upload" multiple>
             <button id="btn_upload" class="btn btn-primary">Upload Images</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>

  </div>
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
  

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  $(function(){

      $('#btn_upload').click(function(){
        var form_data = new FormData();
        var files_image = $('#upload')[0].files;

        for(var x=0; x<files_image.length ; x++)
        {
          form_data.append('files[]', files_image[x]);
        }

        $.ajax({
          data: form_data,
          type: 'POST',
          url: '<?php echo base_url() ?>admin/ajax',
          crossOrigin: false,
          contentType: false,
          processData: false,
          beforeSend: function(){
             $('#btn_upload').prop('disabled',true);
             $('#btn_upload').html('Uploading...');
          },
          success: function(){
            $('#btn_upload').removeAttr('disabled');
            $('#btn_upload').html('Uploaded');
          },
        });
      })

  })
</script>