
function ClearAllSelection(){
    $('.photoPreview').remove();
    $("#drop_file_zone").fadeIn();
}
function ShowStep3(){
    if(!CheckAdTitle()){
        return;
    }
    if(!CheckAdPrice()){
        return;
    }
    ShowWindow('step_3');
}
function ShowStep4(){
    var value = $('#adPropertyType').val();
    if(value=="Lot Only"){
        if(!CheckLotArea()){
            return;
        }
    }
    if(value=="Condominium"){
        if(!CheckFloorArea()){
            return;
        }
    }
    if(value=="House and Lot"){
        if(!CheckLotArea()){
            return;
        }
        if(!CheckFloorArea()){
            return;
        }
    }
    ShowWindow('step_4');
}
function ChangeLocationDistrict(value){
    document.getElementById('rAdLocationDistrict').innerHTML = value;
    
}