<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fetch API</title>
</head>
<body>
	<input type="text" name="data"><button onclick="fetchs()">Transmit</button>
	<p>Result</p>
</body>
</html>

<script>
	function fetchs(){
		const res = new XMLHttpRequest();
		res.onreadystatechnage = fetchs;
		if(res.readyState == 4 ){
			document.querySelector('p').textContent = this.responseText;
		}		
	}
</script>