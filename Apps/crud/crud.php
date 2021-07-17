
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD Application</title>
</head>
<body>
	<div class="container">
		<h3>Select Operations - Contact</h3>
		<button name="create">CREATE</button>
		<button name="read">READ</button>
		<button name="update">UPDATE</button>
		<button name="delete">DELETE</button>
		<hr>
		<div class="create">
			<h3>CREATE</h3>
			<form action="crud.php" method="post">
				<table>
					<tr>
						<td>Name: </td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td>Phone: </td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Save"/></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="read"></div>
		<div class=""></div>
		<div class="create"></div>
	</div>
</body>
<style>
	.container {border: 1px solid red; padding: 10px;margin: 0 auto; width: 80vw; font-family: tahoma}
</style>
</html>

