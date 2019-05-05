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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/backend.js":
/*!*********************************!*\
  !*** ./resources/js/backend.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var backendSidebar = document.querySelector('#backend-sidebar');
var userMenu = document.querySelector('#user-menu'); // Stop Progation For Sidebar

backendSidebar.addEventListener('click', function (e) {
  return e.stopPropagation();
}); // Toggler Sidebar

document.querySelector('#sidebar-toggler').addEventListener('click', function (e) {
  e.stopPropagation();

  if (userMenu.classList.contains('visible')) {
    userMenu.classList.toggle('visible');
  }

  backendSidebar.classList.toggle('visible');
}); // Stop Progation For User Menu

userMenu.addEventListener('click', function (e) {
  return e.stopPropagation();
}); // Toggler User Menu

document.querySelector('#user-dropdown').addEventListener('click', function (e) {
  e.stopPropagation();
  e.preventDefault();

  if (backendSidebar.classList.contains('visible')) {
    backendSidebar.classList.toggle('visible');
  }

  userMenu.classList.toggle('visible');
}); // Hide Sidebar and User Menu If Visible

document.querySelector('body').addEventListener('click', function (e) {
  if (backendSidebar.classList.contains('visible')) {
    backendSidebar.classList.toggle('visible');
  }

  if (userMenu.classList.contains('visible')) {
    userMenu.classList.toggle('visible');
  }
}); // Dropdown Sidebar

var sidebarDropdowns = document.querySelectorAll('.sidebar-dropdown');

var _loop = function _loop(i) {
  sidebarDropdowns[i].addEventListener('click', function () {
    sidebarDropdowns[i].classList.toggle('open');
    var menu = sidebarDropdowns[i].children[0].nextElementSibling;

    if (menu.style.maxHeight) {
      menu.style.maxHeight = null;
    } else {
      menu.style.maxHeight = menu.scrollHeight + "px";
    }
  });
};

for (var i = 0; i < sidebarDropdowns.length; i++) {
  _loop(i);
} // let sidebarDropdowns = document.querySelectorAll('.sidebar-dropdown');
// for (let i = 0; i < sidebarDropdowns.length; i++) {
// 	sidebarDropdowns[i].addEventListener('click', () => {
// 		sidebarDropdowns[i].classList.toggle('open');
// 	});
// }
// let backendMain = document.querySelector('#backend-main');
// if(backendMain.parentElement.classList.contains('visible')){
// 	console.log('visible');
// } else {
// 	console.log('No Ative');
// }

/***/ }),

/***/ "./resources/sass/backend.scss":
/*!*************************************!*\
  !*** ./resources/sass/backend.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************!*\
  !*** multi ./resources/js/backend.js ./resources/sass/backend.scss ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\laragon\www\aidystechnology-booking-system\resources\js\backend.js */"./resources/js/backend.js");
module.exports = __webpack_require__(/*! C:\laragon\www\aidystechnology-booking-system\resources\sass\backend.scss */"./resources/sass/backend.scss");


/***/ })

/******/ });