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
    <div class="card">
        <div class="card-header">
            Details
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Title :<br><?php echo $row['title']; ?>
            </li>
            <li class="list-group-item">
                Department :<br><?php echo $row['department']; ?>
            </li>
            <li class="list-group-item">
                Date Published :<br><?php echo $row['date_publish']; ?>
            </li>
            <li class="list-group-item">
                Researchers :<br><?php echo $row['researchers']; ?>
            </li>
            <li class="list-group-item">
                Location :<br><?php echo $row['location']; ?>
            </li>
            
        </ul>
        <div class="card-footer">
            <div class="modal-footer">
                <a class="btn btn-primary" href="scheduling.php" role="button">Book Visit</a>
            </div>
        </div>
    </div>
    </div>
</div>    
    
 
<?php } ?>