
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php if(!empty($this->session->flashdata('title')))
        {
          echo "Edit ".$this->session->flashdata('title');
        }
        else
        {
          echo "Create Property Listing";
        }
        ?>
        <small>advanced tables</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       
        <li class="active"><?php if(!empty($this->session->flashdata('title')))
                {
                  echo "Edit ".$this->session->flashdata('title');
                }
                else
                {
                  echo "Create Listing";
                }
                ?> </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <!--  <?php echo form_open_multipart('property/create_project') ?> -->
    
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="box box-info">

            <div class="box-header with-border">


              <h3 class="box-title">
               <?php if(!empty($this->session->flashdata('title')))
                {
                  echo "Edit ".$this->session->flashdata('title');
                }
                else
                {
                  echo "Add Property";
                }
                ?> 

              </h3>
              <!-- <a href="<?php echo base_url('upload_multiple/sample') ?>" class="btn btn-info">Sample</a> -->
              <?php
                if(!empty($this->session->flashdata('title')))
                {
                  echo '<a href="javascript:;" id="delprop" class="btn btn-danger pull-right" data="'.$this->session->flashdata('id').'" ><i class="fa fa-trash"></i> Delete Property</a>';
                }
              ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

             <div class="row">
              <div class="col-lg-12">
                <div class="process">
                   <div class="process-row nav nav-tabs">
                    <div class="process-step">
                     <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-info fa-3x"></i></button>
                     <p><small>Fill<br />information</small></p>
                    </div>
                    <div class="process-step">
                     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-file-text-o fa-3x"></i></button>
                     <p><small>Fill<br />description</small></p>
                    </div>
                    <div class="process-step">
                     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x"></i></button>
                     <p><small>Upload<br />images</small></p>
                    </div>
                    <div class="process-step">
                     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-cogs fa-3x"></i></button>
                     <p><small>Configure<br />display</small></p>
                    </div>
                    <div class="process-step">
                     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-check fa-3x"></i></button>
                     <p><small>Save<br />result</small></p>
                    </div>
                   </div>
                </div>
                <div class="tab-content">
                   <div id="menu1" class="tab-pane fade active in">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                    </ul>
                   </div>
                   <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                    </ul>
                   </div>
                   <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Some content in menu 3.</p>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                    </ul>
                   </div>
                   <div id="menu4" class="tab-pane fade">
                    <h3>Menu 4</h3>
                    <p>Some content in menu 4.</p>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                    </ul>
                   </div>
                   <div id="menu5" class="tab-pane fade">
                    <h3>Menu 5</h3>
                    <p>Some content in menu 5.</p>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Done!</button></li>
                    </ul>
                   </div>
                  </div>
              </div>
            </div>            
                
            </div>
            <div class="box-footer">
                
             
            </div>
          </div>
        </div>
      </div>
        
    </section>
    <!-- /.content -->
    <div class="modal modal-danger fade" id="modal-danger">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Danger Modal</h4>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            <button type="button" name="deleteYes" id="deleteYes"  class="btn btn-outline">Yes</button>
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


</div>
<!-- ./wrapper -->


 <script type="text/javascript">
  $('document').ready(function() {



    $(function(){
 $('.btn-circle').on('click',function(){
   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
   $(this).addClass('btn-info').removeClass('btn-default').blur();
 });

 $('.next-step, .prev-step').on('click', function (e){
   var $activeTab = $('.tab-pane.active');

   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');

   if ( $(e.target).hasClass('next-step') )
   {
      var nextTab = $activeTab.next('.tab-pane').attr('id');
      $('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ nextTab +'"]').tab('show');
   }
   else
   {
      var prevTab = $activeTab.prev('.tab-pane').attr('id');
      $('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ prevTab +'"]').tab('show');
   }
 });
});


    $('#delprop').click(function(){
        var id = $(this).attr('data');
        //show delete modal 
        $('#modal-danger').modal('show');
        $('#modal-danger').find('.modal-title').text('Delete Property');
        $('#modal-danger').find('.modal-body').text('Are you sure you want to delete this property?');
        $('#deleteYes').click(function(){
          
            $.ajax({
              type:'ajax',
              method: 'get',
              async: false,
              url: '<?php echo base_url()?>Admin/delete_property',
              data:{id,id},
              dataType:'json',
              success: function(response)
              {
                console.log(id);
                if(response.success)
                {
                 $('#modal-danger').modal('show');
                 
                  alert('success');  
                  window.location.reload();
                }
                else
                {
                   alert('Could not Hide the Property');
                   $('#modal-danger').modal('hide');
                }
              },
              error: function()
              {
                Alert('Cannot Delete this Property');
              }
            })
        });
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
      
          $('#model').on('change', function() {
              images(this, '#modelPreview');
          });
          $('#amenities').on('change', function() {
              images(this, '#amenitiesPreview');
          });
              
              //clear the file list when image is clicked
          $('body').on('click','#amenitiesPreview',function(){
              $('#amenities').val("");
              $('#amenitiesPreview').html("");
      
          });
          $('body').on('click','#modelPreview',function(){
              $('#model').val("");
              $('#modelPreview').html("");
          
          });
          
      });


    
 </script>