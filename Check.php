<?php 

$con = mysqli_connect("localhost", "root", "", "estudy_db");


if(!empty($_POST['fname']) && !empty($_POST['lname'])){

    $fName = strtoupper(mysqli_real_escape_string($con, $_REQUEST['fname']));
    $lName = strtoupper(mysqli_real_escape_string($con, $_REQUEST['lname']));
    $userCheck = "SELECT fName, lName FROM booked_schedule WHERE fName LIKE '%{$fName}%' AND lName LIKE '%{$lName}%' ";
    $result = mysqli_query($con, $userCheck);
    $nameCount = mysqli_num_rows($result);

    if($nameCount > 0){
        echo "<span class='h6 text-danger text-center mt-3'>Name already exists.</span>";

    }else{
        echo "<span class='h6 text-success text-center mt-3'>Name is available.</span>";
    }

}elseif(!empty($_POST['studNum'])){
    $studNum = mysqli_real_escape_string($con, $_REQUEST['studNum']);
    $studnumCheck = "SELECT studNum FROM booked_schedule WHERE studNum LIKE '%{$studNum}%' ";
    $resultstudnum = mysqli_query($con, $studnumCheck);
    $studNumCount = mysqli_num_rows($resultstudnum);

    if($studNumCount > 0){
        echo "<span class='h6 text-danger text-center mt-3'>student number already exists.</span>";

    }else{
        echo "<span class='h6 text-success text-center mt-3'>student number is available.</span>";
    }

}elseif(!empty($_POST['email'])){
    $studEmail = mysqli_real_escape_string($con, $_REQUEST['email']);
    $studemailCheck = "SELECT studEmail FROM booked_schedule WHERE studEmail LIKE '%{$studEmail}%' ";
    $resultstudemail = mysqli_query($con, $studemailCheck);
    $studEmailCount = mysqli_num_rows($resultstudemail);

    if($studEmailCount > 0){
        echo "<span class='h6 text-danger text-center mt-3'>email already exists.</span>";

    }else{
        echo "<span class='h6 text-success text-center mt-3'>email is available.</span>";
    }

}elseif(isset($_POST['title'])){
    $studTitle = mysqli_real_escape_string($con, $_REQUEST['title']);
    $titleCheck = "SELECT title FROM storage WHERE title LIKE '%{$studTitle}%' ";
    $resulttitle = mysqli_query($con, $titleCheck);
    $titleCount = mysqli_num_rows($resulttitle);

    if($titleCount > 0){
        echo "<span class='h6 text-danger text-center mt-3'>Title already exist .</span>";

    }else{
        echo "<span class='h6 text-success text-center mt-3'>title is available.</span>";
    }


}
?>