<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		td, th {
			border: 1px solid #000;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Date Registered</th>
		</thead>
		<tbody>
			<?php
				foreach ($db as $key) {
					echo '<tr>';
					echo "<td>$key->name</td>";
					echo "<td>$key->username</td>";
					echo "<td>$key->email</td>";
					echo "<td>$key->date_registered</td>";	
					echo "</tr>";
			 	}?>

		</tbody>
	</table>

</body>
</html>