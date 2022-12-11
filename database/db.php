<?php

    require('connection.php');

    if(isset($_POST['login'])){

		
		$userid = $_POST['userid'];
		$password = $_POST['password'];

		if (empty($userid) || (empty($password))) {
			header("Location: ../bt-admin.php?login=empty");
			exit();
		}
		else{
			$sql="SELECT * FROM employee WHERE edeleted=0 AND username=? AND admin=1;";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../bt-admin.php?login=wrongid");
				exit();
			}
			else{

			mysqli_stmt_bind_param($stmt, "s", $userid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
					if($password==false){
						echo "<script>alert('Wrong Password')</script>";
					}
					else if($password == true){
							$user_id = $row['id'];
							$name = $row['username'];
							$admin= $row['admin'];
							session_start();
							$_SESSION['admin_sid']=session_id();
							$_SESSION['user_id'] = $user_id;
							$_SESSION['admin'] = $admin;
							$_SESSION['name'] = $name;

							header("location: ../admin/blog/manage.php");
						}
					}
					
			}
			}

	}
	
	