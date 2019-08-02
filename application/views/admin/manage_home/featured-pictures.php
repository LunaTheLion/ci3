  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Featured Pictures
        <small>Control panel</small>
      </h1>
               <p><?php 
       // echo "<pre>";
       // print_r($this->session->userdata());
       // echo "</pre>";
      ?></p>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li><li><i class="fa fa-files-o"> Manage Home</i></li>
        <li class="active">Featured Pictures</li>
      </ol>
      <span><?php if(!empty($error)){ echo $error;} ?></span>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-6 col-md-6">
          <div class="box box-widget">
             <div class="box-body">
                  <img class="img-responsive pad" src="<?php echo base_url('assets/dist/img/photo2.png') ?>" alt="Photo">
                  <center>
                    <button type="button" class="btn btn-danger btn-xs item-hide"><i class="fa fa-eye-slash"></i> Hide</button>
                    <button type="button" class="btn btn-primary btn-xs item-unhide"><i class="fa fa-eye"></i> Unhide</button>
                    <button type="button" class="btn btn-success btn-xs item-replace"><i class="fa fa-share"></i> Replace</button>
                  </center>
               </div>
            </div>
        </div>
       <div class="col-lg-6 col-xs-6 col-md-6">
         <div class="box box-widget">
            <div class="box-body">
                 <img class="img-responsive pad" src="<?php echo base_url('assets/dist/img/photo2.png') ?>" alt="Photo">
                 <center>
                   
                   <button id="Hello" class="btn btn-danger btn-xs"><i class="fa fa-eye-slash"></i> Hide</button>
                   <a href="javascript:;" class="btn btn-primary btn-xs" id="unhide"><i class="fa fa-eye"></i> Unhide</a>
                   <a href="javascript:;" class="btn btn-success btn-xs" id="view"><i class="fa fa-share"></i> Replace</a>
                 </center>
              </div>
           </div>
       </div>
      </div>

    </section>
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Default Modal</h4>
          </div>
          <div class="modal-body">
         <form enctype="multipart/form-data" method="POST" action="<?php echo base_url('admin/upload_featured_pictures') ?>">
           <input type="file" name="file" id="foto" required>
           <div id="fotoPreview"></div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
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
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
$('document').ready(function(){
  console.log('hello');
  $('#Hello').on('click', function(){
    alert('Hide');
  })
  $('#unhide').on('click', function(){
    alert('Unhide');
  })
  $('#view').on('click', function(){
    
    $('#modal-default').modal('show');
    $('#modal-default').find('.modal-title').text('Upload New Photo');

  });
  var images = function(input, imgPreview) {
  
      if (input.files) {
          var filesAmount = input.files.length;
  
          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();
  
              reader.onload = function(event) {
                  $($.parseHTML("<img class='imageThumb'>")).attr('src', event.target.result).appendTo(imgPreview);
              }
              reader.readAsDataURL(input.files[i]);
          }
      }
  
  };
  
  $('#foto').on('change', function() {
      images(this, '#fotoPreview');
  });
  $('body').on('click','#fotoPreview',function(){
      $('#foto').val("");
      $('#fotoPreview').html("");
  
  });
})
</script>