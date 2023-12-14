<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WDPaI Project</title>
    <link rel="stylesheet" type="text/css" href="data/css/friendsMobile.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="data/css/friends.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">

</head>

<body>
    <div class="gradient">

        <div class="banner">
            <h1> Friends </h1>
        </div>
        <div class="friendsMenu">
            <div id="friendPanel">
                <h3> Friends </h4>
                <?php
                require_once __DIR__ . "/../../src/repositories/FriendsRepository.php";
                require_once __DIR__ . "/../../src/repositories/UserRepository.php";
                require_once __DIR__ . "/../../src/repositories/ProfilePictureRepository.php";

                $userRepo = new UserRepository();
                $friendsRepo = new FriendsRepository();
                $profilePictureRepo = new ProfilePictureRepository();
                

                $friends = $friendsRepo->getFriends($_SESSION["id"]);
                if ($friends != null) {
                    foreach ($friends as $friend) {
                        if ($friend["status"] == "pending")
                            continue;
                        if ($friend["user_id"] == $_SESSION["id"])
                            $friendData = $userRepo->getUserById($friend["friend_user_id"]);
                        else
                            $friendData = $userRepo->getUserById($friend["user_id"]);

                        echo '<div class="friend" onClick="redirectToChat(' . $friendData->getId() . ')">';
                        if($profilePictureRepo->getProfilePicture($friendData->getId()) != null)
                            echo '<img class="friendImg" src="' . $profilePictureRepo->getProfilePicture($friendData->getId())->getPath() . '">';
                        else
                            echo '<img class="friendImg" src="data/png/defaultProfilePicture.png">';
                        echo '<p class="friendPar">' . $friendData->getEmail() . '</p>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="back">
            <input id="backBtn" value="Back" type="submit" onclick="window.location.href='menu'">
        </div>

    </div>
</body>
    <script src="data/js/friends.js"></script>
</html>