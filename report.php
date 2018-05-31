<?php
session_start();
if($_SESSION['status']!="Active")
{
    header("location:index.php");
}
$username = $_SESSION['username'];

include 'db.php';
	
$item = array('tea','coffee','samosa','cake','pizza','burger');
$user = array('ram','sham','ghansham');
$ramStats =  array('tea' => 0 ,'coffee'=> 0,'samosa'=>0 ,'cake'=>0,'pizza'=>0,'burger'=>0);
$shamStats =  array('tea' => 0 ,'coffee'=> 0,'samosa'=>0 ,'cake'=>0,'pizza'=>0,'burger'=>0);
$ghanStats =  array('tea' => 0 ,'coffee'=> 0,'samosa'=>0 ,'cake'=>0,'pizza'=>0,'burger'=>0);
foreach ($user as $i) {

	foreach ($item as $j) {
		$sql = "select sum(quantity) from transaction where user='".$i."' and item = '".$j."'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)) {   
        foreach ($row as $col => $val) {
            //echo $j." = ".$val."<br>";

            if($i==$user[0]){

            	if($val>0){
            		$ramStats[$j]=$val;
            	}

            }
            elseif ($i==$user[1]) {
            	if($val>0){
            		$shamStats[$j]=$val;
            	}

            }
            else{
            	if($val>0){
            		$ghanStats[$j]=$val;
            	}


            }
        }
    }
	}
}

?>
<html>
<head>
	<title>Report</title>

	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>



	<script>

		var ramStats = [<?php echo '"'.implode('","', $ramStats).'"' ?>];
		var shamStats = [<?php echo '"'.implode('","', $shamStats).'"' ?>];
		var ghanStats = [<?php echo '"'.implode('","', $ghanStats).'"' ?>];

		window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	animationEnabled: true,
	theme: "light2", //"light1", "dark1", "dark2"
	title:{
		text: "Stacked Bar Report"             
	},
	axisY:{
		interval: 10,
		suffix: ""
	},
	toolTip:{
		shared: true
	},
	data:[{
		type: "stackedBar100",
		toolTipContent: "<b>{name}:</b> {y} (#percent%)",
		showInLegend: true, 
		name: "Ram",
		dataPoints: [
			{ y: ramStats[0]*10, label: "tea" },
			{ y: ramStats[1]*10, label: "coffee" },
			{ y: ramStats[2]*10, label: "samosa" },
			{ y: ramStats[3]*10, label: "cake" },
			{ y: ramStats[4]*10, label: "pizza" },
			{ y: ramStats[5]*10, label: "burger" }
			
		]
	},
	{
		type: "stackedBar100",
		toolTipContent: "<b>{name}:</b> {y} (#percent%)",
		showInLegend: true, 
		name: "Sham",
		dataPoints: [
			{ y: shamStats[0]*10, label: "tea" },
			{ y: shamStats[1]*10, label: "coffee" },
			{ y: shamStats[2]*10, label: "samosa" },
			{ y: shamStats[3]*10, label: "cake" },
			{ y: shamStats[4]*10, label: "pizza" },
			{ y: shamStats[5]*10, label: "burger" }
		]
	}, 
	{
		type: "stackedBar100",
		toolTipContent: "<b>{name}:</b> {y} (#percent%)",
		showInLegend: true, 
		name: "Ghansham",
		dataPoints: [
			{ y: ghanStats[0]*10, label: "tea" },
			{ y: ghanStats[1]*10, label: "coffee" },
			{ y: ghanStats[2]*10, label: "samosa" },
			{ y: ghanStats[3]*10, label: "cake" },
			{ y: ghanStats[4]*10, label: "pizza" },
			{ y: ghanStats[5]*10, label: "burger" }
		]
	}]
};

var sumItems =  Array(0,0,0,0,0);

for(var i=0;i<=5;i++){

		sumItems[i] = ramStats[i]+shamStats[i]+ghanStats[i];
}
console.log(sumItems[0]);
var options1 = {
	title: {
		text: "Total sales Pie Chart"
	},
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: [
				{ label: "Tea", y: sumItems[0] },
				{ label: "Coffee", y: sumItems[1]  },
				{ label: "Samosa", y: sumItems[2]  },
				{ label: "Cake", y: sumItems[3]  },
				{ label: "Pizza", y: sumItems[4]  },
				{ label: "Burger", y: sumItems[5]  }
				
			]
	}]
};
$("#chartContainer").CanvasJSChart(options);
$("#chartContainer1").CanvasJSChart(options1);




}
</script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="login.php">ABC Restaurant</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link " href="order.php" >Order </a>
    </li>
    <li class="nav-item">
      <a class="nav-link actives" href="report.php">Report</a>
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





<div id="chartContainer" style="height: 40%;width: 40%; float: left; margin: 5%; margin-top: 10%;"></div>
<div id="chartContainer1" style="height: 40%; width: 40%; float: left; margin: 5%; margin-top: 10%;"></div>


</html>