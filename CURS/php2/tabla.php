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
				echo '<th> Año: </th>';
				echo '<th> Lenguaje: </th>';
				echo '<th> Términos: </th>';
				echo '<th> Condiciones: </th>';
				echo '<th> Fecha: </th>';

				echo '</tr>';

				foreach ($xml as $user){
					echo '<tr>';
					echo '<td>'.$user->name.'</td>';
					echo '<td>'.$user->email.'</td>';
					echo '<td>'.$user->password.'</td>';
					echo '<td>'.$user->time.'</td>';
					echo '<td>';
					switch ($user->year) {
						case 0: echo 1980 ; break;
						case 1: echo 1990 ; break;
						case 2: echo 2000 ; break;
					};
					echo '</td>';	
					echo '<td>';
					switch ($user->language) {
						case 0: echo "HTML" ; break;
						case 1: echo "CSS" ; break;
						case 2: echo "JavaScript" ; break;
					};
					echo '</td>';
					echo '<td>'.$user->terminos.'</td>';
					echo '<td>'.$user->condiciones.'</td>';
					echo '<td>'.date("Y-m-d", (int)$user->fecha).'</td>';
					echo '</tr>';
				}
				echo '</table>';
			}
			?>
			
		</div>
	</body>
</html>