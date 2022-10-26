<?php 

$con = mysqli_connect("localhost", "root", "", "estudy_db");



if(!empty($_POST['fname']) && !empty($_POST['lname'])){

    $fName = strtoupper(mysqli_real_escape_string($con, $_POST['fname']));
    $lName = strtoupper(mysqli_real_escape_string($con, $_POST['lname']));
    $userCheck = "SELECT fName, lName FROM booked_schedule WHERE fName LIKE '{$fName}' AND lName LIKE '{$lName}' ";
    $result = mysqli_query($con, $userCheck);
    $nameCount = mysqli_num_rows($result);

    if($nameCount > 0){
        echo "false";
        

    }elseif($nameCount == 0 && !preg_match('/\d/', $fName) && !preg_match('/\d/', $lName) ){

        echo "true";

    }elseif(preg_match('/\d/', $fName) || preg_match('/\d/', $lName)){

        echo "numdet";

    }

}elseif(!empty($_POST['studNum'])){
    $studNum = mysqli_real_escape_string($con, $_REQUEST['studNum']);
    $studnumCheck = "SELECT studNum FROM booked_schedule WHERE studNum LIKE '%{$studNum}%' ";
    $resultstudnum = mysqli_query($con, $studnumCheck);
    $studNumCount = mysqli_num_rows($resultstudnum);

    if($studNumCount > 0){
        echo "false";

    }elseif(!preg_match('/[0-9]{4}-[0-9]{6}$/', $studNum)){

        echo "notValid";

    }elseif($studNumCount == 0 && preg_match('/[0-9]{4}-[0-9]{6}$/', $studNum)){
        
        echo "true";

    }

}elseif(!empty($_POST['email'])){
    $studEmail = mysqli_real_escape_string($con, $_REQUEST['email']);
    $studemailCheck = "SELECT studEmail FROM booked_schedule WHERE studEmail LIKE '%{$studEmail}%' ";
    $resultstudemail = mysqli_query($con, $studemailCheck);
    $studEmailCount = mysqli_num_rows($resultstudemail);

    if($studEmailCount > 0){
        echo "false";

    }elseif(!preg_match("/^([a-z0-9\+_\-]+)(\. [a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[ a-z]{2,6}$/ix", $studEmail)){

        echo "notValid";
        

    }elseif($studEmailCount == 0 && preg_match("/^([a-z0-9\+_\-]+)(\. [a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[ a-z]{2,6}$/ix", $studEmail)){

        echo "true";
        
    }

}elseif(!empty($_POST['contact'])){

    $studContact = mysqli_real_escape_string($con, $_REQUEST['contact']);
    $studcontactCheck = "SELECT studContact FROM booked_schedule WHERE studContact LIKE '%{$studContact}%' ";
    $resultstudcontact = mysqli_query($con, $studcontactCheck);
    $studContactCount = mysqli_num_rows($resultstudcontact);

    if(preg_match('/9[0-9]{9}/', $studContact)){

        echo "valid";

    }else{

        echo "notValid";

    }

}

//Research Add
if(isset($_POST['title'])){
    $studTitle = mysqli_real_escape_string($con, $_REQUEST['title']);
    $titleCheck = "SELECT title FROM storage WHERE title LIKE '%{$studTitle}%' ";
    $resulttitle = mysqli_query($con, $titleCheck);
    $titleCount = mysqli_num_rows($resulttitle);

    if($titleCount > 0){
        echo "<span class='h6 text-danger text-center mt-3'>Title already exist .</span>";

    }

}
?>