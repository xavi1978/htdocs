<?php
$edad = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (($_GET['edad']) & (!empty($_GET['edad'])) & (is_numeric($_GET['edad']))) {
        $edad = $_GET['edad'];
        echo "<h2>";
        if ($edad < 18) {
            echo "Menor de edad.";
        }
        if (($edad > 16) & ($edad < 18)) {
            echo " Con algunos derechos.";
        }
        if ($edad >= 18) {
            echo "Mayor de edad.";
        }
        echo "</h2>";
    }
}
