<script>
function validateForm1()
{
  //Validation for loginform

    var varEmail = document.forms["loginform"]["email"].value;
    var varPass  = document.forms["loginform"]["password"].value;

    var checkEmail = /^[a-zA-Z0-9._]+@[a-z0-9-]+\.[a-z.]+$/; //dont forget the '+' before '$'
    var lenPass = varPass.length;

    if (!checkEmail.test(varEmail))
    {
      alert("Email not valid. Please enter your email in standard format.");
      loginform.email.focus();
      return false;
    }
    if (lenPass < 8)
    {
      alert("Password not valid. Please enter at least 8 characters.");
      loginform.password.focus();
      return false;
    }
  }

  function validateForm2()
  {
  // Validation for signupform

  var varEmail = document.forms["signupform"]["email"].value;
  var varPass  = document.forms["signupform"]["password"].value;
  var varName  = document.forms["signupform"]["name"].value;
  var varMobile  = document.forms["signupform"]["mobile"].value;
  var varAddress  = document.forms["signupform"]["address"].value;
  var varCity  = document.forms["signupform"]["city"].value;
  var varPincode  = document.forms["signupform"]["pincode"].value;

  var checkEmail = /^[a-zA-Z0-9._]+@[a-z0-9-]+\.[a-z.]+$/; //dont forget the '+' before '$'
  var lenPass = varPass.length;
  var lenMobile = varMobile.length;
  var lenPincode = varPincode.length;

  flagLogin = 0;
  flagSignup = 0;

  if (!checkEmail.test(varEmail))
  // {
  //   flagLogin += 1;
  // }
  // else
  {
    alert("Email not valid. Please enter your email in standard format.");
    signupform.email.focus();
    return false;
  }
  if (lenPass < 8)
  {
    alert("Password not valid. Please enter at least 8 characters.");
    signupform.password.focus();
    return false;
  }
  if (lenMobile != 10)
  {
    alert("Mobile number not valid. Please enter exactly 10 digits.");
    signupform.mobile.focus();
    return false;
  }
  if (lenPincode != 6)
  {
    alert("Pincode not valid. Please enter at exactly 6 characters.");
    signupform.pincode.focus();
    return false;
  }

}
</script>
