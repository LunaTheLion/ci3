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
       
        <li ><a href="<?php echo base_url('admin/mng_listing')?>"><i class="fa fa-th"></i> Manage Listings</li></a>
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
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12"> 
                
                    <?php
                      if(!empty($this->session->flashdata('title')))
                      {
                         echo form_open_multipart('property/update_project/'.$this->session->flashdata('id').'');
                      }
                      else
                      {
                         echo form_open_multipart('property/create_project');
                      }

                     ?>
                     <label for="turnover">Property Type</label><br>
                    <?php 
                        $type = $this->session->flashdata('property_type');
                     ?>
                     <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                       <input type="radio" name="propertyType" id="propertyType" value="Condo" <?php if($type === "Condo"){echo "checked";} ?>> Condo<br> 
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                       <input type="radio" name="propertyType" id="propertyType" value="House and Lot" <?php if($type === "House and Lot"){echo "checked";} ?>>House and Lot<br>
                       </div>
                       
                       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                       <input type="radio" name="propertyType" id="propertyType" value="Lot" <?php if($type === "Lot"){echo "checked";} ?>> Lot<br>
                       </div>

                     </div>
                     <br>

                     <div class="form-group">
                     <label for="Twin Suite">Property Status</label><br>
                      <?php $status =  $this->session->flashdata('property_status') ?>

                       <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                         <input type="radio" name="propertyStatus" id="propertyStatus" value="Rent Only" <?php if($status === "Rent Only") {echo "checked";} ?> > Rent Only<br> 
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                         <input type="radio" name="propertyStatus" id="propertyStatus" value="Sale Only" <?php if($status === "Sale Only"){echo "checked";} ?>> Sale Only <br>
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                         <input type="radio" name="propertyStatus" id="propertyStatus" value="Rent and Sale" <?php if($status === "Rent and Sale"){echo "checked";} ?>> Rent and Sale <br>   
                         
                         </div>
                      
                       </div>
                       
                     </div>
                    <div class="form-group">
                    <label for="projectTitle">Property Title</label>
                    <input type="text" class="form-control" id="projectTitle" name="projectTitle" placeholder="Enter Project Title" required value="<?php 
                      if(!empty($this->session->flashdata('title')))
                      {
                        echo $this->session->flashdata('title');
                      }
                      else
                      {
                        echo "";
                      }
                     ?>">
                    </div>
                    
                    <div class="form-group" id="propertyBuilding">
                    <label for="projectBuilding">Property Building</label>
                    <input type="text" class="form-control" name="projectBuilding" id="projectBuilding" placeholder="Property Building"  value="<?php 
                      if(!empty($this->session->flashdata('building')))
                      {
                        echo $this->session->flashdata('building');
                      }
                      else
                      {
                        echo "";
                      }
                     ?>">
                   
                    </div>
                    <div class="form-group">
                    <label for="projectAddress">Property Address</label>
                    <input type="text" class="form-control" id="projectAddress" name="projectAddress" placeholder="Enter Project Address" required value="<?php 
                      if(!empty($this->session->flashdata('address')))
                      {
                        echo $this->session->flashdata('address');
                      }
                      else
                      {
                        echo "";
                      }
                     ?>">
                    </div>

                    <div class="form-group">
                      <label for="projectPrice">Property Price</label>
                      <input type="text" class="form-control" id="projectPrice" name="projectPrice" placeholder="Enter Project Price" required value="<?php 
                      if(!empty($this->session->flashdata('price')))
                      {
                        echo $this->session->flashdata('price');
                      }
                      else
                      {
                        echo "";
                      }
                     ?>" >
                    </div>
                    <div class="form-group">
                      <label for="propertyLotArea">Lot Area (Sqm)</label>
                      <input type="number" class="form-control" id="propertyLotArea" name="propertyLotArea" placeholder="Lot Area"  value="<?php 
                      if(!empty($this->session->flashdata('lot_area')))
                      {
                        echo $this->session->flashdata('lot_area');
                      }
                      else
                      {
                        echo "";
                      }
                     ?>" >
                    </div>
                    <div class="form-group">
                      <label for="propertyFloorArea">Floor Area (Sqm)</label>
                      <input type="number" class="form-control" id="propertyFloorArea" name="propertyFloorArea" placeholder="Floor Area" value="<?php 
                      if(!empty($this->session->flashdata('floor_area')))
                      {
                        echo $this->session->flashdata('floor_area');
                      }
                      else
                      {
                        echo "";
                      }
                     ?>" >
                    </div>
                
           
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label for="propertyBed">Bedroom</label>
                  <input type="number" class="form-control" name="propertyBed" id="propertyBed" required placeholder="Bedroom Count" value="<?php 
                     if(!empty($this->session->flashdata('bed')))
                     {
                       echo $this->session->flashdata('bed');
                     }
                     else
                     {
                       echo "0";
                     }
                    ?>"
                   
                </div>
                <div class="form-group">
                  <label for="propertyBath">Bathroom</label>
                  <input type="number" class="form-control" name="propertyBath" id="propertyBath" required placeholder="Bathroom Count" value="<?php 
                  if(!empty($this->session->flashdata('bath')))
                  {
                    echo $this->session->flashdata('bath');
                  }
                  else
                  {
                    echo "0";
                  }
                   ?>">
                </div>
                <div class="form-group">
                  <label for="propertyParking">Parking</label>
                  <input type="number" class="form-control" name="propertyParking" id="propertyParking" required placeholder="Parking Count" value="<?php 
                  if(!empty($this->session->flashdata('parking')))
                  {
                    echo $this->session->flashdata('parking');
                  }
                  else
                  {
                    echo "0";
                  }
                   ?>">
                </div>
                <label>Others</label>
               <div class="row">
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">  
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
                 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                 <input type="checkbox" name="propertyGarden" id="propertyGarden" value="1" checked="<?php 
                 if($this->session->flashdata('garden') == 1)
                 {
                   echo "checked";
                 }
                 
                  ?>">With Garden <br>            
                 </div>
               </div>
               <br>
                 <!--  <div class="form-group">
                    <label for="files">Upload Property Facade</label>
                    <input type="file" id="files" name="files[]" required  />
                  </div>           
                  <hr> -->
                  <label for="files">Upload Property Facade</label>
                  <input type='file' id="model" name="model[]" required>
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
                  
                      <p>&nbsp;</p> 
                  <hr>  
                  <div class="form-group">
                    <label for="imageUnit">Upload Amenities</label>
                    <input type="file" id="amenities" name="imageAmenities[]" multiple required />
                    <div id="amenitiesPreview">
                      <?php 
                        if(!empty($this->session->flashdata('title')))
                        {
                           
                              $dirname = "uploads/".$this->session->flashdata('title_slug')."/amenities";
                              $files = glob($dirname."*.*");
                              $dir_path =  "uploads/".$this->session->flashdata('title_slug')."/amenities";
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

                                  <img src="<?php echo base_url('uploads/'.$this->session->flashdata('title_slug')."/amenities/".$files[$i])?>" class="imageThumb">

                              <?php
                              }
                              }
                              }
                      
                        }
                       ?>
                    </div>
                   
                        <p>&nbsp;</p>
                  </div>
                </div>                   
              </div>
            </div>
               <form>
                <textarea class="textarea" name="propertyDescription" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php 
                          if(!empty($this->session->flashdata('details')))
                          {
                            echo $this->session->flashdata('details');
                          }
                          else
                          {
                            echo "";
                          }
                           ?></textarea>
              </form>
                    

              
            </div>
            <div class="box-footer">
                
             <input type="submit" name="button" value="
             <?php if(!empty($this->session->flashdata('title')))
              {
                echo "Update";
              }
              else
              {
                echo "Upload";
              }
              ?>" class="btn btn-info pull-right" />

             </form>
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