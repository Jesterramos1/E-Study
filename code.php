<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_study'])){
    $research_id = mysqli_real_escape_string($con, $_POST['delete_study']);

    $query = "DELETE FROM storage WHERE id='$research_id' ";
    $resfilequery = "SELECT * FROM storage WHERE id='$research_id' ";
    $resfile_run = mysqli_query($con, $resfilequery);
    $query_run = mysqli_query($con, $query);
    $storage = mysqli_fetch_array($resfile_run);
    if(unlink("uploads/".$storage['res_file'])){
        if($query_run){
            header("Location: adminpanel.php");
            $_SESSION['message'] = "Research Deleted Successfully";
            exit(0);
        }else{
            header("Location: adminpanel.php");
            $_SESSION['message'] = "Research Not Deleted";
            exit(0);
        }
    }else{
        header("Location: adminpanel.php");
            $_SESSION['message'] = "Research Not Deleted";
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
        $_SESSION['message'] = "Research Updated Successfully";
        header("Location: adminpanel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Research Not Updated";
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
        if (!in_array($extension, ['pdf'])) {
             $_SESSION['message-insert'] = "File Type must be in pdf or docx only";
            header("Location: adminpanelfinal.php#research-addcon");
            exit(0);
        }elseif ($_FILES['res_file']['size'] > 1000000000) { // file shouldn't be larger than 1Megabyte
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
                    $_SESSION['message-insert'] = "Research Added Successfully";
                    header("Location: adminpanelfinal.php#research-addcon");
                    exit(0);
                }
                else
                {
                    $_SESSION['message-insert'] = "Research Not Added";
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
    $oldPasswordInput = mysqli_real_escape_string($con, $_POST['oldPassword']);
    
    $sql = "SELECT admin_pass FROM rtu_admin";
    $result = $con->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $oldPassword = $row['admin_pass'];
            if($oldPasswordInput == $oldPassword){
                $query = "UPDATE rtu_admin SET admin_pass='$newPassword' WHERE admin_user='$user' ";
                $query_run = mysqli_query($con, $query);
                if($query_run){   
                    $messageUpdatelbl = "Password Succesfully Changed";            
                    header("Location: admin_settings.php");
                    exit(0);
                }else{
                    $messageUpdatelbl = "Error Changing Password"; 
                    header("Location: admin_settings.php");
                    exit(0);
                }
            }else{
                $messagelbl = "Password is Incorrect";
            }
            
        }
    }      
}

if(isset($_POST['createAdminbtn'])){
    $newUser = mysqli_real_escape_string($con, $_POST['newUser']);
    $newUserPassword = mysqli_real_escape_string($con, $_POST['newUserPassword']);
    $masterkeyInput = mysqli_real_escape_string($con, $_POST['masterkeyInput']);
    $sql = "SELECT masterkeys FROM masterkey";
    $result = $con->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $masterkey = $row['masterkeys'];
            if($masterkey == $masterkeyInput){
                $sql = "INSERT IGNORE INTO `rtu_admin`( `admin_user`, `admin_pass`) VALUES ('$newUser','$newUserPassword')";
                if (mysqli_query($con, $sql)){
                    $messageCreatelbl = "User Created Succesfully";            
                    header("Location: admin_settings.php");
                    exit(0);
                }else{
                    $messageCreatelbl = "Error Creating new User";            
                    header("Location: admin_settings.php");
                    exit(0);
                }
            }else{
                $messageCreatelbl = "User Created Succesfully";            
                    header("Location: admin_settings.php");
                    exit(0);
            }
            
        }    
    }
}

if(isset($_POST['preUpload'])){
    $filename = $_FILES['preFileUpload']['name'];
    $destination = 'tempUpload/' . $filename;
    $file = $_FILES['preFileUpload']['tmp_name'];

    if (move_uploaded_file($file, $destination)) {
        $_SESSION['tempFile'] = $filename;        
    }else{
        
    }

    
    
}

if(isset($_POST['filename'])){

    $filename = $_POST['filename'];
    $fileCheck = "SELECT * FROM storage WHERE res_file LIKE '%{$filename}%'";
    $result = mysqli_query($con, $fileCheck);
    $fileCount = mysqli_num_rows($result);
    echo $fileCount;
}


