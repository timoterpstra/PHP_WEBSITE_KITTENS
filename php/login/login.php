<?php
include "../db_connect/connect.php";
$dbc = _Connect_db();

$usernameOrEmail = $_POST['usernameoremail'];
$password = $_POST['password'];

var_dump($usernameOrEmail);
echo "<br>";
var_dump($password);

if (($usernameOrEmail != null) || ($password != null))
{
    $resuld = mysqli_query($dbc, "SELECT (gebruikersnaam, wachtwoord) FROM person WHERE gebruikersnaam = '$usernameOrEmail' AND wachtwoord = '$password' OR email = '$usernameOrEmail' AND wachtwoord = '$password'");
    if ($resuld)
    {
        echo "<form id='myForm' action='../../index.php' method='post'>";
        echo "<input type='hidden' name='loggedin' value=true>";
        echo "</form>";
        echo "<script type='text/javascript'>";
        echo "document.getElementById('myForm').submit();";
        echo "</script>";
    }
    else
    {
        echo "nee lukt niet";
    }
}