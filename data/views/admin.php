<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WDPaI Project</title>
    <link rel="stylesheet" type="text/css" href="data/css/adminMobile.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="data/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">

</head>

<body>
    <div class="gradient">

        <div class="banner">
            <h1> Admin Panel </h1>
        </div>

        <div class="menu">
            <div id="users">
                <?php
                require_once __DIR__ . "/../../src/repositories/UserRepository.php";

                $userRepo = new UserRepository();
                $users = $userRepo->getUsers();

                if ($users != null ) {
                    foreach ($users as $user) {
                        echo '<div class="user">';
                        echo '<p class="userId" value=' . $user['id'] . '>' . $user['id'] . '</p>';
                        echo '<p class="userEmail" onclick="changeEmail(' . $user['id'] . ')">' . $user["email"]  . '</p>';
                        echo '<p class="userNickname" onclick="changeNickname(' . $user['id'] . ')">' . $user['nickname'] . '</p>';
                        echo '<input class="deleteUser" type="submit" value="Delete" onclick="deleteUser(' . $user['id'] . ')">';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <form>
                <input class="logout" type="submit" value="Logout" formaction="logout">
            </form>
        </div>
    </div>
    <script src="data/js/admin.js"></script>
</body>

</html>