
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/post.css">

<script>var site_url = '<?=site_url()?>'</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php if(!empty($this->session->flashdata('property_title')))
        {
          echo "Edit ".$this->session->flashdata('property_title');
        }
        else
        {
          echo "Create Property Listing";
        }
        ?>
      
      </h1>
      <a href="<?php echo base_url('Admin/ajax') ?>">Upload Images</a>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       
        <li class="active"><?php if(!empty($this->session->flashdata('property_title')))
                {
                  echo "Edit ".$this->session->flashdata('property_title');
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
  <!-- <a href="<?php echo base_url('admin/ajax') ?>">Ajax</a> -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="box box-info">

            <div class="box-header with-border">
              <!-- <?php
                if(!empty($this->session->flashdata('title')))
                {
                   echo form_open_multipart('property/update_project/'.$this->session->flashdata('id').'');
                }
                else
                {
                   echo form_open_multipart('property/create_project');
                }

               ?> -->

              <h3 class="box-title">
               <?php if(!empty($this->session->flashdata('property_title')))
                {
                  echo "Edit ".$this->session->flashdata('property_title');
                }
                else
                {
                  echo "Add Property";
                }
                ?> 

              </h3>
        
              <?php
                if(!empty($this->session->flashdata('property_code')))
                {
                  echo '<a href="javascript:;" id="delprop" class="btn btn-danger pull-right" data="'.$this->session->flashdata('property_id').'" ><i class="fa fa-trash"></i> Delete Property</a>';
                }
              ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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

              <div class="row">
              <div class="col-lg-12">
              
               <div class="process">
                <div class="process-row nav nav-tabs">
                 <div class="process-step">
                  <button id="1" type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-info fa-3x"></i></button>
                  <p><small>Fill<br />information</small></p>
                 </div>
                 <div class="process-step">
                  <button id="2" type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-file-text-o fa-3x"></i></button>
                  <p><small>Fill<br />description</small></p>
                 </div>
                 <div class="process-step">
                  <button id="3" type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x"></i></button>
                  <p><small>Upload<br />images</small></p>
                 </div>
                 <div class="process-step">
                  <button id="4" type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-cogs fa-3x"></i></button>
                  <p><small>Configure<br />display</small></p>
                 </div>
                 <div class="process-step">
                  <button id="5" type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-check fa-3x"></i></button>
                  <p><small>View<br />result</small></p>
                 </div>
                </div>
               </div>
               <div class="tab-content">

                   <!-- Step 1 ---------------------------------------------------------------------------------- -->


                <div id="menu1" class="tab-pane fade active in">
                 <div class="content">
                 <div class="row">
                   <div class="col-lg-3"></div>
                   <div class="col-lg-6">
                       <center><h3>Fill Information</h3></center>
                    <br>
                     
                       <table>
                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;">Property Type:</label></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                                 <select class="form-control" name="propertyType" id="propertyType" >
                                   <option value="Sale" <?php if(!empty($this->session->flashdata("property_code")))
                                    {
                                      if($this->session->flashdata("property_type") == 'Sale'){ echo "Selected";}
                                    }
                                    ?> >Sale</option>
                                   <option value="Rent"
                                   <?php if(!empty($this->session->flashdata("property_code")))
                                     {
                                       if($this->session->flashdata("property_type") == 'Rent'){ echo "Selected";}
                                     }
                                     ?> >Rent</option>
                                 </select>
                               </div>
                           </td>
                         </tr>
                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;">Property Code:</label></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                               <input type="text" readonly name="propertyCode" Class="form-control" value="<?php
                                    if(!empty($this->session->flashdata{'property_code'}))
                                    {
                                      echo $this->session->flashdata('property_code');
                                    }
                                    else
                                    {
                                      echo strtoupper($pass);
                                    }
                                    ?>">
                             </div>
                           </td>
                         </tr>

                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;">Property Category:</label></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                               <select class="form-control" name="propertyCategory" id="propertyCategory" >
                                 <option value="Condiminium" <?php if(!empty($this->session->flashdata("property_code")))
                                  {
                                    if($this->session->flashdata("property_category") == 'Condominium'){ echo "Selected";}
                                  }
                                  ?> >Condominium</option>
                                 <option value="House and Lot"
                                 <?php if(!empty($this->session->flashdata("property_code")))
                                   {
                                     if($this->session->flashdata("property_category") == 'House and Lot'){ echo "Selected";}
                                   }
                                   ?> >House and Lot</option>
                               </select>
                             </div>
                           </td>
                         </tr> 
                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;">Property Address:  </label> <small class="text-red"><b>*</b></small></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                              <input type="text" name="propertyAddress" id="propertyAddress" class="form-control" required value="<?php 
                                  if(!empty($this->session->flashdata('property_code')))
                                  {
                                    echo $this->session->flashdata('property_address');
                                  }
                                  else
                                  {
                                    echo '';
                                  }
                               ?>">
                              <div id="erroraddress" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                             </div>
                           </td>
                         </tr>

                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;">Property Building:</label></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                               <input type="text" name="propertyBuilding" id="propertyBuilding" class="form-control" value="<?php 
                                   if(!empty($this->session->flashdata('property_code')))
                                   {
                                     echo $this->session->flashdata('property_building');
                                   }
                                   else
                                   {
                                     echo '';
                                   }
                                ?>">
                             </div>
                           </td>
                         </tr>
                       </table>
                    
                   </div>
                   <div class="col-lg-3"></div>
                 </div>
                 </div>
                 <ul class="list-unstyled list-inline pull-right">
                  <li><button id="step1" type="button" class="btn btn-info" >Next <i class="fa fa-chevron-right"></i></button></li>
                 </ul>
                </div>

                     <!-- Step 2 ------------------------------------------------------------------------------- -->



                <div id="menu2" class="tab-pane fade">
                 <div class="content">
                 <div class="row">
                   <center><h3>Fill Description</h3></center>
                   <div class="col-lg-3"></div>
                   <div class="col-lg-6">
                       
                    <br>
                 
                       <table>
                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;">Bedroom Count:</label></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                              
                               <input type="number" name="propertyBed" id="propertyBed" class="form-control" value="<?php 
                                if(!empty($this->session->flashdata("property_code")))
                                {
                                  if($this->session->flashdata("property_bed") == '0')
                                  {
                                    echo "0";
                                  }
                                  else
                                  {
                                    echo $this->session->flashdata("property_bed");
                                  }
                                }
                               ?>">
                             </div>
                           </td>
                         </tr>

                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;"> Bathroom Count:</label> <small class="text-red"><b>*</b></small></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                               <input type="number" name="propertyBath" id="propertyBath" class="form-control" required value="<?php 
                                if(!empty($this->session->flashdata("property_code")))
                                {
                                  if($this->session->flashdata("property_bath") == '0' || empty($this->session->flashdata("property_bath")))
                                  {
                                    echo "0";
                                  }
                                  else
                                  {
                                    echo $this->session->flashdata("property_bath");
                                  }
                                }
                               ?>">
                               <div id="errorbath" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                             </div>
                           </td>
                         </tr>
                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;">Parking Count:</label></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                               <input type="number" name="propertyParking" id="propertyParking" class="form-control" value="<?php 
                                if(!empty($this->session->flashdata("property_code")))
                                {
                                  if($this->session->flashdata("property_parking") == '0' || empty($this->session->flashdata("property_parking")))
                                  {
                                    echo "0";
                                  }
                                  else
                                  {
                                    echo $this->session->flashdata("property_parking");
                                  }
                                }
                               ?>">
                             </div>
                           </td>
                         </tr>

                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;"> Floor Area:</label> <small class="text-red"><b>*</b></small></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                               <input type="number" name="propertyFloorArea" id="propertyFloorArea" class="form-control" required value="<?php 
                                if(!empty($this->session->flashdata("property_code")))
                                {
                                  if($this->session->flashdata("property_floor_area") == '0' || empty($this->session->flashdata("property_floor_area")))
                                  {
                                    echo "0";
                                  }
                                  else
                                  {
                                    echo $this->session->flashdata("property_floor_area");
                                  }
                                }
                               ?>"">
                               <div id="errorfloor" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                               
                             </div>
                           </td>
                         </tr>
                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;">Lot Area:</label></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                               <input type="number" name="propertyLotArea" id="propertyLotArea" class="form-control" value="<?php 
                                if(!empty($this->session->flashdata("property_code")))
                                {
                                  if($this->session->flashdata("property_lot_area") == '0' || empty($this->session->flashdata("property_lot_area")))
                                  {
                                    echo "0";
                                  }
                                  else
                                  {
                                    echo $this->session->flashdata("property_lot_area");
                                  }
                                }
                               ?>">
                             </div>
                           </td>
                         </tr>
                         <tr>
                           <td style="width:20%; "><label style="margin-bottom: 10%;"></label></td>
                           <td style="width: 40%;">
                             <div class="form-group">
                              <input type="checkbox" name="propertyPet" id="propertyPet" value="1" checked="<?php 
                              if(!empty($this->session->flashdata("property_code")))
                              {
                               if($this->session->flashdata("property_pet") == 1)
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
                               if($this->session->flashdata("property_garden") == 1)
                               {
                                 echo "checked";
                               }
                               
                                ?>">With Garden  
                             </div>
                           </td>
                         </tr>
                        
                       </table>
                       
                  
                   </div>
                   <div class="col-lg-3"></div>

                 </div>
                 
                 </div>
                 <ul class="list-unstyled list-inline pull-right">
                  <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                  <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                 </ul>
                </div>

                   <!-- Step 3 ----------------------------------------------------------------------------------- -->

                <div id="menu3" class="tab-pane fade">
                <div class="content">
                <div class="row">
                     <center><h3>Upload Images</h3></center>
                  <br>
                   <div class="rPhotoPreview">
                      <h6><text id="cuCounter">0</text> out of 10</h6>
                      <div class="alert alert-danger" id="fileToLarge" role="alert">
                          <b>File Too Large :(</b><br>
                          One or more file has been rejected by the server. Please only upload image files not larger than 2MB.
                      </div>
                      <div class="alert alert-warning" id="fileLimit" role="alert">
                          <b>File Upload Limit</b><br>
                          You can only upload up to 10 photos per ad. Please delete a photo if you want to replace some.
                      </div>
                      <small id="adPhotoGuide" class="form-text text-muted">You can upload up to 10 photo(s). To remove a photo, click the <i class='fa fa-trash-o'></i> 
                      logo. Click Reset if you want to remove all photos and start all over again.</small><br>
                      <div id="drop_file_zone">
                          <div id="drag_upload_file">
                          <center><h1><i class="fa fa-image"></i></h1></center>
                          <p><a href="javascript:OpenFileExplorer();" class="btn btn-primary"><i class='fa fa-upload'></i> Upload Photos</a></p>
                          <input type="file" id="selectfile" onchange="ReceiveFilesFromExplorer()" multiple>
                          <small id="adPhotoUploadHelper" class="form-text text-muted">Before uploading your photos for this ad, it is advised that you put them all in one folder first so you can select them all at once. You can skip this process and add photos later.</small><br>
                          </div>
                      </div> 
                      <div class="photos" id="photos_container">
                          <div class="btnAddPhoto">
                              <button class="ap btn-info" style="border: 2px solid #00c0ef;"  onclick="OpenFileExplorer()"><h3> <i class='fa fa-upload'></i></h3> <br>Add Photos</button>
                          </div>
                      </div> 
                           <!--  <button class="btn btn-success" id="proceed-button" onclick="SendPhotosToServer()">Post Ad <i class="fa fa-arrow-right"></i></button> -->
                      </div> 


                    <!--- <div class="container">
                      
                     

<center></center>
                       <label for="files">Upload the Amenities</label>
                    <input type="file" id="amenities" name="imageAmenities[]" multiple required />
                    <span id="amenitiesPreview" style="padding-right: 2%;">
                     <?php 
                       if(!empty($this->session->flashdata("property_code")))
                       {
                          
                             $dirname = "uploads/".$this->session->flashdata("property_code")."/amenities";
                             $files = glob($dirname."*.*");
                             $dir_path =  "uploads/".$this->session->flashdata("property_code")."/amenities";
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
                                 <span class="pip">
                                 <img class="imageThumb" src="<?php echo base_url('uploads/'.$this->session->flashdata("property_code")."/amenities/".$files[$i])?>" />
                                 <br/><span class="remove-img" data="<?php echo $files[$i];?>">Remove image</span></span>
                             <?php
                             } 
                             }
                             }
                       }
                      ?>
                   </span> 
                     </div>-->
                   
                   <div id="erroramenity" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                  <!-- <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                     
                  </div>
                  <div class="col-lg-3"></div> -->
                </div>
                </div>
                 <ul class="list-unstyled list-inline pull-right">
                  <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                  <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
                 </ul>
                </div>

                     <!-- Step 4 ------------------------------------------------------------------------------ -->

                <div id="menu4" class="tab-pane fade">
                <div class="content">
                <div class="row">
                   <center><h3>Configure Display</h3></center>
                  <div class="col-lg-8">
                   <br>   
                      
                      <table>
                       <tr>
                         <td style="width:20%; "><label style="margin-bottom: 10%;">Status :</label> <small class="text-red"><b>*</b></small></td>
                         <td style="width: 40%;">
                           <div class="form-group">
                             <select class="form-control" name="propertyStatus" id="propertyStatus" >
                               <option value="Active" <?php if(!empty($this->session->flashdata("property_code")))
                                {
                                  if($this->session->flashdata("property_status") == 'Active'){ echo "Selected";}
                                }
                                ?> >Active</option>
                               <option value="Rented"
                               <?php if(!empty($this->session->flashdata("property_code")))
                                 {
                                   if($this->session->flashdata("property_status") == 'Rented'){ echo "Selected";}
                                 }
                                 ?> >Rented</option>
                             </select>
                           </div>
                         </td>
                       </tr>
                       <tr>
                         <td style="width:20%; "><label style="margin-bottom: 10%;">Price :</label> <small class="text-red"><b>*</b></small></td>
                         <td style="width: 40%;">
                           <div class="form-group">
                             <input type="number" id="propertyPrice" name="propertyPrice" class="form-control" required value="<?php 
                               if(!empty($this->session->flashdata("property_code")))
                               {
                                 echo $this->session->flashdata("property_price");
                               }
                              ?>" >
                             <div id="errorPrice" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                           </div>
                         </td>
                       </tr>
                       <tr>
                         <td style="width:20%; "><label style="margin-bottom: 10%;">Property Heading :</label> <small class="text-red"><b>*</b></small></td>
                         <td style="width: 40%;">
                           <div class="form-group">
                             <input type="text" name="propertyTitle" class="form-control" required value="<?php 
                             if(!empty($this->session->flashdata("property_code")))
                             {
                               echo $this->session->flashdata("property_title");
                             }
                              ?>" >
                             <div id="errortitle" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                           </div>
                         </td>
                       </tr>
                       <tr>
                         <td style="width:20%; "><label style="margin-bottom: 10%;">Property Description :</label> <small class="text-red"><b>*</b></small></td>
                         <td style="width: 40%;">
                           <textarea class="form-control textarea" name="propertyDescription" style="height: 100px;" required><?php if(!empty($this->session->flashdata("property_code")))
                               {
                                 echo $this->session->flashdata("property_additional_details");
                               } ?>
                           </textarea>
                           <div id="errordescription" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                         </td>
                       </tr>
                      </table>
                    
                  </div>
                  <div class="col-lg-4">
                     <label for="file">Upload the display photo for the property</label>
                    <input type="file" id="files" name="fileToUpload" required />
                     <div id="modelPreview">
                       <?php 
                         if(!empty($this->session->flashdata("property_code")))
                         {
                           ?>
                            <!-- <img src="" class="imageThumbnail"/>  -->
                            <span class="pip">
                            <img class="imageThumbnail" src="<?php echo base_url('uploads/'.$this->session->flashdata("property_code")."/facade/".$this->session->flashdata("property_facade"))?>" />
                            <br/><span class="remove">Remove image</span></span>
                           <?php
                         }
                        ?>
                     </div>
                     <div id="errorfile" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                  </div>
                </div>
                </div>
                 <ul class="list-unstyled list-inline pull-right">
                  <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                  <li><button id="step4" type="button" class="btn btn-info">Next <i class="fa fa-chevron-right"></i></button></li>
                 </ul>
                </div>

                   <!-- Step 5 ---------------------------------------------------------------------------------- -->


                <div id="menu5" class="tab-pane fade">
                  <br><br>
                 <center><a href="#" class="btn btn-info">Preview Property</a></center>
                 <ul class="list-unstyled list-inline pull-right">
                  <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                  <li><button id="done" type="button" class="btn btn-success"><i class="fa fa-check"></i> Done!</button></li>
                 </ul>
                </div>
               </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
                <?php 
                echo "<pre>";
                print_r($this->session->flashdata());
                echo "</pre>";
                 ?>
             
            </div>
          </div>
        </div>
      </div>
        
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


</div>
<!-- ./wrapper -->

<!-- Image Upload -->

<style>
    .btnAddPhoto {
        position: relative;
        width:250px;
        height:150px; 
        margin:5px;
        float:left;
        text-align:center;
    }
    .ap {
        width:100%;
        height:100%;
        text-align:center;
    }
</style>
<script> var property_code = "<?php echo $this->session->flashdata('property_code') ?>"</script>
<script src="<?php echo base_url('assets/admin-script/upload_images.js') ?>"></script>
<script src="<?php echo base_url('assets/admin-script/form-process.js') ?>"></script>
<script src="<?php echo base_url('assets/admin-script/form-validation.js') ?>"></script>
<!-- other Functions -->


 <script type="text/javascript">
  $(document).ready(function() {
    $(".remove-img").click(function(){
      var file_name = $(this).attr('data');
      var property_code = '<?php echo $this->session->flashdata('property_code') ?>';
      alert("Are you your you want to remove "+ file_name + " ?" );
      $(this).parent(".pip").remove();
      $.ajax({
        data: {file_name:file_name, property_code: property_code },
        method: 'POST',
        url: '<?php echo base_url()?>property/remove_img',
        success: function(response){
          console.log(response);
            $(this).parent(".pip").remove();
       },
      });

    });

    $(".remove").click(function(){
    $(this).parent(".pip").remove();
    });

    function numberWithCommas(number) {
          var parts = number.toString().split(".");
          parts[0] = parts[0].replace(/\B(?=(\d{3})(?!\d))/g, ",");
          return parts.join(".");
      }
    $("input[name=propertyPrice]").each(function() {
      var num = $(this).text();
      var commaNum = numberWithCommas(num);
      $(this).text(commaNum);
    });



    if (window.File && window.FileList && window.FileReader) 
    {
      $("#files").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
              "<img class=\"imageThumbnail\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">Remove image</span>" +
              "</span>").insertAfter("#files");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();
            });
          
            
          });
          fileReader.readAsDataURL(f);
        }
      });
    } 
    else {
      alert("Your browser doesn't support to File API");
    };

    // if (window.File && window.FileList && window.FileReader) {
    //   $("#amenities").on("change", function(e) {
    //     var files = e.target.files,
    //       filesLength = files.length;
    //     for (var i = 0; i < filesLength; i++) {
    //       var f = files[i]
    //       var fileReader = new FileReader();
    //       fileReader.onload = (function(e) {
    //         var file = e.target;
    //         $("<span class=\"pip\">" +
    //           "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
    //           "<br/><span class=\"remove\">Remove image</span>" +
    //           "</span>").insertAfter("#amenities");
    //         $(".remove").click(function(){
    //           $(this).parent(".pip").remove();
    //         });

    //       });
    //       fileReader.readAsDataURL(f);
    //     }
    //   });
    // } else {
    //   alert("Your browser doesn't support to File API");
    // };




  });


  $('document').ready(function() {
    $('#delprop').click(function(){
        var id = $(this).attr('data'); 
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

          
  });


    
 </script>