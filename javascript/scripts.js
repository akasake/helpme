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

// Here we will call for ajaxcall