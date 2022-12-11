<?php
    session_start();
	session_destroy();
	header("location: ../-ad-access.php");
?>