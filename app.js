function validateForm() {
  const email = document.getElementById("email").value;
  const emailError = document.getElementById("emailError");
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if (!emailPattern.test(email)) {
    emailError.textContent = "Please enter a valid email address";
    return false;
  }

  emailError.textContent = "";
  return true;
}
