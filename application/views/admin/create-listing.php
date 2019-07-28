  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Manage Listings
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       
        <li class="active"><i class="fa fa-th"></i> Manage Listings</li>
        <li class="active">Create Listings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
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
                     <label for="turnover">Property Type</label>
                     
                     <div class="row">
                       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                       <input type="checkbox" name="condo" id="condo" value="Twin Suite"> Condo<br> 
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                       <input type="checkbox" name="hnl" id="hnl" value="Queen Suite">House and Lot<br>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                       <input type="checkbox" name="que" id="que" value="Queen Suite"> Lot<br>
                       </div>
                     </div>
                     <br>
                     <div class="form-group">
                     <label for="Twin Suite">Property Status</label><br>
                       <!-- <input type="text" name="unitType" id="unitType" class="form-control" placeholder="Input Unit Types" required value="<?php 
                         if(!empty($this->session->flashdata('unit type')))
                         {
                           echo $this->session->flashdata('unit type');
                         }
                         else
                         {
                           echo "";
                         }
                        ?>">    --> 
                        <!-- input Group -->

                       <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                         <input type="checkbox" name="twin" id="twin" value="Twin Suite">Rent Only<br> 
                         <div class="card" style="box-shadow: 0px 0px 0px 0px ;display: none;" id="twin_info">
                           <input type="text" class="form-control" name="twin_size" placeholder="Size in SQM"><p></p>
                           <input type="text" class="form-control" name="twin_price" placeholder="Price">
                         </div>
                      
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                         <input type="checkbox" name="que" id="que" value="Queen Suite">Sale Only <br>
                         <div class="card" style="box-shadow: 0px 0px 0px 0px ;display: none;" id="que_info">
                           <input type="text" class="form-control" name="que_size" placeholder="Size in SQM"><p></p>
                           <input type="text" class="form-control" name="que_price" placeholder="Price">
                         </div>
                       
                         </div>
                         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                         <input type="checkbox" name="exe" id="exe" value="Executive Suite">Rent and Sale <br>   
                         <div class="card" style="box-shadow: 0px 0px 0px 0px ;display: none;" id="exe_info">
                           <input type="text" class="form-control" name="exe_size" placeholder="Size in SQM"><p></p>
                           <input type="text" class="form-control" name="exe_price" placeholder="Price">
                         </div>
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
                    <div class="form-group">
                    <label for="projectLocation">Property Location</label>
                     <input type="text" class="form-control" name="projectLocation" id="projectLocation" required placeholder="Property Location">
                    </div>
                    <div class="form-group" id="propertyBuilding">
                    <label for="projectBuilding">Property Building</label>
                    <input type="text" class="form-control" name="projectBuilding" id="projectBuilding" required placeholder="Property Building" >
                   
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
                    <label for="link">Enter the URL for youtube Video</label>
                    <input type="url" name="video" class="form-control" placeholder="Youtube Video URL here"  value="<?php 
                      if(!empty($this->session->flashdata('url')))
                      {
                        echo $this->session->flashdata('url');
                      }
                      else
                      {
                        echo "";
                      }
                     ?>">
                  </div>   
           
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <label for="propertyBed">Bedroom</label>
                  <input type="text" class="form-control" name="propertyBed" id="propertyBed" required placeholder="Bedroom Count">
                </div>
                <div class="form-group">
                  <label for="propertyBath">Bathroom</label>
                  <input type="text" class="form-control" name="propertyBath" id="propertyBath" required placeholder="Bathroom Count">
                </div>
                <div class="form-group">
                  <label for="propertyParking">Parking</label>
                  <input type="text" class="form-control" name="propertyParking" id="propertyParking" required placeholder="Parking Count">
                </div>
                  <div class="form-group">
                    <label for="files">Upload Property Facade</label>
                    <input type="file" id="files" name="files[]" multiple required  />
                  </div>           
                  <hr>   
                  <div class="form-group">
                    <label for="imageUnit">Upload Amenities</label>
                    <input type="file" id="imageAmenities" name="imageAmenities[]" multiple required />
                  </div>
                </div>                   
              </div>
              <form>
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </form>
            </div>
            <div class="box-footer">
                <!-- <button class="btn btn-info btn-flat pull-right" type="submit">Submit</button> -->
                <input type="submit" name="button" value="<?php 
                 if(!empty($this->session->userdata('title')))
                 {
                   echo "Submit Changes";
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

<script>
$(document).ready(function(){
 $('#programmer_form').on('submit', function(event){
  event.preventDefault();
  if($.trim($('#name').val()).length == 0)
  {
   alert("Please Enter Your Name");
   return false;
  }
  else if($.trim($('#landmark').val()).length == 0)
  {
   alert("Please Enter Atleast one Skill");
   return false;
  }
  else
  {
   var form_data = $(this).serialize();

   $('#submit').attr("disabled","disabled");
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    beforeSend:function(){
     $('#submit').val('Submitting...');
    },
    success:function(data){
     if(data != '')
     {
      $('#name').val('');
      $('#skill').tokenfield('setTokens',[]);
      $('#success_message').html(data);
      $('#submit').attr("disabled", false);
      $('#submit').val('Submit');
     }
    }
   });
   setInterval(function(){
    $('#success_message').html('');
   }, 5000);
  }
 });
 
});
</script>
 <script type="text/javascript">
 $(document).ready(function() {
    
  if(window.File && window.FileList && window.FileReader) 
  {

    $("#files").on("change",function(e) {
      var files = e.target.files ,
       filesLength = files.length ;
          for (var i = 0; i < filesLength ; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
            var file = e.target;
              $("<img></img>",{
                class : "imageThumb",
                src : e.target.result,
                title : file.name
                }).insertAfter("#files");
            });
            fileReader.readAsDataURL(f);
            }
          });

    $("#imageAmenities").on("change",function(e) {
      var files = e.target.files ,
       filesLength = files.length ;
          for (var i = 0; i < filesLength ; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
            var file = e.target;
              $("<img></img>",{
                class : "imageThumb",
                src : e.target.result,
                title : file.name
                }).insertAfter("#imageAmenities");
            });
            fileReader.readAsDataURL(f);
            }
          });
    } 
    else 
    { 
      alert("Your browser doesn't support to File API");
    }
    
    });
    
 </script>