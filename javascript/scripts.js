// Extra parameters
let options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
}

// Function if the location could be successfully retrieved
function success(pos) {
    let crd = pos.coords

    console.log(crd.longitude != "")

    // Fill in the values into the form
    $(".form_melding_long").val(crd.longitude)
    $(".form__melding__lat").val(crd.latitude)

    // Load the Google Maps in the form / application
    if($("#googleMap").length > 0) {
        // Pass the user latitude and longitude to the app
        initMap(crd.latitude, crd.longitude)
    }
}

// Error event
function error(err) {
    // Throw a warning message
    console.warn(`ERROR(${err.code}): ${err.message}`)
    // Add the error class to the google maps container
    if ($("#googleMapContainer").length > 0 && $("#googleMap").length > 0) {
        $("#googleMapContainer").addClass("error--googleMap")
    }
}

// Calling the geolocation function
function getLocation() {
    navigator.geolocation.getCurrentPosition(success, error, options);
}

// Check for hidden input fields  longitude and latitude
if (($(".form_melding_long").length > 0 && $(".form_melding_lat").length > 0 )) {
    getLocation()
}

//Define map style for all Google Maps

var mapStyle = [
    {
      "featureType": "administrative",
      "elementType": "geometry",
      "stylers": [{ "visibility": "off" }],
    },
    {
      "featureType": "poi",
      "stylers": [{ "visibility": "off" }],
    },
    {
      "featureType": "road",
      "elementType": "labels.icon",
      "stylers": [{ "visibility": "off" }],
    },
    {
      "featureType": "transit",
      "stylers": [{ "visibility": "off" }],
    },
  ]

/**
 * Google documentation
 * https://developers.google.com/maps/documentation/javascript/adding-a-google-map
 */
function loadMaps() {
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
    infoWindow = new google.maps.InfoWindow;
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

         var marker = new google.maps.Marker({
            position: pos,
            map: map
        });
        map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  }

/**
 * Tutorial from MDN
 * https://developer.mozilla.org/en-US/docs/Web/API/Geolocation/getCurrentPosition
 */
// Here we will call for ajaxcall


/**
 * Functions
 * */

function imagePreview(location, type) {

    // source: https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded

    // Check if an actual file has been uploaded
    if (inputField.files && inputField.files[0]) {

        // create a new FileReader object
        let reader = new FileReader();

        // When the file reader is ready
        reader.onload = (e) => {

            // Select where the image has to be previewed
            let l = document.querySelector(location)
            // Update the location with the selected image
            if (type == "photo") {

                // Create container div
                let div = document.createElement("div")

                div.setAttribute("class", "form__item__photo animated fadeIn")

                // If filter is selected, add to preview
                let filter = document.querySelector(".filter__select");
                let filterClass = filter.options[filter.selectedIndex].getAttribute("data-filter");

                let figure = document.createElement("figure");
                figure.setAttribute("class", filterClass);

                // Add the image to the div
                div.setAttribute("style", `background-image: url('${e.target.result}')`)

                //Add the div to the figure
                figure.appendChild(div)

                // clear content and add image
                l.innerHTML = ""
                l.appendChild(figure)

            } else {

                // Replace source with selected file
                l.setAttribute('src', e.target.result)

            }


        }

        // Native JS method to read the input data as an URL
        reader.readAsDataURL(inputField.files[0]);
    }
}


// Grab elements, create settings, etc.
var video = document.getElementById('video');

if (video){

    // Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
}

}


/* Legacy code below: getUserMedia 
else if(navigator.getUserMedia) { // Standard
    navigator.getUserMedia({ video: true }, function(stream) {
        video.src = stream;
        video.play();
    }, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
    navigator.webkitGetUserMedia({ video: true }, function(stream){
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
    }, errBack);
} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
    navigator.mozGetUserMedia({ video: true }, function(stream){
        video.src = window.URL.createObjectURL(stream);
        video.play();
    }, errBack);
}
*/