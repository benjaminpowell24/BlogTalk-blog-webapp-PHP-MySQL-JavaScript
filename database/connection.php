<?php  
	$servername = "local.blogtalk.com";
	$server_user = "root";    	
	$server_pass = "";
	$dbname = "blogtalk";
    $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);

    if($conn -> connect_error){
        die('database connection error: '. $conn->connect_error);
    }