<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8" />
    <title>PHP 0.3</title>
    <meta name="author" content="Xavier Llorach" />
    <meta name="description" content="PHP 0.3" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <style>
        body {
            background-color: gray;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 3px solid gray;
            border-collapse: collapse;
            padding: 3px;
        }

        th {
            background-color: royalblue;
            color: white;
            width: 60px;
        }

        td {
            background-color: lightgray;
            text-align: right;
            width: 60px;
        }
    </style>

</head>

<body>

    <?php

    function vertabla($relleno, $dias)
    {
        if ($relleno > 6) {

            echo "Relleno excesivo. Hasta 6.";
            return;
        }

        if ($dias < 28 || $dias > 31) {

            echo "Días fuera de rango. De 28 a 31.";
            return;
        }


        echo "<table>";

        echo "<tr>";

        $semana = array("Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom");


        foreach ($semana as $dia) {

            echo "<th>" . $dia . "</th>";
        }

        echo "</tr>";


        // Primera fila rellenada.

        $continuacion = 0;


        echo "<tr>";


        for ($i = 0; $i < $relleno; $i++) {

            echo "<td></td>";
        }

        for ($i = 1; $i <= (7 - $relleno); $i++) {

            echo "<td>$i</td>";
            $continuacion = $i + 1;
        }

        echo "</tr>";

        // echo $continuacion;


        // Resto de filas.

        for ($i = $continuacion; $i <= $dias; $i++) {

            echo "<tr>";

            for ($b = 0; $b < 7; $b++) {

                if ($i > $dias) {

                    break;
                }

                echo "<td>$i</td>";

                $i++;
            }

            echo "</tr>";

            $i--;
        }
    }

    vertabla(3, 31);

    ?>

</body>

</html>