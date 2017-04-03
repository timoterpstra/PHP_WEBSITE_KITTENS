<?php
include ("../db_connect/connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
if(session_status() == PHP_SESSION_NONE || session_id() == ''){
session_start();
}

        $dbc = ConnectToDB();
        $userinfo = $_SESSION["userinfo"];
        $queryCreateAccount = "INSERT INTO tbl_users (`name`, surname, username, email, password) VALUES                  ('{$userinfo[0]}', '{$userinfo[1]}', '{$userinfo[2]}', '{$userinfo[3]}', '{password_hash($userinfo[5], PASSWORD_DEFAULT)}')";
        $dbc->query($queryCreateAccount);
        $_SESSION["message"] = "Account Created";
        $_SESSION["color"] = "GREEN";
        header("location: ../../index.php");
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
session_start();
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
}
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
            $_SESSION["message"] = "This is not a valid email!";
            $_SESSION["color"] = "RED";
            header("location: ../../index.php");
        }
        elseif($userinfo[3] === $userinfo[4])
        {
            if($userinfo[5] === $userinfo[6])
            {
                $containsLetter  = preg_match('/[a-zA-Z]/',    $userinfo[5]);
		$containsDigit   = preg_match('/\d/',          $userinfo[5]);
		$containsSpecial = preg_match('/[^a-zA-Z\d]/', $userinfo[5]);
		$containsAll = $containsLetter && $containsDigit && $containsSpecial;
		if($containsAll)
		{
			CheckIfAccountExistsAndCreateAccount();
		}
		else
		{
			$_SESSION["message"] = "The password needs at least 1 uppercase letter and 1 number!";
			$_SESSION["color"] = "RED";
			header("location: ../../index.php");
		}
            }
            else
            {
                $_SESSION["message"] = "The passwords you've filled in are not the same!";
                $_SESSION["color"] = "RED";
                header("location: ../../index.php");
            }
        }
        else
        {
            $_SESSION["message"] = "One of the emails you filled in is not the same!";
            $_SESSION["color"] = "RED";
            header("location: ../../index.php");
        }
    }
}

function CheckIfAccountExistsAndCreateAccount()
{
    $userinfo = CheckIfEverythingIsFilledIn();
    $dbc = ConnectToDB();
    $queryGetMail = "SELECT email, username FROM tbl_users WHERE email = '{$userinfo[3]}' OR username = '{$userinfo[2]}'";
    $data = $dbc->query($queryGetMail)->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($data) == 0)
    {
        $onderwerp = "test mail";
        $bericht = "LINK TO ACTIVE http://tts8.net16.net/entrance.php";
        $headers = 'From: kittens@space.com' . "\r\n" .
        'Reply-To: kittens@space.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($userinfo[3], $onderwerp, $bericht, $headers);
        $_SESSION["userinfo"] = $userinfo;
        $_SESSION["message"] = "You have received a verification email on the mail you provided!";
        $_SESSION["color"] = "GREEN";
        header("location: ../../index.php");
    }
    else
    {
        $_SESSION["message"] = "Account Exists";
        $_SESSION["color"] = "RED";
        header("location: ../../index.php");
    }
}