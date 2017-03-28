<?php

include ("../db_connect/connect.php");
session_start();

CheckIfAccountExistsAndLogin();

function CheckIfEverythingIsFilledIn()
{
    if(isset($_POST["usernameoremail"]) && isset($_POST["password"]))
    {
        $userinfo = [
            $_POST["usernameoremail"],
            $_POST["password"]
        ];
        return $userinfo;
    }
    else
    {
        return 0;
    }
}

function CheckIfAccountExistsAndLogin()
{
    $userinfo = CheckIfEverythingIsFilledIn();
    $dbc = ConnectToDB();
    if(!filter_var($userinfo[0], FILTER_VALIDATE_EMAIL))
    {
        $queryLogin = "SELECT username, password FROM tbl_users WHERE username = '{$userinfo[0]}' AND password = '{$userinfo[1]}'";
    }
    else
    {
        $queryLogin = "SELECT email, password FROM tbl_users WHERE email = '{$userinfo[0]}' AND password   = '{$userinfo[1]}'";
    }
    $data = $dbc->query($queryLogin)->fetchAll(PDO::FETCH_ASSOC);
    if(sizeof($data) > 0)
    {
        $_SESSION["loggedin"] = true;
        $_SESSION["message1"] = "Logged In";
        $_SESSION["color"] = "GREEN";
        echo $_SESSION["message1"];
        header("location: ../../index.php");
    }
    else
    {
        $_SESSION["message1"] = "The username/email or password is incorrect!";
        $_SESSION["color"] = "RED";
        echo $_SESSION["message1"];
        header("location: ../../index.php");
    }
}