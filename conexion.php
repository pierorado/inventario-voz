<?php

    $host = "localhost";
    $usuario = "root";
    $password = "";
    $dbnombre = "test";

    $mysqli = new mysqli($host, $usuario, $password, $dbnombre);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }