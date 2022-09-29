<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Settings</title>

  <!--Bootstrap Link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <!--Icon Bootstrap Link-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


  <style type="text/css">
    .card{
      width: 50%;
      margin-right: auto;
      margin-left: auto;
    }
    .card-header{
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
    .btn{
      background-color: #1C5090;
    }
    .accordion-button{
      font-weight: bold;
      color: #1C5090;
    }
    



  </style>
</head>
<body>
    <div class="card">
      <div class="card-header">Admin Account Settings</div>
      <div class="card-body">
        
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
                  
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="username">Username:</span>
                    <input type="text" class="form-control" placeholder="CBET_Admin" aria-label="Username" aria-describedby="basic-addon1" disabled>
                  </div>

                  <label for="pass" class="form-label">Password:</label>

                  <div class="input-group mb-3">
                    <button class="btn btn-primary" type="button" id="button-addon1"><i class="bi bi-eye-fill" color></i></button>
                    <input type="text" class="form-control" placeholder="Enter your old password" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  </div>

                  <div class="input-group mb-3">
                    <button class="btn btn-primary" type="button" id="button-addon1"><i class="bi bi-eye-fill" color></i></button>
                    <input type="text" class="form-control" placeholder="Enter your new password" aria-label="newPass" aria-describedby="basic-addon1">
                  </div>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="button">Save</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                  <i class="bi bi-person-plus-fill" style="margin-right: 10px;"></i> Add New Admin
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Username:</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Password:</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-key-fill" style="margin-right: 10px;"></i>Master Key Code:</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>

                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="button">Add Admin</button>
                  </div>

                </div>
              </div>
            </div>
          
          </div>

      </div>
    </div>
 
</div>
</body>
</html>