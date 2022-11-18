<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title></title>
   
    <style>
        .card{
            margin-top: 20px;
            color: white;
        }
        h3 {
            margin-top: 5px;
            text-align: center;
           
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

        .card-header {
            background-color: #194f90;
            color: white;
            font-size: large;
            text-align: center;
        }

        li {
            font-size: medium;
            text-align: left;
        }
        .modal-header {
            background-color: #194f90;
            color: white;
        }

              
       

    </style>
</head>
<body>
<?php 

include "dbcon.php";
$input = $_GET['search'];
$output = '';
$sql = "SELECT * FROM storage WHERE title LIKE '%{$input}%' OR department LIKE '%{$input}%' OR date_publish LIKE '%{$input}%' OR 
researchers LIKE '%{$input}%' OR  res_file LIKE '%{$input}%' LIMIT 9";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0)

    {   
    
    echo "<h3 align='center' style='margin-top: 3%;'>Search Result</h3>";
    $output .='<table class="table table-bordered table-striped" style="margin-top: 3%;">                       
    <thead>
        <tr style="text-align:center;">
            <th style="width: 40%" id="theader">Research Title</th>
            <th style="width: 5%" id="theader">Department</th>
            <th style="width: 10%" id="hidetable">Year of Publication</th>
            <th style="width: 10%" id="theader">Action</th>
        </tr>';

    while($row = mysqli_fetch_assoc($result)){

    $output .='<tr style="text-align:center;">
    <td id="tdata"> '.$row["title"].'</td>
    <td id="tdata">'.$row["department"].'</td>
    <td id="hidetable">'.$row["date_publish"].'</td>
    <td id="tdata">
    <button type="button" data-id = '.$row["id"].' class="studyinfo btn btn-outline-success" id="viewbtn" data-bs-toggle="modal" data-bs-target="empModal">View</button>
    </td>
    </tr>';


}

echo $output;
  
   



}else{
    echo "<h5 class='text-danger text-center mt-3'>Data not found</h5>";
   
}
?>

<script type='text/javascript'>
        $(document).ready(function(){
            $('.studyinfo').click(function(){
                var resid = $(this).data('id');
                $.ajax({
                    url: 'Pdfviewer.php',
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

     <div class="modal fade" id="empModal" tabindex="-1" aria-labelledby="empModal" aria-hidden="true">
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

</body>
</html>


