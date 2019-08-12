// JavaScript Document

// Function used to validate the email during the activation proccess
function validateEmail(email) {

  // If the email adjust to the regular expression the function will return true
  if (/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email)) {
    return true;
  }

  // Otherwise, false
  else {
    return false;
  }
}

// Function used to check if the passwords match.
function passwordMatch(choosePassword, confirmPassword) {

  // If both passwords match, the function will return true
  if (choosePassword == confirmPassword) {
    return true;
  }

  // Otherwise, false
  else {
    return false;
  }
}

// Function that checks the minimun allowed length of the password (8 characters)
function passwordLength(choosePassword) {

  if (choosePassword.length <= 7) {
    return false;
  } else {
    return true;
  }
}

// Function that will trigger both of the functions described above
// and if both of them return true, send the form to the server.
function loginValidated() {

  //Getting and removing blank spaces from the form fields "email" and "password"
  var email = document.getElementById('email').value.trim();
  var password = document.getElementById('password').value.trim();

  // If the email field is empty show an alert with a message
  if (email == '') {
    alert('You need to enter a valid email');
  }

  // Also, if the password field is empty show an alert with a message
  else if (password == '') {
    alert('You need to enter a password!');
  }

  // Also, if the email does not match the regular expression
  // stated in validateEmail(), show an alert with a message
  else if ((validateEmail(email)) == false) {
    alert('Wrong email format');
  }

  // If nothing of the above occurs then submit the form to the server
  else {
    document.forms['loginForm'].submit();
  }
}

// Function with the same functionality as the one above but for the activation page
function activationValidated() {

  var email = document.getElementById('email').value.trim();
  var choosePassword = document.getElementById('choosePassword').value.trim();
  var confirmPassword = document.getElementById('confirmPassword').value.trim();
  var idNumber = document.getElementById('idNumber').value.trim();

  if (idNumber == '') {
    alert('You must provide an ID number!');
  } else if ((validateEmail(email)) == false) {
    alert('Wrong email format!');
  } else if (passwordLength(choosePassword) == false || passwordLength(confirmPassword) == false) {
    alert('Password must have ate least 8 characters!');
  } else if (passwordMatch(choosePassword, confirmPassword) == false) {
    alert('Passwords do not match!');
  } else {
    document.forms['activationForm'].submit();
  }
}

// Function that will display the by-default hidden
// divs to upload the profile picture and assignments
function revealDiv(id) {
  var hiddenDiv = document.getElementById(id);
  if (hiddenDiv.style.display == 'none') {

    hiddenDiv.style.display = 'block';
  } else {
    hiddenDiv.style.display = 'none';
  }
}

jQuery(function () {
  jQuery('#date').datepicker();
});
