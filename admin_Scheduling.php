<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>admin</title>

  <!--Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!--CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


  <style type="text/css">
    #header {
      text-transform: uppercase;
    }

    .lib {
      text-transform: uppercase;
    }
  </style>

</head>

<body style="overflow-y: hidden;">

  <!--Header-->

  <div class="card text-center">
    <div class="card-header">
      <div class="nav nav-tabs nav-pills nav-fill" id="nav-tab" role="tablist">
        <button class="nav-link active" id="ceat" data-bs-toggle="pill" data-bs-target="#pills-ceat" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><b>CEAT</b></button>
        <button class="nav-link" id="cbet" data-bs-toggle="pill" data-bs-target="#pills-cbet" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><b>CBET</b></button>
        <button class="nav-link" id="cas" data-bs-toggle="pill" data-bs-target="#pills-cas" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>CAS</b></button>
        <button class="nav-link" id="ced" data-bs-toggle="pill" data-bs-target="#pills-ced" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>CED</b></button>
        <button class="nav-link" id="ipe" data-bs-toggle="pill" data-bs-target="#pills-ipe" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>IPE</b></button>
        <button class="nav-link" id="gs" data-bs-toggle="pill" data-bs-target="#pills-gs" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>GS</b></button>

      </div>
    </div>
  </div><br>

  <div class="card" style="overflow-y: scroll; height: 400px;">
    <div class="card-body">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-ceat" role="tabpanel" aria-labelledby="ceat">
          <table class="table table-hover table-bordered" style="text-align: center; font-size: 14px;">
            <thead>
              <tr class="table-primary" id="header">
                <th scope="col">Date Filed</th>
                <th scope="col">Student Number</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Course</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>

                <th scope="col">Date Scheduled</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <?php
            $con = mysqli_connect("localhost", "girzqhip_variableSet", "2iT7)iLbZaBl", "girzqhip_Estudy");
            $query = "SELECT * FROM booked_schedule WHERE location = 'ceat' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)) {
              echo "<tbody>";
              while ($row = mysqli_fetch_array($result)) {
                date_default_timezone_set('Asia/Manila');
                $date_now = date('m/d/Y');
                $studSched = $row['studSched'];
                $StudSched = date('m/d/Y', strtotime($studSched));
                $startTime  = $row['studTime'];
                $StartTime = date('g:i a', strtotime($startTime));
                $compareTime = date('g:i a');

                if ($date_now > $StudSched && $compareTime > $StartTime) {

                  $id = $row['id'];
                  $sql = "DELETE FROM booked_schedule WHERE id='$id'";
                  $sql_run = mysqli_query($con, $sql);
                } else {
                  echo "<tr>";
                  echo "<td>" . $row['date_filed'] . "</td>";
                  echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                  echo "<td>" . $row['lName'] . "</td>";
                  echo "<td>" . $row['fName'] . "</td>";
                  echo "<td>" . $row['studCourse'] . "</td>";
                  echo "<td>" . $row['studEmail'] . "</td>";
                  echo "<td>" . $row['studContact'] . "</td>";
                  echo "<td>" . $row['studSched'] . "</td>";
                  echo "<td>" . $row['studTime'] . "</td>";
                  echo "</tr>";
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
              <tr class="table-primary" id="header">
                <th scope="col">Date Filed</th>
                <th scope="col">Student Number</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Course</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Date Scheduled</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <?php
            $con = mysqli_connect("localhost", "girzqhip_variableSet", "2iT7)iLbZaBl", "girzqhip_Estudy");
            $query = "SELECT * FROM booked_schedule WHERE location = 'CBET Library - SNAGAH Building / Second (2nd) Floor' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)) {
              echo "<tbody>";
              while ($row = mysqli_fetch_array($result)) {
                date_default_timezone_set('Asia/Manila');
                $date_now = date('m/d/Y');
                $studSched = $row['studSched'];
                $StudSched = date('m/d/Y', strtotime($studSched));
                $startTime  = $row['studTime'];
                $StartTime = date('g:i a', strtotime($startTime));
                $compareTime = date('g:i a');

                if ($date_now > $StudSched && $compareTime > $StartTime) {

                  $id = $row['id'];
                  $sql = "DELETE FROM booked_schedule WHERE id='$id'";
                  $sql_run = mysqli_query($con, $sql);
                } else {

                  echo "<tr>";
                  echo "<td>" . $row['date_filed'] . "</td>";
                  echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                  echo "<td>" . $row['lName'] . "</td>";
                  echo "<td>" . $row['fName'] . "</td>";
                  echo "<td>" . $row['studCourse'] . "</td>";
                  echo "<td>" . $row['studEmail'] . "</td>";
                  echo "<td>" . $row['studContact'] . "</td>";
                  echo "<td>" . $row['studSched'] . "</td>";
                  echo "<td>" . $row['studTime'] . "</td>";
                  echo "</tr>";
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
              <tr class="table-primary" id="header">
                <th scope="col">Date Filed</th>
                <th scope="col">Student Number</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Course</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Date Scheduled</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <?php
            $con = mysqli_connect("localhost", "girzqhip_variableSet", "2iT7)iLbZaBl", "girzqhip_Estudy");
            $query = "SELECT * FROM booked_schedule WHERE location = 'CAS Library - MAB Building / Second (2nd) Floor' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)) {
              echo "<tbody>";
              while ($row = mysqli_fetch_array($result)) {
                date_default_timezone_set('Asia/Manila');
                $date_now = date('m/d/Y');
                $studSched = $row['studSched'];
                $StudSched = date('m/d/Y', strtotime($studSched));
                $startTime  = $row['studTime'];
                $StartTime = date('g:i a', strtotime($startTime));
                $compareTime = date('g:i a');

                if ($date_now > $StudSched && $compareTime > $StartTime) {

                  $id = $row['id'];
                  $sql = "DELETE FROM booked_schedule WHERE id='$id'";
                  $sql_run = mysqli_query($con, $sql);
                } else {

                  echo "<tr>";
                  echo "<td>" . $row['date_filed'] . "</td>";
                  echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                  echo "<td>" . $row['lName'] . "</td>";
                  echo "<td>" . $row['fName'] . "</td>";
                  echo "<td>" . $row['studCourse'] . "</td>";
                  echo "<td>" . $row['studEmail'] . "</td>";
                  echo "<td>" . $row['studContact'] . "</td>";
                  echo "<td>" . $row['studSched'] . "</td>";
                  echo "<td>" . $row['studTime'] . "</td>";
                  echo "</tr>";
                }
              }



              echo "</tbody>";
              mysqli_free_result($result);
            }
            mysqli_close($con);

            ?>
          </table>
        </div>

        <div class="tab-pane fade" id="pills-ced" role="tabpanel" aria-labelledby="ced">
          <table class="table table-hover table-bordered" style="text-align: center; font-size: 14px;">
            <thead>
              <tr class="table-primary" id="header">
                <th scope="col">Date Filed</th>
                <th scope="col">Student Number</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Course</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Date Scheduled</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <?php
            $con = mysqli_connect("localhost", "girzqhip_variableSet", "2iT7)iLbZaBl", "girzqhip_Estudy");
            $query = "SELECT * FROM booked_schedule WHERE location = 'CED Library - SNAGAH Building / Second (2nd) Floor' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)) {
              echo "<tbody>";
              while ($row = mysqli_fetch_array($result)) {
                date_default_timezone_set('Asia/Manila');
                $date_now = date('m/d/Y');
                $studSched = $row['studSched'];
                $StudSched = date('m/d/Y', strtotime($studSched));
                $startTime  = $row['studTime'];
                $StartTime = date('h:i', strtotime($startTime));
                $compareTime = date('h:i');

                if ($date_now > $StudSched && $compareTime > $StartTime) {

                  $id = $row['id'];
                  $sql = "DELETE FROM booked_schedule WHERE id='$id'";
                  $sql_run = mysqli_query($con, $sql);
                } else {

                  echo "<tr>";
                  echo "<td>" . $row['date_filed'] . "</td>";
                  echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                  echo "<td>" . $row['lName'] . "</td>";
                  echo "<td>" . $row['fName'] . "</td>";
                  echo "<td>" . $row['studCourse'] . "</td>";
                  echo "<td>" . $row['studEmail'] . "</td>";
                  echo "<td>" . $row['studContact'] . "</td>";
                  echo "<td>" . $row['studSched'] . "</td>";
                  echo "<td>" . $row['studTime'] . "</td>";
                  echo "</tr>";
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
              <tr class="table-primary" id="header">
                <th scope="col">Date Filed</th>
                <th scope="col">Student Number</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Course</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Date Scheduled</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <?php
            $con = mysqli_connect("localhost", "girzqhip_variableSet", "2iT7)iLbZaBl", "girzqhip_Estudy");
            $query = "SELECT * FROM booked_schedule WHERE location = 'IPE Library - MAB Building / Fifth (5th) Floor' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)) {
              echo "<tbody>";
              while ($row = mysqli_fetch_array($result)) {
                date_default_timezone_set('Asia/Manila');
                $date_now = date('m/d/Y');
                $studSched = $row['studSched'];
                $StudSched = date('m/d/Y', strtotime($studSched));
                $startTime  = $row['studTime'];
                $StartTime = date('h:i', strtotime($startTime));
                $compareTime = date('h:i');

                if ($date_now > $StudSched && $compareTime > $StartTime) {

                  $id = $row['id'];
                  $sql = "DELETE FROM booked_schedule WHERE id='$id'";
                  $sql_run = mysqli_query($con, $sql);
                } else {

                  echo "<tr>";
                  echo "<td>" . $row['date_filed'] . "</td>";
                  echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                  echo "<td>" . $row['lName'] . "</td>";
                  echo "<td>" . $row['fName'] . "</td>";
                  echo "<td>" . $row['studCourse'] . "</td>";
                  echo "<td>" . $row['studEmail'] . "</td>";
                  echo "<td>" . $row['studContact'] . "</td>";
                  echo "<td>" . $row['studSched'] . "</td>";
                  echo "<td>" . $row['studTime'] . "</td>";
                  echo "</tr>";
                }
              }



              echo "</tbody>";
              mysqli_free_result($result);
            }
            mysqli_close($con);
            ?>
          </table>
        </div>


        <div class="tab-pane fade" id="pills-gs" role="tabpanel" aria-labelledby="gs">
          <table class="table table-hover table-bordered" style="text-align: center; font-size: 14px;">
            <thead>
              <tr class="table-primary" id="header">
                <th scope="col">Date Filed</th>
                <th scope="col">Student Number</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Course</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Date Scheduled</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <?php
            $con = mysqli_connect("localhost", "girzqhip_variableSet", "2iT7)iLbZaBl", "girzqhip_Estudy");
            $query = "SELECT * FROM booked_schedule WHERE location = 'GS Library - RND Building / Third (3rd) Floor' ORDER BY id DESC";

            if ($result = mysqli_query($con, $query)) {
              echo "<tbody>";
              while ($row = mysqli_fetch_array($result)) {
                date_default_timezone_set('Asia/Manila');
                $date_now = date('m/d/Y');
                $studSched = $row['studSched'];
                $StudSched = date('m/d/Y', strtotime($studSched));
                $startTime  = $row['studTime'];
                $StartTime = date('h:i', strtotime($startTime));
                $compareTime = date('h:i');

                if ($date_now > $StudSched && $compareTime > $StartTime) {

                  $id = $row['id'];
                  $sql = "DELETE FROM booked_schedule WHERE id='$id'";
                  $sql_run = mysqli_query($con, $sql);
                } else {

                  echo "<tr>";
                  echo "<td>" . $row['date_filed'] . "</td>";
                  echo "<td>" . htmlspecialchars($row['studNum']) . "</td>";
                  echo "<td>" . $row['lName'] . "</td>";
                  echo "<td>" . $row['fName'] . "</td>";
                  echo "<td>" . $row['studCourse'] . "</td>";
                  echo "<td>" . $row['studEmail'] . "</td>";
                  echo "<td>" . $row['studContact'] . "</td>";
                  echo "<td>" . $row['studSched'] . "</td>";
                  echo "<td>" . $row['studTime'] . "</td>";
                  echo "</tr>";
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
</body>

</html>