<?php
$primero = '';
$segundo = '';
$cociente = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ((!empty($_GET['primero'])) & (is_numeric($_GET['primero']))) {
        $primero = $_GET['primero'];

        if ((!empty($_GET['segundo'])) & (is_numeric($_GET['segundo']))) {
            $segundo = $_GET['segundo'];

            echo "<h2>";

            if ($primero != $segundo) {
                echo "El número mayor es " . max($primero, $segundo);
            }

            $cociente = $primero / $segundo;

            echo "<br />";

            echo $primero . "/" . $segundo . "=" . $cociente;

            echo "</h2>";
        }
    }
}
