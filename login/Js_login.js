/*silde hune kam yesle garauxha*/
let form_login = document.querySelector("#form_login");
let form_register = document.querySelector("#form_register");
var z = document.getElementById("btn");
function register() {
  form_login.style.left = "-400px";
  form_register.style.left = "50px";
  z.style.left = "110px";
}
function login() {
  form_login.style.left = "50px";
  form_register.style.left = "450px";
  z.style.left = "0";
}

//login form validation
form_login.addEventListener("submit", function (event) {
  event.preventDefault();

  let username = document.getElementById("name-login").value;
  let password = document.getElementById("password-login").value;

  if (username.trim() === "") {
    alert("Please enter a username l");
    return;
  }

  // Validate the password
  if (password.trim() === "") {
    alert("Please enter a password l");
    return;
  }

  form_login.submit();
});

//Register from validation

// Add event listener for form submission
form_register.addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent the form from submitting

  // Get the input field values
  let username = document.getElementById("name-register").value;
  let password = document.getElementById("password-register").value;
  let confirmpw = document.getElementById("confirmpw").value;
  let email = document.getElementById("email-register").value;
  let agreeCheckbox = document.querySelector("#checkbox");

  // Validate the username
  if (username.trim() === "") {
    alert("Please enter a username");
    return;
  }

  // Validate the password
  if (password.trim() === "") {
    alert("Please enter a password");
    return;
  }
  if (password.length < 6) {
    alert("Password should content more than 6 characters");
    return;
  }

  if (confirmpw.trim() === "") {
    alert("Please enter a Re-Enter password");
    return;
  }
  if (password !== confirmpw) {
    alert("Please enter same password");
    return;
  }

  // Password should contain at least one uppercase letter
  // if (!/[A-Z]/.test(password)) {
  //   return false;
  // }

  // Password should contain at least one lowercase letter
  // if (!/[a-z]/.test(password)) {
  //   return false;
  // }

  // Password should contain at least one digit
  // if (!/[0-9]/.test(password)) {
  //   return false;
  // }

  // // Validate the email  /^[a-zA-Z0-9]+@[A-Z0-9]+\.[A-Z]{2,}$/i
  const emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
  if (emailRegex.test(email)) {
  } else {
    alert("Invalid email");
    return false;
  }

  // if (email.trim() === "") {
  //   alert("Please enter an email");
  //   return;
  // }
  // if (email.charAt(0) == "@") {
  //   alert("@ cannot be at beginning");
  //   return;
  // }
  // if (email.search(/@/i) == -1) {
  //   alert("Please enter a valid email");
  //   return;
  // }

  // Validate the checkbox
  if (!agreeCheckbox.checked) {
    alert("Please agree to the terms and conditions");
    return;
  }
  form_register.submit();
  // If all validations pass, you can proceed with form submission
  // For example, you can make an AJAX request to submit the form data
  // Here, we'll simply log the form data
  console.log("Form submitted");
  console.log("Username:", username);
  console.log("Password:", password);
  console.log("Email:", email);
});
