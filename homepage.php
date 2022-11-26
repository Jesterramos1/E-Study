<?php
require 'dbtable_creation.php';
session_start();
$_SESSION["querychoice"] = "";


//Account Verification

include "dbcon.php";
if (isset($_POST['submit'])) {

  $user = $_REQUEST['email'];
  $pass = $_REQUEST['pass'];
  if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
  } else {
    $stmt = $con->prepare("SELECT * FROM rtu_admin WHERE admin_user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
      $data = $stmt_result->fetch_assoc();
      if ($data['admin_pass']  === $pass) {
        setcookie("email", $user, time() + 60 * 60 * 24 * 365);
        setcookie("pass", $pass, time() + 60 * 60 * 24 * 365);
        $_SESSION['user'] = $user;
        header("location:adminpanelfinal.php#adminpanelcon");
        die();
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
  header("location: adminpanelfinal.php#adminpanelcon");
  die();
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

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

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
    background-image: url('images/rizal.png');
    background-position: center;
    background-position: top;
    background-repeat: no-repeat;
    background-attachment: fixed;
    overflow-x: hidden;
  }

  body::-webkit-scrollbar {
    display: none;
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

  .mainContainer {
    position: fixed;
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

  .btn:hover {
    color: #ffffff;
  }

  #myForm {
    border: none;
  }

  a {
    text-decoration: none;
  }

  .bi-facebook {
    font-size: 16px;
    display: inline-block;
    background: #fff;
    padding: 5px 12px;
    border-radius: 5px;
    margin: 0 3px;
    font-size: 16px;
    color: #000;
    cursor: pointer;
    color: #1361ab;
  }

  .bi-google {
    font-size: 16px;
    display: inline-block;
    background: #fff;
    padding: 5px 12px;
    border-radius: 5px;
    margin: 0 3px;
    font-size: 16px;
    color: #000;
    cursor: pointer;
    color: #ff2a13;
  }

  .flip-card {
    background-color: transparent;
    width: 320px;
    height: 320px;
    perspective: 1000px;
  }

  .flip-card-back {
    background-color: #194f90;
    color: #ffffff;
    transform: rotateY(180deg);
    border-radius: 30px;
    width: 320px;
    height: 320px;

  }

  h4 {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -80%);
  }
</style>


<body>


  <!--Header-->
  <div class="sticky-sm-top">
    <?php
    require 'header.php'; ?>
  </div>


  <!--Search bar-->
  <div style="padding-top: 4%;" class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control rounded fs-5" id="Search_bar" placeholder="What are you looking for?" aria-label="Search" aria-describedby="search-addon" style=" background-color: transparent; border-style: solid; border-width: 2px; border-color: #1c5090" />
          <button type="button" class="btn btn-outline-primary" id="Search_btn" style="border-style: solid; border-width: 2px; border-color: #1c5090; color:#1c5090;">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>
    </div>
    <div id="result"></div>
  </div>



  <!--Departments-->

  <div id="mainContainer" class="row">

    <div class="row d-flex justify-content-center">

      <div class="card mb-4 mx-3 " style="width: 22rem; background-color: transparent;">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/Iconceat.png" alt="CEAT" style="width:320px; height:320px;">
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

      <div class="card mb-4 mx-3 " style="width: 22rem; background-color: transparent;">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/Iconcbet.png" alt="CBET" style="width:320px; height:320px;">
            </div>
            <div class="flip-card-back">
              <h4>COLLEGE OF BUSINESS, ENTREPRENEURSHIP, AND ACCOUNTANCY</h4>
              <form action="student-view.php" method="POST">
                <input type="hidden" name="tabvalue" value="2">
                <input type="submit" name="Explore" class="btn btn-primary" id="dept" value="Explore">
              </form>
            </div>
          </div>
        </div>
      </div>


      <div class="card mb-4 mx-3 " style="width: 22rem; background-color: transparent;">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/Iconcas.png" alt="CAS" style="width:320px; height:320px;">
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


      <div class="card mb-4 mx-3 " style="width: 22rem; background-color: transparent;">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/Iconced.png" alt="CED" style="width:320px; height:320px;">
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


      <div class="card mb-4 mx-3 " style="width: 22rem; background-color: transparent;">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/Iconipe.png" alt="IPE" style="width:320px; height:320px;">
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


      <div class="card mb-4 mx-3 " style="width: 22rem; background-color: transparent;">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="images/Icongs.png" alt="GS" style="width:320px; height:320px;">
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
    </div>
    <!------------------------------FOOTER------------------------------>
    <footer class="text-lg-start text-white mt-5 pb-5" style="background-color: #0053aa;">

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold"><i class="bi bi-person-fill"></i> Live Visitor Counter</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 120px; background-color:#ffffff; height:2px;" />
              <h5><span class="badge bg-danger">Total Visits:</span></h5>
              <h1 id="count" style="font-size:80px; margin-top:-5%;"></h1>

              <script>
                const count = document.getElementById('count');

                updateVisitCount();

                function updateVisitCount() {
                  fetch('https://api.countapi.xyz/update/danielazocardev/codepen/?amount=1')
                    .then(res => res.json())
                    .then(res => {
                      count.innerHTML = res.value
                    });
                }
              </script>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold"><i class="bi bi-clock-fill"></i> Library Hours:</h6>
              <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 75px; background-color:#ffffff; height:2px; " />
              <h6>Monday - Friday</h6>
              <h6>8:00AM - 5:00PM</h6>
              <hr class="mb-4 mt-3 d-inline-block mx-auto" style="width: 150px; background-color:#ffffff; height:2px; " />
              <h6 class="text-uppercase fw-bold"><i class="bi bi-clock-history"></i> Lunch Break:</h6>
              <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 75px; background-color:#ffffff; height:2px; " />
              <h6>12:00PM - 1:00PM</h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold"><i class="bi bi-telephone-fill"></i> Contact Us:</h6>
              <hr class="mb-3 mt-0 d-inline-block mx-auto" style="width: 85px; background-color:#ffffff; height:2px;" />
              <h6><b>Telephone:</b> +(02)85348267</h6>
              <h6><b> Email:</b> libraryservices@rtu.edu.ph</h6>

              <h6 class="text-uppercase fw-bold mt-5"><i class="bi bi-globe"></i> Other Sites:</h6>
              <hr class="mb-2 mt-0 d-inline-block mx-auto" style="width: 85px; background-color:#ffffff; height:2px;" />
              <h6><a href="https://www.facebook.com/rtulrc/"><i class="bi bi-facebook"></i></a><a href="https://sites.google.com/rtu.edu.ph/rtu-ulrc/home"><i class="bi bi-google"></i></a></h6>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-5 col-xl-4 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold"><i class="bi bi-patch-question-fill"></i> For College Concerns Links:</h6>
              <hr class="mb-3 mt-0 d-inline-block mx-auto" style="width: 170px; background-color:#ffffff; height:2px; " />
              <h6><a href="mailto:graduateschool@rtu.edu.ph" class="text-white"> Graduate School</a></h6>
              <h6><a href="mailto:ced@rtu.edu.ph" class="text-white"> College of Education</a></h6>
              <h6><a href="mailto:cas@rtu.edu.ph" class="text-white">College of Arts and Sciences</a></h6>
              <h6><a href="mailto:ipe@rtu.edu.ph" class="text-white"> Institute of Physical Education</a></h6>
              <h6><a href="mailto:cbet@rtu.edu.ph" class="text-white"> College of Business and Entreprenuerial Technology</a></h6>
              <h6><a href="mailto:ceat@rtu.edu.ph" class="text-white"> College of Engineering, Architecture, and Technology </a></h6>
            </div>
            <!-- Grid column -->


          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->
    </footer>
    <!------------------------------END OF FOOTER------------------------------>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #194f90; color:#ffffff; position:absolute; bottom:0;"> © 2022 Variable Set. All Rights Reserved. </div>
    <!-- Copyright -->
  </div>

  <!---------------------------------------------MODAL FOR OLAF-------------------------------->

  <!--Chatbot-->
  <button type="button" class="btn btn-primary fadeshow" id="chatbotbtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
    NEED HELP?
  </button>

  <!-- Modal -->
  <div class="modal fade modalhome" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="height: 100%;">
      <div class="modal-content" style="height: 100%;">
        <div class="modal-header" id="olafHead">
          <h5 class="modal-title fw-bold" id="olafTitle">OLAF Assistance</h5>
          <button type="button" class="btn-close btn-close-white" id="closeBot" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body" style="background:url('images/bg.png'); background-repeat:no-repeat; background-size: cover;">
          <img src="images/olaf.png" class="rounded float-start position-absolute bottom-0 start-0" style="width:450px; height:450px;" alt="olaf">
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
  <div class="modal fade modalhome" id="forgotPassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #1C5090; color:#ffffff;">
          <h5 class="modal-title fw-bold" id="staticBackdropLabel">Reset Password</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mt-4 mb-5">
            <img src="images/lock.png" class="rounded" alt="lock" style="width:200px; height:200px;">
          </div>

          <div class="card mb-5" style="width:90%;">
            <div class="card-body" >
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
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success" name="createAdminbtn" id="createAdminbtn">Reset Password</button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script>
    function openForm() {
      $('#myForm').show();
    }

    function closeForm() {
      $('#myForm').hide();
    }

    function openmail() {
      document.getElementById("message").style.display = "block";
    }

    $(document).ready(function() {
      $('#Search_btn').click(function() {
        var txt = $('#Search_bar').val().trim();
        if (txt != '') {
          $.ajax({
            url: "fetch.php",
            method: "GET",
            data: {
              search: txt
            },
            dataType: "text",

            success: function(data) {
              $('#result').html(data);
            }

          });

          $('#mainContainer, #Openbtn, #chatbotbtn').hide();


        }

      });

      $('#Search_bar').keyup(function() {
        var txt = $('#Search_bar').val().trim();
        if (txt == '') {

          $('#result').html('');
          $('#mainContainer, #Openbtn, #chatbotbtn').show();

        }

      });

      $('#Search_btn').mouseenter(function() {
        $('#Search_btn').css('background-color', '#194F90');
        $('.bi-search').css('color', '#ffffff');
      });

      $('#Search_btn').mouseleave(function() {
        $('#Search_btn').css('background-color', '#ffffff');
        $('.bi-search').css('color', '#194F90');
      });


    });
  </script>
</body>

</html>