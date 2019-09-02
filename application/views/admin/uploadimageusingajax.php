<link rel="stylesheet" href="<?=base_url()?>assets/css/post.css">

<script>var site_url = '<?=site_url()?>'</script>
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
            	      <button class="btn btn-success" id="proceed-button" onclick="SendPhotosToServer()">Post Ad <i class="fa fa-arrow-right"></i></button>
            	</div> 
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
s

 <div class="modal fade" id="modal-default">
  
   <!-- /.modal-dialog -->
 </div>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- <script src="<?=base_url()?>assets/scripts/ads/filters.js"></script> -->
<!-- <script src="<?=base_url()?>assets/scripts/ads/fileex.js"></script> -->
<!-- <script src="<?=base_url()?>assets/scripts/ads/post.js"></script> -->
<!-- <script src="<?=base_url()?>assets/scripts/ads/sender.js"></script> -->

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
<script type="text/javascript">
  $("#fileToLarge").hide();
  $("#fileLimit").hide();
  $(".btnAddPhoto").hide();

  var i=0;
  var c=0;
  var cu=0;
  var fileshit = [];
  var cuCounter = document.getElementById('cuCounter');
  function OpenFileExplorer() {
      document.getElementById('selectfile').click();
      document.getElementById('selectfile').onchange = function(e) {
      ReceiveFilesFromExplorer();};
  }
  function ReceiveFilesFromExplorer(){
      $("#drop_file_zone").hide();
      var images = document.getElementById('selectfile');
      if(images.files.length>10){
          $("#fileLimit").fadeIn();
          $("#drop_file_zone").fadeIn();
          images.value = "";
          return;
      }
      RenderImageToCanvas(images);
  }
  function CreateCanvas(id){
      var container = document.getElementById('photos_container');
      var image = document.createElement("div");
      var source = document.createElement("img");  
      var del = document.createElement("div");
      del.innerHTML = "<button class='btn btn-danger' title='Click this to remove this photo from your ad.' onclick='RemovePhoto("+(id)+")'><i class='fa fa-trash-o'></i></button>"
      del.className = "delete";
      del.id= "delbtn"+(id);
      image.className = "photoPreview";
      image.id = 'img-'+(id);
      source.id = "imgsrc" + (id);
      source.src = site_url + 'assets/images/loading.gif';
      image.appendChild(source);
      container.appendChild(image);
      image.appendChild(del);
      console.log("Canvas for Image " + (id) + " has been successfully created.");
      c++;
      return source;
  }
  function RemovePhoto(photo){
      var p = document.getElementById("photos_container");
      var c = document.getElementById("img-"+photo);
      p.removeChild(c); 
      cu--;
      cuCounter.innerHTML = cu;  
      fileshit[photo] = "";
      console.log("Removed image " + photo + " from the upload list. Remaining uploads: " + cu);
      if(cu==0){
          $("#drop_file_zone").fadeIn();
          document.getElementById('selectfile').value = "";
          fileshit = [];
          i=0;
          c=0;
          $("#fileToLarge").hide();
          $(".btnAddPhoto").hide();
          console.log("Input selection of images has been cleared. Canvas availability has been reset also.");
      }
      if(cu<10 && cu!=0){
          $(".btnAddPhoto").fadeIn();
          $("#fileLimit").hide();
      }
      console.log("Here is the new file database of current files to be uploaded:");
      console.log(fileshit);
  }
  function RenderImageToCanvas(images){
      console.log("Cursor value is " + i);
      if(images.files[i].size>=2000000){
          $("#fileToLarge").fadeIn();
          console.log("Failed to render image " + i + " as it is larger than 2MB.");
          i++;
          if(images.files[i]){
              console.log("Loading Image " + i + "...");
              RenderImageToCanvas(images);
          }else{
              i=0;
              console.log("All images has been successfully rendered on the canvas.");
              console.log("There are total of " + cu + " images uploaded.");
              console.log("Here is the new file database of current files to be uploaded:");
              console.log(fileshit);
              return;
          }
      }else{
      var source = CreateCanvas(fileshit.push(images.files[i])-1);
      var reader = new FileReader();  
      reader.onload = function(e) {
          source.src=e.target.result
          cu++;
          cuCounter.innerHTML = cu; 
          if(cu>=1 && cu<=9){
              $(".btnAddPhoto").fadeIn();
          }
          if(cu==10){
              $(".btnAddPhoto").hide();
              $("#fileLimit").fadeIn();
          }
          console.log("Image " + i + " has been successfully drawed on canvas " + i);
      }
      reader.onloadend = function(){
          i++;
          if(images.files[i]){
              console.log("Loading Image " + i + "...");  
              RenderImageToCanvas(images);
          }else{
              var f = document.getElementById('selectfile');
              f.value="";
              i=0;
              console.log("All images has been successfully rendered on the canvas.");
              console.log("There are total of " + cu + " images uploaded.");   
              console.log("Here is the new file database of current files to be uploaded:");
              console.log(fileshit);
          }
      }
      reader.readAsDataURL(images.files[i]);
      }
  }



  function SendPhotosToServer(){
     console.log("Sending..");
     var photos = fileshit;
     console.log("Files length is " + photos.length);
     for(var i=0;i<photos.length;i++){
      if(photos[i]!=""){
          console.log("Sending File: " + photos[i].name);
          var formData = new FormData();  
          formData.append('file',photos[i]);
         // formData.append('listing_id',listing_id);
          $.ajax({
              data:formData,
              type:'POST',
              datatype:'html',
              processData:false,
              contentType:false,
              url: site_url + 'admin/',
              success: function(data){
                  console.log('Received: ' + data);
              },
              error: function(){
                  $.dialog('An error has occurred while sending your ad to the server. Please check if you are connected to the internet and try again.');
                  return;
              }
          });
      }
     }
     
  }
</script>