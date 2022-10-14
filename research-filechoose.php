<?php 
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add file</title>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: #FFFFFF;
    }
    .center {
        width: 50%;
        height: auto;
        margin:  20% auto;
        padding: 10px;
        position: relative;
        vertical-align: middle;
    }
</style>
<body>
<div class="container" width="100%" height="100%">
    <div class="card center">
        <div class="card-header ">
            Choose pdf file:
        </div>
        <div class="card-body">
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="res_file">
            <label>
        </div>
            
        <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>
<script>
    $("#res_file").change(function () {
        var fileExtension = ['pdf'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
        }else{
            <?php
            $filechecker = mysqli_query($con,"SELECT * FROM storage WHERE res_file = '$filename'");
            if(mysqli_num_rows($filechecker) > 0){
            echo "file exist";
            }else{
            echo "file not";   
            }
            ?>
        }
    });
</script>    
</body>
</html>