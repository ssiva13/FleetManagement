$(function(){
    "use strict";
    window.addEventListener('load', function() {
        let forms = document.getElementsByClassName('needs-validation');
        let validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    $('.custom-validation').parsley();

    $(`form`).submit(function (event) {
        event.preventDefault();
        let formData = $(this).serializeArray();
        dynamicAjaxPostRequest($(this).attr('action'), formData, false);
    });

    $(`select`).on('change', function (event) {
        if($(this).data('has_children')){
            let url = $(this).data('api-endpoint')
            let params = {
                fk_parent_value: $(this).find(':selected').data('option-id')
            };
            let selectOptions = dynamicAjaxGetRequest(url, params);

            // child select field
            let childSelectId = $(this).data('child-select-id')
            let childLabel = $(`label[for="${childSelectId}"]`).html();
            let childSelect = $(`#${childSelectId}`);
            childSelect.empty();
            childSelect.prop('disabled', 'disabled');
            childSelect.append(`<option value=""> Select ${childLabel} </option>`);
            $.each( selectOptions, ( fieldOptionKey, fieldOption ) => {
                childSelect.append(`<option value='${fieldOptionKey}' data-option-id='${fieldOption[1]}'>${fieldOption[1]} - ${fieldOption[0]}</option>`);
            });
            if($(this).val()){
                childSelect.prop('disabled', '');
            }

        }
    });

    // renderToastmessage()
})

function dynamicAjaxPostRequest(url, formData, async) {
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        async: async
    }).done(function(response) {
        console.log(response)
        alert('dddddddddddddd')
        return response;
    }).fail(function(error)  {
        //show validation errrors in form
        $.each( error.responseJSON.errors, ( inputName, formvalidationError ) => {
            let inputElement = $(`[name="${inputName}"]`);
            $(`<span class="text-danger" id="${inputName}_messageError">${formvalidationError}</span>`).insertBefore(inputElement)
        });
    });
}

function dynamicAjaxGetRequest(url, params) {
    let ajaxResponse = null;
    $.ajax({
        type: 'GET',
        data: params,
        url: url,
        async: false
    }).done(function(response) {
        ajaxResponse = response;
    }).fail(function(error)  {
        console.log(error)
    });
    return ajaxResponse;
}

window.renderToastmessage = function renderToastmessage(title = '', message = '', toast_type = 'info'){
    toastr.options = {
        closeButton : true,
        progressBar : true,
        preventDuplicates: true,
        showMethod: 'slideDown',
        showDuration: "500",
        positionClass: 'toast-top-right',
        timeOut: 6000, // Set timeOut and extendedTimeout to 0 to make it sticky
    }
    let types = ['warning', 'info', 'success', 'error'];
    if($.inArray(toast_type, types) !== -1){
        switch (toast_type) {
            case "warning":
                toastr.warning(message, title)
                break;
            case 'success':
                toastr.success(message, title)
                break;
            case 'error':
                toastr.error(message, title)
                break;
            default:
                toastr.info(message, title)
                break;
        }
    }

}
