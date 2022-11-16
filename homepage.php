<?php
require 'dbtable_creation.php';
session_start();
$_SESSION["querychoice"] = "";

//Account Verification
if (isset($_POST['submit'])) {

  $user = $_REQUEST['email'];
  $pass = $_REQUEST['pass'];
  if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
  } else {
    $stmt = $conn->prepare("SELECT * FROM rtu_admin WHERE admin_user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
      $data = $stmt_result->fetch_assoc();
      if ($data['admin_pass']  === $pass) {
        setcookie("email", $user, time() + 60 * 60 * 24 * 365);
        setcookie("pass", $pass, time() + 60 * 60 * 24 * 365);
        $_SESSION['user'] = $user;
        $_SESSION['whoactive'] = "0";
        echo "<script> window.location.replace('adminpanelfinal.php#adminpanelcon'); </script>";
      } else {
        echo '<script>openmail()</script>';
        echo '<script>openForm()</script>';
      }
    } else {
      echo '<script>openmail()</script>';
      echo '<script>openForm()</script>';
    }
  }
} elseif (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {
  echo "<script> window.location.replace('adminpanelfinal.php#adminpanelcon'); </script>";
  $_SESSION['user'] = $user;
}



?>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-STUDY</title>

  <!--CSS Link-->
  <link rel="stylesheet" href="style.css">

  <!--Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="homepageScript.js"></script>

</head>

<!--Manual CSS-->

<style type="text/css">
  #message {
    display: none;
  }

  #search_icon {
    height: 5%;
    width: 5%;
  }

  #tdata,
  #hidetable,
  #theader {
    text-align: center;
    vertical-align: middle;
  }

  @media only screen and (max-width: 1100px) {
    .fadeshow {
      display: none;
    }

    #hidetable {
      display: none;
    }

    .table {
      font-size: 12px;
    }

    #viewbtn {
      font-size: 12px;
    }
  }

  body {
    background-image: url('images/homepagebg.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
  }

  #footer {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
  }
  #forgotPassModalbtn {
    background: none;
    color: red;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
    text-decoration: underline;
    text-decoration-color: inherit;
  }
  .input-group-text {
    background-color: #1C5090;
    color: white;
    font-weight: bold;
  }
  .eye,
  .eye:hover,
  .eye:active,
  .eye:visited {
    background-color: #194F90;
  }
  

  #forgotPassModalbtn {
    background: none;
    color: red;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
    text-decoration: underline;
    text-decoration-color: inherit;
  }

  .input-group-text {
    background-color: #1C5090;
    color: white;
    font-weight: bold;
  }

  .eye,
  .eye:hover,
  .eye:active,
  .eye:visited {
    background-color: #194F90;
  }

  /*****************************CSS FOR OLAF AND NEED HELP? BUTTON********************************/
  #chatbotbtn {
    background-color: #194f90;
    color: white;
    padding: 16px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 76%;
    width: 280px;
    font-weight: bold;
  }

  #Olaf {

    float: right;

  }

  #olafTitle {

    font-weight: bold;
    color: white;
  }

  #olafHead {

    background-color: #194f90;

  }

  /************************CSS FOR OLAF**********************************/
</style>


<body>


  <!--Header-->
  <div class="sticky-sm-top">
    <?php
    require 'header.php'; ?>
  </div>


  <!--Search bar-->
  <div style="padding-top: 3%;" class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control rounded" id="Search_bar" placeholder="What are you looking for" aria-label="Search" aria-describedby="search-addon" style=" background-color: transparent; border-style: solid; border-width: 2px; border-color: #1c5090" />
          <button type="button" class="btn btn-outline-primary" style="border-style: solid;border-width: 2px;border-color: #1c5090">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div id="result"></div>
  </div>



  <!--Departments-->

  <div id="mainContainer" class="row">

    <div class="card" style="width: 20rem; background-color: transparent;">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/Iconceat.png" alt="CEAT" style="width:300px; height:300px;">
          </div>
          <div class="flip-card-back">
            <h4>COLLEGE OF ENGINEERING, ARCHITECTURE, AND TECHNOLOGY</h4>
            <form action="student-view.php" method="POST">
              <input type="hidden" name="tabvalue" value="1">
              <input type="submit" name="Explore" class="btn btn-primary" id="dept" value="Explore">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card" style="width: 20rem; background-color: transparent;">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/Iconcbet.png" alt="CBET" style="width:300px; height:300px;">
          </div>
          <div class="flip-card-back">
            <h4>COLLEGE OF BUSINESS AND ENTREPRENEURIAL TECHNOLOGY</h4>
            <form action="student-view.php" method="POST">
              <input type="hidden" name="tabvalue" value="2">
              <input type="submit" name="Explore" class="btn btn-primary" id="dept" value="Explore">
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="card" style="width: 20rem; background-color: transparent;">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/Iconcas.png" alt="CAS" style="width:300px; height:300px;">
          </div>
          <div class="flip-card-back">
            <h4>COLLEGE OF ARTS AND SCIENCES</h4>
            <form action="student-view.php" method="POST">
              <input type="hidden" name="tabvalue" value="3">
              <input type="submit" name="Explore" class="btn btn-primary" id="dept" value="Explore">
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="card" style="width: 20rem; background-color: transparent;">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/Iconced.png" alt="CED" style="width:300px; height:300px;">
          </div>
          <div class="flip-card-back">
            <h4>COLLEGE OF EDUCATION</h4>
            <form action="student-view.php" method="POST">
              <input type="hidden" name="tabvalue" value="4">
              <input type="submit" name="Explore" class="btn btn-primary" id="dept" value="Explore">
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="card" style="width: 20rem; background-color: transparent;">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/Iconipe.png" alt="IPE" style="width:300px; height:300px;">
          </div>
          <div class="flip-card-back">
            <h4>INSTITUTE OF PHYSICAL EDUCATION</h4>
            <form action="student-view.php" method="POST">
              <input type="hidden" name="tabvalue" value="5">
              <input type="submit" name="Explore" class="btn btn-primary" id="dept" value="Explore">
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="card" style="width: 20rem; background-color: transparent;">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/Icongs.png" alt="GS" style="width:300px; height:300px;">
          </div>
          <div class="flip-card-back">
            <h4>GRADUATE SCHOOL</h4>
            <form action="student-view.php" method="POST">
              <input type="hidden" name="tabvalue" value="6">
              <input type="submit" name="Explore" class="btn btn-primary" id="dept" value="Explore">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!------------------------------FOOTER------------------------------>

    <div id="page-container">
      <div id="content-wrap">
        <!-- all other page content -->

        <div class="row-12">
          <footer style="background-color: #0053aa;">
            <div class="container p-4">
              <div class="row">
                <div class="col-lg-5 col-md-12 mb-4">
                  <h5 class="mb-3" style="letter-spacing: 2px; color: white;">
                    <!---add title here---->
                  </h5>
                  <h6 style="color: white;">
                    <!------------add content here-------------->
                  </h6>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                  <h5 class="mb-3" style="letter-spacing: 2px; color: white;">Contact Us</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="mb-1">
                      <a href="mailto:libraryservices@rtu.edu.ph" style="color: white;"><i class="bi bi-envelope-heart-fill"></i> libraryservices@rtu.edu.ph</a>
                    </li>
                    <li class="mb-1">
                      <a href="https://web.facebook.com/rtulrc" style="color: white;"><i class="bi bi-facebook"></i> RTU Learning Resource Center 2020</a>
                    </li>
                    <li class="mb-1">
                      <a href="https://sites.google.com/rtu.edu.ph/rtu-ulrc" style="color: white;"><i class="bi bi-browser-chrome"></i> OTHER WEBSITE</a>
                    </li>
                    <li style="color: white;">
                      <i class="bi bi-telephone-fill"></i> 285348267</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                  <h5 class="mb-1" style="letter-spacing: 2px; color: white;">Library Hours</h5>
                  <table class="table" style="color: white; border-color: #666;">
                    <tbody>
                      <tr>
                        <td>Mon - Fri:</td>
                        <td>8:00 A.M. -<br> 5:00 P.M.</td>
                      </tr>
                      <tr>
                        <td>Lunch Break:</td>
                        <td>12:00 P.M. -<br> 1:00 P.M</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="text-center p-3" style="background-color: #194f90;">
              © 2022 Variable Set. All Rights Reserved.
            </div>
            <!-- Copyright -->
          </footer>
        </div>
      </div>
      <footer id="footer"></footer>
    </div>
    <!------------------------------END OF FOOTER------------------------------>
  </div>

  <!---------------------------------------------MODAL FOR OLAF-------------------------------->

  <!--Chatbot-->
  <button type="button" class="btn btn-primary" id="chatbotbtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
    NEED HELP?
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="height: 100%;">
      <div class="modal-content" style="height: 100%;">
        <div class="modal-header" id="olafHead">
          <h5 class="modal-title" id="olafTitle">Olaf Assistance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">

          <iframe src="bot.php" frameborder="0" height="95%" width="59%" id="Olaf"></iframe>

        </div>
      </div>
    </div>
  </div>

  <!--------------------------------------------END OF OLAF MODAL-------------------------->

  <!--Login Form-->
<button class="open-button fadeshow" id="Openbtn" onclick="openForm()">ADMIN LOGIN</button>

<div class="form-popup fadeshow" id="myForm">

  <form method="POST" id="adminForm" class="form-container">
    <hr>
    <h2 id="login">ADMIN LOGIN</h2>
    <hr>
    <span id="message" class='h6 text-danger text-center mt-3'>Username or password is incorrect</span>
    <br>
    <label for="email"><b>USERNAME:</b></label>
    <input type="text" placeholder="RTU Admin" name="email" id="User" autocomplete="off" required>

    <label for="psw"><b>PASSWORD:</b></label>
    <input type="password" placeholder="Password" name="pass" id="Pass" required>
    <!-- trigger forgot password modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#forgotPassModal" id="forgotPassModalbtn">
      <b>Forgot Password?</b>
    </button>
    <button type="submit" class="btn" name="submit"> LOGIN</button>
    <button type="button" class="btn cancel" onclick="closeForm()">CLOSE</button>
  </form>
</div>
<!-- Modal Reset Password -->
<div class="modal fade" id="forgotPassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Reset your password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="code.php" method="POST">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Username:</span>
            <input type="text" class="form-control" placeholder="Enter new admin username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUser" name="newUser" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">New Password:</span>
            <input type="password" class="form-control" placeholder="Enter password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUserPassword" name="newUserPassword" required>
            <button class="btn btn-primary eye" type="button" id="newUserPasswordbtn"><i class="bi bi-eye-slash" id="newUserPassIcon"></i></button>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Confirm New Password:</span>
            <input type="password" class="form-control" placeholder="Retype password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUserPasswordConfirm" name="newUserPasswordConfirm" required>
            <button class="btn btn-primary eye" type="button" id="newUserPasswordConfirmbtn"><i class="bi bi-eye-slash" id="newUserPassConfirmIcon"></i></button>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-key-fill" style="margin-right: 10px;"></i>Master Key Code:</span>
            <input type="password" class="form-control" placeholder="Enter master key code" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="masterkeyInput" name="masterkeyInput" required>
            <button class="btn btn-primary eye" type="button" id="masterkeyInputbtn"><i class="bi bi-eye-slash" id="masterkeyIcon"></i></button>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-success" name="createAdminbtn" id="createAdminbtn">Reset Password</button>
      </div>
      </form>
    </div>
  </div>
</div>
            
  
  <?php
  //Account Verification
  if (isset($_POST['submit'])) {

    $user = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    if ($conn->connect_error) {
      die("Failed to connect: " . $conn->connect_error);
    } else {
      $stmt = $conn->prepare("SELECT * FROM rtu_admin WHERE admin_user = ?");
      $stmt->bind_param("s", $user);
      $stmt->execute();
      $stmt_result = $stmt->get_result();
      if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['admin_pass']  === $pass) {
          setcookie("email", $user, time() + 60 * 60 * 24 * 365);
          setcookie("pass", $pass, time() + 60 * 60 * 24 * 365);
          echo "<script> window.location.replace('adminpanelfinal.php#adminpanelcon'); </script>";
        } else {
          echo '<script>openmail()</script>';
          echo '<script>openForm()</script>';
        }
      } else {
        echo '<script>openmail()</script>';
        echo '<script>openForm()</script>';
      }
    }
  } elseif (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {
    echo "<script> window.location.replace('adminpanelfinal.php#adminpanelcon'); </script>";
  }
  ?>
</body>

</html>