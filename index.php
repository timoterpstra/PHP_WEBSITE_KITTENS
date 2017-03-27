<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <?php
    $login = false;
    if (isset($_SESSION["loggedin"]))
    {
        $login = $_SESSION["loggedin"];
    }
    ?>
    <title>kitten-race</title>
</head>
<body>
<div class="wrapper">
    <header class="bg-color-content row-spaced row-center column-center">
        <img src="img/logo.png" alt="logo kittens">
        <h1><span>kittens the </span>g<span>ame</span></h1>
    </header>
    <div class="content">
        <div class="appdisplay bg-color-content">


            <h3>The Game:</h3>
            <p>The game is a gambeling game where you can put gamble on a kitten. If the kitten that you gambled for wins you earn twice ammount of money you betted on the kitten.</p>
            <h3>Rules:</h3>
            <li>*1* -- HAVE FUN!</li>
            <li>*2* -- Minimal bet = 5 maximum bet = 15</li>
            <li>*3* -- Not more then 1 bets at the time</li>
            <li>*4* -- The maximum you can win is 1,000,000 otherwise we are broke.</li>
            <h3>How to download:</h3>
            <p>The way to download the game is very easy. First login. (If you don't have a account you can register on the right side.) When you are logged in a download button will appear. Click the download buttton and you receive a .zip file extract it and run Kittenrace.exe</p>

            <video width="400" controls>
                <source src="trailor/Untitled%20Project.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>

            <?php
            if ($login)
            {
                echo "
                    <div class=\"row-center\">
                    <a href=\"php/download/test.zip\"><h2 class=\"download row-center\">Download</h2></a>
                    </div>
                ";
            }
            ?>
        </div>
        <div class="loginandregisterdisplay bg-color-content">
            <div class="loginsysteem">
                <?php
                if(isset($_SESSION["message1"]) && isset($_SESSION["color"]))
                {
                    echo "<span style='color:" .  $_SESSION["color"] . "'><u>" . urldecode($_SESSION["message1"]) . "</u></span>";
                }
                ?>
                <h3>Login</h3>
                <form action="php/login/login.php" method="post">
                    <div class="row-spaced">
                        <label class="label" for="usernameoremail">Username Or E-mail: </label>
                        <input class="input" name="usernameoremail" type="text" id="usernameoremail">
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="password">Password: </label>
                        <input class="input" name="password" type="text" id="password">
                    </div>
                    <input class="input input-button" type="submit" name="login" value="Login">
                </form>
            </div>
            <div class="registreersysteem">
                <?php
                    if(isset($_SESSION["message"]) && isset($_SESSION["color"]))
                    {
                        echo "<span style='color:" .  $_SESSION["color"] . "'><u>" . urldecode($_SESSION["message"]) . "</u></span>";
                    }
                ?>
                <h3>Register</h3>
                <form action="php/login/Register.php" method="post">
                    <div class="row-spaced">
                        <label class="label" for="name">Name: </label>
                        <input class="input" name="name" type="text" id="name" required>
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="surname">Surname: </label>
                        <input class="input" name="surname" type="text" id="surname" required>
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="username">Username: </label>
                        <input class="input" name="username" type="text" id="username" required>
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="email">E-mail: </label>
                        <input class="input" name="email" type="text" id="email" required>
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="retype-email">Retype e-mail: </label>
                        <input class="input" name="retype-email" type="text" id="retype-email" required>
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="password">Password: </label>
                        <input class="input" name="password" type="text" id="password" required>
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="retype-password">Retype password: </label>
                        <input class="input" name="retype-password" type="text" id="retype-password" required>
                    </div>
                    <input class="input input-button" type="submit" name="register" value="register">
                </form>
            </div>
        </div>
    </div>
    <footer class="bg-color-content row-spaced"></footer>
</div>
</body>
</html>

<?php
    session_destroy();
?>