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