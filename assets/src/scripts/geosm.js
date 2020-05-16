// document.addEventListener('DOMContentLoaded', function (e) {



  const placeLat = document.querySelector('#place_Lat'),
    placeLng = document.querySelector('#place_Lng');
  //   latLngTxt = document.querySelector('#place-latllng-text'),
  //   postcode = document.querySelector('#postcode'),
  //   addressInputs = document.querySelectorAll('.addressInput');
  //
  // let address = '';
  // var addr=[...addressInputs];

  let zoom = 12;
  var map, initialLocation, marker;

  // addr.forEach(addressInput => {
  //   if (!(addressInput.value == '')){
  //     console.log(addressInput.value);
  //     address +=  addressInput.value + ', '
  //   }
  // });
  // // address = address.slice(0,-2);
  // address += postcode.value;
  // console.log(address.length);
  // console.log(address);


function initMap() {
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
  }
  // // console.log(placeLat.value);
  if( placeLat.value === '0' && placeLng.value === '0' ){
    console.log(placeLat.value + ' , ' + placeLng.value);
    return;
  //   if (!address) {
  //     latLngTxt.innerHTML=' no posn';
  //     map.setCenter(initialLocation);
  //     // zoom = 1;
  //   } else{
  //     // alert('have address')
  //     geocodeAddress(geocoder, map);
  //     // geocode address
  //     // prompt to save
  //   }
  }else {
    // lat lng already saved
    var markerLL = {lat: parseFloat(placeLat.value), lng: parseFloat(placeLng.value)};
    console.log(markerLL);
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: markerLL,
    });
    // alert(placeLat.value+' & '+placeLng.value);
    // add marker
    marker = new google.maps.Marker({
      map: map,
      position: markerLL,
      // draggable: true,
      // title: 'Drag Me!',

    });
  //   // // console.log(address);
  //   // placeLat.value = marker.position.lat() ;
  //   // placeLng.value = marker.position.lng() ;
  //   latLngTxt.innerHTML = ' ' + placeLat.value + ', ' + placeLng.value;
  //   console.log(latLngTxt);
  //   //
  //   marker.addListener('drag', handleEventDrag);
  //   marker.addListener('dragend', handleEventDragEnd);
  //   // // geocodeAddress(geocoder, map);
  }


// })
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
  latLngTxt.innerHTML = event.latLng.lat() + ', ' + event.latLng.lng();
  // console.log(event.latLng.lng());
  // var latLngstr = event.latLng.lat() + ', ' + event.latLng.lng();
}

function handleEventDragEnd(event) {
  // console.log(event.latLng.lat());
  // console.log(event.latLng.lng());
  placeLat.value = event.latLng.lat();
  placeLng.value = event.latLng.lng();
}

function geocodeAddress(geocoder, resultsMap) {
  geocoder.geocode({'address': address, 'region': 'GB'}, function(results, status) {
    if (status === 'OK') {
      console.log(results[0]);
      console.log(results[0].formatted_address);
      console.log(results[0].geometry.location);
      resultsMap.setCenter(results[0].geometry.location);
      resultsMap.setZoom(15);
      // add marker
      marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
        draggable: true,
        title: 'Drag Me!',

      });
      // console.log(address);
      placeLat.value = marker.position.lat() ;
      placeLng.value = marker.position.lng() ;
      latLngTxt.innerHTML = ' ' + placeLat.value + ', ' + placeLng.value;
      // console.log(latLngTxt);

      marker.addListener('drag', handleEventDrag);
      marker.addListener('dragend', handleEventDragEnd);
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });



  function geoDojo() {
    if (!address) {
      // no address
      console.log('no address')
    }
    console.log('address is: ' + address)
  }

}
