<?php
// createDB();
// checkConectionDB();
switch ($_POST['api']) {
    case "checkConectionDB_generic":
        checkConectionDB_generic();
        break;
    case "createDB":
        createDB();
    case "checkDB":
        // checkConectionDB();
        break;
    case "insertData":
        insertData($_POST['nombre'], $_POST['email'], $_POST['phone'], $_POST['pw']);
        break;
    case "signInUser":
        signInUser($_POST['email'], $_POST['password']);
        break;
    default:
        echo "Action " . $_POST['api'] . " not found";
        break;
}

function comprobarCosasDeDB()
{
    if (checkConectionDB_generic()) {
        echo "OK";
    } else {
        echo "FALLO";
    }
}

function checkConectionDB_generic()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return false;
    }
    echo "Connected successfully";
    $conn->close();
    return true;
}

function checkConectionDB()
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    if ($conn->connect_error) {
        return false;
    }
    echo "Connected successfully";
    $conn->close();
    return true;
}
function createDB()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    //DROP DATABASE IF EXISTS pbd;
    $sql = "DROP DATABASE IF EXISTS pbd";
    if ($conn->query($sql) === TRUE) {
        echo "drop database \"pbd\"";
    } else {
        echo "Error: drop database \"pbd\" " . $conn->error;
    }
    $sql = "CREATE DATABASE pbd";
    if ($conn->query($sql) === TRUE) {
        echo "create database \"pbd\"";
    } else {
        echo "Error: create database \"pbd\" " . $conn->error;
    }

    //
    $conn->close();

    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "CREATE TABLE usuarios (email VARCHAR(50) NOT NULL, nombre VARCHAR(30) NOT NULL, phone INT(9) NOT NULL, password CHAR(32) CHARACTER SET 'latin1' NOT NULL)";
    if ($conn->query($sql) === TRUE) {
        echo "create table \"usuarios\"<br>";
    } else {
        echo "Error: create table \"usuarios\" " . $conn->error;
    }
    $conn->close();
}

function insertData($email, $name, $phone, $password)
{
    // INSERTAR DATOS
    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "INSERT INTO usuarios (email,nombre,phone,password) VALUES ('" . $email . "','" . $name . "'," . $phone . ",'" . md5($password) . "');";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "insert table \"usuarios\"<br>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"usuarios\" " . $conn->error;
    }
    $conn->close();
}

function signInUser($email, $password)
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "SELECT nombre FROM usuarios WHERE email='" . $email . ", password='" . md5($password) . "');";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {

        while ($row = $result->fetch_assoc()) {
            echo $row['nombre'];
        }
    } else {
        echo "Error.";
    }
}
