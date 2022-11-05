<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_study'])) {
    $research_id = mysqli_real_escape_string($con, $_POST['delete_study']);

    $query = "DELETE FROM storage WHERE id='$research_id' ";
    $resfilequery = "SELECT * FROM storage WHERE id='$research_id' ";
    $resfile_run = mysqli_query($con, $resfilequery);
    $query_run = mysqli_query($con, $query);
    $storage = mysqli_fetch_array($resfile_run);
    if (unlink("uploads/" . $storage['res_file'])) {
        if ($query_run) {
            header("Location: adminpanel.php");
            $_SESSION['message'] = "Research Deleted Successfully";
            exit(0);
        } else {
            header("Location: adminpanel.php");
            $_SESSION['message'] = "Research Not Deleted";
            exit(0);
        }
    } else {
        header("Location: adminpanel.php");
        $_SESSION['message'] = "Research Not Deleted";
        exit(0);
    }
}

if (isset($_POST['update_study'])) {
    $study_id = mysqli_real_escape_string($con, $_POST['study_id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $date_publish = mysqli_real_escape_string($con, $_POST['date_publish']);
    $researchers = mysqli_real_escape_string($con, $_POST['researchers']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    $query = "UPDATE storage SET title='$title', department='$department', date_publish='$date_publish', researchers='$researchers',location='$location' WHERE id='$study_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Research Updated Successfully";
        header("Location: adminpanel.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Research Not Updated";
        header("Location: adminpanel.php");
        exit(0);
    }
}


if (isset($_POST['save_research'])) {

    $title = ucwords(strtolower(mysqli_real_escape_string($con, $_POST['title'])));
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $date_publish = mysqli_real_escape_string($con, $_POST['date_publish']);
    $researchers = ucwords(strtolower(mysqli_real_escape_string($con, $_POST['researchers'])));
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $filename = $_SESSION['tempFile'];
    $source = 'tempUpload/' . $filename;
    $destination = 'uploads/' . $filename;

    if (copy($source, $destination)) {
        if (unlink($source)) {
            $query = "INSERT INTO storage (title,department,date_publish,researchers,location,res_file) VALUES ('$title','$department','$date_publish','$researchers','$location','$filename')";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                $_SESSION['message-insert'] = "Research Added Successfully";
                $_SESSION['whoactive'] = "0";
                $_SESSION['tempFile'] = "";
                header("Location: research-add.php");
            } else {
                $_SESSION['message-insert'] = "Research Not Added";
                $_SESSION['whoactive'] = "1";
                $_SESSION['tempFile'] = $filename;
                header("Location: research-add.php");
            }
        } else {
            $_SESSION['message-insert'] = "Research Not Added";
            $_SESSION['whoactive'] = "1";
            $_SESSION['tempFile'] = $filename;
            header("Location: research-add.php");
        }
    } else {
        $_SESSION['message-insert'] = "Research Not Added";
        $_SESSION['whoactive'] = "1";
        $_SESSION['tempFile'] = $filename;
        header("Location: research-add.php");
    }
}

if (isset($_POST['update_password'])) {
    $user = $_SESSION['user'];
    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);
    $oldPasswordInput = mysqli_real_escape_string($con, $_POST['oldPassword']);

    $sql = "SELECT admin_pass FROM rtu_admin WHERE admin_user = '$user'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $oldPassword = $row['admin_pass'];
            if ($oldPasswordInput == $oldPassword) {
                $query = "UPDATE rtu_admin SET admin_pass='$newPassword' WHERE admin_user='$user' ";
                $query_run = mysqli_query($con, $query);
                if ($query_run) {
                    $_SESSION['messageEditPass'] = "1";
                    header("Location: admin_settings.php");
                    exit(0);
                } else {
                    $_SESSION['messageEditPass'] = "0";
                    header("Location: admin_settings.php");
                    exit(0);
                }
            }
        }
    }
}

if (isset($_POST['createAdminbtn'])) {
    $newUser = mysqli_real_escape_string($con, $_POST['newUser']);
    $newUserPassword = mysqli_real_escape_string($con, $_POST['newUserPassword']);
    $masterkeyInput = mysqli_real_escape_string($con, $_POST['masterkeyInput']);
    $sql = "SELECT masterkeys FROM masterkey";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $masterkey = $row['masterkeys'];
            if ($masterkey == $masterkeyInput) {
                $adminAdd = "INSERT INTO `rtu_admin`( `admin_user`, `admin_pass`) VALUES ('$newUser','$newUserPassword')";
                if (mysqli_query($con, $adminAdd)) {
                    $_SESSION['messageAddAdmin'] = "1";
                    header("Location: admin_settings.php");
                    exit(0);
                } else {
                    $_SESSION['messageAddAdmin'] = "0";
                    header("Location: admin_settings.php");
                    exit(0);
                }
            }
        }
    }
}

if (isset($_POST['preUpload'])) {
    $filename = $_FILES['preFileUpload']['name'];
    $destination = 'tempUpload/' . $filename;
    $file = $_FILES['preFileUpload']['tmp_name'];

    if (move_uploaded_file($file, $destination)) {
        $_SESSION['whoactive'] = "1";
        $_SESSION['tempFile'] = $filename;
        header("Location: research-add.php");
        exit(0);
    } else {
        $_SESSION['whoactive'] = "0";
        header("Location: research-add.php");
        exit(0);
    }
}

if (isset($_POST['filename'])) {

    $filename = $_POST['filename'];
    $fileCheck = "SELECT * FROM storage WHERE res_file LIKE '%{$filename}%'";
    $result = mysqli_query($con, $fileCheck);
    $fileCount = mysqli_num_rows($result);
    echo $fileCount;
}

if (!empty($_POST['oldPass'])) {

    $user = mysqli_real_escape_string($con, $_POST['user']);
    $oldPass = mysqli_real_escape_string($con, $_POST['oldPass']);
    $adminPassCheck = "SELECT admin_pass, admin_user FROM rtu_admin WHERE admin_pass = '$oldPass' AND admin_user = '$user'";
    $resultadminPass = mysqli_query($con, $adminPassCheck);
    $adminPassCount = mysqli_num_rows($resultadminPass);

    if ($adminPassCount > 0) {
        echo "true";
    } else {

        echo "false";
    }
}

if (!empty($_POST['newUser'])) {

    $newUser = mysqli_real_escape_string($con, $_POST['newUser']);
    $adminPassCheck = "SELECT admin_user FROM rtu_admin WHERE admin_user = '$newUser'";
    $resultadminPass = mysqli_query($con, $adminPassCheck);
    $adminPassCount = mysqli_num_rows($resultadminPass);

    if ($adminPassCount > 0) {
        echo "false";
    } else {

        echo "true";
    }
}

if (!empty($_POST['masterKey'])) {

    $masterKey = mysqli_real_escape_string($con, $_POST['masterKey']);
    $masterKeyCheck = "SELECT * FROM masterkey WHERE masterkeys = '$masterKey'";
    $resultmasterKey = mysqli_query($con, $masterKeyCheck);
    $masterKeyCount = mysqli_num_rows($resultmasterKey);

    if ($masterKeyCount > 0) {

        echo 'true';
    } else {

        echo 'false';
    }
}
