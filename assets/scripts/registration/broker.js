$('#proceed-button-2').prop('disabled', true);
$('#first-name-notifier').hide();
$('#last-name-notifier').hide();
$('#email-invalid').hide();
$('#birthday-notifier').hide();
$('#contact-notifier').hide();
$('#prc-notifier').hide();
$('#age-notifier').hide();
// Focus Out Events
$('#first_name').focusout(function(){
    if($('#first_name').val().length == 0){
        $('#first-name-notifier').show();
        $('#proceed-button-2').prop('disable',true);
    }else{
        $('#first-name-notifier').hide();
    }
    FilterProfile();
});
$('#last_name').focusout(function(){
    if($('#last_name').val().length == 0){
        $('#last-name-notifier').show();
        $('#proceed-button-2').prop('disable',true);
    }else{
        $('#last-name-notifier').hide();
    }   
    FilterProfile();
});
$('#birthday').focusout(function(){
    if(!IsDate($('#birthday').val())){
        $('#birthday-notifier').fadeIn();
    }else{
        $('#birthday-notifier').hide();
    }
    FilterProfile();
});
$('#contact').focusout(function(){
    if($('#contact').val().length == 0){
        $('#contact-notifier').fadeIn();
    }else{
        $('#contact-notifier').hide();
    }
    FilterProfile();
});
$('#prc').focusout(function(){
    if($('#prc').val().length == 0){
        $('#prc-notifier').fadeIn();
    }else{
        $('#prc-notifier').hide();
    }
    FilterProfile();
});
$('#prc').keyup(function(){
    if($('#prc').val().length>5){
        FilterProfile();
    }
});
function FilterProfile(){
    if($('#first_name').val().length==0){
        $('#proceed-button-2').prop('disabled', true);
        return;
    }else{
        $('#first-name-notifier').hide();
    }
    if($('#last_name').val().length==0){
        $('#proceed-button-2').prop('disabled', true);
        return;
    }else{
        $('#last-name-notifier').hide();
    }
    if($('#contact').val().length==0){
        $('#proceed-button-2').prop('disabled', true);
        return;
    }else{
        $('#contact-notifier').hide();
    }
    if(!IsDate($('#birthday').val())){
        $('#proceed-button-2').prop('disabled', true);
        return;
    }
    if($('#prc').val().length==0){
        $('#proceed-button-2').prop('disabled', true);
        return;
    }else{
        $('#prc-notifier').hide();
    }
    $('#proceed-button-2').prop('disabled', false);
}