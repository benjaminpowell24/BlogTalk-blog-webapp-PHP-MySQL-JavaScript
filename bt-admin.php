<?php  
	require('database/db.php');
		
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Admin-Login</title>


  <link rel="icon" href="images/softcodes.png">
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">


  <link rel="stylesheet" href="css/page-loader.css" media="screen,projection">
<link rel="stylesheet" href="css/materialize/materialize.min.css">

  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="css/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  
</head>

<body class="cyan">
  
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>




  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form method="POST" action="bt-admin.php" class="login-form" id="form" autocomplete="off">
        <div class="row">
          <div class="input-field col s12 center">
            <p class="center login-form-text">Login</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="userid" id="userid" type="text">
            <label for="userid" class="center-align">ID</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
			<button type="submit" class="btn waves-effect waves-light col s12" name="login">Login</button>
          </div>
		  		<div class="row">
        </div>


      </form>
    </div>
  </div>


    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  
  <script type="text/javascript" src="js/materialize.min.js"></script>
 
  <script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>

</body>
</html>