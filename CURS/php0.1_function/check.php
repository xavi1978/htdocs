<?php
$primero = '';
$segundo = '';

function comparar($uno, $dos)
{
    return max($uno, $dos);
}

function dividir($uno, $dos)
{
    return $uno / $dos;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ((!empty($_GET['primero'])) & (is_numeric($_GET['primero']))) {
        $primero = $_GET['primero'];

        if ((!empty($_GET['segundo'])) & (is_numeric($_GET['segundo']))) {
            $segundo = $_GET['segundo'];

            echo "<h2>";

            if ($primero != $segundo) {
                echo "El número mayor es " . comparar($primero, $segundo);
            }

            echo "<br />";

            echo $primero . "/" . $segundo . "=" . dividir($primero, $segundo);

            echo "</h2>";
        }
    }
}

assert(dividir(10, 5) == 2);
assert(comparar(10, 5) == 10);
