<?php
include "../db_connect/connect.php";
$dbc = _Connect_db();

$name = $_POST['name'];
$surname = $_POST['surname'];
$username = $_POST['username'];
$email = $_POST['email'];
$retypeEmail= $_POST['retype-email'];
$password = $_POST['password'];
$retypePassword = $_POST['retype-password'];

if (($name != null) && ($surname != null) && ($username != null) && ($email != null) && ($retypeEmail != null) && ($password != null) && ($retypePassword != null))
{
    if(($email == $retypeEmail) && ($password == $retypePassword))
    {
        $userexists = mysqli_query($dbc, "SELECT * FROM person WHERE gebruikersnaam = '$username' AND naam = '$name' AND achternaam = '$surname' AND email = '$email' OR email = '$email'");
        if(!$userexists)
        {
            mysqli_query($dbc, "INSERT INTO person (id, gebruikersnaam, wachtwoord, email, naam, achternaam) VALUES (null, '$username', '$password', '$email', '$name', '$surname')");
            echo "<form id='myForm' action='../../index.php' method='post'>";
            echo "<input type='hidden' name='accountcreated' value=true>";
            echo "</form>";
            echo "<script type='text/javascript'>";
            echo "document.getElementById('myForm').submit();";
            echo "</script>";
        }
        else
        {
            echo "<form id='myForm' action='../../index.php' method='post'>";
            echo "<input type='hidden' name='accountexists' value=true>";
            echo "</form>";
            echo "<script type='text/javascript'>";
            echo "document.getElementById('myForm').submit();";
            echo "</script>";
        }
    }
}