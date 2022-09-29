<?php
include "dbcon.php";
 
$resid = $_POST['resid'];
 
$sql = "SELECT * FROM storage WHERE id=".$resid;
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
?>

<div class="row">
    <div class="col">
        <div class="containers">
          <iframe class="responsive-iframe" src="uploads/<?php echo $row['res_file']?>"></iframe>
        </div>  
    </div>
    <div class="col">
        <table border='0' width='100%'>
        <tr>
            <td style="padding:20px;">
            <p>Title : <?php echo $row['title']; ?></p>
            <p>Department : <?php echo $row['department']; ?></p>
            <p>Date Publish : <?php echo $row['date_publish']; ?></p>
            <p>Researchers : <?php echo $row['researchers']; ?></p>
            <p>Location : <?php echo $row['location']; ?></p>
            </td>
        </tr>
        </table>
    </div>
    
 
<?php } ?>