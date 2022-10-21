
<?php  
include "dbcon.php";
echo "WORKING";
if(isset($_POST['file'])){

   $filename = $_POST['file'];
   $fileCheck = "SELECT res_file FROM storage WHERE res_file LIKE '{$filename}'";
   $result = mysqli_query($con, $fileCheck);
   $fileCount = mysqli_num_rows($result);
   echo $fileCount;

   if($fileCount > 0){
       echo "<span class='h6 text-danger text-center mt-3'>Name already exists.</span>";

   }else{
       echo "<span class='h6 text-success text-center mt-3'>Name is available.</span>";
   }

   

}
?>