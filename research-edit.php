<?php
session_start();
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

    <title>Edit Research</title>
</head>
<body>
  
        <?php include('message.php'); ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Research
                            <a href="adminpanel.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $study_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM storage WHERE id='$study_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0){
                                $storage = mysqli_fetch_array($query_run);
                                ?>
                        <div class="container">
                          <div class="row">
                            <div class="col-7">
                                <div class="containers">
                                <iframe class="responsive-iframe" src="uploads/<?=$storage['res_file']?>#toolbar=0" width="94%" height="470px"></iframe>
                                </div> 
                            </div>
                            <div class="col-5">
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="study_id" value="<?= $storage['id']; ?>">
                                    <div class="mb-3">
                                        <label>Research Title</label>
                                        <input type="text" name="title" value="<?=$storage['title'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Department</label>
                                        <input type="text" name="department" value="<?=$storage['department'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Date Publish</label>
                                        <input type="text" name="date_publish" value="<?=$storage['date_publish'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Researchers</label>
                                        <textarea id="researchers" name="researchers" value="<?=$storage['researchers'];?>" class="form-control"><?=$storage['researchers'];?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Location</label>
                                        <select class="form-select" name="location" id="location">
                                          <option selected><?=$storage['location']?></option>  
                                          <option value="CBET Library">CBET LIBRARY</option>
                                          <option value="CED Library">CED LIBRARY</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_study" class="btn btn-primary">
                                            Update Study
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }?>
                            </div>
                          </div>
                        </div>
                                
                    </div>
                </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>