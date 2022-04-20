<!DOCTYPE html>
<html>
	<head lang="es">
		<meta charset="UTF-8">
		<title>Page Title</title>
		<meta name="author" content="Xavier Llorach">
		<meta name="description" content="Descripción">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<h1>¡Start!</h1>
		<?php
			/* comments */
			/*
			$a=1; //int
			$a1=2;
			$a2=2.3; //float
			$b='hola'; //string
			$c="hola";
			echo $b.$c;
			*/
			/*
			echo '<ul>';
			$num1=1;
			$num2=1;
			$num2++;
			$num2++;
			echo $num2;
			while ($num2<=10) {
				echo '<li>'.($num1+$num2++).'</li>';
			}
			echo '</ul>';
			*/
			echo '<ul>';
			for ($i = 1; $i < 10; $i++) {
				//echo $i;
				if($i>4){
					echo '<li>'.$i.'</li>';
				}
			}
			echo '</ul>';
		?>
		<h1>¡Finish!</h1>
	</body>
</html>