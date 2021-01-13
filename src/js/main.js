$(function () {

  $("button#logout").on('click', function () {
    localStorage.clear();
    window.location.href = "index.php";
  });

});

function register() {
  localStorage.clear();
  //event.preventDefault();
  if (window.localStorage !== undefined) {
    // Store
    var $firstName = $("input[name='firstName']").val();
    var $lastName = $("input[name='lastName']").val();
    var $streetAdress = $("input[name='streetAdress']").val();
    var $secondStreetAdress = $("input[name='secondStreetAdress']").val();
    var $city = $("input[name='city']").val();
    var $region = $("input[name='region']").val();
    var $postal = $("input[name='postal']").val();
    var $country = $("input[name='country']").val();
    var $userName = $("input[name='userName']").val();
    var $password = $("input[name='password']").val();

    // Put the object into storage
    var $personalData = {
      'firstName': $firstName,
      'lastName': $lastName,
      'streetAdress': $streetAdress,
      'secondStreetAdress': $secondStreetAdress,
      'city': $city,
      'region': $region,
      'postal': $postal,
      'country': $country
    };
    localStorage.setItem('registerUserData', JSON.stringify($personalData));
    //location.pathname = '/login.php'
    alert("Stored Succesfully");
    $.ajax({
      type: "POST",
      url: "checkRegister.php",
      data: {
        firstName: $firstName,
        lastName: $lastName,
        streetAdress: $streetAdress,
        secondStreetAdress: $secondStreetAdress,
        city: $city,
        region: $region,
        postal: $postal,
        country: $country,
        userName: $userName,
        password: $password
      },
      success: function (data) {
        $('#register').html("");
        $('#output').html(data);
      },
      error: function () {
        $('#output').html('An error occurred');
      }
    });
  } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
  }
}

function login() {
  var $userName = $("input[name='userName']").val();
  var $password = $("input[name='password']").val();
  $.ajax({
    type: "POST",
    url: "account.php",
    data: {
      userName: $userName,
      password: $password
    },
    success: function (data) {
      $('#login').html("");
      $('#output').html(data);
    },
    error: function () {
      $('#output').html('An error occurred');
    }
  });

}