<?php
include "../db_connect/connect.php";
$dbc = _Connect_db();

$usernameOrEmail = $_SET['usernameoremail'];
$password = $_SET['password'];

if (($usernameOrEmail != null || $usernameOrEmail != "") || ($password != null || $password != ""))
{
    $resuld = mysqli_query($dbc, "SELECT * FROM person WHERE gebruikersnaam = $usernameOrEmail AND wachtwoord = $password OR email = $usernameOrEmail AND wachtwoord = $password");
    if ($resuld)
    {
        echo "ja lukt";
    }
    else
    {
        echo "nee lukt niet";
        var_dump($resuld);
    }
}