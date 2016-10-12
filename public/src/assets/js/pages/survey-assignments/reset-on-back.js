$('#resetlAll').click(function () {
    //clear radio checked in the dialog
    // $('.table-fixed-header input[type="radio"]').each(function()
    // {
    //     this.checked = false;
    // });
    // $('#clients-selected #clientFromDialog #radClientSelect').next().text('');
    //
    // //Set hidden field to empty
    // $('#clients-selected #clientSelectHidden').val('');
    // // $('#clients-selected #clientFromDialog').hide();
    // $('#form-validate-error').hide();
    reset();

})

$(window).bind("pageshow", function() {
    $('form').get(0).reset();
    //alert('window.onload alert');
    // $('#surveySelect input[type="text"]').prop('disabled', true);
    reset();
});

function reset() {
    $('#surveySelect input[type="text"]').prop('disabled', true);

    $('.table-fixed-header input[type="radio"]').each(function()
    {
        this.checked = false;
    });

    $('#clients-selected #clientSelect').text('');

    $('#clients-selected #clientFromDialog #radClientSelect').next().text('');

    //Set hidden field to empty
    $('#clients-selected #clientSelectHidden').val('');
    $('#clients-selected #clientFromDialog').hide();
    $('#form-validate-error').hide();
}