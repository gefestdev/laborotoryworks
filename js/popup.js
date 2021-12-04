function OpenPopup_Login(){
    $('.popup__bg').fadeIn(300);
}
function ClosePopup_Login(){
    $('.popup__bg').fadeOut(300);
}
function OpenPopup_addwork(){
    $('#popup_addwork').fadeIn(300);
}
function ClosePopup_addwork(){
    $('#popup_addwork').fadeOut(300);
    $('#popup_student_work').fadeOut(300);
}
function OpenPopup_completework(clicked_id){
    $('#popup_student_work').fadeIn(300);
    $('#id_work').attr('value', clicked_id);
}