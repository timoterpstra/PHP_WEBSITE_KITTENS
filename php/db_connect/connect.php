<?php
    $dbUser = "root";
    $dbPass = "LukaszLolpol10";
    $dbHost = "84.26.202.94:3306";
    $dbName = "db_gokkers";

    $dbc = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);