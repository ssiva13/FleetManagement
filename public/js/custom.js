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
/******/ 	return __webpack_require__(__webpack_require__.s = 21);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  "use strict";

  window.addEventListener('load', function () {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);
    });
  }, false);
  $('.custom-validation').parsley();
  $("form").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serializeArray();
    dynamicAjaxPostRequest($(this).attr('action'), formData, false);
  });
  $("select").on('change', function (event) {
    if ($(this).data('has_children')) {
      var url = $(this).data('api-endpoint');
      var params = {
        fk_parent_value: $(this).find(':selected').data('option-id')
      };
      var selectOptions = dynamicAjaxGetRequest(url, params); // child select field

      var childSelectId = $(this).data('child-select-id');
      var childLabel = $("label[for=\"".concat(childSelectId, "\"]")).html();
      var childSelect = $("#".concat(childSelectId));
      childSelect.empty();
      childSelect.prop('disabled', 'disabled');
      childSelect.append("<option value=\"\"> Select ".concat(childLabel, " </option>"));
      $.each(selectOptions, function (fieldOptionKey, fieldOption) {
        childSelect.append("<option value='".concat(fieldOptionKey, "' data-option-id='").concat(fieldOption[1], "'>").concat(fieldOption[1], " - ").concat(fieldOption[0], "</option>"));
      });

      if ($(this).val()) {
        childSelect.prop('disabled', '');
      }
    }
  }); // renderToastmessage()
});

function dynamicAjaxPostRequest(url, formData, async) {
  $.ajax({
    type: 'POST',
    url: url,
    data: formData,
    async: async
  }).done(function (response) {
    console.log(response);
    alert('dddddddddddddd');
    return response;
  }).fail(function (error) {
    //show validation errrors in form
    $.each(error.responseJSON.errors, function (inputName, formvalidationError) {
      var inputElement = $("[name=\"".concat(inputName, "\"]"));
      $("<span class=\"text-danger\" id=\"".concat(inputName, "_messageError\">").concat(formvalidationError, "</span>")).insertBefore(inputElement);
    });
  });
}

function dynamicAjaxGetRequest(url, params) {
  var ajaxResponse = null;
  $.ajax({
    type: 'GET',
    data: params,
    url: url,
    async: false
  }).done(function (response) {
    ajaxResponse = response;
  }).fail(function (error) {
    console.log(error);
  });
  return ajaxResponse;
}

window.renderToastmessage = function renderToastmessage() {
  var title = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var message = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var toast_type = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'info';
  toastr.options = {
    closeButton: true,
    progressBar: true,
    preventDuplicates: true,
    showMethod: 'slideDown',
    showDuration: "500",
    positionClass: 'toast-top-right',
    timeOut: 6000 // Set timeOut and extendedTimeout to 0 to make it sticky

  };
  var types = ['warning', 'info', 'success', 'error'];

  if ($.inArray(toast_type, types) !== -1) {
    switch (toast_type) {
      case "warning":
        toastr.warning(message, title);
        break;

      case 'success':
        toastr.success(message, title);
        break;

      case 'error':
        toastr.error(message, title);
        break;

      default:
        toastr.info(message, title);
        break;
    }
  }
};

/***/ }),

/***/ 21:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/mavuCabs/resources/js/custom.js */"./resources/js/custom.js");


/***/ })

/******/ });