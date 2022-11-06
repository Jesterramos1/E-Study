<?php
	$db = new mysqli("localhost","root","");
	if($db->connect_errno > 0){
	     die('Unable to connect to database [' . $db->connect_error . ']');  } //this line and above lines connect to the server
 
	 $db->query("CREATE DATABASE IF NOT EXISTS `estudy_db` ");  // this line checks if the database has been created if not it create a database
 
	         mysqli_select_db($db,"estudy_db"); //this line select the created database
 			
 			//Creation Table for Scheduling
	          $stable="CREATE TABLE IF NOT EXISTS booked_schedule (id int(11) NOT NULL auto_increment, 
	         	  date_filed varchar(20) NOT NULL,
	         	  studNum varchar(15)NOT NULL, fName varchar(50)NOT NULL, lName varchar(50)NOT NULL,
	              studCourse varchar(50)NOT NULL, studEmail varchar(50)NOT NULL,
	              studContact varchar(50)NOT NULL, location varchar(50)NOT NULL,
	              studSched varchar(50)NOT NULL, studTime varchar(50)NOT NULL, 

	             PRIMARY KEY(id) )";
	             $db->query($stable);   //the above lines create table and its columns if not available in the server

            mysqli_select_db($db,"estudy_db");

	        //Creation Table for Admin
 			$admin="CREATE TABLE IF NOT EXISTS rtu_admin (admin_id int(11) NOT NULL auto_increment, 
	         	  admin_user varchar(50)NOT NULL,
	              admin_pass varchar(50)NOT NULL, 

	             PRIMARY KEY(admin_id) )";

	             $db->query($admin);   //the above lines create table and its columns if not available in the server

            //Creation Table for Storage
	         $storing ="CREATE TABLE IF NOT EXISTS storage (id int(11) NOT NULL auto_increment, 
	         	  title varchar(255) NOT NULL,thesis_code varchar(255) NOT NULL,
	         	  department varchar(255)NOT NULL, date_publish int(4)NOT NULL,
	              researchers varchar(255)NOT NULL, location varchar(255)NOT NULL,
	              res_file varchar(255)NOT NULL, 

	             PRIMARY KEY(id) )";
	             $db->query($storing);   //the above lines create table and its columns if not available in the server
			
			 //Creation Table for Master Key
	         $masterkey ="CREATE TABLE IF NOT EXISTS masterkey (id int(11) NOT NULL, 
	         	  masterkeys varchar(255) NOT NULL,
	             PRIMARY KEY(id))";
	             $db->query($masterkey);   //the above lines create table and its columns if not available in the server
				 
 	// Create connection
	$conn = mysqli_connect("localhost","root","","estudy_db");
	// Check connection
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "INSERT IGNORE INTO `rtu_admin`(`admin_id`, `admin_user`, `admin_pass`) VALUES ('1','rtu_admin','admin123')";

	if (mysqli_query($conn, $sql)) {
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sqlmaster = "INSERT IGNORE INTO `masterkey`(`masterkeys`) VALUES ('MPJRL79388')";

	if (mysqli_query($conn, $sqlmaster)) {
	} else {
	echo "Error: " . $sqlmaster . "<br>" . mysqli_error($conn);
	}


	$loggedInUser = "";


?>