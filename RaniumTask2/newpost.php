<!DOCTYPE html>
<html>

<!-- starting session -->
<?php
session_start();

if (isset($_SESSION["name"]))
  $name = $_SESSION["name"];


?>

<head>
  <meta charset="utf-8"/>
  <title> Public Blog </title>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css"  type="text/css"/>
  <link rel="stylesheet" href="css/style.css"  type="text/css"/>

  <style>
    .container-fluid {
      background-color: lightblue;
    }
    #home {
      text-align:center; color: purple;
      font-weight: bold;

    }
    .notextdecor {
      text-decoration: none;
    }
    .pointer {cursor: pointer;}

  </style>
</head>

<body>

  <script>
    function validateForm1() {
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

    function validateForm2() {
    // Validation for signupform

      var varName  = document.forms["signupform"]["name"].value;
      var varEmail = document.forms["signupform"]["email"].value;
      var varPass  = document.forms["signupform"]["password"].value;

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

    }
  </script>

  <div class="container-fluid">
    <br/>
    <h1 id="home" style="font-family: 'Noto Serif', serif; font-weight:bold; font-style:italic; "> Blogging For Everyone </h1> <br/>  <!-- header -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" id="home">Hi there!</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"    aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php"> &emsp; Home &emsp; </a>
          <?php
        //checking if user has already logged in
            if (isset ($_SESSION["flag"])) {
              if ($_SESSION["flag"] == 1) { // i.e. user has logged in or signed up
                echo "<a class='nav-item pointer active'> Welcome " .$_SESSION["name"]. "&emsp;</a>";
              }
              else {
                echo "<a class='nav-item nav-link pointer' data-toggle='modal' data-target='#loginModal'> Login &emsp; </a>";
              }
            }
            else echo "<a class='nav-item nav-link pointer' data-toggle='modal' data-target='#loginModal'> Login &emsp; </a>";


          //checking if signup link is required
            if (isset($_SESSION["flag"])) {
              if ($_SESSION["flag"] == 0) { // i.e. user has not logged in or signed up
                echo "<a class='nav-item nav-link pointer' data-toggle='modal' data-target='#signupModal'>Signup &emsp;</a>";
              }
            }
            echo "<a class='nav-item nav-link pointer' data-toggle='modal' data-target='#signupModal'>Signup &emsp;</a>";


            ?>

          <a class="nav-item nav-link" href="manageblog.php">Manage Your Blog &emsp;</a>

          <?php
        //checking if user has already logged in
            if (isset ($_SESSION["flag"])) {
              if ($_SESSION["flag"] == 1) {
            ?>
                <span style="float:right;"><a class="nav-item nav-link" href="logout.php">Logout &emsp;</a></span>
              <?php
              }
            }
              ?>
        </div>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid" style="background-image: url('images/blog-header-1280.jpg');">
      <div class="container"  style="color:white;" >
        <h1 class="display-4">This is your space</h1>
        <p class="lead">Go ahead, share your world.</p>
      </div>
    </div>


        <!-- LOGIN FORM  -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="text-align:center;">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="checklogin.php" method="post" onsubmit="return validateForm1()" name="loginform">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required=required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required=required>
                  </div>

                  <input type="submit" class="btn btn-primary" value="Login">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <a type="button" href="#signupModal" class="btn btn-success">Signup</a> -->
              </div>
            </div>
          </div>
        </div>


        <!-- SIGNUP FORM -->
        <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="text-align:center;">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="signup.php" method="post" onsubmit="return validateForm2()" name="signupform">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required=required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required=required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required=required>
                  </div>

                  <input type="submit" class="btn btn-success" value="Signup">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Login</button> -->
              </div>
            </div>
          </div>
        </div>


    <div class="hero" style="background-color: white;">
      <div class="col-8" style="margin-left:15%;">
        <h1 style="text-align:center;"> ~ Write A New Post ~ </h1><br/><br/>

        <form action="addpost.php" method="post">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
          </div>

          <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category">
          </div>

          <div class="form-group">
            <label for="content">Content of the post</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Your thoughts here..."></textarea>
          </div>

          <div class="form-group">
            <label for="intro">A short introduction to your post</label>
            <textarea class="form-control" id="intro" name="intro" rows="2" placeholder="Just a couple of lines"></textarea>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-success" value="Submit">
          </div>
        </form>
        <br/><br/><br/><br/>

      </div>
    </div>
