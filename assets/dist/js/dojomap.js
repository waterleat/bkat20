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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/scripts/dojomap.js":
/*!***************************************!*\
  !*** ./assets/src/scripts/dojomap.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// const mapStyle = [
//   {
//     "featureType": "administrative",
//     "elementType": "all",
//     "stylers": [
//       {
//         "visibility": "on"
//       },
//       {
//         "lightness": 33
//       }
//     ]
//   },
//   {
//     "featureType": "landscape",
//     "elementType": "all",
//     "stylers": [
//       {
//         "color": "#f2e5d4"
//       }
//     ]
//   },
//   {
//     "featureType": "poi.park",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#c5dac6"
//       }
//     ]
//   },
//   {
//     "featureType": "poi.park",
//     "elementType": "labels",
//     "stylers": [
//       {
//         "visibility": "on"
//       },
//       {
//         "lightness": 20
//       }
//     ]
//   },
//   {
//     "featureType": "road",
//     "elementType": "all",
//     "stylers": [
//       {
//         "lightness": 20
//       }
//     ]
//   },
//   {
//     "featureType": "road.highway",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#c5c6c6"
//       }
//     ]
//   },
//   {
//     "featureType": "road.arterial",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#e4d7c6"
//       }
//     ]
//   },
//   {
//     "featureType": "road.local",
//     "elementType": "geometry",
//     "stylers": [
//       {
//         "color": "#fbfaf7"
//       }
//     ]
//   },
//   {
//     "featureType": "water",
//     "elementType": "all",
//     "stylers": [
//       {
//         "visibility": "on"
//       },
//       {
//         "color": "#acbcc9"
//       }
//     ]
//   }
// ];
function initDojoMap() {
  var initialLocation; // // get user location if possible
  // if (navigator.geolocation) {
  //   navigator.geolocation.getCurrentPosition(function (position) {
  //     initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  //     // map.setCenter(initialLocation);
  //   });
  // } else {
  //   alert('Browers does not support geolocation');

  initialLocation = new google.maps.LatLng(54, -1); // }
  //

  var mapOptions = {
    // mapTypeId: 'roadmap',
    zoom: 7,
    center: initialLocation // center: {lat: 51.397, lng: 0.644}
    // styles: mapStyle

  }; // Create the map.

  var map = new google.maps.Map(document.getElementById('ukmap'), mapOptions // {
  //   zoom: 7,
  //   center: {lat: 52.632469, lng: -1.689423},
  //   styles: mapStyle
  // }
  ); // Load the dojo GeoJSON onto the map.

  map.data.loadGeoJson('/dojo.json'); // map.data.loadGeoJson('/wp-content/themes/bka2018/assets/dist/dojo.json');
  // map.data.loadGeoJson('/wp-content/plugins/bka2019ds/assets/dojo.json');
  // Define the custom marker icons, using the store's "category".

  map.data.setStyle(function (feature) {
    return {
      icon: {
        url: "/wp-content/themes/bka2020/assets/dist/images/membership/icon_".concat(feature.getProperty('category'), ".png"),
        scaledSize: new google.maps.Size(32, 32)
      }
    };
  });
  var apiKey = 'AIzaSyDXwSOa64GQfK5_EaP9mslaQCyR6haJJsY';
  var infoWindow = new google.maps.InfoWindow(); // Show the information for a store when its marker is clicked.

  map.data.addListener('click', function (event) {
    var category = event.feature.getProperty('category');
    var number = event.feature.getProperty('Dojono');
    var name = event.feature.getProperty('DojoName');
    var address1 = event.feature.getProperty('address1');
    var address2 = event.feature.getProperty('address2');
    var address3 = event.feature.getProperty('address3');
    var address4 = event.feature.getProperty('address4');
    var address5 = event.feature.getProperty('address5');
    var postcode = event.feature.getProperty('postcode');
    var hours = event.feature.getProperty('hours');
    var contact = event.feature.getProperty('contact');
    var phone = event.feature.getProperty('phone');
    var email = event.feature.getProperty('email');
    var website = event.feature.getProperty('website');
    var dojopage = event.feature.getProperty('DojoPage');
    var position = event.feature.getGeometry().get(); // <img style="float:left; width:200px; margin-top:30px" src="img/logo_${category}.png">
    // <div style="margin-left:220px; margin-bottom:20px;">

    var content = "\n      <div class=\"p-1 xs:p-2 sm:p-4\">\n        <div class=\"flex flex-col sm:flex-row sm:justify-between\">\n          <h2 class=\"mt-0\">".concat(name, " <span class=\"hidden md:inline font-normal text-sm\"> ").concat(number, "</span></h2>\n          <p class=\"w-24 sm:text-right\"><a target=\"_blank\" rel=\"noopener noreferrer\" href=\"").concat(dojopage, "\" class=\"btn btn-small btn-gray\">Dojo Details</a></p>\n        </div>\n        <p>").concat(address1, ", ").concat(address2, ", ").concat(address3, ", ").concat(address4, ", ").concat(address5, ", ").concat(postcode, "</p>\n        <p><span class=\"font-medium\">Open:</span> ").concat(hours, "<br/><span class=\"font-medium\">Contact:</span> ").concat(contact, "<br/><span class=\"font-medium\">Phone:</span> ").concat(phone, "<br/><span class=\"font-medium\">Email:</span> ").concat(email, "<br/><span class=\"font-medium\">Website:</span> ").concat(website, "</p>\n        <p><img src=\"https://maps.googleapis.com/maps/api/streetview?size=350x120&location=").concat(position.lat(), ",").concat(position.lng(), "&key=").concat(apiKey, "\"></p>\n      </div>\n    ");
    infoWindow.setContent(content);
    infoWindow.setPosition(position);
    infoWindow.setOptions({
      pixelOffset: new google.maps.Size(0, -30)
    });
    infoWindow.open(map);
  });
}

/***/ }),

/***/ 4:
/*!*********************************************!*\
  !*** multi ./assets/src/scripts/dojomap.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/d/sites/bka01/wp-content/themes/bka2020/assets/src/scripts/dojomap.js */"./assets/src/scripts/dojomap.js");


/***/ })

/******/ });