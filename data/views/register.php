<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WDPaI Project</title>
        <link rel="stylesheet" type="text/css" href="data/css/register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">
        <script type="text/javascript" src="data/js/validateRegistration.js"></script>

    </head>
    <body>
        <div class="gradient">
            
            <div class="banner">
                <h1> chuj </h1>
            </div>

            <div class="login"> 
                <form id="regForm" onsubmit="formValidation(event)" method="post">
                    <input id="nicknameInput" type="text" name="nickname" placeholder="Nickname" onfocus="this.placeholder=''" onblur="this.placeholder='Nickname'"></br>
                    <input id="emailInput" type="email" name="email" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'"></br>
                    <input id="passwordInput" type="password" name="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'"></br>
                    <input id="reEnterInput" type="password" name="reEnter" placeholder="Re-enter password" onfocus="this.placeholder=''" onblur="this.placeholder='Re-enter password'"></br>
                    <input id="registerButton" type="submit" value="Register">
                </form>
            </div>
    </div>
    </body>
</html>