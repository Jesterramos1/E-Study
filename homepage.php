<?php
require 'dbtable_creation.php';
session_start();

//Account Verification
if(isset($_POST['submit'])){

  $user = $_REQUEST['email'];
  $pass = $_REQUEST['pass'];
  if($conn->connect_error){
    die("Failed to connect: " .$conn->connect_error);
  }else{
    $stmt = $conn->prepare("SELECT * FROM rtu_admin WHERE admin_user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
      $data = $stmt_result->fetch_assoc();
      if($data['admin_pass']  === $pass){
      setcookie("email",$user,time() + 60*60*24*365);
      setcookie("pass",$pass,time() + 60*60*24*365);
      $_SESSION['user'] = $user;
      $_SESSION['whoactive'] = "0";
      echo"<script> window.location.replace('adminpanelfinal.php#adminpanelcon'); </script>";

      }else{
      echo '<script>openmail()</script>';
      echo '<script>openForm()</script>';       
      }
    }else{
      echo '<script>openmail()</script>';
      echo '<script>openForm()</script>'; 
    }
  }
}elseif (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {
  echo"<script> window.location.replace('adminpanelfinal.php#adminpanelcon'); </script>";
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
  #message{
    display: none;
  }
  #search_icon{
    height: 5%;
    width: 5%;
  }
  #tdata,#hidetable,#theader{
    text-align: center;
    vertical-align: middle;
  }
@media only screen and (max-width: 1100px) {
    .fadeshow {
        display: none;
    }
    #hidetable{
        display: none;
    }
    .table{
      font-size: 12px;
    }
    #viewbtn{
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
</style>


<body>


<!--Header-->
<div class="sticky-sm-top">
<?php
    require 'header.php';?>
</div>    


<!--Search bar-->
<div style="padding-top: 3%;" class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control rounded" id="Search_bar" placeholder="What are you looking for" aria-label="Search" aria-describedby="search-addon" style=" background-color: transparent; border-style: solid; border-width: 2px; border-color: #1c5090"/>
        <button type="button" class="btn btn-outline-primary" style="border-style: solid;border-width: 2px;border-color: #1c5090">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
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
                  <h5 class="mb-3" style="letter-spacing: 2px; color: white;"><!---add title here----></h5>
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

<!--Login Form-->
<button class="open-button fadeshow" id="Openbtn" onclick="openForm()">ADMIN LOGIN</button>

<div class="form-popup fadeshow" id="myForm">

  <form method = "POST" id="adminForm" class="form-container">
    <hr>
    <h2 id="login">ADMIN LOGIN</h2>
    <hr>
    <span id="message" class='h6 text-danger text-center mt-3'>Username or password is incorrect</span>
    <br>
    <label for="email"><b>USERNAME:</b></label>
    <input type="text" placeholder="RTU Admin" name="email" id="User" autocomplete="off" required>

    <label for="psw"><b>PASSWORD:</b></label>
    <input type="password" placeholder="Password" name="pass" id="Pass" required>

    <button type="submit" class="btn" name="submit"> LOGIN</button>
    <button type="button" class="btn cancel" onclick="closeForm()">CLOSE</button>
  </form>
</div>

<?php
//Account Verification
if(isset($_POST['submit'])){

  $user = $_REQUEST['email'];
  $pass = $_REQUEST['pass'];
  if($conn->connect_error){
    die("Failed to connect: " .$conn->connect_error);
  }else{
    $stmt = $conn->prepare("SELECT * FROM rtu_admin WHERE admin_user = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
      $data = $stmt_result->fetch_assoc();
      if($data['admin_pass']  === $pass){
      setcookie("email",$user,time() + 60*60*24*365);
      setcookie("pass",$pass,time() + 60*60*24*365);
      echo"<script> window.location.replace('adminpanelfinal.php#adminpanelcon'); </script>";

      }else{
      echo '<script>openmail()</script>';
      echo '<script>openForm()</script>';       
      }
    }else{
      echo '<script>openmail()</script>';
      echo '<script>openForm()</script>'; 
    }
  }
}elseif (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {
  echo"<script> window.location.replace('adminpanelfinal.php#adminpanelcon'); </script>";
}
?>
</body>
</html>