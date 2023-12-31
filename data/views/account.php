<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WDPaI Project</title>
    <link rel="stylesheet" type="text/css" href="data/css/accountMobile.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="data/css/account.css">
    <link rel="stylesheet" type="text/css" href="data/css/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <div class="gradient">
        <form class="profilePicture" enctype="multipart/form-data">
            <label for="fileInput" class="profilePicture">
                <input type="file" id="fileInput" accept="image/*" style="display: none;">
                <?php
                if (isset($_SESSION["profilePicture"]) && file_exists("/app/" . $_SESSION["profilePicture"])) {
                    echo '<img id="profilePicture" src=' . $_SESSION["profilePicture"] . ' alt="Profile Picture">';
                } else {
                    echo '<img id="profilePicture" src="data/png/defaultProfilePicture.png" alt="Profile Picture">';
                }
                ?>
                <!-- <span class="editOverlay">edit</span> -->
            </label>
            <input type="submit" value="Save Profile Picture" onclick="uploadProfilePicture()">
        </form>

        <div class="menu">
            <?php
            echo '<input id="nickname" type="submit" value=' . $_SESSION["nickname"] . '></input>';
            echo '<input id="email" type="submit" value=' . $_SESSION["email"] . '></input>';
            echo '<input id="password" type="submit" value=Password></input>';
            echo '<input id="newPassword" placeholder="New Password" type="password" style="display: none;"></input>';
            echo '<input id="confirmPassword" placeholder="Confirm Password" type="password" style="display: none;"></input>';
            echo '<input id="saveChanges" type="submit" onclick="saveChanges()" value="Save Changes"></input>';
            echo '<input id="friends" type="submit" value="Manage Friends"></input>';
            echo '<form id="delete" method="get">';
            echo '<input id="delete" type="submit" value="Delete account" formaction="deleteUser"></input>';
            echo '</form>';
            echo '<input id="back" type="submit" value="Back"></input>';
            ?>
        </div>
    </div>

</body>
<script src="data/js/accountActions.js"></script>

</html>