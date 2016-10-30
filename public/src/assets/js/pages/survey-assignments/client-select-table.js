// $(document).ready(function () {
//
//     $('#surveySelect input[type="text"]').prop('disabled', true);
//
//     var divDialog = $('#select-clients-dialog');
//
//     /*$('.table-fixed-header').fixedHeader();*/
// //            $('#searchClient').scrollFollow();
//     // THIS IS TO SHOW THE CLIENT SELECTION DIALOG AND REMOVE ALL THE CHECKED RADIO BUTTONS THAT WERE CHECKED BEFORE.
//     $('#btnClientSelected').click(function () {
//         divDialog.modal('show');
//
//         $('#noboxchecked').hide();
//
//     });
//
//     // THIS IS SOMETHING TO DO WHEN THE USER CLICKS ON SAVE CHANGES BUTTON FROM DIALOG
//     $('#btnDialogSelection').click(function () {
//         var clientSelected = $('.table-fixed-header input[type="radio"]:checked');
//         //var tP = $('#clients-selected #clientFromDialog');
//
//         if(clientSelected.length>0){
//             var result='';
//             clientSelected.each(function () {
//                 result = $(this).attr('id');
//                 //var selector = '#clients-selected tbody tr';
//                 // if($('#clients-selected tbody tr').length>0){
//                 //     // $('#'+result).remove();
//                 //     $('#clients-selected tbody tr').remove();
//                 //
//                 // }
//                 //$('#clients-selected #clientFromDialog #radClientSelect').prop("checked", true);
//                 $('#clients-selected #clientSelectHidden').val(result);
//                 $('#clients-selected #clientSelect').text(result);
//                 //$('#clients-selected #clientFromDialog #textClientSelect').text(result);
//                 //tP.text(result);
//                 //tP.show();
//                 $('#clients-selected #clientFromDialog').show();
//                 // var exceptCheckAll = $('.table-fixed-header #checkAll');
//                 //if(tBody.has('tr')){
//                     //tBody.remove('tr');
//
//                 //}
//
//
//             });
//             $('#form-validate-error ul li').remove( ":contains('There is no client selected.')" );
//             divDialog.modal('hide');
//         }
//         else{
//             $('#noboxchecked').show();
//             //divDialog.modal('hide');
//         }
//
//     });
//
//     // THIS IS TO HIDE THE VALIDATION MESSAGE WHEN ONE OF THE BOXES IS CHECKED
//     $('.table-fixed-header input[type="radio"]').change(function () {
//         $('#noboxchecked').hide();
//
//     });
//
//     // THIS IS TO CHECK ALL BOXES AT ONCE
//     // $("#checkAll").change(function () {
//     //     $('.table-fixed-header input[type="checkbox"]').prop('checked', $(this).prop("checked"));
//     // });
//
//
//     // THIS IS SOMETHING TO DO WITH THE SEARCH INPUT
//     $('#searchClient').keyup(function () {
//         var rows = $("#fClientBody").find("tr").hide();
//         if (this.value.length) {
//             var data = this.value.split(" ");
//             $.each(data, function (i, v) {
//                 rows.filter(":contains('" + v + "')").show();
//             });
//         } else rows.show();
//
//     });
//
//
//     // RESET BUTTON
//
//
// });