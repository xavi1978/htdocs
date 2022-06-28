<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
	<link rel="stylesheet" href="estil.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script defer src="./codi.js"></script>
</head>
<?php
function getAllItems()
{
	$conn = new mysqli("localhost", "root", "", "pbd");
	$sql = "SELECT * FROM listas WHERE id=" . $_GET['id'] . ";";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$arrayTemas = [];
		while ($row = $result->fetch_assoc()) {
			array_push($arrayTemas, $row);
		}
		return ($arrayTemas);
	}
}
$arrayTemas = getAllItems();
$tema = null;
foreach ($arrayTemas as $categoria) {
	$tema = $categoria;
	break;
}


?>

<body>
	<div id="formulari" style="margin-top: 50px; margin-left: 30%">
		<h2>Editar llista</h2>
		<br />
		<select id="tema">
			<option>Geografia</option>
			<option>Esports</option>
			<option>Història</option>
			<option>Economia</option>
		</select>
		<br />
		<input type="text" class="item" id="titulo" placeholder="Títol llista" value='<?php echo $tema["titulo"]; ?>' style="width: 100%"></input>
		<br />
		1
		<input type="text" class="item" id="item1" placeholder="Element 1" value='<?php echo $tema["item0"]; ?>'></input>
		6
		<input type="text" class="item" id="item6" placeholder="Element 6" value='<?php echo $tema["item5"]; ?>'></input>
		<br />
		2
		<input type="text" class="item" id="item2" placeholder="Element 2" value='<?php echo $tema["item1"]; ?>'></input>
		7
		<input type="text" class="item" id="item7" placeholder="Element 7" value='<?php echo $tema["item6"]; ?>'></input>
		<br />
		3
		<input type="text" class="item" id="item3" placeholder="Element 3" value='<?php echo $tema["item2"]; ?>'></input>
		8
		<input type="text" class="item" id="item8" placeholder="Element 8" value='<?php echo $tema["item7"]; ?>'></input>
		<br />
		4
		<input type="text" class="item" id="item4" placeholder="Element 4" value='<?php echo $tema["item3"]; ?>'></input>
		9
		<input type="text" class="item" id="item9" placeholder="Element 9" value='<?php echo $tema["item8"]; ?>'></input>
		<br />
		5
		<input type="text" class="item" id="item5" placeholder="Element 5" value='<?php echo $tema["item4"]; ?>'></input>
		10
		<input type="text" class="item" id="item10" placeholder="Element 10" value='<?php echo $tema["item9"]; ?>'></input>
		<br />
		<a href="./index.html"><button id="cancel">Cancel·lar</button></a>
		<button id="edit">Editar</button>
	</div>
</body>

</html>