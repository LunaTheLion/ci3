
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
        
              <?php
                if(!empty($this->session->flashdata('title')))
                {
                  echo '<a href="javascript:;" id="delprop" class="btn btn-danger pull-right" data="'.$this->session->flashdata('id').'" ><i class="fa fa-trash"></i> Delete Property</a>';
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

            <form method="POST" action="<?php echo base_url('admin/upload_images') ?>">
             <div class="row">
              <div class="col-lg-12">
                <div class="process">
                   <div class="process-row nav nav-tabs">
                   <div class="process-step">
                     <button type="submit" class="btn btn-default btn-circle"><i class="fa fa-info fa-3x"></i></button>
                     <p><small>Fill<br />information</small></p>
                    </div>
                    <div class="process-step">
                     <button type="submit" class="btn btn-info btn-circle"><i class="fa fa-file-text-o fa-3x"></i></button>
                     <p><small>Fill<br />description</small></p>
                    </div>
                    <div class="process-step">
                     <button type="submit" class="btn btn-default btn-circle"><i class="fa fa-image fa-3x"></i></button>
                     <p><small>Upload<br />images</small></p>
                    </div>
                    <div class="process-step">
                     <button type="submit" class="btn btn-default btn-circle"><i class="fa fa-cogs fa-3x"></i></button>
                     <p><small>Configure<br />display</small></p>
                    </div>
                   <!--  <div class="process-step">
                     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-check fa-3x"></i></button>
                     <p><small>Preview<br />result</small></p>
                    </div> -->
                   </div>
                </div>
                <div class="tab-content">


                   <!-- Step 2 ----------------------------------------------------------------------------------------------- -->

                   <div id="menu2" class="tab-pane fade active in">

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
                                  <input type="number" name="propertyBed" id="propertyBed" class="form-control" >
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;"> Bathroom Count:</label> <small class="text-red"><b>*</b></small></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertyBath" id="propertyBath" class="form-control" required >
                                  <div id="errorbath" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Parking Count:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertyParking" id="propertyParking" class="form-control">
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;"> Floor Area:</label> <small class="text-red"><b>*</b></small></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertyFloorArea" id="propertyFloorArea" class="form-control" required>
                                  <div id="errorfloor" type="hidden"><center><span id="errorspan" class="text-red"></span></center></div>
                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:20%; "><label style="margin-bottom: 10%;">Lot Area:</label></td>
                              <td style="width: 40%;">
                                <div class="form-group">
                                  <input type="number" name="propertyLotArea" id="propertyLotArea" class="form-control">
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
                          
                     
                      </div>
                      <div class="col-lg-3"></div>

                    </div>
                    
                    </div>

                    <ul class="list-unstyled list-inline pull-right">
                     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
                     <li><button type="submit" class="btn btn-info ">Next <i class="fa fa-chevron-right"></i></button></li>
                    </ul>
                   </div>
                 </form>
                  </div>
              </div>
            </div>            
                
            </div>
            <div class="box-footer">
                <?php 
                echo "<pre>";
                print_r($this->session->userdata());
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


 <script type="text/javascript">
  $(document).ready(function() {

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


    $('#step1').on('click',function(){
      $('#erroraddress').hide();
      var propaddress = $('#propertyAddress').val();

      if( propaddress == "")
      {
       $('#erroraddress').show();
       $('#erroraddress #errorspan').text('Please put Address'); 
        $('#propertyAddress').focus();
      }
      else
      {
       $('#menu1').removeClass('active in');
       $('#menu2').addClass('active in');
       $('#1').removeClass('btn-info');
       $('#1').addClass('btn-default');
       $('#2').removeClass('btn-default');
       $('#2').addClass('btn-info');
      } 


    });

    $('#step2').on('click',function(){
      $('#errorbath').hide();
      $('#errorfloor').hide();
      var bath = $('#propertyBath').val();
      var floor = $('#propertyFloorArea').val();
      var num = '';

      if( bath == "")
      {
        $('#errorbath').show();
        $('#errorbath #errorspan').text('Please put Bathroom Count');
       num +='1';
      }
      else if( floor == "")
      {
        $('#errorfloor').show();
        $('#errorfloor #errorspan').text('Please put Floor Count Count');
        num +='1';
      }
      if(num == '')
      {
       $('#menu2').removeClass('active in');
       $('#menu3').addClass('active in');
       $('#2').removeClass('btn-info');
       $('#2').addClass('btn-default');
       $('#3').removeClass('btn-default');
       $('#3').addClass('btn-info');
      } 
    });


      $('#step3').on('click',function(){
        $('#erroramenity').hide();
      var amenities = $('#amenities').val();

      if( amenities == "")
      {
        $('#erroramenity').show();
        $('#erroramenity #errorspan').text('Photos are required');
      }
      else
      {

       $('#menu3').removeClass('active in');
       $('#menu4').addClass('active in');
       $('#3').removeClass('btn-info');
       $('#3').addClass('btn-default');
       $('#4').removeClass('btn-default');
       $('#4').addClass('btn-info');
     
      } 
    });

      $('#done').on('click',function(){
        $('#errorfile').hide();
        $('#errorprice').hide();
        $('#errortitle').hide();
        $('#errordescription').hide();
      var property_model = $('#files').val();
      var property_price = $('input[name=propertyPrice]').val();
      var property_title = $('input[name=propertyTitle]').val();
      var property_description = $('textarea[name=propertyDescription]').val();
      var num = '';

      if( property_model == "")
      {
       $('#errorfile').show();
       $('#errorfile #errorspan').text('Photos are required');
       $('input[name=file]').focus();
       num +='1';
      }
      else if (property_price == "")
      {
        $('#errorprice').show();
        $('#errorprice #errorspan').text('Price is required');
        $('input[name=propertyPrice]').focus();
        num +='1';
      }
      else if ( property_title == "")
      {
        $('#errortitle').show();
        $('#errortitle #errorspan').text('Property Heading is required');
        $('input[name=propertyTitle]').focus();
        num +='1';
      }
      else if ( property_description == "")
      {
        $('#errordescription').show();
        $('#errordescription #errorspan').text('Property Decription is required');
        $('textarea[name=propertyDescription]').focus();
        num +='1';
      }

     



      if(num == '')
      {
        // var data = new FormData();
        // jQuery.each(jQuery('#files')[0].files, function(i, file) {
        //     data.append('files-'+i, file);
        // });

        // var data1 = new FormData();
        // jQuery.each(jQuery('#imageAmenities')[0].files, function(i, file) {
        //     data.append('imageAmenities-'+i, file);
        // });

        // var files = $('#imageAmenities')[0].files;
        // var error ='';
        // var form_data = new FormData();
        // for (var count = 0 ; count < files.length; count++)
        // {
        //   var name =  files[count].name;
        //   var extension = name.split('.').pop().toLowerCase();
        //   if(jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1)
        //   {
        //     error += "Invalid " + count + " Image File";
        //   }
        //   else
        //   {
        //     form_data.append("imageAmenities[]",files[count]);

        //   }
        // }

         




        // var property_value = {
        //     'property_code' : $('input[name=propertyCode]').val(),
        //     'property_type' : $('select[name=propertyType]').val(),
        //     'property_address' : $('input[name=propertyAddress]').val(),
        //     'property_building' : $('input[name=propertyBuilding]').val(),
        //     'property_bed' : $('input[name=propertyBed]').val(),
        //     'property_bath' : $('input[name=propertyBath]').val(),
        //     'property_parking' : $('input[name=propertyParking]').val(),
        //     'property_floor_area' : $('input[name=propertyFloorArea]').val(),
        //     'property_lot_area' : $('input[name=propertyLotArea]').val(),
        //     'property_pet' : $('input[name=propertyPet]').val(),
        //     'property_garden' : $('input[name=propertyGarden]').val(),
        //     'property_status' : $('select[name=propertyStatus]').val(),
        //     'property_price' : $('input[name=propertyPrice]').val(),
        //     'property_title' : $('input[name=propertyTitle]').val(),
        //     'property_additional_details' : $('textarea[name=propertyDescription]').val(),


        //     // 'property_file' : $('file[name=files').val(),
        //     // 'imageAmenities[]' : $('file[name=imageAmenities').val(),

        //     // 'property_file' : $('file[name=files').val(),
        //     // 'imageAmenities[]' : $('file[name=imageAmenities').val(),
        // };




        var form_data = new FormData();
        var files_images =$('#files')[0].files;

        for( var x = 0 ; x < files_images.length; x++)
        {
          form_data.append('files[]', files_images[x]);
        }



        $.ajax({
          method: 'POST',
          url: '<?php base_url()?>/ci3/property/create_project',
          dataType: 'json',
          data: form_data,
        
          success: function(result)
          {
            // alert(result);
            // console.log(result);
          },
          error: function()
          {
            alert("Cannot Submit");
          },

        });
        event.preventDefault();
      }
   
    });







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
              "<img class=\"imageThumbnail\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
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
      alert("Your browser doesn't support to File API");
    };

    if (window.File && window.FileList && window.FileReader) {
      $("#amenities").on("change", function(e) {
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
              "</span>").insertAfter("#amenities");
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
      alert("Your browser doesn't support to File API");
    };




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
          // var images = function(input, imgPreview) {
      
          //     if (input.files) {
          //         var filesAmount = input.files.length;
      
          //         for (i = 0; i < filesAmount; i++) {
          //             var reader = new FileReader();
      
          //             reader.onload = function(event) {
          //                 $($.parseHTML("<img class='imageThumb'>")).attr('src', event.target.result).appendTo(imgPreview);
          //             }
          //             reader.readAsDataURL(input.files[i]);
          //         }
          //     }
      
          // };
      
          // $('#model').on('change', function() {
          //     images(this, '#modelPreview');
          // });
          // $('#amenities').on('change', function() {
          //     images(this, '#amenitiesPreview');
          // });
              
          //     //clear the file list when image is clicked
          // $('body').on('click','#amenitiesPreview',function(){
          //     $('#amenities').val("");
          //     $('#amenitiesPreview').html("");
      
          // });
          // $('body').on('click','#modelPreview',function(){
          //     $('#model').val("");
          //     $('#modelPreview').html("");
          
          // });
          
      });


    
 </script>