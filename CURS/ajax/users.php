<?php
switch ($_POST['queHacer']) {
    case 1:
        borrar_CrearDByTablas();
        insertardatos($_POST['email'], $_POST['nombre'], $_POST['phone'], $_POST['pw']);
        break;
}

function borrar_CrearDByTablas()
{
    //     $conn = new mysqli("localhost", "root", "");
    //     if ($conn->connect_error) {
    //         die("Connection failed: " . $conn->connect_error);
    //     }
    //     echo "Connected successfully";
    //     //DROP DATABASE IF EXISTS pbd;
    //     $sql = "DROP DATABASE IF EXISTS pbd";
    //     if ($conn->query($sql) === TRUE) {
    //         echo "drop database \"pbd\"";
    //     } else {
    //         echo "Error: drop database \"pbd\" " . $conn->error;
    //     }
    //     $sql = "CREATE DATABASE pbd";
    //     if ($conn->query($sql) === TRUE) {
    //         echo "create database \"pbd\"";
    //     } else {
    //         echo "Error: create database \"pbd\" " . $conn->error;
    //     }

    //     //
    //     $conn->close();

    //     $conn = new mysqli("localhost", "root", "", "pbd");
    //     $sql = "CREATE TABLE usuarios (email VARCHAR(50) NOT NULL, nombre VARCHAR(30) NOT NULL, phone INT(9) NOT NULL, pw VARCHAR(15) NOT NULL)";
    //     if ($conn->query($sql) === TRUE) {
    //         echo "create table \"usuarios\"<br>";
    //     } else {
    //         echo "Error: create table \"usuarios\" " . $conn->error;
    //     }
    //     $conn->close();
}

function insertardatos($email, $nombre, $phone, $pw)
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    // $sql = "IF NOT EXISTS (SELECT * FROM usuarios WHERE email = $email) INSERT INTO usuarios (email,nombre,phone,pw) VALUES ('" . $email . "','" . $nombre . "'," . $phone . ",'" . md5($pw) . "');";
    $sql = "INSERT INTO usuarios (email,nombre,phone,pw) VALUES ('" . $email . "','" . $nombre . "'," . $phone . ",'" . $pw . "');";
    if ($conn->query($sql) === TRUE) {
        echo "insert table \"usuarios\"<br>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"usuarios\" " . $conn->error;
    }
    $conn->close();
}
