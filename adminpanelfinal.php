<!DOCTYPE html>
<?php
    session_start();
    require 'dbcon.php';
    
    if (isset($_POST['logout'])) {
        setcookie('email','',time()-3600);
         setcookie('pass','',time()-3600);
         header("location: homepage.php");
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
     
   </head>
   <style>
    .page-container{
      margin-top: 10%;
      margin-bottom:;
    }

   </style>
<body>
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
           <img src="profile.png" alt="profileImg">
           <div class="name_job">
             <div class="name">Admin Ariola</div>
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
       <img src="images/adminheader.png">
      </div>

      <div class ="page-container" id="adminpanelcon">
        <?php include 'adminpanel.php'?>
      </div>
      <div class ="page-container" id="research-addcon">
        <?php include 'research-add.php'?>
      </div>
      <div class ="page-container" id="schedulingcon">
        <?php include 'admin_Scheduling.php'?>
      </div>
      <div class ="page-container" id="settingscon">
        
      </div>
  </section>

  <script src="admin_script.js"></script>

</body>
</html>
