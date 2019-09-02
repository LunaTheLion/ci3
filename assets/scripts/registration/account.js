var chkemailav = new FormData();
var emailAvailable = false;
var passwordOk = false;
var passwordFocusedOut = false;
var cPasswordFocusedOut = false;
var passwordMatch = false;
var email_address = document.getElementById('emailAddress');
$('#email-available').hide();
$('#email-unavailable').hide();
$('#password-okay').hide();
$('#cpassword-okay').hide();
$('#password-length').hide();
$('#password-mismatch').hide();
$('#cpassword-section').hide();
$('#proceed-button-2').prop('disabled', true);
function CheckEmailAvailability(){
    chkemailav.append('emailAddress',email_address.value);
    $.ajax({
        url: site_url + '/accounts/emailmatch',
        data:chkemailav,
        datatype: 'html',
        type: 'POST',
        processData:false,
        contentType:false,
        success: function(data){
            if(data=="email_available"){
                emailAvailable = true;
                $('#email-available').fadeIn();
                $('#email-unavailable').hide();
                $('#email-format').hide();         
            }else if(data=="email_unavailable"){
                emailAvailable = false;
                $('#email-unavailable').fadeIn();
                $('#email-available').hide();
                $('#email-format').hide();
            }else if(data=="invalid_email_format"){
                emailAvailable = false;
                $('#email-unavailable').hide();
                $('#email-available').hide();
                $('#email-format').fadeIn();
            }
        }       
    });
}
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

$('#emailAddress').focusout(function(){
    ValidateEmailAddress();
});
$('#emailAddress').keyup(function(){
    ValidateEmailAddress();
});
function ValidateEmailAddress(){
    if($('#emailAddress').val().length>=6){
        if(!isEmail($('#emailAddress').val())){
            $('#email-available').hide();
            $('#email-unavailable').hide();
            $('#email-format').fadeIn();
            emailAvailable = false;
            CheckForm();
        }else{
            CheckEmailAvailability();
            CheckForm();
        }
    }else{
        $('#email-format').fadeIn();
        $('#email-unavailable').hide();
        emailAvailable = false;
        CheckForm();
    }
}
$('#password').keyup(function(){
    ValidatePassword();
});
$('#password').focusout(function(){
    passwordFocusedOut = true;
    if($('#password').val().length < 6){
        $('#password-length').fadeIn();
        $('#password-mismatch').hide();
        $('#password-okay').hide();
        $('#cpassword-section').hide();
        document.getElementById('cpassword').value = "";
        $("#password-mismatch").hide();
    }
    CheckForm();
});
function ValidatePassword(){
    if($('#password').val()==""){
        $('#cpassword-section').hide();
        passwordMatch = false;
    }
    if($('#password').val().length >= 6){
        $('#password-length').hide();
        $('#password-okay').fadeIn();
        $('#cpassword-section').fadeIn();
        passwordOk = true;
    }else{
        if(passwordFocusedOut){
            $('#password-length').fadeIn();
            $('#password-okay').hide();
            $('#cpassword-section').hide();
            passwordMatch = false;
        }
        $('#password-okay').hide();
        passwordOk = false;
    }
    ValidateCPassword();
    CheckForm();
}
function ValidateCPassword(){
    if($('#password').val()==$('#cpassword').val()){
        $("#password-mismatch").hide();
        $('#cpassword-okay').fadeIn();
        //$('#proceed-button').prop('disabled', true);
        passwordMatch= true;
    }else{
        if($('#password').val()==""){
            $('#cpassword-section').hide();
            passwordMatch= false;
            return;
        }
        $("#password-mismatch").fadeIn();
        $('#cpassword-okay').hide();
        passwordMatch= false;
    }
    CheckForm();
}
$('#cpassword').keyup(function(){
    if(cPasswordFocusedOut){
        ValidateCPassword();
    }else{
        window.setInterval(ValidateCPassword(),2000);
    }
});
$('#cpassword').focusout(function(){
    cPasswordFocusedOut = true;
    ValidateCPassword();
});

function CheckForm(){
    if(passwordMatch && passwordOk && emailAvailable){
        $('#proceed-button-2').prop('disabled', false);
    }else{
        $('#proceed-button-2').prop('disabled', true);
    }
}