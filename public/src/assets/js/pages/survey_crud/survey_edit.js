$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    var opts = {
        "closeButton": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    /*
    *   SECTION DELETING
    * */

    $('#sections_controller').on('click','.dropdown .dropdown-menu a', function () {
        var section_page = $(this).closest('.section_page');

        var section_page_sib = section_page.next('.addNewSection_row');

        var sections_after_deleted;
        //alert(section_page.length);
        $.ajax({
            method: 'delete',
            url: $(this).data('route'),
            data:{_token: token},
            success: function (response) {
                console.log(response['test']);
                section_page_sib.remove();
                section_page.remove();

                sections_after_deleted = $('#sections_controller').find('.section_page');
                if(sections_after_deleted.length>0){
                    sections_after_deleted.each(function (index) {
                       $(this).find('h2').text('SECTION '+ (index+1)+ ' OUT OF '+ sections_after_deleted.length);
                    });
                }
                toastr.success("Section deleted.", null, opts);
                //$('body, html').animate({ scrollTop: $(page_controller).next().offset().top-80 }, 1000);

            },
            error: function () {

            }
        });
        //alert($(this).data('route'));
    });


    /*
     *   SURVEY DELETING/EDITING
     * */

    $('body').on('click', '.card .survey_controller_index .surveys-container .surveys-homescreen-list-item .row .header-dropdown .dropdown-menu a',function () {
        alert();

    });
});