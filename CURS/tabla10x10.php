<!DOCTYPE html>
<html>
<head>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
		}
		table {
			width: 100%;
		}
		th,td {
			padding: 15px;
		}
		.color_blue {
			background-color: blue;
		}
		.color_green {
			background-color: green;
		}
</style>
</head>
<body>
<table>
<?php
	for ($i = 1; $i <= 10; $i++) {
		echo '<tr>';
		for ($i2 = 1; $i2 <= 10; $i2++) {
			echo '<td>'.$i.'-'.$i2.'</td>';
		}
		echo '</tr>';
	}
?>
</table>
</body>
</html>		