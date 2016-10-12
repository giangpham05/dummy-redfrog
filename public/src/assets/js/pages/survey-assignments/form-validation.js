function validate_form() {
    // var form = $('#form_validation');

    var pass = true;
    var surveysSelected = $('#surveySelect input[type="checkbox"]:checked');
    var beforeCheck = $('#surveySelect input[type="checkbox"]');

    var inputs = $('#surveySelect input[type="text"]');
    var list = [];

    //var input1 = $('#clients-selected #clientFromDialog #radClientSelect:checked');
    //var label1 = $('#clients-selected #clientFromDialog #radClientSelect').next();
    if ($('#clients-selected #clientSelectHidden').val()=='' || $('#clients-selected #clientSelectHidden').val() ==null) {
        list.push('There is no client selected.');
        pass = false;
    }

    if (surveysSelected.length < 1) {
        list.push('There is no survey selected.');
        pass = false;
    }
    else {
        surveysSelected.each(function () {
            var index = beforeCheck.index(this);
            //alert(index);
            //$(inputs[index]).val($(this).next().text());
            //alert()
            //alert($(inputs[index]).val());
            if ($(inputs[index]).val() == '' || $(inputs[index]).val() ==null) {
                var thisSurvey = $(this).next().text();
                list.push('Survey: ' + thisSurvey + ' required a due date.');
                pass = false;
            }
            //alert($(this).next().text());

        });
    }

    if (list.length > 0) {
        // list.each(function (index) {
        //     // $('#form-validate-error ul').append('<li>' + 'some text' + '</li>');
        // })
        $('#form-validate-error ul li').remove();
        for (var i = 0; i < list.length; i++) {
            $('#form-validate-error ul').append('<li>' + list[i] + '</li>');
        }
        $('#form-validate-error').show();
    }

    //alert(list.length);
    return pass;
};

// DISABLE DATE PICKER WHEN THERE IS NO SURVEY SELECTED
$(function() {
    var surveysSelected = $('#surveySelect input[type="checkbox"]');
    var inputs = $('#surveySelect input[type="text"]');

    surveysSelected.click(function () {
        var label = $(inputs[surveysSelected.index(this)]);
        label.prop('disabled', function(i, v) { return !v; });
        //alert('index: ' + surveysSelected.index(this));
    });
});


// $('#form-validate-error ul li').remove( ":contains('There is no client selected.')" );

// surveysSelected.each(function (index) {
//     // $(this).toggle(function(){
//     //     var $this = $(inputs[index]);
//     //     $this.is(":disabled") ? $this.removeAttr('disabled') : $this.attr('disabled');
//     // });
//     $(this).click(alert($(this).index()));
//     // $(this).click
//     // $(inputs[index]).removeAttr('disabled');
// });
//}
