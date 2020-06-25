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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/scripts/geosm.js":
/*!*************************************!*\
  !*** ./assets/src/scripts/geosm.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// document.addEventListener('DOMContentLoaded', function (e) {
var placeLat = document.querySelector('#place_Lat'),
    placeLng = document.querySelector('#place_Lng'); //   latLngTxt = document.querySelector('#place-latllng-text'),
//   postcode = document.querySelector('#postcode'),
//   addressInputs = document.querySelectorAll('.addressInput');
//
// let address = '';
// var addr=[...addressInputs];

var zoom = 12;
var map, initialLocation, marker; // addr.forEach(addressInput => {
//   if (!(addressInput.value == '')){
//     console.log(addressInput.value);
//     address +=  addressInput.value + ', '
//   }
// });
// // address = address.slice(0,-2);
// address += postcode.value;
// console.log(address.length);
// console.log(address);

function initddMap() {
  // var geocoder = new google.maps.Geocoder();
  // map = new google.maps.Map(document.getElementById('map'), {
  //   zoom: 8,
  //   center: {lat: 0, lng: 0}
  // });
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    });
  } else {
    alert('Browser does not support geolocation');
  } // // console.log(placeLat.value);


  if (placeLat.value === '0' && placeLng.value === '0') {
    console.log(placeLat.value + ' , ' + placeLng.value);
    return; //   if (!address) {
    //     latLngTxt.innerHTML=' no posn';
    //     map.setCenter(initialLocation);
    //     // zoom = 1;
    //   } else{
    //     // alert('have address')
    //     geocodeAddress(geocoder, map);
    //     // geocode address
    //     // prompt to save
    //   }
  } else {
    // lat lng already saved
    var markerLL = {
      lat: parseFloat(placeLat.value),
      lng: parseFloat(placeLng.value)
    };
    console.log(markerLL);
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: markerLL
    }); // alert(placeLat.value+' & '+placeLng.value);
    // add marker

    marker = new google.maps.Marker({
      map: map,
      position: markerLL // draggable: true,
      // title: 'Drag Me!',

    }); //   // // console.log(address);
    //   // placeLat.value = marker.position.lat() ;
    //   // placeLng.value = marker.position.lng() ;
    //   latLngTxt.innerHTML = ' ' + placeLat.value + ', ' + placeLng.value;
    //   console.log(latLngTxt);
    //   //
    //   marker.addListener('drag', handleEventDrag);
    //   marker.addListener('dragend', handleEventDragEnd);
    //   // // geocodeAddress(geocoder, map);
  } // })
  // // pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  // map = new google.maps.Map(document.getElementById('map'), {
  //   zoom: 12,
  //   // center: {lat: -34.397, lng: 150.644}
  //   center: initialLocation,
  // });
  //
  // if ( !( placeLat.value === '0' && placeLng.value === '0' )) {
  //   alert(placeLat.value+' & '+placeLng.value);
  //   // marker = new google.maps.Marker({
  //   //  map: map,
  //   //  position: {lat: placeLat.value, lng: placeLng.value},
  //   //  draggable: true,
  //   //  title: 'Drag Me!',
  //   // });
  // }else {
  //
  //   var geocoder = new google.maps.Geocoder();
  //
  //   geocodeAddress(geocoder, map);
  // }

}

function handleEventDrag(event) {
  latLngTxt.innerHTML = event.latLng.lat() + ', ' + event.latLng.lng(); // console.log(event.latLng.lng());
  // var latLngstr = event.latLng.lat() + ', ' + event.latLng.lng();
}

function handleEventDragEnd(event) {
  // console.log(event.latLng.lat());
  // console.log(event.latLng.lng());
  placeLat.value = event.latLng.lat();
  placeLng.value = event.latLng.lng();
}

function geocodeAddress(geocoder, resultsMap) {
  geocoder.geocode({
    'address': address,
    'region': 'GB'
  }, function (results, status) {
    if (status === 'OK') {
      console.log(results[0]);
      console.log(results[0].formatted_address);
      console.log(results[0].geometry.location);
      resultsMap.setCenter(results[0].geometry.location);
      resultsMap.setZoom(15); // add marker

      marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
        draggable: true,
        title: 'Drag Me!'
      }); // console.log(address);

      placeLat.value = marker.position.lat();
      placeLng.value = marker.position.lng();
      latLngTxt.innerHTML = ' ' + placeLat.value + ', ' + placeLng.value; // console.log(latLngTxt);

      marker.addListener('drag', handleEventDrag);
      marker.addListener('dragend', handleEventDragEnd);
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });

  function geoDojo() {
    if (!address) {
      // no address
      console.log('no address');
    }

    console.log('address is: ' + address);
  }
}

/***/ }),

/***/ 6:
/*!*******************************************!*\
  !*** multi ./assets/src/scripts/geosm.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/d/sites/bka01/wp-content/themes/bka2020/assets/src/scripts/geosm.js */"./assets/src/scripts/geosm.js");


/***/ })

/******/ });