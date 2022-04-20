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
		if (!empty($_POST['year'])) {
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
			$fecha = $_POST['fecha'];
			$save8 = true;
			// echo $fecha.'<br />';
		}
	}

	?>
	<div class="main">
		<form method="post" action="/form2/save.php">
			<div class="center">
				<label for="fname">Name:</label>
				<input list="nombre" type="text" name="fname" placeholder="Your name.." class="input_text" pattern="[A-Za-z]{3,}" value="<?php echo "$name"; ?>">

				<datalist id="nombre">
					<option value="">
					<option value="Pepe">
					<option value="Juan">
					<option value="Pedro">
				</datalist>

			</div>
			<div class="center">
				<label for="email">Email:</label>
				<input type="text" name="email" class="input_text" pattern="[A-Za-z]+@[A-Za-z]+.[a-z]{3}" value="<?php echo "$email"; ?>">
			</div>
			<div class="center">
				<label for="password">Password:</label>
				<input type="password" name="password" class="input_text" value="<?php echo "$password"; ?>">
			</div>
			<div class="center">
				<label for="year">Escoja un año de la lista:</label>
				<select name="year" id="year">
					<option <?php if ($year == "0") {
								echo "selected";
							} ?> value="0">1980</option>
					<option <?php if ($year == "1") {
								echo "selected";
							} ?> value="1">1990</option>
					<option <?php if ($year == "2") {
								echo "selected";
							} ?> value="2">2000</option>
					<option <?php if ($year == "") {
								echo "selected";
							} ?> disabled value=""></option>
				</select>
			</div>
			<div class="center">
				<p>¿Qué lenguaje prefiere?</p>
				<label for="html">HTML</label>
				<input <?php if ($language == "0") {
							echo "checked";
						} ?> type="radio" id="html" name="language" value="0">
				<label for="css">CSS</label>
				<input <?php if ($language == "1") {
							echo "checked";
						} ?> type="radio" id="css" name="language" value="1">
				<label for="javascript">JavaScript</label>
				<input <?php if ($language == "2") {
							echo "checked";
						} ?> type="radio" id="javascript" name="language" value="2">
			</div>
			<div class="center">
				<label for="terminos">Términos</label>
				<input <?php if ($terminos == "1") {
							echo "checked";
						} ?> type="checkbox" id="terminos" name="terminos" value="1">
				<label for="condiciones">Condiciones</label>
				<input <?php if ($condiciones == "1") {
							echo "checked";
						} ?> type="checkbox" id="condiciones" name="condiciones" value="1">
			</div>
			<div class="center">
				<label for="fecha">Fecha entre 1980 y 2022:</label>
				<input type="date" id="fecha" name="fecha" min="1980-01-01" max="2022-12-31" value="<?php echo "$fecha"; ?>"><br>
			</div>
			<div class="center">
				<input type="reset">
			</div>
			<div class="center">
				<input type="submit">
			</div>
		</form>
	</div>

</body>

</html>