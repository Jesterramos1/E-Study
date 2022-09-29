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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Manual CSS -->
    <style type="text/css">
        #imgicon{
            height: 50px;
            width: 50px;
        }
        .containers {
          position: relative;
          overflow: hidden;
          width: 100%;
          padding-top: 100%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
        }

        /* Then style the iframe to fit in the container div with full height and width */
        .responsive-iframe {
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          width: 100%;
          height: 100%;
        }
        @media only screen and (max-width: 1026px) {
            #fadeshow1 {
                display: none;
            }
        }
    </style>

    <title>Research</title>
</head>
<body>
    <?php
    require 'header.php';
    $tabChecker = NULL;
    if (isset($_POST['Explore'])) {
        $tabChecker = $_REQUEST['tabvalue'];
    }?>

    <nav>
      <div class="nav nav-tabs nav-pills nav-fill" id="nav-tab" role="tablist">
        <button class="nav-link" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="false">All</button>
        <button class="nav-link <?php if ($tabChecker == "1") echo 'active'; ?>" id="nav-ceat-tab" data-bs-toggle="tab" data-bs-target="#nav-ceat" type="button" role="tab" aria-controls="nav-ceat" aria-selected="false">CEAT</button>
        <button class="nav-link <?php if ($tabChecker == "2") echo 'active'; ?>" id="nav-cbet-tab" data-bs-toggle="tab" data-bs-target="#nav-cbet" type="button" role="tab" aria-controls="nav-cbet" aria-selected="false">CBET</button>
        <button class="nav-link <?php if ($tabChecker == "3") echo 'active'; ?>" id="nav-cas-tab" data-bs-toggle="tab" data-bs-target="#nav-cas" type="button" role="tab" aria-controls="nav-cas" aria-selected="false">CAS</button>
        <button class="nav-link <?php if ($tabChecker == "4") echo 'active'; ?>" id="nav-ced-tab" data-bs-toggle="tab" data-bs-target="#nav-ced" type="button" role="tab" aria-controls="nav-ced" aria-selected="false">CED</button>
        <button class="nav-link <?php if ($tabChecker == "5") echo 'active'; ?>" id="nav-ipe-tab" data-bs-toggle="tab" data-bs-target="#nav-ipe" type="button" role="tab" aria-controls="nav-ipe" aria-selected="false">IPE</button>
      </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade " id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
        <div class="container mt-4">
            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">

        <!--Recently added category-->

                    <div class="card">
                        <div class="card-header">
                            <h4>Recently Added</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                include "dbcon.php";
                                $query = "SELECT * FROM storage ORDER BY id DESC";
                                $result = mysqli_query($con,$query);
                            ?>
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
                                    <?php while($row = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        <?php
                                        $chooseDept = $row['department'];       
                                        if($chooseDept == 'CEAT'){
                                            $choice = "i_ceat.png";
                                        }elseif ($chooseDept == 'CBET') {
                                            $choice = "i_cbet.png";
                                        }elseif ($chooseDept == "CAS") {
                                            $choice = "i_cas.png";
                                        }elseif ($chooseDept == "CED"){
                                            $choice = "i_ced.png";
                                        }elseif ($chooseDept == "IPE"){
                                            $choice = "i_ipe.png";
                                        }
                                        ?>                                
                                        <td><img id="imgicon"src="<?php echo "images/".$choice;?>" alt="Book Icon" id="bookIcon"></td>
                                        <td><?php echo ucwords(strtolower($row['title'])); ?></td>
                                        <td><?php echo $row['date_publish']; ?></td>
                                        <td>
                                            <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-success">View</button>
                                            
                                        </td>
                                    </tr>
                                     <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>

      <div class="tab-pane fade <?php if ($tabChecker == "1") echo ' show active'; ?>" id="nav-ceat" role="tabpanel" aria-labelledby="nav-ceat-tab">
        <div class="container mt-4">
            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">

        <!--CEAT category-->

                    <div class="card">
                        <div class="card-header">
                            <h4>Recently Added</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                include "dbcon.php";
                                $query = "SELECT * FROM storage WHERE department = 'CEAT' ORDER BY id DESC";
                                $result = mysqli_query($con,$query);
                            ?>
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
                                    <?php while($row = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        <td><img id="imgicon"src="images/i_ceat.png" alt="Book Icon" id="bookIcon"></td>
                                        <td><?php echo ucwords(strtolower($row['title'])); ?></td>
                                        <td><?php echo $row['date_publish']; ?></td>
                                        <td>
                                            <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-success">View</button>
                                            
                                        </td>
                                    </tr>
                                     <?php } ?>                                
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
      <div class="tab-pane fade <?php if ($tabChecker == "2") echo ' show active'; ?>" id="nav-cbet" role="tabpanel" aria-labelledby="nav-cbet-tab">
        <div class="container mt-4">
            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">

        <!--CEAT category-->

                    <div class="card">
                        <div class="card-header">
                            <h4>Recently Added</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                include "dbcon.php";
                                $query = "SELECT * FROM storage WHERE department = 'CBET' ORDER BY id DESC";
                                $result = mysqli_query($con,$query);
                            ?>
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
                                    <?php while($row = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        <td><img id="imgicon"src="images/i_cbet.png" alt="Book Icon" id="bookIcon"></td>
                                        <td><?php echo ucwords(strtolower($row['title'])); ?></td>
                                        <td><?php echo $row['date_publish']; ?></td>
                                        <td>
                                            <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-success">View</button>
                                            
                                        </td>
                                    </tr>
                                     <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="tab-pane fade <?php if ($tabChecker == "3") echo ' show active'; ?>" id="nav-cas" role="tabpanel" aria-labelledby="nav-cas-tab">
        <div class="container mt-4">
            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">

        <!--CEAT category-->

                    <div class="card">
                        <div class="card-header">
                            <h4>Recently Added</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                include "dbcon.php";
                                $query = "SELECT * FROM storage WHERE department = 'CAS' ORDER BY id DESC";
                                $result = mysqli_query($con,$query);
                            ?>
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
                                    <?php while($row = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        <td><img id="imgicon"src="images/i_cas.png" alt="Book Icon" id="bookIcon"></td>
                                        <td><?php echo ucwords(strtolower($row['title'])); ?></td>
                                        <td><?php echo $row['date_publish']; ?></td>
                                        <td>
                                            <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-success">View</button>
                                            
                                        </td>
                                    </tr>
                                     <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
          
      </div>
      <div class="tab-pane fade <?php if ($tabChecker == "4") echo ' show active'; ?>" id="nav-ced" role="tabpanel" aria-labelledby="nav-ced-tab">
        <div class="container mt-4">
            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">

        <!--CEAT category-->

                    <div class="card">
                        <div class="card-header">
                            <h4>Recently Added</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                include "dbcon.php";
                                $query = "SELECT * FROM storage WHERE department = 'CED' ORDER BY id DESC";
                                $result = mysqli_query($con,$query);
                            ?>
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
                                    <?php while($row = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        <td><img id="imgicon"src="images/i_ced.png" alt="Book Icon" id="bookIcon"></td>
                                        <td><?php echo ucwords(strtolower($row['title'])); ?></td>
                                        <td><?php echo $row['date_publish']; ?></td>
                                        <td>
                                            <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-success">View</button>
                                            
                                        </td>
                                    </tr>
                                     <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div> 
      <div class="tab-pane fade <?php if ($tabChecker == "5") echo ' show active'; ?>" id="nav-ipe" role="tabpanel" aria-labelledby="nav-ipe-tab">
        <div class="container mt-4">
            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">

        <!--CEAT category-->

                    <div class="card">
                        <div class="card-header">
                            <h4>Recently Added</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                include "dbcon.php";
                                $query = "SELECT * FROM storage WHERE department = 'IPE' ORDER BY id DESC";
                                $result = mysqli_query($con,$query);
                            ?>
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
                                    <?php while($row = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        <td><img id="imgicon"src="images/i_ipe.png" alt="Book Icon" id="bookIcon"></td>
                                        <td><?php echo ucwords(strtolower($row['title'])); ?></td>
                                        <td><?php echo $row['date_publish']; ?></td>
                                        <td>
                                            <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-success">View</button>
                                            
                                        </td>
                                    </tr>
                                     <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
          
      </div>
    </div>
  
    
    <script type='text/javascript'>
        $(document).ready(function(){
            $('.studyinfo').click(function(){
                var resid = $(this).data('id');
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {resid: resid},
                    success: function(response){ 
                        $('.modal-body').html(response); 
                        $('#empModal').modal('show'); 
                    }
                });
            });
        });
    </script>
    <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Research Info</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="scheduling.php" role="button">Book Visit</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>