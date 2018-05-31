 <?php
session_start();

if($_SESSION['status']!="Active")
{
    header("location:index.php");
}
$username = $_SESSION['username'];

$paymsg="";


if(isset($_POST['pay']) && $_POST['qty'] > 0){
	// add to database 
	include 'db.php';
	$itm = $_POST['item'];
	$amt= (int)$_POST['amt'];
	$qty = (int)$_POST['qty'];
	$sql = "insert into transaction values('".$username."','".$itm."',".$qty.",".$amt.")";

	$result = mysql_query($sql);
	if($result){

		$msg ="<div class='alert alert-success alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>×</button>
    <strong>Sucess!</strong> Order added sucessfully.
  </div>";
	   echo $msg;
		
	}

	else{

		$msg ="<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>×</button>
    <strong>Failed!</strong> Order failed try again.
  </div>";
	   echo $msg;
		

	}
	
}

?>
<html>
<head>
	<title>order</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
</head>
<script>


	function calc(){

		var itm = paymentForm.item.value;
		var qty = paymentForm.qty.value;

		switch (itm)
		{
			case 'tea':document.getElementById("amt").value = 10*qty;
						break;
			case 'coffee':document.getElementById("amt").value = 20*qty;
						break;
			case 'samosa':document.getElementById("amt").value = 30*qty;
						break;
			case 'cake':document.getElementById("amt").value = 40*qty;
						break;
			case 'pizza':document.getElementById("amt").value = 50*qty;
						break;
			case 'burger':document.getElementById("amt").value = 60*qty;
						break;
		} 

		console.log(qty);
		console.log(itm);


	}
</script>
<body>
	
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="login.php">ABC Restaurant</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link active" href="order.php" >Order </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="report.php">Report</a>
    </li>
   
  </ul>
  <ul class="nav navbar-nav ml-auto">
		 <li class="navbar-item ">
      <b class="nav-link"><?php echo $username; ?></b>
    </li>
     <li class="navbar-item ">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
   
  </ul>
</nav> 


		<div class="card" style="margin-top: 10%; margin-left: 20%;margin-right: 20%;">

			<div class="card-body">

		 <form action="<?php $_SERVER['PHP_SELF']?>" name="paymentForm" method="post">
		  
		 		 <div class="form-group">
					  <label for="sel1">Items :</label>
					  <select class="form-control" id="sel1" name="item" onchange="calc()">
					   <option value="tea">tea</option>
						<option value="coffee">coffee</option>
						<option value="samosa">Samosa</option>
						<option value="cake">Cake</option>
						<option value="pizza">Pizza</option>
						<option value="burger">Burger</option>
					  </select>
					</div> 


			<div class="form-group">
			  <label for="qty">Quantity :</label>
			  <input class="form-control" id="qty" type="number" name="qty"  onchange="calc()" min="1">
			</div>


			<div class="form-group" >
			  <label for="totamt">Total amount :</label>
			  <input  class="form-control"  id="amt" type="text" name="amt" readonly>
			</div>

			<button type="submit" class="btn btn-primary" name="pay">Pay</button>
		</form> 
			</div>

		</div>









	<!-- <div>
		<form method="post" action="<?php $_SERVER['PHP_SELF']?>" name="paymentForm" >

			<select name="item" onchange="calc()">
				
				<option value="tea">tea</option>
				<option value="coffee">coffee</option>
				<option value="samosa">Samosa</option>
				<option value="cake">Cake</option>
				<option value="pizza">Pizza</option>
				<option value="burger">Burger</option>


			</select><br>

			quantity : <input type="number" name="qty"  onchange="calc()"><br>

			total amount :
			<input type="text" name="amt" id="amt" readonly>
			<button type="submit" name="pay" >pay</button><br>
			

		</form>

	</div> -->

</body>
</html>