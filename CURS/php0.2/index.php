<?php

$array = array();

foreach (range('a', 'z') as $letra) {
    echo $letra;
    array_push($array, $letra);
}


// echo "<br />";
// print_r($array);
// echo "<br />";
// var_dump($array);
echo "<br />";
echo count($array);

echo "<ul>";

for ($i = 0; $i < count($array); $i++) {

    echo "<li>" . $array[$i] . "</li>";
}

echo "</ul>";

echo "<ul>";

for ($i = 0; $i < count($array); $i++) {

    echo "<li>";

    for ($b = 0; $b <= $i; $b++) {
        echo $array[$b];
    }

    echo "</li>";
}

echo "</ul>";

echo "<ul>";

for ($i = (count($array) - 1); $i >= 0; $i--) {

    echo "<li>";

    for ($b = (count($array) - 1); $b >= $i; $b--) {
        echo $array[$b];
    }

    echo "</li>";
}

echo "</ul>";
