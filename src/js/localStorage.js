$(function(){
// Check browser support
// $("form[name='signIn']").on('submit', function(event) {
  // event.preventDefault();
function myFunction(){
if (typeof(Storage) !== "undefined") {
    // Store
    if (this.readyState == 4 && this.status == 200) {
    var $firstName = $("input[name='firstName']").val();
    var $lastName = $("input[name='lastName']").val();
    var $streetAdress = $("input[name='streetAdress']").val();
    var $lineAdress = $("input[name='lineAdress']").val();
    var $city = $("input[name='city']").val();
    var $region = $("input[name='region']").val();
    var $postal = $("input[name='postal']").val();

    // Save variables in localStorage
    localStorage.setItem('firstName', $firstName);
    localStorage.setItem('lastName', $lastName);
    localStorage.setItem('streetAdress', $streetAdress);
    localStorage.setItem('lineAdress', $lineAdress);
    localStorage.setItem('region', $region);
    localStorage.setItem('postal', $postal);
    localStorage.setItem('city', $city);
      }
}
  else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
  }
}


$("button#logout").on('click', function() {
  localStorage.clear();
  window.location.href = "index.php";
});

});


