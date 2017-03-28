<?php
function ConnectToDB()
{
    $dbUser = "id1196306_admin";
    $dbPass = "admin";
    $dbHost = "localhost";
    $dbName = "id1196306_kittens";

    return new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
}