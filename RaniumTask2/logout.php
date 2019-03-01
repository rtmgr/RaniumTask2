<?php
  session_start();
  $page = $_SERVER['HTTP_REFERER'];

  $_SESSION["email"] = "";
  $_SESSION["name"] = "";
  $_SESSION["flag"] = 0;

  session_destroy();
  header("Location:$page");
 ?>
