<?php

    $DB_HOST = $_ENV["DB_HOST"];//localhost
    $DB_USER = $_ENV["DB_USER"];//root
    $DB_PASSWORD = $_ENV["DB_PASSWORD"];
    $DB_NAME = $_ENV["DB_NAME"];//test
    $DB_PORT = $_ENV["DB_PORT"];//DELETE

    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME, $DB_PORT);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }