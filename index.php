 <?php
	// database connectivity
 include 'db.php';
	$msg = "";
	session_start();
	if(isset($_POST['login']) && !empty($_POST['un']) && !empty($_POST['ps'])  )
	{
		$username = $_POST['un'];
		$password = $_POST['ps'];

		$sql = "select * from users where username = '".$username."'and password = '".$password."' limit 1";

		$result = mysql_query($sql);

		if(mysql_num_rows($result) == 1){

			$msg=" Login successful";
			
			$_SESSION['status']="Active";
			$_SESSION['username'] = $username;
			
			header("location:login.php");


		}
		else{

		$msg ="<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>×</button>
    <strong>Failed!</strong> Incorrect Username or Password.
  </div>";
	   echo $msg;
			
		}


	}
	
	

?> 

<html>
<head>
	<title>login </title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body >

	
	  <div class="container logo">
	    <p>ABC restaurant</p>
	    <h2> &nbsp;&nbsp;Quality matters..</h2>
	  </div>
	


	
	<div class="card center-block login" >

		<div class="card-body">

			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
			  <div class="form-group">
			    <label for="email">Username :</label>
			    <input type="text" class="form-control" id="email" name="un" size="20">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" id="pwd" name="ps" size="20">
			  </div>
			  <div class="form-group form-check">
			    <label class="form-check-label">
			      <input class="form-check-input" type="checkbox" > Remember me
			    </label>
			  </div>
			  <button type="submit" class="btn btn-primary" name="login">Submit</button>
			  <button type="reset" class="btn btn-danger">Reset</button>
			</form> 



	</div>
	</div>



</body>
</html>