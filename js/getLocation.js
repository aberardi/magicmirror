function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    document.getElementById("geoLocationLatitude").value = position.coords.latitude;
    document.getElementById("geoLocationLongitude").value = position.coords.longitude;
    calculate();
}
