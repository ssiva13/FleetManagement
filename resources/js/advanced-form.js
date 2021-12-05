!function($) {
    "use strict";
    var AdvancedForm = function () {
        // trigger select2
        $(".select2").select2();
        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
        //trigger date picker
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            clearBtn: true,
            showButtonPanel: true,
            todayHighlight: true
        });
        $('.datepicker-year').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            clearBtn: true,
            autoclose: true,
            showButtonPanel: true
        });

        $('.datepicker-multiple-date').datepicker({
            format: "dd/mm/yyyy",
            clearBtn: true,
            multidate: true,
            multidateSeparator: ","
        });
        $('.date-range').datepicker({
            format: "dd/mm/yyyy",
            toggleActive: true
        });
        //Bootstrap-TouchSpin Trigger
        $("input.touchspin").TouchSpin({
            buttondown_class: 'btn btn-primary', //data-bts-button-down-class
            buttonup_class: 'btn btn-primary', //data-bts-button-up-class
            // other attributes
            /*
                initval: 40, //data-bts-init-val
                min: 0, //data-bts-min
                max: 100, //data-bts-max
                step: 0.1, //data-bts-step
                decimals: 2, //data-bts-decimal
                stepinterval: 5, // data-bts-step-interval
                stepintervaldelay: 5, // data-bts-step-interval-delay
                forcestepdivisibility: 5, // data-bts-force-step-divisibility
                boostat: 5, // data-bts-step-interval
                booster: 5, // data-bts-booster
                prefix: 5, // data-bts-prefix
                mousewheel: 5, // data-bts-mousewheel
                maxboostedstep: 10, // data-bts-max-boosted-step
                postfix_extraclass: 10, // data-bts-postfix-extra-class
                prefix_extraclass: 10, // data-bts-prefix-extra-class
                postfix: '%', // data-bts-postfix
            */
        });
        //Bootstrap-MaxLength Trigger
        $('input.max-default').maxlength({
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });
        $('input.max-thresholdconfig').maxlength({
            threshold: 20,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });
        $('input.max-moreoptions').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        });
        $('input.max-alloptions').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger",
            separator: ' out of ',
            preText: 'You typed ',
            postText: ' chars available.',
            validate: true
        });
        $('textarea.max-textarea').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });
        $('input.max-placement').maxlength({
            alwaysShow: true,
            placement: 'top-left',
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });
        $("input.range-slider").ionRangeSlider({
            skin: "modern",
            min: 1000,
            max: 6000,
            from: 1500,
            step: 100,
            postfix: 'CC',
            prettify_enabled: true
        });
    };
    //init
    $.AdvancedForm = new AdvancedForm, $.AdvancedForm.Constructor = AdvancedForm
}(window.jQuery), function ($) {
    "use strict";
    $.AdvancedForm.init();
}(window.jQuery);