$(function(){

$("form[name='register']").on('submit', function(event) {
    localStorage.clear();
   //event.preventDefault();
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
    var $personalData = {'firstName': $firstName, 'lastName': $lastName, 'streetAdress': $streetAdress, 'lineAdress': $lineAdress, 'city': $city, 'region': $region, 'postal': $postal};
    localStorage.setItem('registerUserData', JSON.stringify($personalData));
    // Save variables in localStorage
    location.pathname = '/received.php'
//}
  if(typeof(Storage) == "undefined") {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
  }


    return false;
})

function getData() {
    if(window.localStorage!==undefined) {
        var fields = $(this).serialize();

        localStorage.setItem("eloqua-fields", JSON.stringify( fields ));
        alert("Stored Succesfully");
        $(this).find("input").val(""); //this ONLY clears input fields, you also need to reset other fields like select boxes,...
        alert("Now Passing stored data to Server through AJAX jQuery");
        $.ajax({
            type: "POST",
            url: "account.php",
            data: {data: fields},
            success: function(data) {
                $('#output').html(data);
            }
        });
    } else {
        alert("Storage Failed. Try refreshing");
    }
}

$("button#logout").on('click', function() {
  localStorage.clear();
  //window.location.href = "index.php";
});


    function createPersonDataArray(){
        var $personalData = new Array();
    }


    function hello(){
        consol.log("hello");
    }

    function saveAccountData(name, data){
        var obj = {};
        obj[name] = data;
        arr.push(obj);
        localStorage.setItem('accountData', JSON.stringify($personalData));
    }



});


