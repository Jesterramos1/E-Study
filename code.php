<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_study']))
{
    $research_id = mysqli_real_escape_string($con, $_POST['delete_study']);

    $query = "DELETE FROM storage WHERE id='$research_id' ";
    $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        header("Location: adminpanel.php");
        $_SESSION['message'] = "Student Deleted Successfully";
        exit(0);
    }
    else
    {
        header("Location: adminpanel.php");
        $_SESSION['message'] = "Study Not Deleted";
        exit(0);
    }
}

if(isset($_POST['update_study'])){
    $study_id = mysqli_real_escape_string($con, $_POST['study_id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $date_publish = mysqli_real_escape_string($con, $_POST['date_publish']);
    $researchers = mysqli_real_escape_string($con, $_POST['researchers']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    $query = "UPDATE storage SET title='$title', department='$department', date_publish='$date_publish', researchers='$researchers',location='$location' WHERE id='$study_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Study Updated Successfully";
        header("Location: adminpanel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Study Not Updated";
        header("Location: adminpanel.php");
        exit(0);
    }

}


if(isset($_POST['save_research'])){

    $title = ucwords(strtolower(mysqli_real_escape_string($con, $_POST['title'])));
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $date_publish = mysqli_real_escape_string($con, $_POST['date_publish']);
    $researchers = ucwords(strtolower(mysqli_real_escape_string($con, $_POST['researchers'])));
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $filename = $_FILES['res_file']['name'];
    $destination = 'uploads/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['res_file']['tmp_name'];
    $size = $_FILES['res_file']['size'];
    $titlechecker = mysqli_query($con,"SELECT * FROM storage WHERE title = '$title'");
    $filechecker = mysqli_query($con,"SELECT * FROM storage WHERE res_file = '$filename'");

    if(mysqli_num_rows($titlechecker)>0){
        $_SESSION['message-insert'] = "Title Already Exist!";
        header("adminpanelfinal.php#research-addcon");
        exit(0);
    }
    else if(mysqli_num_rows($filechecker) > 0){
        $_SESSION['message-insert'] = "File Already Exist!";
        header("Location: adminpanelfinal.php#research-addcon");
        exit(0);
        }
    else{
        if (!in_array($extension, ['pdf', 'docx'])) {
             $_SESSION['message-insert'] = "File Type must be in pdf or docx only";
            header("Location: adminpanelfinal.php#research-addcon");
            exit(0);
        }elseif ($_FILES['res_file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            $_SESSION['message-insert'] = "File size is to big";
            header("Location: adminpanelfinal.php#research-addcon");
            exit(0);
        }else {
         // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {
                $query = "INSERT INTO storage (title,department,date_publish,researchers,location,res_file) VALUES ('$title','$department','$date_publish','$researchers','$location','$filename')";
                $query_run = mysqli_query($con, $query);
                if($query_run)
                {
                    $_SESSION['message-insert'] = "Study Added Successfully";
                    header("Location: adminpanelfinal.php#research-addcon");
                    exit(0);
                }
                else
                {
                    $_SESSION['message-insert'] = "Study Not Added";
                    header("Location: adminpanelfinal.php#research-addcon");
                    exit(0);
                }
            }                
        }
    }
}

if(isset($_POST['update_password'])){
    $user = $_SESSION['user'];
    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);
    $oldPassword = "SELECT admin_pass FROM rtu_admin WHERE admin_user = $user";
    $oldPasswordInput = mysqli_real_escape_string($con, $_POST['oldPassword']);
    
    if($oldPasswordInput == $oldPassword){
        $query = "UPDATE rtu_admin SET admin_pass='$newPassword' WHERE admin_user='$user' ";
        $query_run = mysqli_query($con, $query);
            if($query_run){               
                header("Location: scheduling.php");
                exit(0);
            }else{
                header("Location: research-edit.php");
                exit(0);
            }
    }
}

