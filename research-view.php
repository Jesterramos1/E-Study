<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Manual CSS-->
    <style>
    .responsive-iframe {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      width: 100%;
      height: 100%;
    }
    .containers {
      position: relative;
      overflow: hidden;
      width: 100%;
      height: 100%;
    }
    </style>

    <title>Research View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12 containers">
                <div class="card">
                    <div class="card-header">
                        <h4>Research Details 
                            <a href="adminpanel.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <?php
                            if(isset($_GET['id'])){
                                $research_id = mysqli_real_escape_string($con, $_GET['id']);
                                $query = "SELECT * FROM storage WHERE id='$research_id' ";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    $storage = mysqli_fetch_array($query_run);
                                    ?>
                            <div class="row">
                                <div class="col">
                                    <div class="containers" style="background-color: black;">
                                      <iframe id="responsive-iframe"src="uploads/<?=$storage['res_file']?>"></iframe>
                                    </div>                                    
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                    <label>Title</label>
                                    <p class="form-control">
                                        <?=$storage['title'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Department</label>
                                    <p class="form-control">
                                        <?=$storage['department'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Date Publish</label>
                                    <p class="form-control">
                                        <?=$storage['date_publish'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Researchers</label>
                                    <p class="form-control">
                                        <?=$storage['researchers'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Location</label>
                                    <p class="form-control">
                                        <?=$storage['location'];?>
                                    </p>
                                </div>

                            <?php
                            }
                            else{
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }?>
                                </div>
                            </div>
                         </div> 

                                
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>