<?php session_start(); require 'dbcon.php';?>

<html lang="en">
  <head>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!--Bootstrap Script and CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Manual CSS -->
    <style type="text/css">
        body{
            font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
            overflow-x: hidden;
        }

        #imgicon{
            height: 50px;
            width: 50px;
        }

        .containers {
          position: relative;
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

        .card-header{
            background: #194f90;
            color: white; 
        }

        .sidebar {
        margin: 0;
        padding: 0;
        width: 300px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
        }

        div.content {
        margin-left: 300px;
        padding: 1px 16px;
        height: 1000px;
        }

        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 800px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {float: left;}
            div.content {margin-left: 0;}
        }

        /* On screens that are less than 1100px, display the bar vertically, instead of horizontally */
        @media screen and (max-width: 1100px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
            #bookImage{
                display: none;
            }
            table{
                font-size: 12px;
            }
            .studyinfo{
                font-size:12px;
            }
            .nav-pills .nav-link {
                font-size:12px;
            }
            #burgerMenu{
                display: inline;
            }
            .sidebar{
                display:none;
            }
            .content{
                width: 100%;
                position: relative;
            }
        }

        
        .modal-header {
            background-color: #194f90;
            color: white;
        }  

        #search{
          margin-top: -7%;
          margin-left: 1%;
        }

        #browse{
            background-color: white;
            padding-bottom: 1px;
        }

        h5{
            padding-top: 15%;
            margin-left: 4%;
            font-size: 24px;
            font-weight: bold;
        }

        #year, #author, #alpha{
            transition: all .5s ease;
            color: black;
            border: none;
            text-align: left;
            letter-spacing: .5px;
            width: 90%;
            background-color : transparent;
            outline: none;
            font-size: 16px;
            text-transform: uppercase;
            padding-top: 3%;
            margin-left: 4%;
            margin-top: -3%;
        }

        #year:hover, #author:hover, #alpha:hover {
            color: white;
            background-color: #194F90;
            width: 100%;
        }

        hr, #oy{
            margin-top: -1%;
        }

        #oy{
            width:90%;
            margin-left: auto;
            margin-right: auto;
        }

        .form-floating{
        width: 93%;
        margin-left: auto;
        margin-right: auto;
        }

        .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
        background-color: #194F90 !important;
        } 

        .nav-pills .nav-link {
        color: #555;
        font-weight: bold;
        }

        .text-uppercase rounded-0 {
        letter-spacing: 0.1em;
        }

        .lined .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        }

        .lined .nav-link:hover {
        border: none;
        border-bottom: 3 px solid transparent;
        }

        .lined .nav-link.active {
        background: none;
        color: #1c5090;
        border-color: #1c5090;
        }

        .tdata, th{
            text-align: center;
            vertical-align: middle;
        }
        h6{
            margin-top: 1px;
            text-align: center;
            font-weight: bold;
        }
        .offcanvas-body{
            overflow-x: hidden;
        }
        .aal{
            font-size: 14px;
        }

        
    </style>

    <title>Explore Research</title>
</head>
<body>

    <div class="sticky-sm-top">
        <?php
        require 'header.php';
        $tabChecker = NULL;
        if (isset($_POST['Explore'])) {
            $tabChecker = $_REQUEST['tabvalue'];
        }?>
    </div>

    <!--Off Canvas-->
    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">E-Study</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            
            <div style="position: relative; width: 100%; height: 0; padding-top: 56.2500%;
                    padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 0.8em; margin-bottom: 0.9em; overflow: hidden;
                    border-radius: 8px; will-change: transform;">
                <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                    src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFQIO-E05w&#x2F;view?embed">
                </iframe>
            </div>

            <div class="input-group mb-3" style="margin-left:0%;" id="search">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn btn-primary me-md-2" type="button" id="sideB"><i class="bi bi-search"></i></button>
            </div>


            <div id="browse"  style="background-color:#194F90;">
                <h5 style="color:white;"><i class="bi bi-sliders" style="color: white; margin-right:5%; margin-left:2%;"></i>BROWSE BY:</h5>
                <hr style="color:white;">
            </div>
        
            <div class="pt-4 pb-2" style=" background-color:white;">
                <button id="alpha"><i class="bi bi-sort-alpha-down" style="margin-right:4%;"></i>Alphabetical</button>
                <hr id="oy">
                <button id="author"><i class="bi bi-bookmarks-fill" style="margin-right:4%;"></i>Recently Added</button>
                <hr id="oy">
                <form class="form-floating">
                <input type="text" class="form-control" id="floatingInputValue" placeholder="2022" value="2022">
                <label for="floatingInputValue"><i class="bi bi-calendar2-week"></i>   Year</label>
                </form>
            </div>

        </div>
    </div>

    <!--Sidebar Search-->
    <div class="sidebar">     
            <div style="position: relative; width: 100%; height: 0; padding-top: 56.2500%;
                padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 0.8em; margin-bottom: 0.9em; overflow: hidden;
                border-radius: 8px; will-change: transform;">
                <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                    src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFQIO-E05w&#x2F;view?embed">
                </iframe>
            </div>

            <div class="input-group mb-2" id="search">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn btn-primary me-md-2" type="button" id="sideB"><i class="bi bi-search"></i></button>
            </div>
    
            <div id="browse"  style="background-color:#194F90;">
                <h5 style="color:white;"><i class="bi bi-sliders" style="color: white; margin-right:5%; margin-left:2%;"></i>BROWSE BY:</h5>
                <hr style="color:white;">
            </div>
        
            <div class="pt-4 pb-2" style=" background-color:white;">
                <button id="alpha"><i class="bi bi-sort-alpha-down" style="margin-right:4%;"></i>Alphabetical</button>
                <hr id="oy">
                <button id="author"><i class="bi bi-bookmarks-fill" style="margin-right:4%;"></i>Recently Added</button>
                <hr id="oy">
                <form class="form-floating">
                <input type="text" class="form-control" id="floatingInputValue" placeholder="2022" value="2022">
                <label for="floatingInputValue"><i class="bi bi-calendar2-week"></i>   Year</label>
                </form>
            </div>

            <div class="card text-center">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="images/rtulib.jpg" style="margin-top: 12px; margin-left:8px;" class="img-fluid rounded-start" alt="RTU ULRC">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="card-title">Rizal Technologival University Learning Resource Center</h6>
                        <button class="btn btn-primary aal"><i class="bi bi-messenger"></i>  Ask a Librarian</button>
                    </div>
                    </div>
                </div>
            </div>

    </div>

    <!--Main Container-->
    <div class="content">

        <nav>
            <div class="nav nav-tabs nav-pills with-arrow lined text-center nav-fill pt-3" id="nav-tab" role="tablist">
                <button class="btn btn-primary d-sm-block d-md-block d-lg-none" id="burgerMenu"  type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                <i class="bi bi-list"></i>
                </button>
                <button class="nav-link text-uppercase rounded-0 " id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="false">All</button>
                <button class="nav-link text-uppercase rounded-0  <?php if ($tabChecker == "1") echo 'active'; ?>" id="nav-ceat-tab" data-bs-toggle="tab" data-bs-target="#nav-ceat" type="button" role="tab" aria-controls="nav-ceat" aria-selected="false">CEAT</button>
                <button class="nav-link text-uppercase rounded-0  <?php if ($tabChecker == "2") echo 'active'; ?>" id="nav-cbet-tab" data-bs-toggle="tab" data-bs-target="#nav-cbet" type="button" role="tab" aria-controls="nav-cbet" aria-selected="false">CBET</button>
                <button class="nav-link text-uppercase rounded-0  <?php if ($tabChecker == "3") echo 'active'; ?>" id="nav-cas-tab" data-bs-toggle="tab" data-bs-target="#nav-cas" type="button" role="tab" aria-controls="nav-cas" aria-selected="false">CAS</button>
                <button class="nav-link text-uppercase rounded-0  <?php if ($tabChecker == "4") echo 'active'; ?>" id="nav-ced-tab" data-bs-toggle="tab" data-bs-target="#nav-ced" type="button" role="tab" aria-controls="nav-ced" aria-selected="false">CED</button>
                <button class="nav-link text-uppercase rounded-0  <?php if ($tabChecker == "5") echo 'active'; ?>" id="nav-ipe-tab" data-bs-toggle="tab" data-bs-target="#nav-ipe" type="button" role="tab" aria-controls="nav-ipe" aria-selected="false">IPE</button>
                <button class="nav-link text-uppercase rounded-0  <?php if ($tabChecker == "6") echo 'active'; ?>" id="nav-gs-tab" data-bs-toggle="tab" data-bs-target="#nav-gs" type="button" role="tab" aria-controls="nav-gs" aria-selected="false">GS</button>  
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade " id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
            <div class="container mt-4">
                <?php include('message.php'); ?>
                <div class="row">
                    <div class="col-md-12">

            <!--All Category-->

                        <div class="card">
                            <div class="card-header">
                                <h4>Explore All Categories</h4>
                            </div>
                            <div class="card-body" >
                                <?php 
                                    include "dbcon.php";
                                    $query = "SELECT * FROM storage ORDER BY id DESC";
                                    $result = mysqli_query($con,$query);
                                ?>
                                <table class="table table-bordered table-striped">                       
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 10%" id="bookImage"></th>
                                            <th style="width: 70%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_array($result)){ ?>
                                        <tr style="text-align: center;">
                                            <?php
                                            $chooseDept = strtoupper($row['department']);       
                                            if($chooseDept == 'CEAT'){
                                                $choice = "n_ceat.png";
                                            }elseif ($chooseDept == 'CBET') {
                                                $choice = "n_cbet.png";
                                            }elseif ($chooseDept == "CAS") {
                                                $choice = "n_cas.png";
                                            }elseif ($chooseDept == "CED"){
                                                $choice = "n_ced.png";
                                            }elseif ($chooseDept == "IPE"){
                                                $choice = "n_ipe.png";
                                            }elseif ($chooseDept == "GS"){
                                                $choice = "n_gs.png";
                                            }
                                            ?>                                
                                            <td class="tdata" id="bookImage"><img id="imgicon"src="<?php echo "images/".$choice;?>" alt="Book Icon" id="bookIcon"></td>
                                            <td class="tdata"><?php echo ucwords(strtolower($row['title'])); ?></td>
                                            <td class="tdata"><?php echo $row['date_publish']; ?></td>
                                            <td class="tdata">
                                                <button data-id = '<?php echo $row['id'];?>' class="studyinfo  btn btn-outline-success">View</button>
                                                
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
                                <h4>College of Engineering, Architecture, and Technology Research</h4>
                            </div>
                            <div class="card-body">
                                <?php 
                                    include "dbcon.php";
                                    $query = "SELECT * FROM storage WHERE department = 'CEAT' ORDER BY id DESC";
                                    $result = mysqli_query($con,$query);
                                ?>
                                <table class="table table-bordered table-striped">                       
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 10%" id="bookImage"></th>
                                            <th style="width: 70%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)){ ?>

                                        <tr style="text-align: center;">
                                            <td class="tdata" id="bookImage"><img id="imgicon"src="images/n_ceat.png" alt="Book Icon" id="bookIcon"></td>
                                            <td class="tdata"><?php echo ucwords(strtolower($row['title'])); ?></td>
                                            <td class="tdata"><?php echo $row['date_publish']; ?></td>
                                            <td class="tdata">
                                                <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-outline-success">View</button>
                                                
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

            <!--CBET category-->

                        <div class="card">
                            <div class="card-header">
                                <h4>College of Business and Entrepreneurial Technology Research</h4>
                            </div>
                            <div class="card-body">
                                <?php 
                                    include "dbcon.php";
                                    $query = "SELECT * FROM storage WHERE department = 'CBET' ORDER BY id DESC";
                                    $result = mysqli_query($con,$query);
                                ?>
                                <table class="table table-bordered table-striped">                       
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 10%" id="bookImage"></th>
                                            <th style="width: 70%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)){ ?>
                                        <tr style="text-align: center;">
                                            <td class="tdata" id="bookImage"><img id="imgicon"src="images/n_cbet.png" alt="Book Icon" id="bookIcon"></td>
                                            <td class="tdata"><?php echo ucwords(strtolower($row['title'])); ?></td>
                                            <td class="tdata"><?php echo $row['date_publish']; ?></td>
                                            <td class="tdata">
                                                <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-outline-success">View</button>
                                                
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

            <!--CAS category-->

                        <div class="card">
                            <div class="card-header">
                                <h4>College of Arts and Sciences Research</h4>
                            </div>
                            <div class="card-body">
                                <?php 
                                    include "dbcon.php";
                                    $query = "SELECT * FROM storage WHERE department = 'CAS' ORDER BY id DESC";
                                    $result = mysqli_query($con,$query);
                                ?>
                                <table class="table table-bordered table-striped">                       
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 10%" id="bookImage"></th>
                                            <th style="width: 70%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)){ ?>
                                        <tr style="text-align: center;">
                                            <td class="tdata" id="bookImage"><img id="imgicon"src="images/n_cas.png" alt="Book Icon" id="bookIcon"></td>
                                            <td class="tdata"><?php echo ucwords(strtolower($row['title'])); ?></td>
                                            <td class="tdata"><?php echo $row['date_publish']; ?></td>
                                            <td class="tdata">
                                                <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-outline-success">View</button>
                                                
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

            <!--CED category-->

                        <div class="card">
                            <div class="card-header">
                                <h4>College of Education Research</h4>
                            </div>
                            <div class="card-body">
                                <?php 
                                    include "dbcon.php";
                                    $query = "SELECT * FROM storage WHERE department = 'CED' ORDER BY id DESC";
                                    $result = mysqli_query($con,$query);
                                ?>
                                <table class="table table-bordered table-striped">                       
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 10%" id="bookImage"></th>
                                            <th style="width: 70%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)){ ?>
                                        <tr style="text-align: center;">
                                            <td class="tdata" id="bookImage"><img id="imgicon"src="images/n_ced.png" alt="Book Icon" id="bookIcon"></td>
                                            <td class="tdata"><?php echo ucwords(strtolower($row['title'])); ?></td>
                                            <td class="tdata"><?php echo $row['date_publish']; ?></td>
                                            <td class="tdata">
                                                <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-outline-success">View</button>
                                                
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

            <!--IPE category-->

                        <div class="card">
                            <div class="card-header">
                                <h4>Institute of Physical Education Research</h4>
                            </div>
                            <div class="card-body">
                                <?php 
                                    include "dbcon.php";
                                    $query = "SELECT * FROM storage WHERE department = 'IPE' ORDER BY id DESC";
                                    $result = mysqli_query($con,$query);
                                ?>
                                <table class="table table-bordered table-striped">                       
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 10%" id="bookImage"></th>
                                            <th style="width: 70%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)){ ?>
                                        <tr style="text-align: center;">
                                            <td class="tdata" id="bookImage"><img id="imgicon"src="images/n_ipe.png" alt="Book Icon" id="bookIcon"></td>
                                            <td class="tdata"><?php echo ucwords(strtolower($row['title'])); ?></td>
                                            <td class="tdata"><?php echo $row['date_publish']; ?></td>
                                            <td class="tdata">
                                                <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-outline-success">View</button>
                                                
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



        <div class="tab-pane fade <?php if ($tabChecker == "6") echo ' show active'; ?>" id="nav-gs" role="tabpanel" aria-labelledby="nav-gs-tab">
            <div class="container mt-4">
                <?php include('message.php'); ?>
                <div class="row">
                    <div class="col-md-12">

            <!--GS category-->

                        <div class="card">
                            <div class="card-header">
                                <h4>Graduate School Research</h4>
                            </div>
                            <div class="card-body">
                                <?php 
                                    include "dbcon.php";
                                    $query = "SELECT * FROM storage WHERE department = 'GS' ORDER BY id DESC";
                                    $result = mysqli_query($con,$query);
                                ?>
                                <table class="table table-bordered table-striped">                       
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 10%" id="bookImage"></th>
                                            <th style="width: 70%">Research Title</th>
                                            <th style="width: 10%">Year of Publication</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_array($result)){ ?>
                                        <tr style="text-align: center;">
                                            <td class="tdata" id="bookImage"><img id="imgicon"src="images/n_gs.png" alt="Book Icon" id="bookIcon"></td>
                                            <td class="tdata"><?php echo ucwords(strtolower($row['title'])); ?></td>
                                            <td class="tdata"><?php echo $row['date_publish']; ?></td>
                                            <td class="tdata">
                                                <button data-id = '<?php echo $row['id'];?>' class="studyinfo btn btn-outline-success">View</button>
                                                
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
        <div class="modal-dialog modal-xl   ">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Research Information</h4>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>