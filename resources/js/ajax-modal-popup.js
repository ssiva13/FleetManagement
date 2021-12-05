$(function(){

    $(document).on('click', '.showModalButton', function(){
        triggerModal($(this));
    });
    $(document).on('click', '#close-modal', function(){
        $(`#main-modal`).hide();
    });

    $('.modal').on('shown.bs.modal', function () {
        $(".select2").select2();
    });

});

function triggerModal(e)
{
    let modal = '#main-modal';
    if ($(modal).hasClass('show')) {
        $(modal).find('#modalContent').load(e.attr('value'));
        document.getElementById('main-modalmodalHeader').innerText = e.attr('title');
    } else {
        $(modal).modal('show').find('#modalContent').load(e.attr('value'));
        document.getElementById('main-modalmodalHeader').innerText = e.attr('title');
    }

}