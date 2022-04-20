<?php
$name = '';
$email = '';
$password = '';
$accion = '';
$save1 = false;
$save2 = false;
$save3 = false;

$token = '0123';

function encrypt($txt, $token1, $t)
{
    $tokenizer = $token1 . $txt . $t;
    $hash = hash('gost', $tokenizer, false);
    return $hash;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET['name']) & strlen($_GET['name']) > 2) {
        $name = $_GET['name'];
        $save1 = true;
        // echo $name.'<br />';
    }
    if (!empty($_GET['email']) & strpos($_GET['email'], '@') !== false) {
        $email = $_GET['email'];
        $save2 = true;
        // echo $email.'<br />';
    }
    if (!empty($_GET['password'])) {
        $password = $_GET['password'];
        $save3 = true;
        // echo $password.'<br />';
    }
    if (!empty($_GET['accion'])) {
        $accion = $_GET['accion'];
        // echo $accion.'<br />';
    }
}

$save = false;
if ($save1 & $save2 & $save3) {
    // echo "Yes";
    $save = true;
}

if ($save) {
    // echo 'OK';

    $date = date('Y.m.d');

    $usuarios = new SimpleXMLElement('db.xml', 0, true);
    $nuevoUsuario = $usuarios->addChild('user');
    $nuevoUsuario->addChild('name', $_GET['name']);

    $nuevoUsuario->addChild('email', encrypt($email, $token, $date));
    $nuevoUsuario->addChild('password',  encrypt($password, $token, $date));
    $nuevoUsuario->addChild('date', $date);

    $usuarios->saveXML('db.xml');
}

// print_r($_GET);


if ($accion == "Login") {

    if (!$xml = simplexml_load_file('db.xml')) {
        echo "Error cargando fichero";
    }
    foreach ($xml as $user) {
        $datexml = $user->date;
        if ($user->email == encrypt($email, $token, $datexml)) {
            if ($user->password == encrypt($password, $token, $datexml)) {
                echo '<h1>' . "Bienvenido $user->name" . '</h1>';
                break;
            } else {
                echo '<h1>' . "Error" . '</h1>';
            }
        }
    }
}
