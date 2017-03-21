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
    if (isset($_POST['loggedin']))
    {
        $login = $_POST['loggedin'];
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
            <h3>The Game</h3>
            <p>the game is a kittens race where you can put money on a kitten.</p>
            <h3>Rules</h3>
            <li>*1* -- text</li>
            <li>*2* -- text</li>
            <li>*3* -- text</li>
            <h3>How to download</h3>
            <p>the way to download is very easy. first login and if jou are logind dan you kan press te downlaud butten en alles zal van zelf gaan.</p>
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
                <h3>Register</h3>
                <form action="php/login/register.php" method="post">
                    <div class="row-spaced">
                        <label class="label" for="name">Name: </label>
                        <input class="input" name="name" type="text" id="name">
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="surname">Surname: </label>
                        <input class="input" name="surname" type="text" id="surname">
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="username">Username: </label>
                        <input class="input" name="username" type="text" id="username">
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="email">E-mail: </label>
                        <input class="input" name="email" type="email" id="email">
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="retype-email">Retype e-mail: </label>
                        <input class="input" name="retype-email" type="email" id="retype-email">
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="password">Password: </label>
                        <input class="input" name="password" type="text" id="password">
                    </div>
                    <div class="row-spaced">
                        <label class="label" for="retype-password">Retype password: </label>
                        <input class="input" name="retype-password" type="text" id="retype-password">
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