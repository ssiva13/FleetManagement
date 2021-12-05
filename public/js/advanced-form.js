/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 19);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/advanced-form.js":
/*!***************************************!*\
  !*** ./resources/js/advanced-form.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

!function ($) {
  "use strict";

  var AdvancedForm = function AdvancedForm() {
    // trigger select2
    $(".select2").select2();
    $(".select2-limiting").select2({
      maximumSelectionLength: 2
    }); //trigger date picker

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
    }); //Bootstrap-TouchSpin Trigger

    $("input.touchspin").TouchSpin({
      buttondown_class: 'btn btn-primary',
      //data-bts-button-down-class
      buttonup_class: 'btn btn-primary' //data-bts-button-up-class
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

    }); //Bootstrap-MaxLength Trigger

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
  }; //init


  $.AdvancedForm = new AdvancedForm(), $.AdvancedForm.Constructor = AdvancedForm;
}(window.jQuery), function ($) {
  "use strict";

  $.AdvancedForm.init();
}(window.jQuery);

/***/ }),

/***/ 19:
/*!*********************************************!*\
  !*** multi ./resources/js/advanced-form.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/mavuCabs/resources/js/advanced-form.js */"./resources/js/advanced-form.js");


/***/ })

/******/ });