// Assuming you have a form element with the id "form_register"
var form = document.getElementById("form_register");

form.addEventListener("submit", function (event) {
  // Prevent the form from submitting
  event.preventDefault();

  // Get the email and phone number values from the form
  var emailInput = document.getElementById("email").value;
  var phoneInput = document.getElementById("phone").value;

    // Email validation
function validateEmail(email) {
    // Regex pattern for email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
  
  // Phone number validation
  function validatePhoneNumber(phoneNumber) {
    // Regex pattern for phone number validation (numeric value only)
    var phoneRegex = /^\d+$/;
    return phoneRegex.test(phoneNumber);
  }
  
  // Example usage
  var email = "example@example.com";
  var phoneNumber = "1234567890";
  
  if (validateEmail(email)) {
    console.log("Email is valid");
  } else {
    console.log("Email is invalid");
  }
  
  if (validatePhoneNumber(phoneNumber)) {
    console.log("Phone number is valid");
  } else {
    console.log("Phone number is invalid");
  }
  



  // Validate the email
  if (validateEmail(emailInput)) {
    console.log("Email is valid");
  } else {
    console.log("Email is invalid");
  }

  // Validate the phone number
  if (validatePhoneNumber(phoneInput)) {
    console.log("Phone number is valid");
  } else {
    console.log("Phone number is invalid");
  }

  // Perform further actions or submit the form if needed
});
