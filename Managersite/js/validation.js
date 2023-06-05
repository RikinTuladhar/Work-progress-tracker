// Assuming you have a form element with the id "form_register"
var form = document.getElementById("form_register");

form.addEventListener("submit", function (event) {
  
  event.preventDefault();


  var phoneInput = document.getElementById("phone").value;

 
  function validatePhoneNumber(phoneInput) {
    var phoneRegex = /^\d+$/;
    return phoneRegex.test(phoneInput);
  }
  
  
  if (validatePhoneNumber(phoneInput)) {
    alert("Correct")
  } else {
    console.log("Not correct");
  }
  // Perform further actions or submit the form if needed
});
