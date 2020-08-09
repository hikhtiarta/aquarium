$('#emailPasswordIcon').click(function() {
    var icon = $('#emailPasswordIcon');
    if(icon.hasClass('fa-eye')) {
        icon.removeClass('fa-eye');
        icon.addClass('fa-eye-slash');
    }else{
        icon.addClass('fa-eye');
        icon.removeClass('fa-eye-slash');
    }       
    if($('#emailPassword').attr('type') == 'password'){
        $('#emailPassword').attr('type', 'text');
    }else{
        $('#emailPassword').attr('type', 'password');
    }
});