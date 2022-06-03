<?php
switch ($_POST['queHacer']) {
    case 1:
        peticion1();
        break;
    case 2:
        peticion2();
        break;
    case 3:
        borrar_CrearDByTablas(); //COMENTAR ESTA LINEA cuando estemos seguros
        insertardatosTest();
        break;
    case 4:
        insertardatos($_POST['email'], $_POST['nombre'], $_POST['phone']);
        break;
    case 5:
        getDatos();
        break;
    case 6:
        getDatosPersona($_POST['email']);
        break;
}
function peticion1()
{
    // print_r($_REQUEST);
    // echo $_POST['nombre'];
    // echo $_POST['nombre'];
    $total = $_POST['numero1'] + $_POST['numero2'];
    echo json_encode(array('nombre' => $_POST['nombre'], 'edad' => $_POST['edad'], 'TOTALIZAR' => $total));
    // echo json_encode($_POST[]);
    // echo 'hola';
}
function peticion2()
{
    echo 'hola';
}
function peticion3()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    $conn->close();
}
function borrar_CrearDByTablas()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    //DROP DATABASE IF EXISTS cesi;
    $sql = "DROP DATABASE IF EXISTS cesi";
    if ($conn->query($sql) === TRUE) {
        echo "drop database \"cesi\"";
    } else {
        echo "Error: drop database \"cesi\" " . $conn->error;
    }
    $sql = "CREATE DATABASE cesi";
    if ($conn->query($sql) === TRUE) {
        echo "create database \"cesi\"";
    } else {
        echo "Error: create database \"cesi\" " . $conn->error;
    }

    //
    $conn->close();

    $conn = new mysqli("localhost", "root", "", "cesi");
    $sql = "CREATE TABLE usuarios (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(50) NOT NULL, nombre VARCHAR(30) NOT NULL, phone INT(9) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    if ($conn->query($sql) === TRUE) {
        echo "create table \"usuarios\"<br>";
    } else {
        echo "Error: create table \"usuarios\" " . $conn->error;
    }
    $conn->close();
}

function insertardatosTest()
{
    //INSERTAR DATOS
    $conn = new mysqli("localhost", "root", "", "cesi");
    $sql = "INSERT INTO usuarios (email,nombre,phone) VALUES ('eric.casanova@cesi.info','eric',61234567);";
    if ($conn->query($sql) === TRUE) {
        echo "insert table \"usuarios\"<br>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"usuarios\" " . $conn->error;
    }
    $conn->close();

    //INSERTAR DATOSMULTIPLES
    $conn = new mysqli("localhost", "root", "", "cesi");
    $sql = "INSERT INTO usuarios (email,nombre,phone) VALUES ('pedro@cesi.info','pedro',61234568);";
    $sql .= " INSERT INTO usuarios (email,nombre,phone) VALUES ('juan@cesi.info','juan',61234569);";
    if ($conn->multi_query($sql) === TRUE) {
        echo "insert table \"usuarios\"<br>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"usuarios\" " . $conn->error;
    }
    $conn->close();
}

function insertardatos($email, $nombre, $phone)
{
    $conn = new mysqli("localhost", "root", "", "cesi");
    $sql = "INSERT INTO usuarios (email,nombre,phone) VALUES ('" . $email . "','" . $nombre . "'," . $phone . ");";
    if ($conn->query($sql) === TRUE) {
        echo "insert table \"usuarios\"<br>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"usuarios\" " . $conn->error;
    }
    $conn->close();
}
//SOLICITAR DATOS
function getDatos()
{
    $conn = new mysqli("localhost", "root", "", "cesi");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<b>id:</b>" . $row["id"] . " - <b>nombre:</b>" . $row["nombre"] . " - <b>email:</b>" . $row["email"] . " - <b>phone:</b>" . $row["phone"] . " - <b>fecha:</b>" . $row["reg_date"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
}

function getDatosPersona($email)
{
    $conn = new mysqli("localhost", "root", "", "cesi");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM usuarios WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $array = [];
        while ($row = $result->fetch_assoc()) {
            array_push($array, json_encode($row));
        }
        echo json_encode($array);
    } else {
        echo "0 results";
    }

    $conn->close();
}
