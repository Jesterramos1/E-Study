<!DOCTYPE html>
<html lang="en">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!--BOOTSTRAP LINK-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!--JQUERY AND CSS OF CALENDAR-->
<link rel="stylesheet" href="calendar.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>	

<!--JQUERY DATE PICKER-->
<script>
	$(document).ready(function(){
$('#Calendar').datepicker({
beforeShowDay: $.datepicker.noWeekends,
minDate: 0
});
  
    $('#fname, #lname, #studNum, #email').keyup(function(){
    
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var studNum = $('#studNum').val();
    var email = $('#email').val();
    $.ajax({
      url: "Check.php",
      method: "POST",
      data:{fname:fname, lname:lname},
      success: function(data){
        $('#nameError').html(data);

        
        $.ajax({
          url: "Check.php",
          method: "POST",
          data:{studNum:studNum},
          success: function(data){
            $('#studNumError').html(data);

            $.ajax({
              url: "Check.php",
              method: "POST",
              data:{email:email},
              success: function(data){
                $('#studEmailError').html(data);
              }
            });
          }
        });
      }
    });

  }); 
});
</script>

<title>Schedule</title>
</head>

<body>
<!--HEADER-->
<?php require 'header.php'; ?>

<!--Safety Reminder Form-->
<div class="card text-center" style="width: 45%; float: left; margin-left:4%; margin-top:1.5%;">
  <h5 class="card-header" style="font-family: Helvetica, sans-serif; font-weight: bold; background:#1C5090; color:white;">SAFETY REMINDERS</h5>
      <div class="card-body">
        
        <div class="row" style="margin-left:auto; margin-right:auto;">
          <div class="col-sm-4">
                  <div class="card" style="width: 12rem;">
                    <img src="images/disinfect.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">The library is sanitized regularly.</p>
                    </div>
                  </div>
          </div>

          <div class="col-sm-4">
                  <div class="card" style="width: 12rem;">
                    <img src="images/vaccine.jpg" style="border-style:solid; border-color:#c7c0f3;" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">All employees are fully vaccinated.</p>
                    </div>
                  </div>
          </div>

          <div class="col-sm-4">
                  <div class="card" style="width: 12rem;">
                    <img src="images/sanitation.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Sanitation stations are available upon entry.</p>
                    </div>
                  </div>
          </div>
        </div>


        <div class="row" style="margin-left:auto; margin-right:auto;">
          <div class="col-sm-4">
                  <div class="card" style="width: 12rem;">
                    <img src="images/mask.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Wear a mask at all times.</p>
                    </div>
                  </div>
          </div>

          <div class="col-sm-4">
                  <div class="card" style="width: 12rem;">
                    <img src="images/shoerug.jpg" style="border-style:solid; border-color:#5bacee;" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Wear a shoe rug inside the premises.</p>
                    </div>
                  </div>
          </div>

          <div class="col-sm-4">
                  <div class="card" style="width: 12rem;">
                    <img src="images/distance.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Practice physical distancing.</p>
                    </div>
                  </div>
          </div>
        </div>

      </div>
</div>

<!-- SCHEDULING FORM-->
<br><br>
<div class="card text-center" style="width: 45%; float: right; margin-right:4%;">
  <h5 class="card-header" style="font-family: Helvetica, sans-serif; font-weight: bold; background:#1C5090; color:white;">
    BOOK VISITATION
  </h5>
  <div class="card-body">
    <form action="insert.php" method="POST" name="info">

    <!--INPUT FOR USER INFORMATION-->
    <div class="mb-3">
    <div class="input-group">
    
    <span class="input-group-text" style="background:#1C5090; color:white;"><b>Full Name:</b></span>
    <input type="text" aria-label="First name" name="fname" class="form-control" placeholder="Juan" required>
    <input type="text" aria-label="Last name" name="lname" class="form-control" placeholder="Dela Cruz" required>

    </div>
    <span id="nameError"></span>
    </div>

    <div class="mb-3">
    <label for="studNum" class="form-label" style="float: left;"><b>Student Number:</b></label>
    <input class="form-control" type="text"  maxlength="11" name ="studNum" id="studNum" placeholder="2019-123456" required>
    <span id="studNumError"></span>
    </div>

    <div class="mb-3">
    <label for="course" class="form-label" style="float: left;"><b>Course:</b></label>
    <input class="form-control" type="text"  name="course" id="course" placeholder="BSIT/BSINFOTECH" required>
    </div>

    <div class="mb-3">
    <label for="email" class="form-label" style="float: left;"><b>Email:</b></label>
    <input class="form-control" type="email"  name="email" id="email" placeholder="delacruzjuan123@gmail.com" required>
    <span id="studEmailError"></span>
    </div>

    <div class="mb-3">
    <label for="contact" class="form-label" style="float: left;"><b>Contact Number:</b></label>
    <input class="form-control" type="int"  name="contact" maxlength="11" id="contact" placeholder="09234567899" required>
    </div>

    <div class="mb-3">
    <label for="contact" class="form-label" style="float: left;"><b>Location:</b></label>  
    <select class="form-select" name = "library" id="library" required>
    <option selected value="">Select Library</option>
    <option value="ceat">CEAT Library - Multi-purpose Building / Third (3rd) Floor</option>
    <option value="cbet">CBET Library - SNAGAH Building / Second (2nd) Floor </option>
    <option value="cas">CAS Library - MAB Building / Second (2nd) Floor </option>
    <option value="ced">CED Library - SNAGAH Building / Second (2nd) Floor </option>
    <option value="ipe">IPE Library - MAB Building / Fifth (5th) Floor</option>
    <option value="gs">GS Library - RND Building / Third (3rd) Floor</option>
    </select>
    </div>

    <!--DATE SELECTION-->
    <div class="cal">
    <label for="date" class="form-label" style="float: left;"><b>Select Date:</b></label> 
    <input class="form-control" type="text" id="Calendar" name="calendar" placeholder="Choose Date" required>
    </div>

    <!--TIME SELECTION-->
    <br>
    <div id="clock">
    <label for="time" class="form-label" style="float: left;"><b>Select Time:</b></label> 
    <select class="form-select" name="time" id="time" required>
    <option selected value="">Select Time</option>
    <option value="8:00 AM">08:00 AM</option>
    <option value="8:30 AM">08:30 AM</option>
    <option value="9:00 AM">09:00 AM</option>
    <option value="9:30 AM">09:30 AM</option>
    <option value="10:00 AM">10:00 AM</option>
    <option value="10:30 AM">10:30 AM</option>
    <option value="11:00 AM">11:00 AM</option>
    <option value="11:30 AM">11:30 AM</option>
    <option value="12:00 AM">12:00 PM</option>
    <option value="12:30 PM">12:30 PM</option>
    <option value="1:00 PM">01:00 PM</option>
    <option value="1:30 PM">01:30 PM</option>
    <option value="2:00 PM">02:00 PM</option>
    <option value="2:30 PM">02:30 PM</option>
    <option value="3:00 PM">03:00 PM</option>
    </select>
    </div>
      
    <br>

    <button name = "submit" type="submit" class="btn btn-primary" style="width:100%; background:#1C5090;">Book Appointment</button>


  </div>

  <div class="card-footer text-muted">
  </div>
</form>
</div>




<?php

  //CONNECTION/CREATION OF TABLE
  require 'dbtable_creation.php';
?>


</body>
</html>
