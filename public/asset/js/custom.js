$(function () {
    $('#email').on('keypress', function () {
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
    var id = 1;
    var otherData = '<table id="lavel_table-1">' +
        '                                    <div id="a00_other_id" class="">' +
        '                                        <div class="field_wrapper add_top_20">' +
        '                                            <div>' +
        '                                                <input type="text" name="others[]" id = "other' + id + '" placeholder="Other Subject"' +
        '                                                    class="form-control"' +
        '                                                    style="position: relative;opacity: 1;cursor: revert;" />' +
        '                                                <p><b>Select level(s) you want to teach</b></p>' +
        '' +
        '                                                <table>' +
        '                                                    <tr>' +
        '                                                        <td>' +
        '                                                            <label class="container_check version_2"' +
        '                                                                style="border:unset!important;">Primary' +
        '                                                                <input type="checkbox" checked' +
        '                                                                    name="subject_level_other_' + id + '[]" value="1">' +
        '                                                                <span class="checkmark"></span>' +
        '                                                            </label>' +
        '                                                        </td>' +
        '                                                        <td>' +
        '                                                            <label class="container_check version_2"' +
        '                                                                style="border:unset!important;">Secondary' +
        '                                                                <input type="checkbox"' +
        '                                                                    name="subject_level_other_' + id + '[]" value="2">' +
        '                                                                <span class="checkmark"></span>' +
        '                                                            </label>' +
        '                                                        </td>' +
        '                                                    </tr>' +
        '                                                    <tr>' +
        '                                                        <td colspan="2">' +
        '                                                            <label class="container_check version_2"' +
        '                                                                style="border:unset!important;">Further Education' +
        '                                                                <input type="checkbox"' +
        '                                                                    name="subject_level_other_' + id + '[]" value="3">' +
        '                                                                <span class="checkmark"></span>' +
        '                                                            </label>' +
        '                                                        </td>' +
        '                                                    </tr>' +
        '                                                </table>' +
        '                                                <a href="#"' +
        '                                                    class="add_button mt-3 mb-2 d-flex justify-content-end"' +
        '                                                    title="Add field" data-id = "' + id + '"' +
        '                                                    style="color:black;text-decoration: underline;font-size: 15px">' +
        '                                                    ADD MORE' +
        '                                                </a>' +
        '                                                </a>' +
        '                                            </div>' +
        '                                        </div>' +
        '                                    </div>' +
        '                                </table>';



    //techer checkboxes
    $("#others").html(otherData);
    $("#others").hide();
    $("._regSubLP").on('click', '#other', function (e) {
        $("#others").toggle();
    });
    $("._regSubLP").on('click', '.add_button', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $("input[name='others[]']").each(function () {
            console.log("$.trim($(this).val())");
            console.log($.trim($(this).val()));
            if ($.trim($(this).val()) == "") {
                $(this).css('border', '1px solid red');
                $(this).css('color', 'red');
            } else {
                $(this).css('border', '1px solid #ced4da');
                $(this).css('color', 'black');
                id++;
                $("#others").append('<div id="table-responsive-'+id+'"><table id="lavel_table-'+id+'">' +
                    '                                    <div id="a00_other_id'+id+'" class="">' +
                    '                                        <div class="field_wrapper add_top_20">' +
                    '                                            <div>' +
                    '                                                <input type="text" name="others[]" id = "other' + id + '" placeholder="Other Subject"' +
                    '                                                    class="form-control"' +
                    '                                                    style="position: relative;opacity: 1;cursor: revert;" />' +
                    '                                                <p><b>Select level(s) you want to teach</b></p>' +
                    '' +
                    '                                                <table>' +
                    '                                                    <tr>' +
                    '                                                        <td>' +
                    '                                                            <label class="container_check version_2"' +
                    '                                                                style="border:unset!important;">Primary' +
                    '                                                                <input type="checkbox" checked' +
                    '                                                                    name="subject_level_other_' + id + '[]" value="1">' +
                    '                                                                <span class="checkmark"></span>' +
                    '                                                            </label>' +
                    '                                                        </td>' +
                    '                                                        <td>' +
                    '                                                            <label class="container_check version_2"' +
                    '                                                                style="border:unset!important;">Secondary' +
                    '                                                                <input type="checkbox"' +
                    '                                                                    name="subject_level_other_' + id + '[]" value="2">' +
                    '                                                                <span class="checkmark"></span>' +
                    '                                                            </label>' +
                    '                                                        </td>' +
                    '                                                    </tr>' +
                    '                                                    <tr>' +
                    '                                                        <td colspan="2">' +
                    '                                                            <label class="container_check version_2"' +
                    '                                                                style="border:unset!important;">Further Education' +
                    '                                                                <input type="checkbox"' +
                    '                                                                    name="subject_level_other_' + id + '[]" value="3">' +
                    '                                                                <span class="checkmark"></span>' +
                    '                                                            </label>' +
                    '                                                        </td>' +
                    '                                                    </tr>' +
                    '                                                </table>' +
                    '                                                <a href="#"' +
                    '                                                    class="add_button mt-3 mb-2 d-flex justify-content-end"' +
                    '                                                    title="Add field" data-id = "' + id + '"' +
                    '                                                    style="color:black;text-decoration: underline;font-size: 15px">' +
                    '                                                    ADD MORE' +
                    '                                                </a>' +
                    '                                                <a href="#"' +
                    '                                                    class="remove_button mt-3 mb-2 d-flex justify-content-end"' +
                    '                                                    title="Remove field" data-id = "' + id + '"' +
                    '                                                    style="color:black;text-decoration: underline;font-size: 15px">' +
                    '                                                    REMOVE' +
                    '                                            </div>' +
                    '                                        </div>' +
                    '                                    </div>' +
                    '                                </table></div>');
            }
        });
    });

    $("._regSubLP").on('click', '.remove_button', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        console.log('id');
        console.log(id);
        $('#table-responsive-'+id).remove();
        $('#a00_other_id'+id).remove();
        $('#lavel_table-'+id).remove();
    });
});
