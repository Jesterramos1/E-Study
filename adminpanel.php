
<?php include('pagination.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Manual CSS -->
    <style type="text/css">
        #imgicon{
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }
        .pagination-container{
            
        }
        .btn{

        }
    </style>

    <title>RTU Admin View</title>
</head>
<body>
    
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <nav>
                          <div class="nav nav-tabs nav-pills nav-fill" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true" >Recently Added</button>
                            <button class="nav-link" id="nav-ceat-tab" data-bs-toggle="tab" data-bs-target="#nav-ceat" type="button" role="tab" aria-controls="nav-ceat" aria-selected="false">CEAT</button>
                            <button class="nav-link" id="nav-cbet-tab" data-bs-toggle="tab" data-bs-target="#nav-cbet" type="button" role="tab" aria-controls="nav-cbet" aria-selected="false">CBET</button>
                            <button class="nav-link" id="nav-cas-tab" data-bs-toggle="tab" data-bs-target="#nav-cas" type="button" role="tab" aria-controls="nav-cas" aria-selected="false">CAS</button>
                            <button class="nav-link" id="nav-ced-tab" data-bs-toggle="tab" data-bs-target="#nav-ced" type="button" role="tab" aria-controls="nav-ced" aria-selected="false">CED</button>
                            <button class="nav-link" id="nav-ipe-tab" data-bs-toggle="tab" data-bs-target="#nav-ipe" type="button" role="tab" aria-controls="nav-ipe" aria-selected="false">IPE</button>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                                <div class="pagination-container"><center>
                                    <div id="pagination_controls"><?php echo $paginationCtrls; ?></div><center>
                                </div>
                                <table class="table table-bordered table-striped">                      
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 60%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM storage";
                                            $query_run = mysqli_query($con, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                while($crow = mysqli_fetch_array($nquery)){
                                                    ?>
                                                    <tr>
                                                        <td><img id="imgicon"src="images/bookicon.png" alt="Book Icon" id="bookIcon"></td>
                                                        <td><?= $crow['title']; ?></td>
                                                        <td><?= $crow['date_publish']; ?></td>
                                                        <td>
                                                            <a href="research-edit.php?id=<?= $crow['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_study" value="<?=$crow['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                               
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="tab-pane fade " id="nav-ceat" role="tabpanel" aria-labelledby="nav-ceat-tab">
                                <div class="pagination-container"><center>
                                    <div id="pagination_controls"><?php echo $paginationCtrlsceat; ?></div><center>
                                </div>
                                <table class="table table-bordered table-striped">                      
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 60%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $query = "SELECT * FROM storage WHERE department = 'CEAT'";
                                            $query_run = mysqli_query($con, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {

                                                while($storage = mysqli_fetch_array($nqueryceat)){
                                                    ?>
                                                    <tr>
                                                        <td><img id="imgicon"src="images/bookicon.png" alt="Book Icon" id="bookIcon"></td>
                                                        <td><?= $storage['title']; ?></td>
                                                        <td><?= $storage['date_publish']; ?></td>
                                                        <td>
                                                            <a href="research-edit.php?id=<?= $storage['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_study" value="<?=$storage['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                               
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="tab-pane fade" id="nav-cbet" role="tabpanel" aria-labelledby="nav-cbet-tab">
                                 <div class="pagination-container"><center>
                                    <div id="pagination_controls"><?php echo $paginationCtrlscbet; ?></div><center>
                                </div>
                                <table class="table table-bordered table-striped">                      
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 60%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM storage WHERE department = 'CBET' ";
                                            $query_run = mysqli_query($con, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                 while($storage = mysqli_fetch_array($nquerycbet)){
                                                    ?>
                                                    <tr>
                                                        <td><img id="imgicon"src="images/bookicon.png" alt="Book Icon" id="bookIcon"></td>
                                                        <td><?= $storage['title']; ?></td>
                                                        <td><?= $storage['date_publish']; ?></td>
                                                        <td>
                                                            <a href="research-edit.php?id=<?= $storage['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_study" value="<?=$storage['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                               
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="tab-pane fade " id="nav-cas" role="tabpanel" aria-labelledby="nav-cas-tab">
                                 <div class="pagination-container"><center>
                                    <div id="pagination_controls"><?php echo $paginationCtrlscas; ?></div><center>
                                </div>
                                <table class="table table-bordered table-striped">                      
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 60%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM storage WHERE department = 'CAS'";
                                            $query_run = mysqli_query($con, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                               while($storage = mysqli_fetch_array($nquerycas)){
                                                    ?>
                                                    <tr>
                                                        <td><img id="imgicon"src="images/bookicon.png" alt="Book Icon" id="bookIcon"></td>
                                                        <td><?= $storage['title']; ?></td>
                                                        <td><?= $storage['date_publish']; ?></td>
                                                        <td>
                                                            <a href="research-edit.php?id=<?= $storage['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_study" value="<?=$storage['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                               
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="tab-pane fade " id="nav-ced" role="tabpanel" aria-labelledby="nav-ced-tab">
                                 <div class="pagination-container"><center>
                                    <div id="pagination_controls"><?php echo $paginationCtrlsced; ?></div><center>
                                </div>
                                <table class="table table-bordered table-striped">                      
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 60%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM storage WHERE department = 'CED' ORDER BY date_publish DESC";
                                            $query_run = mysqli_query($con, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {                                            
                                                while($storage = mysqli_fetch_array($nqueryced)){
                                                    ?>
                                                    <tr>
                                                        <td><img id="imgicon"src="images/bookicon.png" alt="Book Icon" id="bookIcon"></td>
                                                        <td><?= $storage['title']; ?></td>
                                                        <td><?= $storage['date_publish']; ?></td>
                                                        <td>
                                                            <a href="research-edit.php?id=<?= $storage['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_study" value="<?=$storage['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                               
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="tab-pane fade " id="nav-ipe" role="tabpanel" aria-labelledby="nav-ipe-tab">
                                 <div class="pagination-container"><center>
                                    <div id="pagination_controls"><?php echo $paginationCtrlsipe; ?></div><center>
                                </div>
                                <table class="table table-bordered table-striped">                      
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 60%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM storage WHERE department = 'IPE'";
                                            $query_run = mysqli_query($con, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                while($storage = mysqli_fetch_array($nqueryipe)){
                                                    ?>
                                                    <tr>
                                                        <td><img id="imgicon"src="images/bookicon.png" alt="Book Icon" id="bookIcon"></td>
                                                        <td><?= $storage['title']; ?></td>
                                                        <td><?= $storage['date_publish']; ?></td>
                                                        <td>
                                                            <a href="research-edit.php?id=<?= $storage['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_study" value="<?=$storage['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                               
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                
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