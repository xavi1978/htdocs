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

	<?php
	$name = '';
	$email = '';
	$password = '';
	$year = '';
	$language = '';
	$terminos = '';
	$condiciones = '';
	$fecha = '';
	$save1 = false;
	$save2 = false;
	$save3 = false;
	$save4 = false;
	$save5 = false;
	$save6 = false;
	$save7 = false;
	$save8 = false;

	print_r($_POST);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST['fname']) & strlen($_POST['fname']) > 2) {
			$name = $_POST['fname'];
			$save1 = true;
			// echo $name.'<br />';
		}
		if (!empty($_POST['email']) & strpos($_POST['email'], '@') !== false) {
			$email = $_POST['email'];
			$save2 = true;
			// echo $email.'<br />';
		}
		if (!empty($_POST['password'])) {
			$password = $_POST['password'];
			$save3 = true;
			// echo $password.'<br />';
		}
		if (!empty($_POST['year']) || $_POST['year'] == 0) {
			$year = $_POST['year'];
			$save4 = true;
			// echo $year.'<br />';
		}
		if (!empty($_POST['language'])) {
			$language = $_POST['language'];
			$save5 = true;
			// echo $language.'<br />';
		}
		if (!empty($_POST['terminos'])) {
			$terminos = $_POST['terminos'];
			$save6 = true;
			// echo $terminos.'<br />';
		} else {
			$save6 = true;
			$terminos = 0;
		}
		if (!empty($_POST['condiciones'])) {
			$condiciones = $_POST['condiciones'];
			$save7 = true;
			// echo $condiciones.'<br />';
		} else {
			$save7 = true;
			$condiciones = 0;
		}
		if (!empty($_POST['fecha'])) {
			$fecha = strtotime($_POST['fecha']);
			$save8 = true;
			// echo $fecha.'<br />';
		}
	}
	?>

	<?php
	$save = false;
	if ($save1 & $save2 & $save3 & $save4 & $save5 & $save6 & $save7 & $save8) {
		// echo "Yes";
		$save = true;
	} else {
		/* $name='';
				$email='';
				$password=''; 
				$year='';
				$language='';
				$terminos='';
				$condiciones='';
				$fecha='';
				*/
	}
	?>

	<div class="main">
		<div class="asd">
			<p <?php if ($save1) {
					echo 'style="color:green;"';
				} else {
					echo 'style="color:red;"';
				} ?>>
				Nombre:<?php echo $name; ?></p>
		</div>
		<div class="asd">
			<p <?php if ($save2) {
					echo 'style="color:green;"';
				} else {
					echo 'style="color:red;"';
				} ?>>
				Email:<?php echo $email; ?></p>
		</div>
		<div class="asd">
			<p <?php if ($save3) {
					echo 'style="color:green;"';
				} else {
					echo 'style="color:red;"';
				} ?>>
				Password:<?php echo $password; ?></p>
		</div>
		<div class="asd">
			<p <?php if ($save4) {
					echo 'style="color:green;"';
				} else {
					echo 'style="color:red;"';
				} ?>>
				Año:<?php echo $year; ?></p>
		</div>
		<div class="asd">
			<p <?php if ($save5) {
					echo 'style="color:green;"';
				} else {
					echo 'style="color:red;"';
				} ?>>
				Lenguaje:<?php echo $language; ?></p>
		</div>
		<div class="asd">
			<p <?php if ($save6) {
					echo 'style="color:green;"';
				} else {
					echo 'style="color:red;"';
				} ?>>
				Terminos:<?php echo $terminos; ?></p>
		</div>
		<div class="asd">
			<p <?php if ($save7) {
					echo 'style="color:green;"';
				} else {
					echo 'style="color:red;"';
				} ?>>
				Condiciones:<?php echo $condiciones; ?></p>
		</div>
		<div class="asd">
			<p <?php if ($save8) {
					echo 'style="color:green;"';
				} else {
					echo 'style="color:red;"';
				} ?>>
				Fecha:<?php echo $fecha; ?></p>
		</div>


		<?php
		if ($save) {
			// echo 'OK';

			foreach ($xml as $user) {
				if ($email == $user->email) {

					echo "<br /><h2> El email ya está registrado. </h2>";
					$emailexiste = true;
				}
			}

			if (!$emailexiste) {

				$usuarios = new SimpleXMLElement('db.xml', 0, true);
				$nuevoUsuario = $usuarios->addChild('user');
				$nuevoUsuario->addChild('name', $_POST['fname']);
				$nuevoUsuario->addChild('email', $_POST['email']);
				$nuevoUsuario->addChild('password', $_POST['password']);
				$nuevoUsuario->addChild('time', time());
				$nuevoUsuario->addChild('year', $_POST['year']);
				$nuevoUsuario->addChild('language', $_POST['language']);
				if (!empty($_POST['terminos'])) {
					$nuevoUsuario->addChild('terminos', "Sí");
				} else {
					$nuevoUsuario->addChild('terminos', "No");
				}
				if (!empty($_POST['condiciones'])) {
					$nuevoUsuario->addChild('condiciones', "Sí");
				} else {
					$nuevoUsuario->addChild('condiciones', "No");
				}
				$nuevoUsuario->addChild('fecha', $fecha);
				$usuarios->saveXML('db.xml');
			}

			/*
				$doc = new DOMDocument();

				$doc->preserveWhiteSpace = false;
				$doc->formatOutput = true;

				$doc->loadXML('db.xml');

				$doc->saveXML();		
				*/

			unset($_POST['fname']);
			unset($_POST['email']);
			unset($_POST['password']);
			unset($_POST['year']);
			unset($_POST['language']);
			unset($_POST['terminos']);
			unset($_POST['condiciones']);
			unset($_POST['fecha']);

			//print_r($_POST);

			echo '<p id="exito">Los datos se han guardado correctamente.</p>';
		} else {

			echo '<p id="error">Error guardando datos.</p>';
		}

		if ($save) {

			echo '<form method="post" action="/form2/tabla.php">';

			echo '<br>';

			echo '<input type="submit" value="Ver" style="background:green; position: absolute; left: 50%;">';
		} else {

			echo '<form method="post" action="/form2/index.php">';

			echo '
					<input type="hidden" name="fname" value="' . $name . '">
					<input type="hidden" name="email" value="' . $email . '">
					<input type="hidden" name="password" value="' . $password . '">
					<input type="hidden" name="year" value="' . $year . '">
					<input type="hidden" name="language" value="' . $language . '">
					<input type="hidden" name="terminos" value="' . $terminos . '">
					<input type="hidden" name="condiciones" value="' . $condiciones . '">
					<input type="hidden" name="fecha" value="' . $fecha . '">
					';

			echo '<input type="submit" value="Volver" style="background:red; position: absolute; left: 50%;">';
		}


		?>
		<br /> <br />
	</div>

</body>

</html>