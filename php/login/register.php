<?php
<<<<<<< HEAD

$message = "";
$color = "";

/*  userinfo:
 * 0 = name
 * 1 = surname
 * 2 = username
 * 3 = email
 * 4 = retype-email
 * 5 = password
 * 6 = retype-password
 */


CheckRetypers();

function CheckIfEverythingIsFilledIn()
{
    if(isset($_POST["name"]) && isset($_POST["surname"]) &&  isset($_POST["username"]) &&  isset($_POST["email"]) && isset($_POST["retype-email"]) && isset($_POST["password"]) && isset($_POST["retype-password"]))
    {
        $userinfo = [
            $_POST["name"],
            $_POST["surname"],
            $_POST["username"],
            $_POST["email"],
            $_POST["retype-email"],
            $_POST["password"],
            $_POST["retype-password"]
        ];
        return $userinfo;
    }
    else
    {
        return 0;
    }
}

function CheckRetypers()
{
    if(CheckIfEverythingIsFilledIn() != 0)
    {
        $userinfo = CheckIfEverythingIsFilledIn();

        if(!filter_var($userinfo[3], FILTER_VALIDATE_EMAIL) || !filter_var($userinfo[4], FILTER_VALIDATE_EMAIL))
        {
            global  $message;
            global $color;
            $message = "This is a incorrect email!";
            $color = "RED";
            header("location: ../../index.php?message=" . urlencode($message) . "&color=$color");
        }
        elseif($userinfo[3] === $userinfo[4])
        {
            if($userinfo[5] === $userinfo[6])
            {
                CheckIfAccountExistsAndCreateAccount();
            }
            else
            {

                global  $message;
                global $color;
                $message = "The Passwords you filled in are not the same";
                $color = "RED";
                header("location: ../../index.php?message=" . urlencode($message) . "&color=$color");
            }
        }
        else
        {
            global  $message;
            global $color;
            $message = "The emails you filled in are not the same!";
            $color = "RED";
            header("location: ../../index.php?message=" . urlencode($message) . "&color=$color");
        }
    }
}

function CheckIfAccountExistsAndCreateAccount()
{
    $userinfo = CheckIfEverythingIsFilledIn();
    $dbc = ConnectToDB();
    $queryGetMail = "SELECT email, username FROM tbl_users WHERE email = '{$userinfo[3]}' OR username = '{$userinfo[2]}'";
    $queryCreateAccount = "INSERT INTO tbl_users (firstname, surname, username, email, pass, active) VALUES ('$userinfo[0]', '$userinfo[1]', '$userinfo[2]', '$userinfo[3]', '$userinfo[5]', '0')";
    //$answerCheck = $dbc->query($queryGetMail)->fetchAll(PDO::FETCH_ASSOC);
    $data = $dbc->query($queryGetMail)->fetchAll(PDO::FETCH_ASSOC);

    var_dump($data);

    if(sizeof($data) == 0)
    {
        $dbc->query($queryCreateAccount);
        global  $message;
        global $color;
        $message = "Account Created";
        $color = "GREEN";
        header("location: ../../index.php?message=" . urlencode($message) . "&color=$color");
    }
    else
    {
        global  $message;
        global $color;
        $color = "RED";
        $message = "Account Exists";
        header("location: ../../index.php?message=" . urlencode($message) . "&color=$color");
    }
}

function ConnectToDB()
{
    $dbUser = "root";
    $dbPass = "";
    $dbHost = "localhost:3301";
    $dbName = "db_gokkers";

    return new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
}
=======
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
//            echo "<form id='myForm' action='../../index.php' method='post'>";
//            echo "<input type='hidden' name='accountcreated' value=true>";
//            echo "</form>";
//            echo "<script type='text/javascript'>";
//            echo "document.getElementById('myForm').submit();";
//            echo "</script>";
            echo "heey";
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
else
{
    echo "nop";
}
//header("location: ../../index.php");
>>>>>>> origin/master
