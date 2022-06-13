<?php
if (isset($_GET['id']) && isset($_GET['clave'])) {
    $id = $GET['id'];
    $clave = $GET['clave'];
    echo "id:" . $_GET['id'] . "<br>";
    echo "clave:" . $_GET['clave'] . "<br>";

    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "SELECT * FROM usuarios_temp WHERE id='" . $id  . "' ;";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $usuario->id = $row['id'];
            $usuario->email = $row['email'];
            $usuario->nombre = $row['nombre'];
            $usuario->phone = $row['phone'];
            $usuario->password = $row['password'];
            $usuario->reg_date = $row['reg_date'];
        }
    }
    $xstring = $usuario->id . "-" . $usuario->email . "-" . $usuario->nombre . "-" . $usuario->phone . "-" . $usuario->password . "-" . $usuario->reg_date;
    $sha1 = sha1($xstring);

    if ($clave == $sha1) {
        insertUser($usuario);
    }
} else {
    echo "Error: <br>";
}
$conn->close();

function insertUser($user)
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "INSERT INTO usuarios (email,nombre,phone,password) VALUES ('" . $user->email . "','" .  $user->$nombre . "'," . $user->$phone . ",'" . $user->$password . "');";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "<br>OK";
        header('Location: login.html');
    } else {
        echo "<br>ERROR";
        // echo "Error: insert table \"usuarios\" " . $conn->error;
    }
    $conn->close();
}
