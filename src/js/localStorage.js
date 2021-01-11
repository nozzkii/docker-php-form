$(function(){

$("form[name='register']").on('submit', function(event) {
    localStorage.clear();
   event.preventDefault();
//if (typeof(Storage) !== "undefined") {
    // Store
    var $firstName = $("input[name='firstName']").val();
    var $lastName = $("input[name='lastName']").val();
    var $streetAdress = $("input[name='streetAdress']").val();
    var $lineAdress = $("input[name='lineAdress']").val();
    var $city = $("input[name='city']").val();
    var $region = $("input[name='region']").val();
    var $postal = $("input[name='postal']").val();

// Put the object into storage
    //localStorage.setItem('testObject', JSON.stringify(testObject));
    // Save variables in localStorage
    localStorage.setItem('firstName', $firstName);
    localStorage.setItem('lastName', $lastName);
    localStorage.setItem('streetAdress', $streetAdress);
    localStorage.setItem('lineAdress', $lineAdress);
    localStorage.setItem('city', $city);
    localStorage.setItem('$region', $region);
    localStorage.setItem('postal', $postal);
    location.pathname = '/login.php'
//}
  if(typeof(Storage) == "undefined") {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
  }


    return false;
});


$("button#logout").on('click', function() {
  localStorage.clear();
  window.location.href = "index.php";
});

});


