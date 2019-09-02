$("#adTitleError").hide();
$("#adPriceError").hide();
$("#adLotAreaError").hide();
$("#adFloorAreaError").hide();
$("#adLotAreaSection").hide();
$("#removeOnCondo").hide();
$("#fileToLarge").hide();
$("#fileLimit").hide();
$(".btnAddPhoto").hide();
$('#adTitle').focusout(function(){
    CheckAdTitle();
});
$('#adPrice').focusout(function(){
    CheckAdPrice();
});
$('#adLotArea').focusout(function(){
    CheckLotArea();
});
$('#adFloorArea').focusout(function(){
    CheckFloorArea();
});
function CheckLotArea(){
    if($('#adLotArea').val()==""){
        $("#adLotAreaHelper").hide();
        $("#adLotAreaError").fadeIn();
        return false;
    }else{
        $("#adLotAreaHelper").fadeIn();
        $("#adLotAreaError").hide(); 
        return true;
    }
}
function CheckFloorArea(){
    if($('#adFloorArea').val()==""){
        $("#adFloorAreaHelper").hide();
        $("#adFloorAreaError").fadeIn();
        return false;
    }else{
        $("#adFloorAreaHelper").fadeIn();
        $("#adFloorAreaError").hide(); 
        return true;
    }
}
function CheckAdTitle(){
    if($('#adTitle').val()==""){
        $("#adTitleHelp").hide();
        $("#adTitleError").fadeIn();
        return false;
    }else{
        $("#adTitleHelp").fadeIn();
        $("#adTitleError").hide();
        document.getElementById('rAdTitle').innerHTML = $('#adTitle').val(); 
        return true;
    }
}
function CheckAdPrice(){
    if($('#adPrice').val()==""){
        $("#adPriceHelp").hide();
        $("#adPriceError").fadeIn();
        return false;
    }else{
        $("#adPriceHelp").fadeIn();
        $("#adPriceError").hide();
        document.getElementById('rAdPrice').innerHTML = $('#adPrice').val();
        return true;
    }
}
$('#adPrice').maskNumber({
    integer:true
});
$('#adGarageParking').maskNumber({
    integer:true,
    min: 0, 
    max: 999
});
$('#adLotArea').maskNumber({
    integer:true
});
$('#adFloorArea').maskNumber({
    integer:true
});
$('#adBedrooms').maskNumber({
    integer:true,
    min: 1, 
    max: 999
});
$('#adBathrooms').maskNumber({
    integer:true,
    min: 1, 
    max: 999
});
function FilterPropertyType(){  
    var value = $('#adPropertyType').val();
    if(value=="Condominium"){
        $("#adLotAreaSection").hide();
        $("#adFloorAreaSection").fadeIn();
        $("#features").fadeIn();
        $("#removeOnLotOnly").fadeIn();
        $("#removeOnCondo").hide();
    }
    else if(value=="Lot Only"){
        $("#adFloorAreaSection").hide();
        $("#removeOnLotOnly").hide();
        $("#adLotAreaSection").fadeIn();
        $("#features").hide();
        $("#removeOnCondo").fadeIn();
    }
    else{
        $("#features").fadeIn();
        $("#adLotAreaSection").fadeIn();
        $("#removeOnLotOnly").fadeIn();
        $("#removeOnCondo").fadeIn();
    }
    document.getElementById('rAdPropertyType').innerHTML = $('#adPropertyType').val();
}