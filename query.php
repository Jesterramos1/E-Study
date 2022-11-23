<?php
// connecting to database
$conn = mysqli_connect("localhost", "girzqhip_variableSet", "2iT7)iLbZaBl", "girzqhip_Estudy") or die("Database Error");

// getting user message through ajax
if (!empty($_POST['text'])) {

    $getMesg = mysqli_real_escape_string($conn, $_POST['text']);

    //checking user query to database query
    $check_data = "SELECT * FROM chatbot WHERE messages LIKE '%$getMesg%'";
    $run_query = mysqli_query($conn, $check_data) or die("Error");

    // if user query matched to database query we'll show the reply otherwise it go to else statement
    if (mysqli_num_rows($run_query) == 1) {
        //fetching replay from the database according to the user query
        $fetch_data = mysqli_fetch_assoc($run_query);
        //storing replay to a varible which we'll send to ajax
        $replay = $fetch_data['response'];
        echo $replay;
    } elseif (mysqli_num_rows($run_query) > 1) {
        echo "Sorry can't be able to understand you!";
    } else {

        echo "Sorry can't be able to understand you!";
    }
    if(str_contains($getMesg, 'Appointment')){

        echo " Or <a href='scheduling.php'>Click ME!</a>";

    }
}


if(isset($_GET['term'])){

    $searchTerm = $_GET['term']; 
 
// Fetch matched data from the database 
$query = $conn->query("SELECT * FROM chatbot WHERE messages LIKE '%".$searchTerm."%'"); 
 
// Generate array with skills data 
$question = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['value'] = $row['messages']; 
        array_push($question, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($question);

}



?>
