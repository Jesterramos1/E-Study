<?php

$con = mysqli_connect("localhost","root","","estudy_db");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}
$limit = 10;
