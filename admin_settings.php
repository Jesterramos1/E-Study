<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Settings</title>

    <!--CSS and Javascript-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!---bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!--Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">

    <style>
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
    </style>

</head>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="rtublue">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#changePass" role="tab"><i class="bi bi-shield-lock"></i> Change Password</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#newAdmin" role="tab"><i class="bi bi-person-plus"></i> Add New Admin</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <!-- Tab panes -->
                    <div class="tab-content text-center">
                        <div class="tab-pane active" id="changePass" role="tabpanel">
                            <?php
                            if ($_SESSION['user'] == "") {
                                $_SESSION['user'] = "No user found";
                            }
                            include('message-insert.php');
                            ?>
                            <form action="code.php" method="POST" id="NewPass">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="username">Username:</span>
                                    <input type="text" class="form-control" placeholder="<?php echo $_SESSION['user']; ?>" aria-label="Username" aria-describedby="basic-addon1" id="adminUser" disabled>
                                </div>

                                <label for="pass" class="form-label">Password:</label>
                                <span id='messagepasstxt'></span>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Enter old password" aria-label="Example text with button addon" aria-describedby="button-addon1" id="oldPassword" name="oldPassword" required />
                                    <button class="btn btn-primary" type="button" id="oldPasswordbtn"><i class="bi bi-eye-slash" id="oldPasswordIcon"></i></button>
                                </div>

                                <label for="pass" class="form-label">New Password:</label>
                                <span id='messagetxt'></span>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Enter new password" aria-label="Example text with button addon" aria-describedby="button-addon1" id="newPassword" name="newPassword" disabled required />
                                    <button class="btn btn-primary" type="button" id="newPasswordbtn"><i class="bi bi-eye-slash" id="newPasswordIcon"></i></button>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Confirm new password" aria-label="Example text with button addon" aria-describedby="button-addon1" id="confirmNewPassword" name="confirmNewPassword" disabled required />
                                    <button class="btn btn-primary" type="button" id="confirmNewPasswordbtn"><i class="bi bi-eye-slash" id="confirmNewPasswordIcon"></i></button>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" id="update_password" name="update_password" disabled>Save</button>
                                </div>
                            </form>


                        </div>



                        <div class="tab-pane" id="newAdmin" role="tabpanel">
                            <form action="code.php" method="POST">
                                <span id="Userdup"></span>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Username:</span>
                                    <input type="text" class="form-control" placeholder="Enter new admin username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUser" name="newUser" autocomplete="off" required>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Password:</span>
                                    <input type="password" class="form-control" placeholder="Enter password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUserPassword" name="newUserPassword" required>
                                    <button class="btn btn-primary" type="button" id="newUserPasswordbtn"><i class="bi bi-eye-slash" id="newUserPassIcon"></i></button>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Confirm Password:</span>
                                    <input type="password" class="form-control" placeholder="Retype password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUserPasswordConfirm" name="newUserPasswordConfirm" required>
                                    <button class="btn btn-primary" type="button" id="newUserPasswordConfirmbtn"><i class="bi bi-eye-slash" id="newUserPassConfirmIcon"></i></button>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-key-fill" style="margin-right: 10px;"></i>Master Key Code:</span>
                                    <input type="password" class="form-control" placeholder="Enter master key code" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="masterkeyInput" name="masterkeyInput" required>
                                    <button class="btn btn-primary" type="button" id="masterkeyInputbtn"><i class="bi bi-eye-slash" id="masterkeyIcon"></i></button>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary" name="createAdminbtn" id="createAdminbtn" disabled>Add Admin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tabs on plain Card -->
        </div>
    </div>
</body>

<script>
    const oldPasswordbtn = document.querySelector('#oldPasswordbtn');
    const oldPasswordtxt = document.querySelector('#oldPassword');
    const oldIcon = document.querySelector('#oldPasswordIcon');
    const newPasswordbtn = document.querySelector('#newPasswordbtn');
    const newPassword = document.querySelector('#newPassword');
    const newIcon = document.querySelector('#newPasswordIcon');
    const confirmNewPasswordbtn = document.querySelector('#confirmNewPasswordbtn');
    const confirmNewPassword = document.querySelector('#confirmNewPassword');
    const confirmNewIcon = document.querySelector('#confirmNewPasswordIcon');
    const updatebtn = document.querySelector('#update_password');
    const newUserPasswordbtn = document.querySelector('#newUserPasswordbtn');
    const newUserPasswordtxt = document.querySelector('#newUserPassword');
    const newUserPasswordConfirmbtn = document.querySelector('#newUserPasswordConfirmbtn');
    const newUserPasswordConfirmtxt = document.querySelector('#newUserPasswordConfirm');
    const masterkeyInputtxt = document.querySelector('#masterkeyInput');
    const masterkeyInputbtn = document.querySelector('#masterkeyInputbtn');



    oldPasswordbtn.addEventListener('click', function(e) {
        // toggle the type attribute
        const types = oldPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        oldPassword.setAttribute('type', types);
        // toggle the eye slash icon
        oldIcon.classList.toggle('bi-eye');
    });

    newPasswordbtn.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        newPassword.setAttribute('type', type);
        // toggle the eye slash icon
        newIcon.classList.toggle('bi-eye');
    });
    confirmNewPasswordbtn.addEventListener('click', function(e) {
        // toggle the type attribute
        const typer = confirmNewPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmNewPassword.setAttribute('type', typer);
        // toggle the eye slash icon
        confirmNewIcon.classList.toggle('bi-eye');
    });
    newUserPasswordbtn.addEventListener('click', function(e) {
        // toggle the type attribute
        const typer = newUserPasswordtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        newUserPasswordtxt.setAttribute('type', typer);
        // toggle the eye slash icon
        newUserPassIcon.classList.toggle('bi-eye');
    });
    newUserPasswordConfirmbtn.addEventListener('click', function(e) {
        // toggle the type attribute
        const typer = newUserPasswordConfirmtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        newUserPasswordConfirmtxt.setAttribute('type', typer);
        // toggle the eye slash icon
        newUserPassConfirmIcon.classList.toggle('bi-eye');
    });
    masterkeyInputbtn.addEventListener('click', function(e) {
        // toggle the type attribute
        const typer = masterkeyInputtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        masterkeyInputtxt.setAttribute('type', typer);
        // toggle the eye slash icon
        masterkeyIcon.classList.toggle('bi-eye');
    });


    $(document).ready(function() {

        //Change password jquery/ajax
        $('#oldPassword').keyup(function() {

            function timer() {
                var user = $('#adminUser').attr('placeholder');
                var oldPass = $('#oldPassword').val().trim();
                var countPass;

                $.ajax({

                    url: "code.php",
                    method: "POST",
                    data: {
                        user: user,
                        oldPass: oldPass
                    },
                    success: function(data) {
                        if (data == 'false') {

                            countPass = 1;
                            $('#messagepasstxt').text('Username and password does not match.').css("color", "red");


                        } else if (oldPass == '') {

                            countPass = 1;
                            $('#messagepasstxt').text('');

                        } else if (data == 'true') {

                            countPass = 0;
                            $('#messagepasstxt').text('Username and password are matched .').css("color", "green");


                        } else {

                            $('#messagepasstxt').text('');

                        }

                        //Change password (Enable/Disable password input)
                        if (countPass == 1) {

                            $('#newPassword').attr("disabled", true);
                            $('#confirmNewPassword').attr("disabled", true);

                        } else if (countPass == 0) {

                            $('#newPassword').attr("disabled", false);
                            $('#confirmNewPassword').attr("disabled", false);

                        } else {

                            $('#newPassword').attr("disabled", true);
                            $('#confirmNewPassword').attr("disabled", true);

                        }
                    }

                });
            }

            setTimeout(timer, 1000);
        });

        //Change password (Checking new password validatity)
        $('#newPassword, #confirmNewPassword').keyup(function() {

            var newPass = $('#newPassword').val();
            var conPass = $('#confirmNewPassword').val();
            var countNew;

            if (newPass != '') {

                if (!newPass.match(/(?=.*?[a-z])/)) {

                    countNew = 1;
                    $('#messagetxt').text('Password must contain atleast one lowercase letter.').css("color", "red");

                } else if (!newPass.match(/(?=.*?[0-9])/)) {

                    countNew = 1;
                    $('#messagetxt').text('Password must contain atleast one number.').css("color", "red");

                } else if (!newPass.match(/(?=.*?[#?!@$%^&*-])/)) {

                    countNew = 1;
                    $('#messagetxt').text('Password must contain atleast one special characters').css("color", "red");


                } else if (newPass.length < 8) {

                    countNew = 1;
                    $('#messagetxt').text('Password must contain a minimum of 8 characters.').css("color", "red");

                } else if (newPass != conPass) {

                    countNew = 1;
                    $('#messagetxt').text('Password does not match.').css("color", "red");

                } else if (newPass == '') {

                    $('#messagetxt').text('');

                } else {

                    countNew = 0;
                    $('#messagetxt').text('Password match.').css("color", "green");

                }

                //Change password (Enable/Disable of save button)
                if (countNew == 1) {

                    $('#update_password').attr("disabled", true);

                } else if (countNew == 0) {

                    $('#update_password').attr("disabled", false);

                } else {

                    $('#update_password').attr("disabled", true);

                }



            }

        });

        //Add new admin (jquery/ajax)
        $('#newUser, #masterkeyInput').keyup(function() {


            function delay() {
                var newUser = $('#newUser').val().trim();
                var masterKey = $('#masterkeyInput').val().trim();
                var userCount, keyCount;

                $.ajax({

                    url: "code.php",
                    method: "POST",
                    data: {
                        newUser: newUser
                    },
                    success: function(data) {

                        if (data == "false") {

                            userCount = 1
                            $('#Userdup').text("Username already exists.").css("color", "red");

                        } else if (data == "true") {

                            userCount = 0;
                            $('#Userdup').text("");

                        } else {

                            $('#Userdup').text("");

                        }

                        $.ajax({

                            url: "code.php",
                            method: "POST",
                            data: {
                                masterKey: masterKey
                            },
                            success: function(data) {

                                if (data == 'true') {

                                    keyCount = 0;
                                    $('#Userdup').text('');


                                } else if (data == 'false') {

                                    keyCount = 1;
                                    $('#Userdup').text('Master key is incorrect.').css('color', 'red');

                                }


                                if (userCount == 1) {

                                    $('#createAdminbtn').attr('disabled', true);

                                } else if (keyCount == 1) {

                                    $('#createAdminbtn').attr('disabled', true);

                                } else if (userCount == 0 && keyCount == 0) {

                                    $('#createAdminbtn').attr('disabled', false);

                                } else {

                                    $('#createAdminbtn').attr('disabled', true);

                                }


                            }

                        });

                    }

                });

            }

            setTimeout(delay, 1000);
        });

        //Add new admin (Password validity)
        $('#newUserPassword, #newUserPasswordConfirm').keyup(function() {

            var newUserPass = $('#newUserPassword').val().trim();
            var newUserPassCon = $('#newUserPasswordConfirm').val().trim();
            var countNewUser;

            if (newUserPass != '') {

                if (!newUserPass.match(/(?=.*?[a-z])/)) {

                    countNewUser = 1;
                    $('#Userdup').text('Password must contain atleast one lowercase letter.').css("color", "red");

                } else if (!newUserPass.match(/(?=.*?[0-9])/)) {

                    countNewUser = 1;
                    $('#Userdup').text('Password must contain atleast one number.').css("color", "red");

                } else if (!newUserPass.match(/(?=.*?[#?!@$%^&*-])/)) {

                    countNewUser = 1;
                    $('#Userdup').text('Password must contain atleast one special characters').css("color", "red");


                } else if (newUserPass.length < 8) {

                    countNewUser = 1;
                    $('#Userdup').text('Password must contain a minimum of 8 characters.').css("color", "red");

                } else if (newUserPassCon != newUserPass) {

                    countNewUser = 1;
                    $('#Userdup').text('Password does not match.').css("color", "red");

                } else if (newUserPassCon == newUserPass) {

                    countNewUser = 0;
                    $('#Userdup').text('Password match.').css("color", "green");

                } else {

                    $('#Userdup').text('');

                }

                //Add new admin (Enable/Disable)
                if (countNewUser == 1) {

                    $('#update_password').attr("disabled", true);

                } else if (countNewUser == 0) {

                    $('#update_password').attr("disabled", false);

                } else {

                    $('#update_password').attr("disabled", false);

                }



            }

        });
    });
</script>


</html>