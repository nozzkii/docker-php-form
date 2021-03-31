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
    let $firstName = $("input[name='firstName']").val();
    let $lastName = $("input[name='lastName']").val();
    let $streetAdress = $("input[name='streetAdress']").val();
    let $secondStreetAdress = $("input[name='secondStreetAdress']").val();
    let $city = $("input[name='city']").val();
    let $region = $("input[name='region']").val();
    let $postal = $("input[name='postal']").val();
    let $country = $("input[name='country']").val();
    let $userName = $("input[name='userName']").val();
    let $password = $("input[name='password']").val();

    // Put the object into storage
    let $personalData = {
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
  let $userName = $("input[name='userName']").val();
  let $password = $("input[name='password']").val();
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
