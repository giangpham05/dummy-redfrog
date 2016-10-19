$(document).ready(function () {

    // $.ajax({
    //     url: url_theme,
    //     method: "GET",
    //     dataType: "json",
    //     data: {theme: 'theme-' + $this.data('theme'), _token: token, active:'active', id: this.id}
    //
    // }).done(function (response) {
    //     console.log(response['message']);
    //
    // });

    var jlist = $('#survey_container #survey-question-container #all_questions');


    $('#create_question').on('click',function () {
        $.ajax({
            method: "GET",
            url: url_question,
            dataType: "json",
            success: function(response){
                jlist = $('#survey_container #survey-question-container #all_questions');

                //var $list = $(jlist);

                var $current = jlist.find('.survey_row_question_active');
                //var $current = $(jlist,'.survey_row_question_active');

                //alert($current.attr('id'));
                //alert($current.length);
                $current.after(response['question']);

                $('.selectpicker').selectpicker();

                $(".selectpicker").selectpicker('refresh');
                //$('.selectpicker').trigger('change');

                //var divs = document.getElementsByClassName('question-container');


                //jlist.append(response['question']);
               // jlist.children().removeClass('survey_row_question_active');

                //jlist.children().last().addClass('survey_row_question_active');
               // $active_question.addClass('survey_row_question_active');

                // var divs = jlist[0];
                // for (var i = 0, len = divs.length; i < len; i++){
                //     divs[i].setAttribute('tabindex', '0');
                // }



                jlist.find('.survey_row_question').removeClass('survey_row_question_active');
                jlist.find('.survey_row_question').last().addClass('survey_row_question_active');
                jlist.find('.survey_row_question').show();
                //survey_row_question
                fireReorder();
            }
        });

    });



    // changeFocus.on('click',function() {
    //
    // });



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
                $thisQuestionOptions.empty();
                //console.log(response['questionOption']);
                $thisQuestionOptions.append(response['questionOption']);

            }
        });
        //alert($thisQuestionOptions.attr('id'));
    });


    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        $('#sidebar').css( "top", scrollTop + 100 );
    });

});