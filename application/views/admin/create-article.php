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
          echo "Create Article";
        }
        ?>
        <small>advanced tables</small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard/'.$this->session->userdata('admin_username')) ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
       <li><a href="<?php echo base_url('admin/mng_articles')?>"><i class="fa fa-dashboard"></i> Manage Article</a></li>
        <li class="active"><?php if(!empty($this->session->flashdata('title')))
                {
                  echo "Edit ".$this->session->flashdata('title');
                }
                else
                {
                  echo "Create Article";
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
                  echo $this->session->flashdata('title');
                }
                else
                {
                  echo "Create Article";
                }
                ?> 

              </h3>
              
              <?php
                if(!empty($this->session->flashdata('title')))
                {
                  echo '<a href="javascript:;" id="delprop" class="btn btn-danger pull-right" data="'.$this->session->flashdata('id').'" ><i class="fa fa-trash"></i> Delete Article</a>';
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
                         echo form_open_multipart('admin/update_article/'.$this->session->flashdata('id').'');

                      }
                      else
                      {
                         echo form_open_multipart('admin/upload_article');
                      }

                     ?>
                     
                 
                    <div class="form-group">
                    <label for="articletitle">Article Title</label>
                    <input type="text" class="form-control" id="artciletitle" name="articletitle" placeholder="Enter Article Title" required value="<?php 
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
                    <label for="articlelink">Article Link</label>
                    <input type="url" class="form-control" name="articlelink" id="articlelink" placeholder="Upload Article Link"  value="<?php 
                      if(!empty($this->session->flashdata('title_link')))
                      {
                        echo $this->session->flashdata('title_link');
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
                    <label for="imageUnit">Upload Pictures</label>
                    <input type="file" id="amenities" name="imageAmenities[]" multiple required />
                    <div id="amenitiesPreview">
                      <?php 
                        if(!empty($this->session->flashdata('title')))
                        {
                           
                              $dirname = "uploads/article/".$this->session->flashdata('title_slug')."/amenities";
                              $files = glob($dirname."*.*");
                              $dir_path =  "uploads/article/".$this->session->flashdata('title_slug')."/amenities";
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
             
                <textarea class="textarea" name="articlebody" placeholder="Article Body"
                          style="width: 100%; height: 450px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php 
                          if(!empty($this->session->flashdata('title_body')))
                          {
                            echo $this->session->flashdata('title_body');
                          }
                          else
                          {
                            echo "";
                          }
                           ?></textarea>
             
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
        $('#modal-danger').find('.modal-title').text('Delete Article');
        $('#modal-danger').find('.modal-body').text('Are you sure you want to delete this article?');
        $('#deleteYes').click(function(){
          
            $.ajax({
              type:'ajax',
              method: 'get',
              async: false,
              url: '<?php echo base_url()?>Admin/delete_article',
              data:{id,id},
              dataType:'json',
              success: function(response)
              {
                console.log(id);
                if(response.success)
                {
                 $('#modal-danger').modal('hide');
                 
                  alert('success');  
                  window.location.reload();
                }
                else
                {
                   alert('Could not Hide the Article');
                   $('#modal-danger').modal('hide');
                }
              },
              error: function()
              {
                alert('Cannot Delete this Article');
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
      
 
          $('#amenities').on('change', function() {
              images(this, '#amenitiesPreview');
          });
              
              //clear the file list when image is clicked
          $('body').on('click','#amenitiesPreview',function(){
              $('#amenities').val("");
              $('#amenitiesPreview').html("");
      
          });

      });


    
 </script>