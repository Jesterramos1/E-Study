<!DOCTYPE html>
<?php
    session_start();
    require 'dbcon.php';
    
    if (isset($_POST['logout'])) {
        setcookie('email','',time()-3600);
        setcookie('pass','',time()-3600);
        session_destroy();
        header("location: homepage.php");
        exit();
    }  
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> RTU E-STUDY  | Admin </title>
    <link rel="stylesheet" href="admin_style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     

   <!--Icons-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
   <!--CSS-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

   </head>
   
   <style>
    body{
      overflow-y:hidden;
      overflow-x:hidden;
    }
    .page-container{
      padding-top: 10%;
      background:#F2F6FB;
    }
    .concon{
      width: 100%;
      height: 700px;
      padding: 10px;
      position: relative;
      background:#F2F6FB;
    }
    iframe {
      display:relative;
      width:100%;
      height:95%;
      margin-left:auto;
      margin-right:auto;  
      padding-bottom:30px;    
    }
    

   </style>
<body>
  <?php
  if($_SESSION['user'] == ""){
    $_SESSION['user'] = "No user Found";
  }
  ?>

  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">|E-STUDY</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
          <a href="#adminpanelcon">
          <i class='bx bxs-folder-plus'></i>
          <span class="links_name">Recently Added</span>
          </a>
         <span class="tooltip">Recently Added</span>
      </li>
      <li>
       <a href="#research-addcon">
         <i class='bx bx-add-to-queue' ></i>
         <span class="links_name">Add Research</span>
       </a>
       <span class="tooltip">Add Research</span>
     </li>
     <li>
       <a href="#schedulingcon">
         <i class='bx bxs-time' ></i>
         <span class="links_name">Booked Schedule</span>
       </a>
       <span class="tooltip">Booked Schedule</span>
     </li>
     <li>
       <a href="#settingscon">
         <i class='bx bxs-cog'></i>
         <span class="links_name">Settings</span>
       </a>
       <span class="tooltip">Settings</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="images/profile.png" alt="profileImg">
           <div class="name_job">
               <div class="name">Admin <?php echo $_SESSION['user']; ?></div>
             <div class="job">E-STUDY ADMIN</div>
           </div>
         </div>
          <form method="POST">
            <button type="submit" class="btn btn-outline-danger" name="logout"><i class='bx bx-log-out' id="log_out" ></i></button>
          </form>
     </li>
     
    </ul>
  </div>
  <section class="home-section">
      <div class="sticky-sm-top">
       <img src="images/adminheader.png" class="img-fluid">
      </div>

      <div class ="page-container" id="adminpanelcon">
        <div class = "concon">
        <iframe src="adminpanel.php" frameborder="0"></iframe>
        </div>
      </div>
      <div class ="page-container" id="research-addcon">
        <div class = "concon">
        <iframe src="research-add.php" frameborder="0"></iframe>
        </div>
      </div>
      <div class ="page-container" id="schedulingcon">
        <div class = "concon">
        <iframe src="admin_scheduling.php" frameborder="0"></iframe>
        </div>
       
      </div>
      <div class ="page-container" id="settingscon">
        <div class = "concon" id="sconcon">
        <iframe src="admin_settings.php" frameborder="0"></iframe>
        </div>
      </div>
  </section>

  <script src="admin_script.js"></script>

</body>
</html>
