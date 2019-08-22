  <!-- Content Wrapper. Contains page content -->

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


             <input type="file" name="file[]" id="file" required multiple>

             <button id="btn_upload">Upload Files</button>
          		<br>
          		<span id="uploaded_image"></span>
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


 <div class="modal fade" id="modal-default">
  
   <!-- /.modal-dialog -->
 </div>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script type="text/javascript">
	// var imageFileCollection = [];
	// $('#file').on('change', function(e){
	// 	//console.log(e.target.files);
	// 	var files = e.target.files;
	// 	$.each(files, function( i , file){
	// 		imageFileCollection.push(files);
	// 		console.log(imageFileCollection);
	// 	});
	// });


	


	// $(document).ready(function(){
	// 	$('#btn_upload').on('click',function(){
			
	// 		// var property = document.getElementById("file");
	// 		// var prop = property.files[0];
	
	// 		// var form_data = new FormData();
	// 		// // form_data.append("file", imageFileCollection[0]);
	// 		// form_data.append("file", prop);

	// 		var logoImg = document.getElementById("file");
	// 		var prop = logoImg.files[0];
	// 		var formData = new FormData();
	// 		formData.append('file', prop);
	// 		var objArr = [];

	// 		objArr.push({"id":'1', "name":'hellona'});

	// 		//JSON obj
	// 		formData.append('objArr', JSON.stringify( objArr ));

	// 		$.ajax({
	// 			url: "<?php echo base_url()?>Property/Ajax",
	// 			method: "POST",
	// 			data: formData,
	// 			contentType: false,
	// 			cache: false,
	// 			processData: false,
	// 			beforeSend: function(){
	// 				$('#uploaded_image').html("<label class='text-sucess'>Image Uploading ...</label>");
	// 			},
	// 			success: function(data)
	// 			{
	// 				$('#uploaded_image').html(data);
	// 			}
	// 		})
	// 	});
	
	// });
	$(document).ready(function(){
		$('#btn_upload').on('click',function(){
			
			var property = document.getElementById("file");
			var prop = property.files[0];
			var form_data = new FormData();
			for(var x = 0; x < prop.length ; x++)
			{
				form_data.append('file[]', prop[x]);
			}
			
			$.ajax({
				url: "<?php echo base_url()?>Property/Ajax",
				method: "POST",
				data: form_data,
				contentType: false,
				crossOrigini: false,
				cache: false,
				processData: false,
				beforeSend: function(){
					$('#uploaded_image').html("<label class='text-sucess'>Image Uploading ...</label>");
				},
				success: function(data)
				{
					$('#uploaded_image').html(data);
				}
			})
		});
	
	});


	// $(document).ready(function(){
	// 	$('#btn_upload').on('click',function(){
			
	// 		var property = document.getElementById("file");
	// 		var prop = property.files[0];
	
	// 		var form_data = new FormData();
	// 		// form_data.append("file", imageFileCollection[0]);
	// 		form_data.append("file", prop);
	// 		$.ajax({
	// 			url: "<?php echo base_url()?>Property/Ajax",
	// 			method: "POST",
	// 			data: form_data,
	// 			contentType: false,
	// 			cache: false,
	// 			processData: false,
	// 			beforeSend: function(){
	// 				$('#uploaded_image').html("<label class='text-sucess'>Image Uploading ...</label>");
	// 			},
	// 			success: function(data)
	// 			{
	// 				$('#uploaded_image').html(data);
	// 			}
	// 		})
	// 	});
	
	// });
</script>