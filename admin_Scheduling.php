<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin</title>

  <!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style type="text/css">
  #header{
    text-transform: uppercase  ;
  }
  .lib{
    text-transform: uppercase;
  }

</style>

</head>

<body style="overflow-y: hidden;">

<!--Header-->
<?php
    require 'header.php';?>


<div class="card text-center">
  <div class="card-header">
    <center>
  <ul class="nav nav-tabs card-header-tabs" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation" style="width: 16.5rem;">
    <button class="nav-link active" id="ceat" data-bs-toggle="pill" data-bs-target="#pills-ceat" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="width: 12rem;"><b>CEAT</b></button>
  </li>
  <li class="nav-item" role="presentation" style="width: 16.5rem;">
    <button class="nav-link" id="cbet" data-bs-toggle="pill" data-bs-target="#pills-cbet" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="width: 12rem;"><b>CBET</b></button>
  </li>
  <li class="nav-item" role="presentation" style="width: 16.5rem;">
    <button class="nav-link" id="cas" data-bs-toggle="pill" data-bs-target="#pills-cas" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" style="width: 12rem;"><b>CAS</b></button>
  </li>
  <li class="nav-item" role="presentation" style="width: 16.5rem;">
    <button class="nav-link" id="ced" data-bs-toggle="pill" data-bs-target="#pills-ced" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" style="width: 12rem;"><b>CED</b></button>
  </li>
  <li class="nav-item" role="presentation" style="width: 16.5rem;">
    <button class="nav-link" id="ipe" data-bs-toggle="pill" data-bs-target="#pills-ipe" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" style="width: 12rem;"><b>IPE</b></button>
  </li>
</ul>
</center>
</div>
</div><br>
<center>

<div class="card" style="width: 80rem; overflow-y: scroll; height: 400px;" >
   <div class="card-body">
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-ceat" role="tabpanel" aria-labelledby="ceat">
        <table class="table table-hover table-bordered" style="text-align: center; font-size: 14px;">
          <thead>
            <tr class="table-primary" id = "header">
              <th scope="col">Date Filed</th>
              <th scope="col">Student Number</th>
              <th scope="col">Last Name</th>
              <th scope="col">First Name</th>
              <th scope="col">Course</th>
              <th scope="col">Email</th>
              <th scope="col">Contact Number</th>
              <th scope="col">Location</th>
              <th scope="col">Date Scheduled</th>
              <th scope="col">Time</th>
            </tr>
          </thead>
          <?php 
             $con = mysqli_connect("localhost", "root", "", "estudy_db");
        $query = "SELECT * FROM booked_schedule WHERE location = 'ceat' ORDER BY id DESC";

      if ($result = mysqli_query($con, $query)){
        echo "<tbody>";
        while($row = mysqli_fetch_array($result)){
          date_default_timezone_set('Asia/Manila');
          $date_now = date('m/d/Y');
          $studSched = $row['studSched'];
          $StudSched = date('m/d/Y',strtotime($studSched));
          $startTime  = $row['studTime']; 
          $StartTime = date('h:i', strtotime($startTime));
          $compareTime = date('h:i');

          if ($date_now < $StudSched && $compareTime < $StartTime){

              echo "<tr>";
                echo "<td>" . $row['date_filed'] . "</td>";
                echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                echo "<td>" . $row['lName'] . "</td>";
                echo "<td>" . $row['fName'] . "</td>";
                echo "<td>" . $row['studCourse'] . "</td>";
                echo "<td>" . $row['studEmail'] . "</td>";
                echo "<td>" . $row['studContact'] . "</td>";
                echo "<td class='lib'>" . $row['location'] . "</td>";
                echo "<td>" . $row['studSched'] . "</td>";
                echo "<td>" . $row['studTime'] . "</td>";
            echo "</tr>";

          }else{
            $id = $row['id'];
            $sql = "DELETE FROM booked_schedule WHERE id='$id'";
            $sql_run = mysqli_query($con, $sql);

          }
    }



    echo "</tbody>";
    mysqli_free_result($result);
}
    mysqli_close($con);
    ?>
        </table>
      </div>


      <div class="tab-pane fade" id="pills-cbet" role="tabpanel" aria-labelledby="cbet">
        <table class="table table-hover table-bordered" style="text-align: center; font-size: 14px;">
        <thead>
          <tr class="table-primary" id = "header">
            <th scope="col">Date Filed</th>
            <th scope="col">Student Number</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Course</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Location</th>
            <th scope="col">Date Scheduled</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
          <?php 
            $con = mysqli_connect("localhost", "root", "", "estudy_db");
            $query = "SELECT * FROM booked_schedule WHERE location = 'cbet' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)){
              echo "<tbody>";
              while($row = mysqli_fetch_array($result)){
                 date_default_timezone_set('Asia/Manila');
          $date_now = date('m/d/Y');
          $studSched = $row['studSched'];
          $StudSched = date('m/d/Y',strtotime($studSched));
          $startTime  = $row['studTime']; 
          $StartTime = date('h:i', strtotime($startTime));
          $compareTime = date('h:i');

          if ($date_now < $StudSched && $compareTime < $StartTime){

              echo "<tr>";
                echo "<td>" . $row['date_filed'] . "</td>";
                echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                echo "<td>" . $row['lName'] . "</td>";
                echo "<td>" . $row['fName'] . "</td>";
                echo "<td>" . $row['studCourse'] . "</td>";
                echo "<td>" . $row['studEmail'] . "</td>";
                echo "<td>" . $row['studContact'] . "</td>";
                echo "<td class='lib'>" . $row['location'] . "</td>";
                echo "<td>" . $row['studSched'] . "</td>";
                echo "<td>" . $row['studTime'] . "</td>";
            echo "</tr>";

          }else{
            $id = $row['id'];
            $sql = "DELETE FROM booked_schedule WHERE id='$id'";
            $sql_run = mysqli_query($con, $sql);

          }
    }



    echo "</tbody>";
    mysqli_free_result($result);
}
    mysqli_close($con);
          ?>
        </table>
      </div>


      <div class="tab-pane fade" id="pills-cas" role="tabpanel" aria-labelledby="cas">
        <table class="table table-hover table-bordered" style="text-align: center; font-size: 14px;">
        <thead>
          <tr class="table-primary" id = "header">
            <th scope="col">Date Filed</th>
            <th scope="col">Student Number</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Course</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Location</th>
            <th scope="col">Date Scheduled</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
          <?php 
            $con = mysqli_connect("localhost", "root", "", "estudy_db");
            $query = "SELECT * FROM booked_schedule WHERE location = 'cas' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)){
              echo "<tbody>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['date_filed'] . "</td>";
                      echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                      echo "<td>" . $row['lName'] . "</td>";
                      echo "<td>" . $row['fName'] . "</td>";
                      echo "<td>" . $row['studCourse'] . "</td>";
                      echo "<td>" . $row['studEmail'] . "</td>";
                      echo "<td>" . $row['studContact'] . "</td>";
                      echo "<td class='lib'>" . $row['location'] . "</td>";
                      echo "<td>" . $row['studSched'] . "</td>";
                      echo "<td>" . $row['studTime'] . "</td>";
                  echo "</tr>";
            }
              echo "</tbody>";
              mysqli_free_result($result);
          }else{
              echo "No records matching your query were found.";
          }
          ?>
        </table>
      </div>

      <div class="tab-pane fade" id="pills-ced" role="tabpanel" aria-labelledby="ced">
        <table class="table table-hover table-bordered" style="text-align: center; font-size: 14px;">
        <thead>
          <tr class="table-primary" id = "header">
            <th scope="col">Date Filed</th>
            <th scope="col">Student Number</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Course</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Location</th>
            <th scope="col">Date Scheduled</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
          <?php 
            $con = mysqli_connect("localhost", "root", "", "estudy_db");
            $query = "SELECT * FROM booked_schedule WHERE location = 'ced' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)){
              echo "<tbody>";
              while($row = mysqli_fetch_array($result)){
                  date_default_timezone_set('Asia/Manila');
          $date_now = date('m/d/Y');
          $studSched = $row['studSched'];
          $StudSched = date('m/d/Y',strtotime($studSched));
          $startTime  = $row['studTime']; 
          $StartTime = date('h:i', strtotime($startTime));
          $compareTime = date('h:i');

          if ($date_now < $StudSched && $compareTime < $StartTime){

              echo "<tr>";
                echo "<td>" . $row['date_filed'] . "</td>";
                echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                echo "<td>" . $row['lName'] . "</td>";
                echo "<td>" . $row['fName'] . "</td>";
                echo "<td>" . $row['studCourse'] . "</td>";
                echo "<td>" . $row['studEmail'] . "</td>";
                echo "<td>" . $row['studContact'] . "</td>";
                echo "<td class='lib'>" . $row['location'] . "</td>";
                echo "<td>" . $row['studSched'] . "</td>";
                echo "<td>" . $row['studTime'] . "</td>";
            echo "</tr>";

          }else{
            $id = $row['id'];
            $sql = "DELETE FROM booked_schedule WHERE id='$id'";
            $sql_run = mysqli_query($con, $sql);

          }
    }



    echo "</tbody>";
    mysqli_free_result($result);
}
    mysqli_close($con);
          ?>
        </table>
      </div>

      <div class="tab-pane fade" id="pills-ipe" role="tabpanel" aria-labelledby="ipe">
        <table class="table table-hover table-bordered" style="text-align: center; font-size: 14px;">
        <thead>
          <tr class="table-primary" id = "header">
            <th scope="col">Date Filed</th>
            <th scope="col">Student Number</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Course</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Location</th>
            <th scope="col">Date Scheduled</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
          <?php 
            $con = mysqli_connect("localhost", "root", "", "estudy_db");
            $query = "SELECT * FROM booked_schedule WHERE location = 'ipe' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)){
              echo "<tbody>";
              while($row = mysqli_fetch_array($result)){
                  date_default_timezone_set('Asia/Manila');
          $date_now = date('m/d/Y');
          $studSched = $row['studSched'];
          $StudSched = date('m/d/Y',strtotime($studSched));
          $startTime  = $row['studTime']; 
          $StartTime = date('h:i', strtotime($startTime));
          $compareTime = date('h:i');

          if ($date_now < $StudSched && $compareTime < $StartTime){

              echo "<tr>";
                echo "<td>" . $row['date_filed'] . "</td>";
                echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                echo "<td>" . $row['lName'] . "</td>";
                echo "<td>" . $row['fName'] . "</td>";
                echo "<td>" . $row['studCourse'] . "</td>";
                echo "<td>" . $row['studEmail'] . "</td>";
                echo "<td>" . $row['studContact'] . "</td>";
                echo "<td class='lib'>" . $row['location'] . "</td>";
                echo "<td>" . $row['studSched'] . "</td>";
                echo "<td>" . $row['studTime'] . "</td>";
            echo "</tr>";

          }else{
            $id = $row['id'];
            $sql = "DELETE FROM booked_schedule WHERE id='$id'";
            $sql_run = mysqli_query($con, $sql);

          }
    }



    echo "</tbody>";
    mysqli_free_result($result);
}
    mysqli_close($con);
          ?>
        </table>
      </div>
    </div>

</div>
</div>
</center>
</body>
</html>