<?php

// Comprobar edad.

$edad = '';

function comprobar($numero)
{
    if ($numero >= 18) {
        $resultado = "Mayor de edad.";
    } else if ($numero < 18) {
        $resultado = "Menor de edad.";
        if ($numero >= 16) {
            $resultado += " Con algunos derechos.";
        }
    } else if ($numero < 0) {
        $resultado = "Número inválido.";
    }
    return $resultado;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (($_GET['edad']) & (!empty($_GET['edad'])) & (is_numeric($_GET['edad']))) {
        $edad = $_GET['edad'];
        echo "<h2>";

        // Con función:

        echo comprobar($edad);


        // Con switch:

        switch ($edad) {
            case ($edad < 0):
                echo "Número inválido.";
                break;

            case ($edad < 18):
                echo "Menor de edad.";

            case ($edad >= 16):
                echo " Con algunos derechos.";
                break;

            case ($edad >= 18):
                echo "Mayor de edad.";
                break;
        }
        echo "</h2>";
    }
}

assert(comprobar(-8) == "Número inválido.");
assert(comprobar(8) == "Menor de edad.");
assert(comprobar(16) == "Menor de edad. Con algunos derechos.");
assert(comprobar(19) == "Mayor de edad.");
