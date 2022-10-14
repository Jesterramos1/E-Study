<?php
include "dbcon.php";
 
$resid = $_POST['resid'];
 
$sql = "SELECT * FROM storage WHERE id=".$resid;
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
?>

<div class="row">
    <div class="col-md-7 col-sm-12" >
        <div class="containers">
          <iframe
          style="border:2px dotted black;" 
          class="responsive-iframe" src="uploads/<?php echo $row['res_file']?>#toolbar=0">
        </iframe>
        </div>  
    </div>
    <div class="col-md-5 col-sm-12" >
        <label ></label>



        <table border='0' width='100%'>
        <tr>
            <td>
            <p>Title : <?php echo $row['title']; ?></p>
            <p>Department : <?php echo $row['department']; ?></p>
            <p>Date Publish : <?php echo $row['date_publish']; ?></p>
            <p>Researchers : <?php echo $row['researchers']; ?></p>
            <p>Location : <?php echo $row['location']; ?></p>
            </td>
        </tr>
        </table>
        <div class="modal-footer">
            <a class="btn btn-primary" href="scheduling.php" role="button">Book Visit</a>
        </div>
    </div>
    
 
<?php } ?>