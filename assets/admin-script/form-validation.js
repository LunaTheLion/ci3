
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
      var mod =property_code;
      if( mod == "" && amenities == "")
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
        $('#step4').on('click',function()
        {
            $('#errorfile').hide();
            $('#errorprice').hide();
            $('#errortitle').hide();
            $('#errordescription').hide();
          var property_model = $('#files').val();
          var property_price = $('input[name=propertyPrice]').val();
          var property_title = $('input[name=propertyTitle]').val();
          var property_description = $('textarea[name=propertyDescription]').val();
          var num = '';
          var mod = property_code;
            if(mod == "" && property_model == "")
            {
              
              $('#errorfile').show();
              $('#errorfile #errorspan').text('Photos are required');
              $('input[name=file]').focus();
              num +='1';
            }
            else
            {
              //ammend current files to facade
            }

               if (property_price == "")
              {
                $('#errorprice').show();
                $('#errorprice #errorspan').text('Price is required');
                $('input[name=propertyPrice]').focus();
                 num +='1';
              }
                if ( property_title == "")
              {
                $('#errortitle').show();
                $('#errortitle #errorspan').text('Property Heading is required');
                $('input[name=propertyTitle]').focus();
                num +='1';
               }
               if ( property_description == "")
              {
                $('#errordescription').show();
                $('#errordescription #errorspan').text('Property Decription is required');
                $('textarea[name=propertyDescription]').focus();
                num +='1';
                }

      if(num == '')
      {
        $('#menu4').removeClass('active in');
        $('#menu5').addClass('active in');
        $('#4').removeClass('btn-info');
        $('#4').addClass('btn-default');
        $('#5').removeClass('btn-default');
        $('#5').addClass('btn-info');

      }
   
       
      });

      $('#done').on('click',function(){
        //check if address has input
        var propaddress = $('#propertyAddress').val();

        var bath = $('#propertyBath').val();
        var floor = $('#propertyFloorArea').val();
        var amenities = $('#amenities').val();
        var property_model = $('#files').val();
        var property_price = $('input[name=propertyPrice]').val();
        var property_title = $('input[name=propertyTitle]').val();
        var property_description = $('textarea[name=propertyDescription]').val();
        var int = '';
        var error = '';
        var mod = property_code;
        //Validate all this input field.



        if( mod == "" && amenities == "")
        {
          $('#erroramenity').show();
          $('#erroramenity #errorspan').text('Photos are required');
        }

        if( mod == "" && property_model == "")
        {
          int += '1';
          error +='No Property Facade \n';
        }

        if( propaddress == "")
        {
          int += '1';
          error +='No Address \n';
        }


        if( bath == "")
        {
          int += '1';
          error +='No Bathroom Count \n';
        }

        if( floor == "")
        {
          int += '1';
          error +='No Floor Area \n';
        }

        if( property_price == "")
        {
          int += '1';
          error +='No Property Price \n';
        }

        if( property_title == "")
        {
          int += '1';
          error +='No Property Title \n';
        }


        if( property_description == "")
        {
          int += '1';
          error +='No Property Description \n';
        }

        

        if(int == '')
        {
          //alert("Done");

          var form_data = new FormData();
          
          // var files_image = $('#amenities')[0].files;
          // for(var x=0; x<files_image.length ; x++)
          // {
          //   form_data.append('amenities[]', files_image[x]);
          // }

          var photos = fileshit;
          console.log("Files length is " + photos.length);
          for(var i=0;i<photos.length;i++)
          {
             if(photos[i]!="")
              {
                form_data.append('amenities[]',photos[i]);
              }
          }

          var facade_image = $('#files')[0].files;
          for(var x=0; x<facade_image.length ; x++)
          {
            if(facade_image[i] != "")
            {
              form_data.append('facade[]', facade_image[x]);  
            }
            
          }

          
          
          form_data.append("property_code" , $('input[name=propertyCode]').val());
          form_data.append("property_type" , $('select[name=propertyType]').val());
          form_data.append("property_category" , $('select[name=propertyCategory]').val());
          form_data.append("property_address" , $('input[name=propertyAddress]').val());
          form_data.append("property_building" , $('input[name=propertyBuilding]').val());
          form_data.append("property_bed" , $('input[name=propertyBed]').val());
          form_data.append("property_bath" , $('input[name=propertyBath]').val());
          form_data.append("property_parking" , $('input[name=propertyParking]').val());
          form_data.append("property_floor_area" , $('input[name=propertyFloorArea]').val());
          form_data.append("property_lot_area" , $('input[name=propertyLotArea]').val());
          form_data.append("property_pet" , $('input[name=propertyPet]').val());
          form_data.append("property_garden" , $('input[name=propertyGarden]').val());
          form_data.append("property_status" , $('select[name=propertyStatus]').val());
          form_data.append("property_price" , $('input[name=propertyPrice]').val());
          form_data.append("property_title" , $('input[name=propertyTitle]').val());
          form_data.append("property_additional_details" , $('textarea[name=propertyDescription]').val());

          $.ajax({
            data: form_data,
            type: 'POST',
            url: site_url+'property/ajax',// for adding new  property only
            crossOrigin: false,
            contentType: false,
            processData: false,
            beforeSend: function(data){
              
               $('#done').prop('disabled',true);
               $('#done').html('Uploading...');
            },
            success: function(data){
              console.log(data);

              $('#done').removeAttr('disabled');
              $('#done').html('Uploaded');
            },
            error: function(xhr, textStatus, error){
                  console.log(xhr.statusText);
                  console.log(textStatus);
                  console.log(error);
              }
          });
        }
        else
        {
          alert('Cannot Create Property due to the Following requirements:\n \n' + error);
        }

        event.preventDefault();

        });

// function SendPhotosToServer(){
//      console.log("Sending..");
//      var photos = fileshit;
//      console.log("Files length is " + photos.length);
//      for(var i=0;i<photos.length;i++){
//       if(photos[i]!=""){
//           console.log("Sending File: " + photos[i].name);
//           var formData = new FormData();  
//           formData.append('amenities',photos[i]);
//           formData.append('listing_id',listing_id);
//           $.ajax({
//               data:formData,
//               type:'POST',
//               datatype:'html',
//               processData:false,
//               contentType:false,
//               url: site_url + 'admin/',
//               success: function(data){
//                   console.log('Received: ' + data);
//               },
//               error: function(){
//                   $.dialog('An error has occurred while sending your ad to the server. Please check if you are connected to the internet and try again.');
//                   return;
//               }
//           });
//       }
//      }
     
//   }