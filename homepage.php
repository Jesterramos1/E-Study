<?php
require 'dbtable_creation.php';

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
        header("Location: adminpanelfinal.php#adminpanelcon");
        }else{
        echo '<script>openmail()</script>';
        echo '<script>openForm()</script>';       
      }
      }else{
        echo '<script>openmail()</script>';
        echo '<script>openForm()</script>'; 
      }
    }
  }
elseif (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {
  header("Location: adminpanelfinal.php#adminpanelcon");
  }
else{
}  

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-STUDY</title>

<!--CSS Link-->
<link rel="stylesheet" href="style.css">

<!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<!--Manual CSS-->

<style type="text/css">
  #message{
  display: none;
  color: red;
  }
  #search_icon{
    height: 5%;
    width: 5%;
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
        <input type="text" class="form-control rounded" id="Search_bar" placeholder="What are you looking for" aria-label="Search" aria-describedby="search-addon" style="border-style: solid;border-width: 3px;border-color: #1c5090" />
        <button type="button" class="btn btn-outline-primary" style="border-style: solid;border-width: 3px;border-color: #1c5090">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
        </button>
      </div>
    </div>
  </div> 
  <div id="result"></div>
</div> 





<!--Login Form Script-->
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function openmail(){
  document.getElementById("message").style.display = "block";
}

$(document).ready(function(){
  $('#Search_bar').keyup(function(){
    var txt = $(this).val();
    if(txt != ''){
      $.ajax({
        url:"fetch.php",
        method: "post",
        data:{search:txt},
        dataType:"text",

        success:function(data){
          $('#result').html(data);
        }
       
      });

      $('#mainContainer, #Openbtn').hide();

    }else{
      $('#result').html('');
      $('#mainContainer, #Openbtn').show();
    }
  });
});
</script>



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


</div>

<!--Login Form-->
<button class="open-button" id="Openbtn" onclick="openForm()">ADMIN LOGIN</button>

<div class="form-popup" id="myForm">

  <form method = "POST" class="form-container">
    <hr>
    <h2 id="login">ADMIN LOGIN</h2>
    <hr>
    <label id="message">Username and Password does not match</label>
    <br>
    <label for="email"><b>USERNAME:</b></label>
    <input type="text" placeholder="RTU Admin" name="email" autocomplete="off" required>

    <label for="psw"><b>PASSWORD:</b></label>
    <input type="password" placeholder="Password" name="pass" required>

    <button type="submit" class="btn" name="submit"> LOGIN</button>
    <button type="button" class="btn cancel" onclick="closeForm()">CLOSE</button>
  </form>
</div>

<!--DONT TOUCH baka mag error na naman-->




</body>
</html>