
 
  if( property_code == '')
  {
    $("#fileToLarge").hide();
    $("#fileLimit").hide();
    $(".btnAddPhoto").hide();
  }
  else
  {
    
    $("#drop_file_zone").hide();
    $("#fileToLarge").hide();
    $("#fileLimit").hide();
  }
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

  //for displaying the picture
  function CreateCanvas(id){
      var container = document.getElementById('photos_container');
      var image = document.createElement("div");
      var source = document.createElement("img");  
      var del = document.createElement("div");

      del.innerHTML = "<button class='btn btn-danger pull-right' title='Click this to remove this photo from your ad.' onclick='RemovePhoto("+(id)+")'><i class='fa fa-trash-o'></i></button>"
      del.className = "delete";
      del.id= "delbtn"+(id);
      
      image.className = "photoPreview";//div  class name
      image.id = 'img-'+(id); //div id
      
      source.id = "imgsrc" + (id); // image id
      source.src = site_url + 'assets/images/loading.gif';//temporary image source
      
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
                                                      //validate image
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
      }else{                                              //successful validation
      var source = CreateCanvas(fileshit.push(images.files[i])-1);//put the image to the Canvas
      var reader = new FileReader();  
      reader.onload = function(e) {
           source.src=e.target.result;//this is the image source


          //base_url + property_code + amenities folder
          //source.src= base_url+'/'+property_code+'/amenities/';//directory of the images.
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

  // function SendPhotosToServer(){
  //    console.log("Sending..");
  //    var photos = fileshit;
  //    console.log("Files length is " + photos.length);
  //    for(var i=0;i<photos.length;i++){
  //     if(photos[i]!=""){
  //         console.log("Sending File: " + photos[i].name);
  //         var formData = new FormData();  
  //         formData.append('amenities',photos[i]);
  //        // formData.append('listing_id',listing_id);
  //         $.ajax({
  //             data:formData,
  //             type:'POST',
  //             datatype:'html',
  //             processData:false,
  //             contentType:false,
  //             url: site_url + 'admin/',
  //             success: function(data){
  //                 console.log('Received: ' + data);
  //             },
  //             error: function(){
  //                 $.dialog('An error has occurred while sending your ad to the server. Please check if you are connected to the internet and try again.');
  //                 return;
  //             }
  //         });
  //     }
  //    }
     
  // }

  // function GetImagesFromFolder(property_code){
  //     var container = document.getElementById('photos_container');
  //     var image = document.createElement("div");
  //     var source = document.createElement("img");  
  //     var del = document.createElement("div");
  //     del.innerHTML = "<button class='btn btn-danger' title='Click this to remove this photo from your ad.' onclick='RemovePhoto("+(id)+")'><i class='fa fa-trash-o'></i></button>"
  //     del.className = "delete";
  //     del.id= "delbtn"+(id);
  //     image.className = "photoPreview";
  //     image.id = 'img-'+(id);
  //     source.id = "imgsrc" + (id);
  //     // source.src = site_url + 'assets/images/loading.gif';
  //     image.appendChild(source);
  //     container.appendChild(image);
  //     image.appendChild(del);
  //     console.log("Canvas for Image " + (id) + " has been successfully created.");
  //     c++;
  //     return source;
  // }

  //get the images from the directory using the propertycode
  //here's how 
  //1. prepare the display -> Create Canvas 
  //2. Render the images to the canvas


  //or createa a function that gets the image from the directory 