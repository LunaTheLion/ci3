
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
                   <!--  <div class="process-step">
                     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-check fa-3x"></i></button>
                     <p><small>Preview<br />result</small></p>
                    </div> -->
                   </div>
                </div>
                <div class="tab-content">
                   <div id="menu1" class="tab-pane fade active in">
                    <div class="content">
                    <div class="row">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-6">
                          <center><h3>Fill Information</h3></center>
                       <br>
                        <form method="POST" action="">
                          <table>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Property Code:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <?php 

                                  $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
                                  srand((double)microtime()*1000000); 
                                  $i = 0; 
                                  $pass = '' ; 

                                  while ($i <= 7) { 
                                      $num = rand() % 33; 
                                      $tmp = substr($chars, $num, 1); 
                                      $pass = $pass . $tmp; 
                                      $i++; 
                                  } 

                                   ?>
                                  <input type="text" name="propertyAddress" class="form-control" disabled value="<?php echo strtoupper($pass) ?>">
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Property Type:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <select class="form-control" name="propertyType">
                                    <option value="Condominium">Condominium</option>
                                    <option value="House and Lot">House and Lot</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Property Address:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="text" name="propertyAddress" class="form-control">
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Property Building:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="text" name="propertyBuilding" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </form>
                      </div>
                      <div class="col-lg-3"></div>
                    </div>
                    </div>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                    </ul>
                   </div>
                   <div id="menu2" class="tab-pane fade">
                    <div class="content">
                    <div class="row">
                      <center><h3>Fill Description</h3></center>
                      <div class="col-lg-3"></div>
                      <div class="col-lg-6">
                          
                       <br>
                        <form method="POST" action="">
                          <table>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Bedroom Count:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertyBed" class="form-control" >
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Bathroom Count:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertyBath" class="form-control" >
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Parking Count:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertyParking" class="form-control">
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Floor Area:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertyFloorArea" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Lot Area:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertylotArea" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;"></label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="checkbox" name="propertyPet" id="propertyPet" value="1" checked="<?php 
                                  if(!empty($this->session->flashdata('title')))
                                  {
                                   if($this->session->flashdata('pet') == 1)
                                   {
                                     echo "checked";
                                   }
                                   
                                  }
                                   ?>">Pet Friendly<br>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;"></label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  
                                   <input type="checkbox" name="propertyGarden" id="propertyGarden" value="1" checked="<?php 
                                   if($this->session->flashdata('garden') == 1)
                                   {
                                     echo "checked";
                                   }
                                   
                                    ?>">With Garden  
                                </div>
                              </td>
                            </tr>
                            
                          </table>
                          
                        </form>
                      </div>
                      <div class="col-lg-3"></div>
                    </div>
                    </div>

                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                    </ul>
                   </div>
                   <div id="menu3" class="tab-pane fade">
                    <div class="content">
                    <div class="row">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-6">
                          <center><h3>Upload Images</h3></center>
                       <br>
                        <form method="POST" action="">

                          <center></center>

                          <div class="container">
                            <label for="files">Upload the Amenities</label>
                           <input type="file" id="files" name="files[]" multiple />
                            <div id="modelPreview">
                              <?php 
                                if(!empty($this->session->flashdata('title')))
                                {
                                  ?>
                                   <img src="<?php echo base_url('uploads/'.$this->session->flashdata('title_slug')."/facade/".$this->session->flashdata('facade'))?>" class="imageThumb"/> 

                                  <?php
                                }
                               ?>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="col-lg-3"></div>
                    </div>
                    </div>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                    </ul>
                   </div>
                   <div id="menu4" class="tab-pane fade">
                    
                    <div class="content">
                    <div class="row">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-6">
                          <center><h3>Configure Display</h3></center>
                       <br>
                       
                          <label for="file">Upload the display photo for the property</label>
                         <input type="file" id="files" name="files[]" multiple />
                          <div id="modelPreview">
                            <?php 
                              if(!empty($this->session->flashdata('title')))
                              {
                                ?>
                                 <img src="<?php echo base_url('uploads/'.$this->session->flashdata('title_slug')."/facade/".$this->session->flashdata('facade'))?>" class="imageThumb"/> 

                                <?php
                              }
                             ?>
                          </div>
                          <table>
                           <tr>
                             <td style="width:20%; "><label style="margin-bottom: 10%;">Status :</label></td>
                             <td style="width: 40%;">
                               <div class="form-group">
                                 <input type="number" name="propertyPrice" class="form-control" >
                               </div>
                             </td>
                           </tr>
                           <tr>
                             <td style="width:20%; "><label style="margin-bottom: 10%;">Price :</label></td>
                             <td style="width: 40%;">
                               <div class="form-group">
                                 <input type="number" name="propertyPrice" class="form-control" >
                               </div>
                             </td>
                           </tr>
                           <tr>
                             <td style="width:20%; "><label style="margin-bottom: 10%;">Property Heading :</label></td>
                             <td style="width: 40%;">
                               <div class="form-group">
                                 <input type="number" name="propertyPrice" class="form-control" >
                               </div>
                             </td>
                           </tr>
                           <tr>
                             <td style="width:20%; "><label style="margin-bottom: 10%;">Property Description :</label></td>
                             <td style="width: 40%;">
                               <textarea class="form-control"></textarea>
                             </td>
                           </tr>
                          </table>
                        
                      </div>
                      <div class="col-lg-3"></div>
                    </div>
                    </div>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Done!</button></li>
                    </ul>
                   </div>
                  <!--  <div id="menu5" class="tab-pane fade">
                    <h3>Menu 5</h3>
                    <p>Some content in menu 5.</p>
                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Done!</button></li>
                    </ul>
                   </div> -->
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
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#files").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">Remove image</span>" +
              "</span>").insertAfter("#files");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();
            });
            
            // Old code here
            /*$("<img></img>", {
              class: "imageThumb",
              src: e.target.result,
              title: file.name + " | Click to remove"
            }).insertAfter("#files").click(function(){$(this).remove();});*/
            
          });
          fileReader.readAsDataURL(f);
        }
      });
    } else {
      alert("Your browser doesn't support to File API")
    }
  });


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