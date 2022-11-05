<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style type="text/css">
        iframe {
            padding: 0;
            margin: auto;
            display: block;
            width: 100%;
            border: 2px solid black;
            height: 100%;
        }

        #resaddcardheader {
            background-color: #1C5090;
            font-weight: bold;
            font-size: 20px;
            color: white;
            text-align: center;
            text-transform: uppercase;
        }

        button,
        input {
            font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
        }

        a {
            color: #f96332;
        }

        a:hover,
        a:focus {
            color: #f96332;
        }

        p {
            line-height: 1.61em;
            font-weight: 300;
            font-size: 1.2em;
        }

        .category {
            text-transform: capitalize;
            font-weight: 700;
            color: #9A9A9A;
        }

        body {
            color: #2c2c2c;
            font-size: 14px;
            font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
            overflow-x: hidden;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
        }

        .nav-item .nav-link,
        .nav-tabs .nav-link {
            -webkit-transition: all 300ms ease 0s;
            -moz-transition: all 300ms ease 0s;
            -o-transition: all 300ms ease 0s;
            -ms-transition: all 300ms ease 0s;
            transition: all 300ms ease 0s;
        }

        .card a {
            -webkit-transition: all 150ms ease 0s;
            -moz-transition: all 150ms ease 0s;
            -o-transition: all 150ms ease 0s;
            -ms-transition: all 150ms ease 0s;
            transition: all 150ms ease 0s;
        }

        [data-toggle="collapse"][data-parent="#accordion"] i {
            -webkit-transition: transform 150ms ease 0s;
            -moz-transition: transform 150ms ease 0s;
            -o-transition: transform 150ms ease 0s;
            -ms-transition: all 150ms ease 0s;
            transition: transform 150ms ease 0s;
        }

        [data-toggle="collapse"][data-parent="#accordion"][aria-expanded="true"] i {
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
        }


        .now-ui-icons {
            display: inline-block;
            font: normal normal normal 14px/1 'Nucleo Outline';
            font-size: inherit;
            text-transform: none;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        @-webkit-keyframes nc-icon-spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @-moz-keyframes nc-icon-spin {
            0% {
                -moz-transform: rotate(0deg);
            }

            100% {
                -moz-transform: rotate(360deg);
            }
        }

        @keyframes nc-icon-spin {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .now-ui-icons.objects_umbrella-13:before {
            content: "\ea5f";
        }

        .now-ui-icons.shopping_cart-simple:before {
            content: "\ea1d";
        }

        .now-ui-icons.shopping_shop:before {
            content: "\ea50";
        }

        .now-ui-icons.ui-2_settings-90:before {
            content: "\ea4b";
        }

        .nav-tabs {
            border: 0;
            padding: 15px 0.7rem;
        }

        .nav-tabs:not(.nav-tabs-neutral)>.nav-item>.nav-link.active {
            box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.3);
        }

        .card .nav-tabs {
            border-top-right-radius: 0.1875rem;
            border-top-left-radius: 0.1875rem;
        }

        .nav-tabs>.nav-item>.nav-link {
            color: #888888;
            margin: 0;
            margin-right: 5px;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 30px;
            font-size: 16px;
            padding: 11px 23px;
            line-height: 1.5;
        }

        .nav-tabs>.nav-item>.nav-link:hover {
            background-color: transparent;
        }

        .nav-tabs>.nav-item>.nav-link.active {
            background-color: #444;
            border-radius: 30px;
            color: #FFFFFF;
        }

        .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
            font-size: 14px;
            position: relative;
            top: 1px;
            margin-right: 3px;
        }

        .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link {
            color: #FFFFFF;
        }

        .nav-tabs.nav-tabs-neutral>.nav-item>.nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #FFFFFF;
        }

        .card {
            border: 0;
            border-radius: 0.1875rem;
            display: inline-block;
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            box-shadow: 0px 5px 25px 0px rgba(0, 0, 0, 0.2);
        }

        .card .card-header {
            background-color: transparent;
            border-bottom: 0;
            background-color: transparent;
            border-radius: 0;
            padding: 0;
        }

        .card[data-background-color="rtublue"] {
            background-color: #1C5090;
        }

        .card[data-background-color="red"] {
            background-color: #FF3636;
        }

        .card[data-background-color="yellow"] {
            background-color: #FFB236;
        }

        .card[data-background-color="blue"] {
            background-color: #2CA8FF;
        }

        .card[data-background-color="green"] {
            background-color: #15b60d;
        }

        [data-background-color="rtublue"] {
            background-color: #1C5090;
        }

        [data-background-color="black"] {
            background-color: #2c2c2c;
        }

        [data-background-color]:not([data-background-color="gray"]) {
            color: #FFFFFF;
        }

        [data-background-color]:not([data-background-color="gray"]) p {
            color: #FFFFFF;
        }

        [data-background-color]:not([data-background-color="gray"]) a:not(.btn):not(.dropdown-item) {
            color: #FFFFFF;
        }

        [data-background-color]:not([data-background-color="gray"]) .nav-tabs>.nav-item>.nav-link i.now-ui-icons {
            color: #FFFFFF;
        }


        @font-face {
            font-family: 'Nucleo Outline';
            src: url("https://github.com/creativetimofficial/now-ui-kit/blob/master/assets/fonts/nucleo-outline.eot");
            src: url("https://github.com/creativetimofficial/now-ui-kit/blob/master/assets/fonts/nucleo-outline.eot") format("embedded-opentype");
            src: url("https://raw.githack.com/creativetimofficial/now-ui-kit/master/assets/fonts/nucleo-outline.woff2");
            font-weight: normal;
            font-style: normal;

        }

        @media screen and (max-width: 768px) {

            .nav-tabs {
                display: inline-block;
                width: 100%;
                padding-left: 100px;
                padding-right: 100px;
                text-align: center;
            }

            .nav-tabs .nav-item>.nav-link {
                margin-bottom: 5px;
            }
        }

        .input-group-text {
            background-color: #1C5090;
            color: white;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            font-size: 16px;
            float: left;
        }

        .btn-primary,
        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:visited {
            background-color: #194F90 !important;
        }

        #navs {
            pointer-events: none;
        }
    </style>

    <title>Admin Panel</title>
</head>

<body>
    <?php

    if ($_SESSION['whoactive'] == "1") {
        $_SESSION['navupload'] = "active";
        $_SESSION['tabupload'] = "active";
        $_SESSION['navcheck'] = "";
        $_SESSION['tabcheck'] = "";
    } else if ($_SESSION['whoactive'] == "0") {
        $_SESSION['navcheck'] = "active";
        $_SESSION['tabcheck'] = "active";
        $_SESSION['navupload'] = " ";
        $_SESSION['tabupload'] = " ";
    } else {
        $_SESSION['navcheck'] = "active";
        $_SESSION['tabcheck'] = "active";
        $_SESSION['navupload'] = " ";
        $_SESSION['tabupload'] = " ";
    }

    ?>
    <?php include('message-insert.php'); ?>
    <div class="row" id="hidden">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="rtublue">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $_SESSION['navcheck'] ?>" data-toggle="tab" href="#fileCheck" role="tab" id="navs"><i class="bi bi-1-circle"></i> File Check<?php echo $_SESSION['whoactive'] ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo $_SESSION['navupload'] ?>" data-toggle="tab" href="#fileUpload" role="tab" id="navs"><i class="bi bi-2-circle"></i> File Upload</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <!-- Tab panes -->
                    <div class="tab-content text-center">
                        <div class="tab-pane <?php echo $_SESSION['tabcheck'] ?>" id="fileCheck" role="tabpanel">
                            <form action="code.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                <div id="semicon">
                                    <h5 class="card-title">Upload Thesis Soft Copy</h5>
                                    <div>
                                        <label for="formFileLg" class="form-label">Large file input example</label>
                                        <input class="form-control form-control-lg" id="preFileUpload" name="preFileUpload" type="file">
                                        <label>Status:</label>
                                        <label id="status"></label>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-primary" name="preUpload" id="preUpload">Submit File</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane <?php echo $_SESSION['tabupload'] ?>" id="fileUpload" role="tabpanel">
                            <div class="container">
                                <div class="row">
                                    <div class="col-5">
                                        <iframe src="tempUpload/<?php echo $_SESSION['tempFile'] ?>#toolbar=0" frameborder="0"></iframe>
                                    </div>
                                    <div class="col-7">
                                        <div class="was">
                                            <form action="code.php" method="post" enctype="multipart/form-data" class="needs-validation">
                                                <label class="form-label">Research File</label>
                                                <label><?php echo $_SESSION['tempFile'] ?></label>
                                                <div class="mb-3">
                                                    <div>
                                                        <span id="fileError" class="h6 text-danger text-center mt-3"></span>
                                                    </div>
                                                    <label>Research Title</label>
                                                    <input type="text" name="title" id="res_title" class="form-control h-25" required>
                                                    <span id="titleError" class="h6 text-danger text-center mt-3"></span>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Department</label>
                                                    <select class="form-select" name="department" id="department" required>
                                                        <option selected value="">Select a department</option>
                                                        <option value="CEAT">College of Engineering, Architecture, and Technology</option>
                                                        <option value="CBET">College of Business and Entrepreneurial Technology</option>
                                                        <option value="CAS">College of Arts and Sciences</option>
                                                        <option value="CED">College of Education</option>
                                                        <option value="IPE">Institute of Physical Education</option>
                                                        <option value="GS">Graduate School</option>


                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Date Publish</label>
                                                    <input type="date_publish" name="date_publish" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Researchers:</label>
                                                    <textarea id="researchers" name="researchers" class="form-control" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Location:</label>
                                                    <select class="form-select" name="location" id="location" required>
                                                        <option selected value="">Choose Location</option>
                                                        <option value="CEAT Library">CEAT Library - Multi-purpose Building / Third (3rd) Floor</option>
                                                        <option value="CBET Library">CBET Library - SNAGAH Building / Second (2nd) Floor </option>
                                                        <option value="CAS Library">CAS Library - MAB Building / Second (2nd) Floor</option>
                                                        <option value="CED Library">CED Library - SNAGAH Building / Second (2nd) Floor</option>
                                                        <option value="IPE Library">IPE Library - MAB Building / Fifth (5th) Floor</option>
                                                        <option value="GS Library">GS Library - RND Building / Third (3rd) Floor</option>
                                                    </select>

                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" name="save_research" id="resAdd" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tabs on plain Card -->
        </div>
    </div>

    <script>
        $('#preFileUpload').change(function() {
            var filename = $('#preFileUpload').val().replace(/C:\\fakepath\\/i, '')
            $.ajax({
                url: "code.php",
                method: "POST",
                data: {
                    filename: filename
                },
                success: function(data) {
                    if (data > 0) {
                        //true(existing)
                        $('#status').html("File Already Exist");
                        $('#preUpload').attr('disabled', true);
                    } else {
                        //false(non-existing)
                        $('#status').html("Ready to be Uploaded");
                        $('#preUpload').attr('disabled', false);
                    }

                }
            });
        });
    </script>
</body>

</html>