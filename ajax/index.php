<?php
    require_once("db.php"); // Connect to the database
    
    $sql = "SELECT * from employees";
    if($result = mysqli_query($con,$sql)){
    	if(mysqli_num_rows($result) > 0){
    		echo "System contain data";
    	} else {
    		echo "<h1>No Data Found</h1>";
    	}
    }

 ?>












<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Ajax Application - On Click - JSON Version</title>
</head>
<body>
	 <input type="text" id="a" name="num1" placeholder="Enter the number 1" />
	 <input type="text" id="b" name="num2" placeholder="Enter the number 2s" />
	 <button onclick="push()">Send Data</button>
	 <p id="c">Result</p>
</body>
</html>

<!-- Sample code from mdadalkhan@gmail.com -->

<style>
	
</style>

<script>
// Sending a receiving data in JSON format using GET method
//      
function push(){
	const a = document.querySelector("#a").value;
	const b = document.querySelector("#b").value;
	const c = document.querySelector("#c");
// Sending and receiving data in JSON format using POST method
//
// var xhr = new XMLHttpRequest();
// var url = "response.php";
// xhr.open("POST", url, true);
// xhr.setRequestHeader("Content-Type", "application/json");
// xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//         var json = JSON.parse(xhr.responseText);
//         console.log(json.email + ", " + json.password);
//     }
// };
// var data = JSON.stringify({"email": "hey@mail.com", "password": "101010"});
// xhr.send(data); // Receive Data as $_GET['data']

c.textContent = Number(a) + Number(b);

}
</script>