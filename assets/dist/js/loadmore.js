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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 13);
/******/ })
/************************************************************************/
/******/ ({

/***/ 13:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(14);


/***/ }),

/***/ 14:
/***/ (function(module, exports) {

/* Ajax functions */
var postdivcs = document.getElementById('my-postscs'),
    loadmorecs = document.getElementById('loadmorecs');

// $(document).on('click','.loadmore', function(){
loadmorecs.addEventListener('click', function (c) {

	// var that = $(this);
	// var page = $(this).data('page');
	var page = loadmorecs.dataset.page;
	var newPage = page + 1;
	var ajaxurl = loadmorecs.dataset.url;
	// var ajaxurl = that.data('url');
	// const ajaxurl = "<?php echo admin_url( '/admin-ajax.php' ); ?>";

	// $.ajax({
	// 	url : ajaxurl,
	// 	type : 'post',
	// 	data : {
	// 		page : page,
	// 		action: 'bka2018_load_more'
	// 	},
	// 	error : function( response ){
	// 		console.log(response);
	// 	},
	// 	success : function( response ){
	//
	// 		that.data('page', newPage);
	//     console.log(newPage);
	// 		// $('#my-postscs').append( response );
	// 	}
	// });
	fetch(ajaxurl, {
		method: "POST",
		page: 'page',
		action: 'bka2018_load_more'
	}).then(function (result) {
		return result.json();
	}).catch(function (error) {}).then(function (response) {
		console.log('output is here');
	});
});
// // append more posts
//   const postdivcs = document.getElementById('my-postscs'),
//       loadmorecs = document.getElementById('loadmorecs');
//
//   const ajaxurl = "<?php echo admin_url( '/admin-ajax.php' ); ?>";
//   // var page = 2;
//
//   loadmorecs.addEventListener('click',(c) => {
//     var page = loadmorecs.dataset.page;
//       console.log('pressed</br>',page);
//     // console.log(page);
//     // try {
//     //   const fetchResult =
//       fetch(ajaxurl, {
//         method: "POST",
//         // body: params
//         page: page,
//         action: 'bka2018_load_more'
//       })
//       .then(result => result.json())
//       .catch(error => {
//
//       })
//       .then(response => {
//         console.log(response.message);
//         // postdivcs.innerHTML = response.message;
//       })
//     // } catch (e) {
//     //
//     // } finally {
//     //
//     // }
//
//
//     // var para = document.createElement("P");
//     // var t = document.createTextNode("This is a paragraph.");
//     // para.appendChild(t);
//     // postdivcs.appendChild(para);
//
//     var data = {
//         action : 'load_posts_by_ajax',
//         page : page,
//         security : '<?php echo wp_create_nonce("load_more_posts"); ?>'
//     };
//     // document.ajax({
//     //   url:ajaxurl,
//     //   data:data
//     // },
//     // error: function(response) {
//     //   console.log(response);
//     // },
//     // success: function(response){
//     //   postdivcs.append(response);
//     // });
//   });

/***/ })

/******/ });