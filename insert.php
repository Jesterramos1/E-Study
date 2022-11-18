<?php
require 'dbtable_creation.php';
session_start();

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "estudy_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
if(isset($_REQUEST['studNum'])){

    $studNum = mysqli_real_escape_string($link, $_REQUEST['studNum']);
    

}else{

    $studNum = 'N/A';

}

$fName = ucwords(mysqli_real_escape_string($link, $_REQUEST['fname']));
$lName = ucwords(mysqli_real_escape_string($link, $_REQUEST['lname']));
$studCourse = mysqli_real_escape_string($link, $_REQUEST['course']);
$studEmail = mysqli_real_escape_string($link, $_REQUEST['email']);
$studContact = mysqli_real_escape_string($link, $_REQUEST['contact']);
$department = $_SESSION['selected-department'];
$date_filed = date ("Y-m-d");
$studSched = mysqli_real_escape_string($link, $_REQUEST['calendar']);
$studTime = mysqli_real_escape_string($link, $_REQUEST['time']);

date_default_timezone_set('Asia/Manila');
$date_now = date('m/d/Y');
$StudSched = date('m/d/Y',strtotime($studSched)); 
$StudtTime = date('h:i', strtotime($studTime));
$compareTime = date('h:i');
 
// Attempt insert query execution 
  if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `booked_schedule`(`id`, `date_filed`, `studNum`, `fName`, `lName`, `studCourse`, `studEmail`, `studContact`, `department`, `studSched`, `studTime`) VALUES ('', '$date_filed','$studNum', '$fName', '$lName', '$studCourse', '$studEmail', '$studContact', '$department', '$studSched','$studTime')";
            if(mysqli_query($link, $sql)){
                echo '<div class="card">';
                echo '<h5 class="card-header">Your visitation is confirmed!</h5>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Hello ' . $fName . ', </h5>';
                echo '<p class="card-text">Please go to your scheduled date of visit.<br> Thank you for using E-Study!</p>';
                echo '<table class="table table-bordered"><thead>';
                echo '<tr style="background-color:#1C5090; color:white;">
                      <th scope="col">Location:</th>
                      <th scope="col">Date:</th>
                      <th scope="col">Time:</th>
                      </tr>';
                echo '<tr>';
                echo '<td class="loc">' . $department . '</td>';
                echo '<td>' . $studSched . '</td>';
                echo '<td>' . $studTime . '</td>';
                echo '</tr>';
                echo '</table>';

                echo '<a href="homepage.php"><button type="button" class="btn btn-labeled btn-primary">
                     <span class="btn-label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16"><path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/></span>Back to Home</button></a>';
                echo '</div>';
                echo '</div>';
            }else{

            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }   
        }


?>

<html>
    <head>
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Bootstrap 5 CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <title>Confirmation</title>

        <style type="text/css">
            .card{
                width: 56%;
                margin-right: auto;
                margin-left: auto;
                top: 17%;
                border-color: #1C5090;
            }
            .card-header{
               background-color:#1C5090;
               color: white;
            }
            body{
                background-image: url("images/bgf.jpg");
                background-repeat: no-repeat;
                background-position: top;
                background-position: center;
                background-attachment: fixed;
                background-size: cover;
            }
            .btn-label {
                position: relative;
                left: -12px;
                display: inline-block;
                padding: 6px 10px;
                background: rgba(0, 0, 0, 0.15);
                border-radius: 3px 0 0 3px;
            }

            .btn-labeled {
                padding-top: 0;
                padding-bottom: 0;
            }

            .btn {
                float: right;
            }
            .loc{
            text-transform: uppercase;
            }

        </style>
    </head>
</html>

