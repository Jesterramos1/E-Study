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
            background: #194f90;
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


        
       

    </style>
</head>
<body>
<?php 

include "dbcon.php";
$input = $_POST['search'];
$output = '';
$sql = "SELECT * FROM storage WHERE title LIKE '%{$input}%' OR department LIKE '%{$input}%' OR date_publish LIKE '%{$input}%' OR 
researchers LIKE '%{$input}%' OR  res_file LIKE '%{$input}%' LIMIT 9";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0)

    {   
    
    echo "<h3 align='center'>Search Result<h3>";
    $output .='<table class="table table-bordered table-striped">                       
    <thead>
        <tr>
            <th style="width: 40%">Research Title</th>
            <th style="width: 10%">Department</th>
            <th style="width: 10%">Year of Publication</th>
            <th style="width: 20%">Researchers</th>
            <th style="width: 10%">Location</th>
            <th style="width: 10%">Action</th>
        </tr>';

    while($row = mysqli_fetch_assoc($result)){

    $output .='<tr>
    <td> '.$row["title"].'</td>
    <td>'.$row["department"].'</td>
    <td>'.$row["date_publish"].'</td>
    <td>'.$row["researchers"].'</td>
    <td>'.$row["location"].'</td>
    <td>
    <button data-id = '.$row["id"].' class="studyinfo btn btn-success">View</button>
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
     <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Research View</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="width:100%;">    
                </div>
            </div>
        </div>
    </div>

</body>
</html>


