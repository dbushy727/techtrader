var submitFormListener = function() {
    $('.submit').on('click', function(e) {
        e.preventDefault();
        console.log('click');
        $('.form_submit').submit();
    });
}

$(function(){
    submitFormListener();
});