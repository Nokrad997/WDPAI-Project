<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>WDPaI Project</title>
    <link rel="stylesheet" type="text/css" href="data/css/mainPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <div class="gradient">
        <div class="banner">
            <h1> ChatFever </h1>
        </div>

        <div class="login">
            <form id="loginForm" method="post" action="login">
                <div style="margin-bottom: 5px">
                    <?php
                    if (isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>

                <input id="loginInput" type="text" name="login" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'"></br>
                <input id="passwordInput" type="password" name="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'"></br>

                <div class="logRegLayout">
                    <input id="registerButton" formaction="registerForm" type="submit" value="Register">
                    <input id="loginButton" type="submit" value="Login">
                </div>

            </form>
        </div>
    </div>
</body>
</html>