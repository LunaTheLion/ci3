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
       <?php 
         
               $dirname = "uploads/featured-pictures";
               $files = glob($dirname."*.*");
               $dir_path =  "uploads/featured-pictures";
               $extensions_array = array('jpg','png','jpeg');

               if(is_dir($dir_path))
               {
                 $files = scandir($dir_path);
                                 
                 for($i = 0; $i < count($files); $i++)
                 {
                   if($files[$i] !='.' && $files[$i] !='..')
                   {                     
                     $file = pathinfo($files[$i]);
                     //getting images from the root folder.  
                   ?>
                   <div class="col-lg-6 col-xs-6 col-md-6">
                     <div class="box box-widget">
                        <div class="box-body">
                             <img class="img-responsive pad" src="<?php echo base_url('uploads/featured-pictures/'.$files[$i]) ?>" alt="Photo">
                             <input type="hidden" name="fotoname" value="<?php echo $files[$i]?>">
                             <center>
                               <a href="javascript:;" class="btn btn-success btn-xs" id="view"><i class="fa fa-share"></i> Replace</a>
                             </center>
                          </div>
                       </div>
                   </div>
               <?php
               }
               }
               }
        ?>
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
          <input type="hidden" name="replace">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
            </form>
          </div>
        </div>
        
      </div>
      
    </div>
    
  </div>
  
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
  //$('#mnghome').siblings().removeClass('active');
  $('#mnghome').css('display','block');
  $('#featured').addClass('active');

  $('#view').on('click', function(){
    var picname = $('input[name=fotoname]').val();
    $('#modal-default').modal('show');
    $('#modal-default').find('.modal-title').text('Upload New Photo');
    $('#modal-default').find('input[name=replace]').val(picname);
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