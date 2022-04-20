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
			$name='';
			$email='';
			$password='';
			$save1=false;
			$save2=false;
			$save3=false;			
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(! empty($_POST['fname']) & strlen($_POST['fname']) > 2) {
					$name = $_POST['fname'];
					$save1=true;
					// echo $name.'<br />';
				}
				if(! empty($_POST['email']) & strpos($_POST['email'], '@') !== false ) {
					$email = $_POST['email'];
					$save2=true;
					// echo $email.'<br />';
				}
				if(! empty($_POST['password'])){
					$password = $_POST['password'];
					$save3=true;
					// echo $password.'<br />';
				}
			}
		
		?>
		
		<?php
			$save=false;
			if($save1&$save2&$save3){
				// echo "Yes";
				$save=true;
			}else{
				/* $name='';
				$email='';
				$password=''; */ 
			}
		?>

		<div class="main">
			<div class="asd">
				<p <?php if($save1) { echo 'style="color:green;"'; } else { echo 'style="color:red;"'; }?>>
				Nombre:<?php echo $name;?></p>
			</div>
			<div class="asd">	
				<p <?php if($save2) { echo 'style="color:green;"'; } else { echo 'style="color:red;"'; }?>>
				Email:<?php echo $email;?></p>
			</div>
			<div class="asd">
				<p <?php if($save3) { echo 'style="color:green;"'; } else { echo 'style="color:red;"'; }?>>
				Password:<?php echo $password;?></p>
			</div>
		
		
		<?php
			if($save) {
				// echo 'OK';
				
				$usuarios = new SimpleXMLElement('db.xml', 0, true);
				$nuevoUsuario = $usuarios->addChild('user');
				$nuevoUsuario->addChild('name', $_POST['fname']);
				$nuevoUsuario->addChild('email', $_POST['email']);
				$nuevoUsuario->addChild('password', $_POST['password']);
				$nuevoUsuario->addChild('time', time());
				$usuarios->saveXML('db.xml');
				

				unset($_POST['fname']);
				unset($_POST['email']);
				unset($_POST['password']);
				//print_r($_POST)
				echo '<p id="exito">Los datos se han guardado correctamente.</p>';
				
			} else {	
				
				echo '<p id="error">Error guardando datos.</p>';
			
			}
			
			if($save) {
				
				echo '<form method="post" action="/form1/tabla.php">';
			
				echo '<br>';
				
				echo '<input type="submit" value="Ver" style="background:green; position: absolute; left: 50%;">';

			} else {
				
				echo '<form method="post" action="/form1/index.php">';
			
				echo '
					<input type="hidden" name="fname" value="'.$name.'">
								
					<input type="hidden" name="email" value="'.$email.'">
				
					<input type="hidden" name="password" value="'.$password.'">';
			
					echo '<input type="submit" value="Volver" style="background:red; position: absolute; left: 50%;">';	
			} 
			
				
		?>
		<br /> <br />
		</div>
		
	</body>
</html>