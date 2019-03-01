<?php

  session_start();
  $sessionid = session_id();
  $page = $_SERVER['HTTP_REFERER'];

  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass = $_POST["password"];

  $conn = mysqli_connect("localhost", "root", "", "ranium");
  $qr = "insert into user_info (email, password, name) values ('$email', '$pass', '$name') ";
  $res = mysqli_query($conn, $qr);

  $_SESSION["name"] = $name;
  $_SESSION["email"] = $email;
  $_SESSION["flag"] = 1; // denotes that user is logged in
  $_SESSION["signedup"] = " You're successfully signed up. Congrats!";
  header("Location:$page");


 ?>
