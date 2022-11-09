<?php
/*$conn = mysqli_connect("localhost","root","","estudy_db");


if($conn)
{
    $user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);

    $query = "SELECT * FROM chatbot WHERE messages LIKE '%{$user_messages}%'";
    $makeQuery = mysqli_query($conn, $query);

    if(mysqli_num_rows($makeQuery) > 0) 
    {
        $result = mysqli_fetch_assoc($makeQuery);

        echo $result['response'];
    }else{
        echo "Sorry, I can't understand you.";
    }
}else {
    echo "Connection failed" . mysqli_connect_errno();
}*/

// connecting to database
$conn = mysqli_connect("localhost", "root", "", "estudy_db") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT * FROM chatbot WHERE messages LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['response'];
    echo $replay;
}else{
    echo "Sorry can't be able to understand you!";
}

?>
