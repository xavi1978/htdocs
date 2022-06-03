<?php

function borrar_CrearDByTablas()
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
    $sql = "CREATE TABLE usuarios (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(50) NOT NULL, nombre VARCHAR(30) NOT NULL, phone INT(9) NOT NULL, pw VARCHAR(15) NOT NULL)";
    if ($conn->query($sql) === TRUE) {
        echo "create table \"usuarios\"<br>";
    } else {
        echo "Error: create table \"usuarios\" " . $conn->error;
    }
    $conn->close();
}
