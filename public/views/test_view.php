<style type="text/css">
	table, th, td, tr {
		border: 1px solid #000;
	}
</style>
<table>
	<thead>
		<th>Nama</th>
		<th>Email</th>
		<th>Date</th>
	</thead>
	<tbody>
		<?php
		foreach ($data as $key => $user) {
			echo '<tr>';
			echo '<td>'.$user->name.'</td>';
			echo '<td>'.$user->email.'</td>';
			echo '<td>'.$user->date_registered.'</td>';
			echo '<tr>';
		}
		?>
	</tbody>
</table>

<?php echo $datakedua;?>