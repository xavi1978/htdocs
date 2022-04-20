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
		<div class="main">
				<form method="post" action="/form1/save.php">
					<div class="center">
						<label for="fname">Name:</label>
						<input type="text" name="fname" placeholder="Your name.." class="input_text"
						value="<?php echo "$name"; ?>">
					</div>
					<div class="center">
						<label for="email">Email:</label>
						<input type="text" name="email" class="input_text"
						value="<?php echo "$email"; ?>">
					</div>
					<div class="center">
						<label for="password">Password:</label>
						<input type="password" name="password" class="input_text"
						value="<?php echo "$password"; ?>">
					</div>
					<div class="center">
						<input type="submit">
					</div>
				</form>
		</div>

	</body>
</html>