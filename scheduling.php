<?php
session_start();
?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--BOOTSTRAP LINK-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</script>

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<!--JQUERY AND CSS OF CALENDAR-->
<link rel="stylesheet" href="calendar.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!--JQUERY DATE PICKER-->
<script>
  $(document).ready(function() {
    $('#Calendar').datepicker({
      beforeShowDay: $.datepicker.noWeekends,
      minDate: 0
    });

    $('#fname, #lname, #studNum, #email, #contact, #yes, #no').on("keyup change",function() {

      var fname = $('#fname').val().trim();
      var lname = $('#lname').val().trim();
      var studNum = $('#studNum').val().trim();
      var email = $('#email').val().trim();
      var contact = $('#contact').val().trim();
      var counterName, counterNum, counteremail, counterContact;




      $.ajax({
        url: "Check.php",
        method: "POST",
        data: {
          fname: fname,
          lname: lname
        },
        success: function(data) {
          if (data == 'true') {

            counterName = 0;
            $('#nameError').text("Name is valid").css("color", "green");


          } else if (data == 'numdet') {

            counterName = 1;
            $('#nameError').text("name must contain only letters EX. Juan Dela Cruz").css("color", "red").append(counter);


          } else if (data == 'false') {

            counterName = 1;
            $('#nameError').text("Name already exists.").css("color", "red");


          } else {

            $('#nameError').text('');


          }



          $.ajax({
            url: "Check.php",
            method: "POST",
            data: {
              studNum: studNum
            },
            success: function(data) {

              if (data == 'false') {

                counterNum = 1;
                $('#studNumError').text('student number already exists.').css('color', 'red');


              } else if (data == 'notValid') {

                counterNum = 1;
                $('#studNumError').text('Please enter a valid student number EX: 2019-123456.').css('color', 'red').append(counter);


              } else if (data == 'true') {

                counterNum = 0;
                $('#studNumError').text('Student number is valid.').css('color', 'green');


              } else if ($('#yes').is(':checked')) {
                
                counterNum = 1;
                $('#studNum').attr("disabled", false);
                $('#studNum').attr("required", true);
                

              } else if ($('#no').is(':checked')) {
               
                counterNum = 0;
                $('#studNum').attr("disabled", true);
                $('#studNum').attr("required", false);
                
                

              } else {

                $('#studNumError').text('');

              }


              $.ajax({
                url: "Check.php",
                method: "POST",
                data: {
                  email: email
                },
                success: function(data) {
                  if (data == 'true') {

                    counteremail = 0;
                    $('#studEmailError').text('Email is valid.').css('color', 'green');

                  } else if (data == 'notValid') {

                    counteremail = 1;
                    $('#studEmailError').text('Please enter a valid email EX:delacruzjuan123@gmail.com.').css('color', 'red');


                  } else if (data == 'false') {

                    counteremail = 1;
                    $('#studEmailError').text('Email already exist.').css('color', 'red');


                  } else {

                    $('#studEmailError').text('');

                  }


                  $.ajax({
                    url: "Check.php",
                    method: "POST",
                    data: {
                      contact: contact
                    },
                    success: function(data) {
                      if (data == 'notValid') {

                        counterContact = 1;
                        $('#phonenumError').text("Phone number must only contain numbers EX:09234567899").css('color', 'red');

                      } else if (data == 'valid') {

                        counterContact = 0;
                        $('#phonenumError').text('');


                      } else {

                        $('#phonenumError').text('');

                      }



                      if (counterName == 0 && counterNum == 0 && counteremail == 0 && counterContact == 0) {

                        $('#schedSubmit').removeAttr('disabled');

                      } else {

                        $('#schedSubmit').attr('disabled', true);

                      }




                    }
                  });
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
<style>
  body {
    overflow-x: hidden;
    font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
  }

  .card-text {
    font-size: 12px;
    font-weight: bold;
    color: #1C5090;
  }

  .card-header {
    font-family: Helvetica, sans-serif;
    font-weight: bold;
    background: #1C5090;
    color: white;
  }

  #forms {
    margin-top: 1%;
  }

  @media only screen and (max-width: 1100px) {
    #safety {
      display: none;
    }
  }
</style>
</head>

<body>
  <!--HEADER-->
  <?php require 'header.php'; ?>

  <!--Safety Reminder Form-->
  <div class="row">
    <div class="col-lg-5 col-sm-12" id="forms">
      <div class="row">
        <div class="col-12">
          <div class="card text-center">
            <h5 class="card-header">LIBRARY HOUSE RULES</h5>
            <div class="card-body">
              <div class="row">
                <div style="position: relative; width: 100%; height: 0; padding-top: 44.0000%;
 padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
                  <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;" src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFP1Zc0PBQ&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
                  </iframe>
                </div>
                <a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFP1Zc0PBQ&#x2F;view?utm_content=DAFP1Zc0PBQ&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link" target="_blank" rel="noopener"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12" id="safety">
          <div class="card text-center">
            <h5 class="card-header">SAFETY REMINDERS</h5>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <img src="images/disinfect.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">The library is sanitized regularly.</p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card">
                    <img src="images/vaccine.jpg" style="border-style:solid; border-color:#c7c0f3;" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">All employees are fully vaccinated.</p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card">
                    <img src="images/sanitation.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Sanitation stations are available upon entry.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="card">
                    <img src="images/mask.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Wear a mask at all times.</p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card">
                    <img src="images/shoerug.jpg" style="border-style:solid; border-color:#5bacee;" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Wear a shoe rug inside the premises.</p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card">
                    <img src="images/distance.jfif" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Practice physical distancing.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Visitation-->
    <div class="col-lg-7 col-sm-12" id="forms">
      <div class="card">
        <h5 class="card-header" style="text-align:center;">BOOK VISITATION</h5>
        <div class="card-body">
          <form action="insert.php" method="POST" name="info">

            <!--INPUT FOR USER INFORMATION-->
            <div class="mb-3">
              <div class="input-group">

                <span class="input-group-text" style="background:#1C5090; color:white; font-weight:bold;">Full Name:</span>
                <input type="text" aria-label="First name" name="fname" class="form-control" placeholder="Juan" id="fname" autocomplete="off" required>
                <input type="text" aria-label="Last name" name="lname" class="form-control" placeholder="Dela Cruz" id="lname" autocomplete="off" required>

              </div>
              <span id="nameError" class='text-center mt-3'></span>
            </div>

            <div class="mb-3">
              <div class="card">
                <div class="card-header" style="background:#1C5090; color:white; font-weight:bold;">Are you an RTU Student?</div>
                <div class="card-body">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="yes" value="option1">
                    <label class="form-check-label" for="yes" style="font-weight:bold;">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="no" value="option2">
                    <label class="form-check-label" for="no" style="font-weight:bold;">No</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                <label for="studNum" class="form-label"><b>Student Number:</b></label>
                <input class="form-control" type="text" maxlength="11" name="studNum" id="studNum" placeholder="2019-123456" autocomplete="off" required>
                <span id="studNumError" class='text-center mt-3'></span>
              </div>
              <div class="col-md">
                <label for="course" class="form-label"><b>Course:</b></label>
                <input class="form-control" type="text" name="course" id="course" placeholder="BSIT/BSINFOTECH" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="barcode" class="form-label"><b>Thesis Barcode:</b></label>
              <input class="form-control" type="text" name="barcode" id="barcode" placeholder="<?php echo $_SESSION['selected-thesiscode']; ?>" disabled>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label"><b>Email:</b></label>
              <input class="form-control" type="email" name="email" id="email" placeholder="delacruzjuan123@gmail.com" autocomplete="off" required>
              <span id="studEmailError"></span>
            </div>

            <div class="mb-3">
              <label for="contact" class="form-label"><b>Contact Number:</b></label>
              <input class="form-control" type="int" name="contact" maxlength="11" id="contact" placeholder="09234567899" autocomplete="off" required>
              <span id="phonenumError"></span>
            </div>

            <span><b>Location:</b></span>
            <div class=" form-floating mb-3">
              <select class="form-select" name="library" id="library" required disabled>
                <option selected value="<?php echo $_SESSION['selected-location']; ?>"><?php echo $_SESSION['selected-location']; ?></option>
                <option value="cbet">CBET Library - SNAGAH Building / Second (2nd) Floor </option>
                <option value="cas">CAS Library - MAB Building / Second (2nd) Floor </option>
                <option value="ced">CED Library - SNAGAH Building / Second (2nd) Floor </option>
                <option value="ipe">IPE Library - MAB Building / Fifth (5th) Floor</option>
                <option value="gs">GS Library - RND Building / Third (3rd) Floor</option>
              </select>
              <label for="library">Select Library:</label>
            </div>

            <!--DATE SELECTION-->
            <div class="cal">
              <label for="date" class="form-label"><b>Select Date:</b></label>
              <input class="form-control" type="text" id="Calendar" name="calendar" placeholder="Choose Date" autocomplete="off" required>
            </div>

            <!--TIME SELECTION-->
            <br>
            <span><b>Preffered Time:</b></span>
            <div class="form-floating mb-3">
              <select class="form-select" name="time" id="time" required>
                <option selected value="8:00 AM">08:00 AM</option>
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
              <label for="time">Select Time:</label>
            </div>

            <br>

            <button name="submit" type="submit" class="btn btn-primary" style="width:100%; background:#1C5090; text-transform:uppercase; font-size:16px; font-weight:bold;" id="schedSubmit" disabled>book Appointment</button>


        </div>

        <div class="card-footer text-muted">
          <div class="alert alert-primary d-flex align-items-center" role="alert">
            <i class="bi bi-info-square-fill" style="margin-right:1%;"></i>
            <div>
              Please be reminded that you can only book a visitation for at least one appointment at a time.
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>



  <?php
  //CONNECTION/CREATION OF TABLE
  require 'dbtable_creation.php';
  ?>


</body>

</html>