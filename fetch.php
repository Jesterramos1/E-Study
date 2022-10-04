<?php 

$con = mysqli_connect("localhost", "root", "", "estudy_db");

$input = $_POST['search'];
$output = '';
$sql = "SELECT * FROM storage WHERE title LIKE '%{$input}%' OR department LIKE '%{$input}%' OR date_publish LIKE '%{$input}%' OR 
researchers LIKE '%{$input}%' OR  res_file LIKE '%{$input}%'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0)

{
   echo '<h3 align="center">Search Result</h3>';
    $output .='<div class="table-responsive">
                    <table class="table table bordered">
                
                        <tr>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Date publish</th>
                            <th>Researchers</th>
                            <th>Location</th>
                            <th>PDF FILE</th>
                            </tr>';

    while($row = mysqli_fetch_assoc($result)){

        $output .='<tr>
                        <td>'.$row["title"].'</td>
                        <td>'.$row["department"].'</td>
                        <td>'.$row["date_publish"].'</td>
                        <td>'.$row["researchers"].'</td>
                        <td>'.$row["location"].'</td>
                        <td>'.$row["res_file"].'</td>
                    </tr>';

    }
    
    echo $output;



}else{
    echo "<h5 class='text-danger text-center mt-3'>Data not found</h5>";
}
?>