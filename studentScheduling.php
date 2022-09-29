<!DOCTYPE HTML>
<html>  
<head>
	<!--BOOSTRAP LINK-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

<form action="insert.php" method="post">
  <div class="row mb-3">
    <label for="studNum" class="col-sm-2 col-form-label">Student Number:</label>
    <div class="col-sm-10">
      <input type="int" class="form-control" name = "studNum" id="studNum">
    </div>
  </div>
  <div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Full Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "fname" id="fname">
    </div>
    <div class="row mb-3">
    <label for="course" class="col-sm-2 col-form-label">Course:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "course" id="course">
    </div>
  </div>
  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name = "email" id="email">
    </div>
  </div>
  <div class="row mb-3">
    <label for="contact" class="col-sm-2 col-form-label">Contact Number:</label>
    <div class="col-sm-10">
      <input type="int" class="form-control" name = "contact" id="contact">
    </div>
  </div>

  <select class="form-select" name = "library" id="library" aria-label="Default select example">
  <option selected> Select Library</option>
  <option value="ceat">CEAT Library (Building)</option>
  <option value="cbet">CBET Library (Building)</option>
  <option value="cas">CAS Library (Building)</option>
  <option value="ced">CED Library (Building)</option>
  <option value="ipe">IPE Library (Building)</option>
  </select>
  
  <button name = "submit" type="submit" class="btn btn-primary">Book Appointment</button>

</form>


<!--PASSING OF DATA HERE-->
<?php
require 'dbtable_creation.php';
?>


</body>
</html>