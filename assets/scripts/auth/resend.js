function ResendEmailVerification(){
    email = new FormData();
    email.append('emailAddress',$('#emailAddress').val());
    $.ajax({
        url: site_url + 'resendemailverification',
        data: email,
        type: 'POST',
        datatype: 'html',
        contentType: false,
        processData: false,
        success: function(data){
            if(data=="resend_success"){
                $.dialog('An authentication email has been resent successfully on your email. Please check your inbox.','Resent');
                return;
            }
            if(data=="resend_failed"){
                $.dialog('Failed to resend the authentication email. An account with that email is not found.','Resend Failed');
                return;      
            }
        },
        error: function(){
            $.dialog('An error occurred while trying to contact the server to resend an email. Please check your internet connection and try again.','Connection Error');
            return;
        }
    });
}