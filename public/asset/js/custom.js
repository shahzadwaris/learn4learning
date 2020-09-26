$(function () {
    $('#email').on('blur', function () {
        var email = $('#email').val();
        $.ajax({
            url: "/register/check/" + email,
            method: "get",
            success: function (data) {
                if (data['found'] == 'y') {
                    $("#email").addClass('error');
                    $(".email-error").html('This email already exists');
                    $("#submit-button").attr('disabled', true);
                } else {
                    $("#email").removeClass('error');
                    $(".email-error").html('');
                    $("#submit-button").attr('disabled', false);
                }
            }
        });
    });
    $('#email').on('keyup', function () {
        $("#email").removeClass('error');
        $(".email-error").html('');
    });

});