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
                echo $db->name;
            ?>

		</tbody>
	</table>

</body>
</html>