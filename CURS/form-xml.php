<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Profe">
		<title></title>
		<style>
			body{
				background-color:#848484;
			}
			.main{
				background-color: #f2f2f2;
				margin: 5%;
				padding:5px;
				border-radius: 5px;
			}
			.center{
				margin: auto;
				width:30%;
				padding:10px;
				text-align:center;
			}
			label{
				text-align:left;
				display:block;
			}
			.input_text{
				width:99%;
			}
			
		</style>
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
				if(! empty($_POST['email']) & strpos($_POST['email'], '@')) {
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
		
		<div class="main">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="center" style="background-color:red;">
					<label for="fname">Name:</label>
					<input type="text" name="fname" placeholder="Your name.." class="input_text" value="<?php echo $name;?>">
				</div>
				<div class="center">
					<label for="email">Email:</label>
					<input type="text" name="email" class="input_text" value="<?php echo $email;?>">
				</div>
				<div class="center">
					<label for="password">Password:</label>
					<input type="password" name="password" class="input_text" value="<?php echo $password;?>">
				</div>
				<div class="center">
					<input type="submit">
				</div>
			</form>
		</div>
		
		<style>
			.asd{
				margin-left:20px;
			}
		</style>
		
		<?php
			$save=false;
			if($save1&$save2&$save3){
				echo "Yes";
				$save=true;
			}else{
				$name='';
				$email='';
				$password='';
			}
		?>

		<div class="main">
			<div class="asd">
				<p>Nombre:<?php echo $name;?></p>
			</div>
			<div class="asd">	
				<p>Email:<?php echo $email;?></p>
			</div>
			<div class="asd">
				<p>Password:<?php echo $password;?></p>
			</div>
		</div>
		
		<?php
			if($save=true) {
				echo 'OK';
				
				$usuarios = new SimpleXMLElement('db.xml', 0, true);
				$nuevoUsuario = $usuarios->addChild('user');
				$nuevoUsuario->addChild('name', $_POST['fname']);
				$nuevoUsuario->addChild('email', $_POST['email']);
				$nuevoUsuario->addChild('password', $_POST['password']);
				$usuarios->saveXML('db.xml');
				

				unset($_POST['fname']);
				unset($_POST['email']);
				unset($_POST['password']);
				//print_r($_POST)
			}
		?>	
				
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
					echo '</tr>';
					
					foreach ($xml as $user){
						echo '<tr>';
						echo '<td>'.$user->name.'</td>';
						echo '<td>'.$user->email.'</td>';
						echo '<td>'.$user->password.'</td>';
						echo '</tr>';
					}
					echo '</table>';
				}
			?>
			
		</div>
	</body>
</html>