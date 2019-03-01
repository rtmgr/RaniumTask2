<!DOCTYPE html>

<?php
//starting session
session_start();
$sessionid = session_id();
$page = $_SERVER['HTTP_REFERER'];
//catching email and password from
$email = $_POST["email"];
$pass = $_POST["password"];

$conn = mysqli_connect("localhost", "root", "", "ranium");
$qr = "select * from user_info where email='$email' and password='$pass' ";
$res = mysqli_query($conn, $qr);

//local variable to check if login details are correct
$check = 0;
while ($row = mysqli_fetch_array($res))
{
  // if the details match in the database check will be changed to 1
  $check = 1;
  $_SESSION["name"] = $row["name"];
}

if ($check == 1) //(if details match)
{
  //storing email in session variable to use in further pages
  $_SESSION["email"] = $email;
  $_SESSION["flag"] = 1; // denotes that user is logged in

  header("Location:$page"); // redirecting to next page
}
else //(if details dont match)
{
  $_SESSION["flag"] = 0; // denotes that the user is not logged in
  $_SESSION["error"] = "Sorry, incorrect credentials. Please try again.";
  header("Location:$page"); // redirecting to same page


}


?>


</html>
