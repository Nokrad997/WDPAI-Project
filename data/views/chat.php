<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WDPaI Project</title>
    <link rel="stylesheet" type="text/css" href="data/css/chat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">

</head>

<body>
    <div class="gradient">

        <div class="banner">
                <?php
                require_once __DIR__ . "/../../src/repositories/UserRepository.php";
                $userRepo = new UserRepository();
                $user = $userRepo->getUserById($_SESSION["chatWith"]);

                echo '<h1> Chat with ' . $user->getNickname() . '</h1>';
                ?>
        </div>
        <div class="friendsChat">
            <div id="friendPanel">

            </div>
        </div>
        <div class="stupka">
            <?php
                echo '<p id="chatWithId" hidden>' . $_SESSION["chatWith"] . '</p>';
                echo '<p id="userId" hidden>' . $_SESSION["id"] . '</p>';
            ?>
            <input id="backBtn" value="Back" type="submit" onclick="window.location.href='friends'">
            <input id="textInput" type="text" placeholder="Type your message here...">
        </div>

    </div>
</body>
    <script src="data/js/chat.js"></script>
</html>