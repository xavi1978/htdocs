<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Profe">
		<link rel="stylesheet" href="style.css">
		<title></title>
	</head>
	<body>
		
	<div class="main">
		
		<?php
			if(!$xml = simplexml_load_file('db.xml')){
				echo "No se ha podido cargar el archivo";
			} else {
				echo '<table>';
				echo '<tr>';
				echo '<th> Nombre: </th>';
				echo '<th> Email: </th>';
				echo '<th> Password: </th>';
				echo '<th> Time: </th>';

				echo '</tr>';
					
				foreach ($xml as $user){
					echo '<tr>';
					echo '<td>'.$user->name.'</td>';
					echo '<td>'.$user->email.'</td>';
					echo '<td>'.$user->password.'</td>';
					echo '<td>'.$user->time.'</td>';
					echo '</tr>';
				}
				echo '</table>';
			}
			?>
			
		</div>
	</body>
</html>