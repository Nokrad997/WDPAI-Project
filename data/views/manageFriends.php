<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WDPaI Project</title>
    <link rel="stylesheet" type="text/css" href="data/css/manageFriends.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">

</head>

<body>
    <div class="gradient">

        <div class="banner">
            <h1> Manage Friends </h1>
        </div>
        <div class="managamentMenu">
            <div class="AddFriendMenu">
                <div class="friendSearch">
                    <input id="search" type="text" placeholder="Username" onfocus="this.placeholder=''" onblur="this.placeholder='Username'">
                    <input id="searchBtn" type="submit" value="Search"></input>
                </div>
                <select id="users">
                    <?php
                    require_once __DIR__ . "/../../src/repositories/UserRepository.php";

                    $userRepo = new UserRepository();
                    $users = $userRepo->getUsers();

                    foreach ($users as $user) {
                        echo '<option class="hidden" value=' . $user['id'] . '>' . $user['nickname'] . "   " . $user["email"]  . '</option>';
                    }
                    ?>
                </select>
                <?php
                echo '<input id="addFriendBtn" value="Add Friend" type="submit" onclick="addFriend(' . $_SESSION["id"] . ')">';
                ?>
            </div>
            <div class="friendManagement">
                <div id="friendPanel">
                    <h4> Friends </h4>
                    <?php
                    require_once __DIR__ . "/../../src/repositories/FriendsRepository.php";
                    require_once __DIR__ . "/../../src/repositories/UserRepository.php";

                    $userRepo = new UserRepository();
                    $friendsRepo = new FriendsRepository();

                    $friends = $friendsRepo->getFriends($_SESSION["id"]);
                    if ($friends != null) {
                        foreach ($friends as $friend) {
                            if ($friend["user_id"] == $_SESSION["id"])
                                $friendData = $userRepo->getUserById($friend["friend_user_id"]);
                            else
                                $friendData = $userRepo->getUserById($friend["user_id"]);
                            echo '<div class="friend">';
                            echo '<p class="friendPar">' . $friendData->getEmail() . '</p>';
                            echo '<input class="deleteFriendBtn" value="Del" type="submit" onclick="deleteFriend(' . $_SESSION['id'] . ", " . $friendData->getId() . ')">';
                            echo '</div>';
                        }
                    }
                    ?>

                    <h4> Invites </h4>
                </div>
            </div>
        </div>

    </div>
</body>

<script src="data/js/manageFriends.js"></script>

</html>