<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Settings</title>

  <!--CSS and Javascript-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!--Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


  <style type="text/css">
    #settingcardheader{
      background-color: #1C5090;
      font-weight: bold;
      font-size: 20px;
      color: white;
      text-align: center;
      text-transform: uppercase;
    }
    .input-group-text{
      background-color: #1C5090;
      color: white;
      font-weight: bold;
    }
    label{
      font-weight: bold;
    }
    
    #createAdmin{
      background-color: #1C5090;
    }
    .accordion-button{
      font-weight: bold;
      color: #1C5090;
    }
    
    
  </style>
  
</head>
<body>
    <div class="card" id="settingcard">
      <div class="card-header" id="settingcardheader">Admin Account Settings</div>
      <div class="card-body">
      <label><?php $messageUpdatelbl?></label>
        
        <!--EDIT CURRENT ADMIN INFO -->
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                 <i class="bi bi-shield-lock-fill" style="margin-right: 10px;"></i>Change Password
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                  <?php
                  if($_SESSION['user'] == ""){
                    $_SESSION['user'] = "No user found";
                  }
                  ?>
                <form action ="code.php" method="POST">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="username">Username:</span>
                    <input type="text" class="form-control" placeholder="<?php echo $_SESSION['user'];?>" aria-label="Username" aria-describedby="basic-addon1" disabled >
                  </div>

                  <label for="pass" class="form-label">Password:</label>
                  <span id='messagepasstxt'></span>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Enter old password" aria-label="Example text with button addon" aria-describedby="button-addon1" id="oldPasswordtxt" name="oldPassword" required/>
                    <button class="btn btn-primary" type="button" id="oldPasswordbtn"><i class="bi bi-eye-slash" id = "oldPasswordIcon"></i></button>
                  </div>

                  <label for="pass" class="form-label">New Password:</label>
                  <span id='messagetxt'></span>                  
                  <div class="input-group mb-3">                    
                    <input type="password" class="form-control" placeholder="Enter new password" aria-label="Example text with button addon" aria-describedby="button-addon1" id="newPasswordtxt" name="newPassword" />
                    <button class="btn btn-primary" type="button" id="newPasswordbtn"><i class="bi bi-eye-slash" id = "newPasswordIcon"></i></button>
                  </div>
                  <div class="input-group mb-3">                    
                    <input type="password" class="form-control" placeholder="Confirm new password" aria-label="Example text with button addon" aria-describedby="button-addon1" id="confirmNewPasswordtxt" name="confirmNewPassword" />
                    <button class="btn btn-primary" type="button" id="confirmNewPasswordbtn"><i class="bi bi-eye-slash" id = "confirmNewPasswordIcon"></i></button>
                  </div>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" id ="update_password" name="update_password" disabled>Save</button>
                  </div>
                </form>
                </div>
              </div>
            </div>

            <!--ADD NEW ADMIN -->

            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                  <i class="bi bi-person-plus-fill" style="margin-right: 10px;"></i> Add New Admin
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                <form action ="code.php" method="POST">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Username:</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUser" name="newUser" required>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Password:</span>
                    <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUserPassword"  name="newUserPassword"required>
                    <button class="btn btn-primary" type="button" id="newUserPasswordbtn"><i class="bi bi-eye-slash" id = "newUserPassIcon"></i></button>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Confirm Password:</span>
                    <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newUserPasswordConfirm" name="newUserPasswordConfirm" required>
                    <button class="btn btn-primary" type="button" id="newUserPasswordConfirmbtn"><i class="bi bi-eye-slash" id = "newUserPassConfirmIcon"></i></button>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-key-fill" style="margin-right: 10px;"></i>Master Key Code:</span>
                    <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="masterkeyInput" name="masterkeyInput" required>
                    <button class="btn btn-primary" type="button" id="masterkeyInputbtn"><i class="bi bi-eye-slash" id = "masterkeyIcon"></i></button>
                  </div>

                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" name="createAdminbtn" id = "createAdminbtn">Add Admin</button>
                  </div>
                </form>  
                </div>
              </div>
            </div>
          
          </div>

      </div>
    </div>
</div>
  <script>
      const oldPasswordbtn = document.querySelector('#oldPasswordbtn');
      const oldPasswordtxt = document.querySelector('#oldPasswordtxt');
      const oldIcon = document.querySelector('#oldPasswordIcon');
      const newPasswordbtn = document.querySelector('#newPasswordbtn');
      const newPasswordtxt = document.querySelector('#newPasswordtxt');
      const newIcon = document.querySelector('#newPasswordIcon');
      const confirmNewPasswordbtn = document.querySelector('#confirmNewPasswordbtn');
      const confirmNewPasswordtxt = document.querySelector('#confirmNewPasswordtxt');
      const confirmNewIcon = document.querySelector('#confirmNewPasswordIcon');
      const updatebtn = document.querySelector('#update_password');
      const newUserPasswordbtn = document.querySelector('#newUserPasswordbtn');
      const newUserPasswordtxt = document.querySelector('#newUserPassword');
      const newUserPasswordConfirmbtn = document.querySelector('#newUserPasswordConfirmbtn');
      const newUserPasswordConfirmtxt = document.querySelector('#newUserPasswordConfirm');
      const masterkeyInputtxt = document.querySelector('#masterkeyInput');
      const masterkeyInputbtn = document.querySelector('#masterkeyInputbtn');

      

      oldPasswordbtn.addEventListener('click', function (e) {    
        // toggle the type attribute
        const types = oldPasswordtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        oldPasswordtxt.setAttribute('type', types);
        // toggle the eye slash icon
        oldIcon.classList.toggle('bi-eye');
      });

      newPasswordbtn.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = newPasswordtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        newPasswordtxt.setAttribute('type', type);
        // toggle the eye slash icon
        newIcon.classList.toggle('bi-eye');
      });
      confirmNewPasswordbtn.addEventListener('click', function (e) {
        // toggle the type attribute
        const typer = confirmNewPasswordtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmNewPasswordtxt.setAttribute('type', typer);
        // toggle the eye slash icon
        confirmNewIcon.classList.toggle('bi-eye');
      });
      newUserPasswordbtn.addEventListener('click', function (e) {
        // toggle the type attribute
        const typer = newUserPasswordtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        newUserPasswordtxt.setAttribute('type', typer);
        // toggle the eye slash icon
        newUserPassIcon.classList.toggle('bi-eye');
      });
      newUserPasswordConfirmbtn.addEventListener('click', function (e) {
        // toggle the type attribute
        const typer = newUserPasswordConfirmtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        newUserPasswordConfirmtxt.setAttribute('type', typer);
        // toggle the eye slash icon
        newUserPassConfirmIcon.classList.toggle('bi-eye');
      });
      masterkeyInputbtn.addEventListener('click', function (e) {
        // toggle the type attribute
        const typer = masterkeyInputtxt.getAttribute('type') === 'password' ? 'text' : 'password';
        masterkeyInputtxt.setAttribute('type', typer);
        // toggle the eye slash icon
        masterkeyIcon.classList.toggle('bi-eye');
      });
      

    
      $('#newPasswordtxt, #confirmNewPasswordtxt').on('keyup', function () {
        if($('#newPasswordtxt').val() == "" || $('#confirmNewPasswordtxt').val() == ""){
          $('#messagetxt').html('').css('color', '');
          $('#update_password').attr('disabled',true);

        }else if ($('#newPasswordtxt').val() == $('#confirmNewPasswordtxt').val()) {
          $('#messagetxt').html('Password Match').css('color', 'green');
          $('#update_password').attr('disabled',false);
          $('#newPasswordtxt').css('border-color', 'green');
          $('#confirmNewPasswordtxt').css('border-color', 'green');       
        }else{ 
          $('#messagetxt').html('Password Do Not Match').css('color', 'red');
          $('#update_password').attr('disabled',true); 
          $('#newPasswordtxt').css('border-color', 'red');
          $('#confirmNewPasswordtxt').css('border-color', 'red');
        }
      });
      $('#oldPasswordtxt').on('keyup', function () {
        if($('#oldPasswordtxt').val() == ""){
          $('#messagepasstxt').html('Do not leave blank').css('color', 'red');
        }else{
          $('#messagepasstxt').html('Valid').css('color', 'green');
        }
      });  

    </script>
</body>
</html>
<?php


?>