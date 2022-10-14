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
          <iframe class="responsive-iframe" src="uploads/<?php echo $row['res_file']?>#toolbar=0"></iframe>
        </div>  
    </div>
    
<?php } ?>