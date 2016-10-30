$(document).ready(function () {
//            $('#addNewClient').click(function () {
//                alert();
//            })
    $.validator.methods.client_uuid = function( value, element,regexp ) {
        var rigex = new RegExp(regexp);
        return (rigex.test(value))
    };

    // $('#btnAddClient').click(function () {
    //
    // });


    $('#addNewClientForm').validate({
        rules: {
            'clientUuid': {
                required: true,
                client_uuid: "[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f‌​]{4}-[0-9a-f]{12}$"
            },

        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        messages: {
            'clientUuid': 'Please enter a valid uuid.',

        },
        submitHandler: function (form) {
            $('#myModalForm').modal('hide');
            $.ajax({
                method: $(form).attr('method'),
                url: $(form).attr('action'),
                //dataType: 'json',
                data: $(form).serialize(),
                success: function (response) {

                },
                error: function (data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                    var begin ='<div class="option_error alert alert-danger"><ul>';
                    var li ='';
                    var end = '</ul></div>';
                    $.each(errors, function(i, item) {
                        li +='<li>'+item[0]+'</li>';
                    });

                    var messages = begin + li + end;
                }
            });
            return false; // required to block normal submit since you used ajax
        },
    });

});