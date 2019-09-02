function SendAdToServer(){
    var ad = new FormData();
    ad.append('adTitle',$('#adTitle').val());
    ad.append('adPrice',$('#adPrice').val());
    ad.append('adDescription',$('#adDescription').val());
    ad.append('adStatus',$('#adStatus').val());
    ad.append('adLocationDistrict',$('#adLocationDistrict').val());
    ad.append('adBarangay',$('#adBarangay').val());
    ad.append('adPropertyType',$('#adPropertyType').val());
    ad.append('adLotArea',$('#adLotArea').val());
    ad.append('adFloorArea',$('#adFloorArea').val());
    ad.append('adGarageParking',$('#adGarageParking').val());
    ad.append('adBedrooms',$('#adBedrooms').val());
    ad.append('adBathrooms',$('#adBathrooms').val());
    $.ajax({
        data:ad,
        type:'POST',
        datatype:'html',
        processData:false,
        contentType:false,
        url: site_url + 'account/post',
        success: function(data){
            if(data=="ad_creation_tampered"){
                $.dialog("WARNING: Document Model Tampering has been detected. Editing scripts, the document model or any other rules that is sent out by this server will get you banned. Please refresh the page and try again.", "Security Warning");
                return;
            }else{
                SendPhotosToServer(data);
                $.confirm({
                    title: 'Ad Successfully Posted!',
                    content: 'You have successfully posted your ad. Do you want to close this window and proceed to the listing page?',
                    buttons: {
                        submit: {
                            text: 'Go To Listing Page',
                            action: function(){
                                window.location = site_url;
                            }
                        },
                        cancel: {
                            text: 'Post Another',
                            action: function(){
                                window.location = site_url + "account/post";
                            }
                        }
                    }
                });
            }
        },
        error: function(){
            $.dialog('An error has occurred while sending your ad to the server. Please check if you are connected to the internet and try again.');
            return;
        }
    })
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
            url: site_url + 'gallery/receive',
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