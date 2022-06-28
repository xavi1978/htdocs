<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
</head>

<body>
	<?php
	function getAllItems()
	{
		$conn = new mysqli("localhost", "root", "", "pbd");
		$sql = "SELECT * FROM listas ORDER BY tema;";
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
	$oldTema = "";
	foreach ($arrayTemas as $tema) {
		if ($tema["tema"] != $oldTema) {
			$oldTema = $tema["tema"];
			echo "<h1>" . $oldTema . "</h1>";
		}
		// var_dump($tema);
		echo '<div style="background-color:#D0D0D0; border-radius:20px">';
		echo '<br />';
		echo "<h3>" . $tema["titulo"] . "</h3>";
		echo '<ol><li>' . $tema["item0"] . "</li>";
		echo '<li>' . $tema["item1"] . "</li>";
		echo '<li>' . $tema["item2"] . "</li>";
		echo '<li>' . $tema["item3"] . "</li>";
		echo '<li>' . $tema["item4"] . "</li>";
		echo '<li>' . $tema["item5"] . "</li>";
		echo '<li>' . $tema["item6"] . "</li>";
		echo '<li>' . $tema["item7"] . "</li>";
		echo '<li>' . $tema["item8"] . "</li>";
		echo '<li>' . $tema["item9"] . "</li></ol>";
		echo '<a href="./editlist.php?id=' . $tema["id"] . '"><button >Editar</button></a>';
		echo '<br /><br />';
		echo '</div>';
		echo '<br />';
	}

	?>


</body>

</html>