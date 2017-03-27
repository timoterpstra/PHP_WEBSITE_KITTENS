<?php
function ConnectToDB()
{
    $dbUser = "root";
    $dbPass = "";
    $dbHost = "localhost:3301";
    $dbName = "db_gokkers";

    return new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
}