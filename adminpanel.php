
<?php include('pagination.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Manual CSS -->
    <style type="text/css">
        #imgicon{
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }
        #admincardheader{
            background-color: #1C5090;
            font-weight: bold;
            font-size: 20px;
            color: white;
            text-align: center;
            text-transform: uppercase;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>RTU Admin View</title>
</head>
<body>
        <?php include('message.php'); ?>
        <div class="card" id="admincard">
            <div class="card-header" id="admincardheader">
                Thesis Records
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs nav-pills nav-fill" id="nav-tab" role="tablist">

                    <h4>Recently Added</h4>
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
                                    <th style="width: 50%">Research Title</th>
                                    <th style="width: 10%">Year of Publication</th>
                                    <th style="width: 10%">Department</th>
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
                                                <td><?= $crow['department']; ?></td>
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
                    


</body>
</html>