$(document).ready(function () {
    ///////// VALIDATION //////////////
    ///////////////////////////////////
    var question_temp_form_holder;
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

    $.validator.methods.survey_description = function( value, element ) {
        return this.optional( element ) || ("" !== value.trim())
    };

    $.validator.methods.multiple_choice_extra = function( value, element ) {
        return this.optional( element ) || ("" !== value.trim())
    };

    $.validator.addMethod("xrequire_from_group", $.validator.methods.require_from_group, 'You are required to have at least one of these choices.');

    saveSurveyName();
    questionManipulate();




    /////////// SURVEY CRUD //////////////
    //////////////////////////////////////

    function saveSurveyName() {
        $('.survey_container .survey_row_title_container').on('click','',function (event) {
            //Hide current survey editor if already opened
            $('.survey_container .survey_edit_actions').hide();

            //Hide error message if it is already opened
            var $sib = $(this).siblings('.survey_edit_actions');
            $sib.find('#survey-name-error').hide();

            $.ajax({
                method: 'get',
                url: $(this).data('route'),
                //dataType: 'json',
                success: function (response) {
                    console.log(response['survey_name']);
                    console.log(response['survey_desc']);

                    $sib.find('.survey-name').val(response['survey_name'])
                    $sib.find('.survey-description').val(response['survey_desc'])
                    $sib.show();
                },
            });

            //$(this).siblings('.survey_edit_actions').show();
        });

        $('.survey_container .btn_save').on('click',function () {
            var cur = $(this).closest('form').attr('id');

            check(cur);
            //alert(cur.attr('id'));
            //$('#'+cur).submit();

        })

        function check (test) {
            $('#'+test).validate({
                rules: {
                    'survey-name': {
                        required: true
                    },
                    'survey-description': {
                        required: false,
                        survey_description: true
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
                    'survey-name': 'Your survey needs a name.',
                    'survey-description': 'Please enter a valid description',

                },
                submitHandler: function (form) {
                    $.ajax({
                        method: $(form).attr('method'),
                        url: $(form).attr('action'),
                        //dataType: 'json',
                        data: $(form).serialize(),
                        success: function (response) {
                            console.log(response['questionOption']);
                            toastr.success("Survey saved.", null, opts)
                            $('.survey_title_wrapper h4').text(response['questionOption']);

                            $('.survey_container .survey_edit_actions').hide();
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                },
            });

        };


        $('.survey_edit_actions').on('click','.btn_cancel', function () {
            //$(this).closest('.survey_edit_actions')[0].reset();
            $(this).closest('.survey_container .survey_edit_actions').hide();

        });

    }


    function questionManipulate() {
        ///////BUTTON CLICK EVENTS
        $('.create_question').on('click',function () {

            if($('.question_editing').length>0 && $('.question_editing').css('display') !== 'none'){
                $('.alert-danger').show();
                return;
            }
            questionUICall($(this));

            //$('body').scrollTo('.question_editing');


        });

        //////////GET QUESTION UI RENDER///////////
        function questionUICall(element) {
            $.ajax({
                method: "GET",
                url: element.data('url'),
                dataType: "json",
                success: function(response){

                    var $position = element.closest('.btn-add-new-qs');
                    $position.before(response['question']);

                    //var jlist = $('#survey_container #survey-question-container #all_questions');

                    //var $list = $(jlist);

                    //var $current = jlist.find('.survey_row_question_active');

                   // $current.after(response['question']);

                    $('.selectpicker').selectpicker();

                    $(".selectpicker").selectpicker('refresh');


                    var $whereForm = $position.prev().find('form');
                    $whereForm.validate({
                        rules: {
                            'question': {
                                required: true
                            },
                        },
                        messages: {
                            'question': 'You must enter question text.',
                        },
                    });
                    // $('html, body').animate({
                    //     scrollTop: $whereForm.offset().top-60
                    // }, 400);
                    //$whereForm.focus();
                    // $('html, body').animate({
                    //     scrollTop: ($whereForm.first().offset().top-80)
                    // },100);
                    //fireReorder();
                }
            });
        }

////////// REORDERING QUESTIONS

        function fireReorder() {
            var jlist = $('#survey_container #survey-question-container #all_questions');

            var list = jlist[0];
            //alert(list !== 'undefined' && list!==null)

            if(list !== 'undefined' && list!==null)
            {

                new Slip(list);
                list.addEventListener('slip:beforeswipe', function(e) {
                    if (e.target.nodeName == 'INPUT' || /demo-no-swipe/.test(e.target.className)) {
                        e.preventDefault();
                    }
                },false);
                //
                // list.addEventListener('slip:swipe', function(e) {
                //     // e.target list item swiped
                //     if (thatWasSwipeToRemove) {
                //         // list will collapse over that element
                //         e.target.parentNode.removeChild(e.target);
                //     } else {
                //         e.preventDefault(); // will animate back to original position
                //     }
                // });

                list.addEventListener('slip:beforereorder', function(e) {
                    // if (shouldNotReorder(e.target)) {
                    //     // if prevented element won't move vertically
                    //     e.preventDefault();
                    // }
                    if (/demo-no-reorder/.test(e.target.className)) {
                        e.preventDefault();
                    }
                },false);

                list.addEventListener('slip:beforewait', function(e) {
                    // if (isScrollingKnob(e.target)) {
                    //     // if prevented element will be dragged (instead of page scrolling)
                    //     e.preventDefault();
                    // }

                    if (e.target.className.indexOf('instant') > -1) {
                        e.preventDefault();
                    }
                },false);

                list.addEventListener('slip:reorder', function(e) {
                    // e.target list item reordered.
                    e.target.parentNode.insertBefore(e.target, e.detail.insertBefore);
                    return false;
                },false);



            }
        }


        /////////////////////BOOTSTRAP SELECT DETECTION
        $("body").on('change','.selectpicker', function () {
            var $this = $(this);
            var $option_selected = $this.children('option:selected');

            var option_selected_value = $option_selected.val();


            var $thisQuestionOptions = $option_selected.closest('.question-container').find('.qs_options');


            $.ajax({
                url: url_question_option,
                type: "GET",
                dataType: "json",
                data: {question_option: option_selected_value},
                success: function(response){
                    console.log(response['all']);
                    $thisQuestionOptions.empty();
                    //console.log(response['questionOption']);
                    $thisQuestionOptions.append(response['questionOption']);

                    //$this.closest('form').initValidation();
                    var form = $this.closest('form');

                    var rad = form.find('.radio_input_class');
                    var check = form.find('.checkbox_input_class');

                    if(rad.length>0){
                        rad.each(function() {
                            $( this ).rules( "add", {
                                xrequire_from_group: [1, '.radio_input_class'],
                            });
                        });
                    }

                    if(check.length>0){
                        check.each(function() {
                            $( this ).rules( "add", {
                                xrequire_from_group: [1, '.checkbox_input_class'],
                            });
                        });
                    }
                }
            });
            //alert($thisQuestionOptions.attr('id'));
        });



        ///////SAVE AND CANCEL BUTTON HANDLERS IN QUESTION SAVE FORM

        // function test() {
        //     $('#'+form).validate({
        //         rules: {
        //             'question': {
        //                 required: true
        //             },
        //             'radio_input[]': {
        //                 required: true
        //             },
        //             // 'checkbox_input[]': {
        //             //     required: true
        //             // },
        //
        //         },
        //         highlight: function (input) {
        //             $(input).parents('.form-line').addClass('error');
        //         },
        //         unhighlight: function (input) {
        //             $(input).parents('.form-line').removeClass('error');
        //         },
        //         errorPlacement: function (error, element) {
        //             $(element).parents('.form-group').append(error);
        //         },
        //         messages: {
        //
        //             'checkbox_input[]': 'You are required to have at least one choice.',
        //             'question': 'You must enter question text.',
        //
        //         },
        //         submitHandler: function (form) {
        //             $.ajax({
        //                 method: $(form).attr('method'),
        //                 url: $(form).attr('action'),
        //                 //dataType: 'json',
        //                 data: $(form).serialize(),
        //                 success: function (response) {
        //                     console.log('Question submitting');
        //                     toastr.success("Question saved.", null, opts)
        //                     //$('.survey_title_wrapper h4').text(response['questionOption']);
        //
        //                     //$('.survey_container .survey_edit_actions').hide();
        //                 }
        //             });
        //             return false; // required to block normal submit since you used ajax
        //         },
        //     });
        // }

        $('body').on('submit','.question_form_temp',function(e){
            var form = jQuery(e.target);
            e.preventDefault();
            $.ajax({
                method: $(form).attr('method'),
                url: $(form).attr('action'),
                //dataType: 'json',
                data: $(form).serialize(),
                success: function (response) {
                    form.closest('.question_editing').find('.option_error').remove();
                    console.log(response['question']);

                    var question_field = form.closest('.question_field')
                    //$(question_field).data('question-id','question-id-'+ response['question_id'])
                    //$(question_field).attr('id', 'question-field-'+response['question_id']);

                    question_field.closest('.questions_row').before(response['question']);
                    //var question_temp_form_holder = form.closest('.question_editing').detach();

                    question_field.closest('.questions_row').remove();

                    toastr.success("Question saved.", null, opts)
                    //$('.survey_title_wrapper h4').text(response['questionOption']);

                    //$('.survey_container .survey_edit_actions').hide();
                },
                error: function (data) {
                    form.closest('.question_editing').find('.option_error').remove();
                    var errors = data.responseJSON;
                    console.log(errors);
                    var begin ='<div class="option_error alert alert-danger"><ul>';
                    var li ='';
                    var end = '</ul></div>';
                    $.each(errors, function(i, item) {
                        li +='<li>'+item[0]+'</li>';
                    });

                    var messages = begin + li + end;
                    //console.log(messages);

                    $(messages).insertBefore(form);
                }
            });
        });


        $('body').on('click','.btn_cancel_question', function () {
            $(this).closest('.questions_row').remove();
        });


        /*
         *   -------------------------------------------------------
         *   EDITING QUESTIONS SECTION
         *   -------------------------------------------------------
         *
         *
         * */

        $('body').on('submit','.question_form',function(e){
            var form = jQuery(e.target);
            e.preventDefault();
            $.ajax({
                method: $(form).attr('method'),
                url: $(form).attr('action'),
                //dataType: 'json',
                data: $(form).serialize(),
                success: function (response) {
                    form.closest('.question_editing').find('.option_error').remove();
                    console.log(response['question']);

                    var question_field = form.closest('.question_field')
                    //$(question_field).data('question-id','question-id-'+ response['question_id'])
                    //$(question_field).attr('id', 'question-field-'+response['question_id']);

                    question_field.closest('.questions_row').before(response['question']);
                    //var question_temp_form_holder = form.closest('.question_editing').detach();

                    question_field.closest('.questions_row').remove();

                    toastr.success("Question saved.", null, opts)
                    //$('.survey_title_wrapper h4').text(response['questionOption']);

                    //$('.survey_container .survey_edit_actions').hide();
                },
                error: function (data) {
                    form.closest('.question_editing').find('.option_error').remove();
                    var errors = data.responseJSON;
                    console.log(errors);
                    var begin ='<div class="option_error alert alert-danger"><ul>';
                    var li ='';
                    var end = '</ul></div>';
                    $.each(errors, function(i, item) {
                        li +='<li>'+item[0]+'</li>';
                    });

                    var messages = begin + li + end;
                    //console.log(messages);

                    $(messages).insertBefore(form);
                }
            });
        });


        $("body").on('click','.field_edit',function(){


            //close other dialog windows
            $(this).closest('.questions_container').find('.question_editing').remove();


            var this_container = $(this).closest('.question_open');
           // alert(this_container);
            var link = location.href.split('edit');
            var section = $(this).closest('.section_page').attr('id');
            var question_edit_url = link[0]+'sections/'+section+'/questions/'+ this_container.data('question-id')+'/edit';
            $.ajax({
                method: 'GET',
                dataType: 'json',
                url: question_edit_url,
                success: function (response) {
                    //var temp = .find('.question_open');
                    $('#'+this_container.attr('id')).append(response['question_edit']);
                    $('.selectpicker').selectpicker();

                    $(".selectpicker").selectpicker('refresh');

                    var $whereForm = this_container.find('form');
                    $whereForm.validate({
                        rules: {
                            'question': {
                                required: true
                            },
                        },
                        messages: {
                            'question': 'You must enter question text.',
                        },
                    });

                    //console.log(response['question_edit']);
                    this_container.find('fieldset').hide();
                },
                error: function (errorData) {

                }
            });

        });

        $('body').on('click','.btn_cancel_question_edit',function () {
            $(this).closest('.question_open').find('.question_editing').prev().show();
            $(this).closest('.question_editing').remove();

        });


        $('body').on('click','.add_choice', function () {
            var prev = $(this).closest('.input-group').prev();
            var newInsert =  prev.clone(true);
            newInsert.find('input').val('');
            newInsert.insertAfter(prev);
        });

        $('body').on('click','.add_other', function () {

        });

    }


});