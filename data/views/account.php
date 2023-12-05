<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WDPaI Project</title>
    <link rel="stylesheet" type="text/css" href="data/css/account.css">
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
                if (isset($_SESSION["profilePicture"])) {
                    echo '<img id="profilePicture" src=' . $_SESSION["profilePicture"] . ' alt="Profile Picture">';
                } else {
                    echo '<img id="profilePicture" src="data/png/defaultProfilePicture.png" alt="Profile Picture">';
                }
                ?>
                <span class="editOverlay">edit</span>
            </label>
            <input type="submit" value="Save Profile Picture" onclick="uploadProfilePicture()">
        </form>

        <div class="menu">
            <form id="menuForm" method="get">
                <?php
                echo '<input id="nickname" type="submit" value=' . $_SESSION["nickname"] . '></input>';
                echo '<input id="email" type="submit" value=' . $_SESSION["email"] . '></input>';
                echo '<input id="password" onclick=openModal() type="submit" value=Password></input>';
                echo '<input id="saveChanges" type="submit" onclick="saveChanges()" value="Save Changes"></input>';
                echo '<input id="friends" type="submit" value="Manage Friends"></input>';
                echo '<input id="delete" type="submit" value="Delete account" formaction="deleteUser"></input>';
                echo '<input id="back" type="submit" value="Back" formaction="menu"></input>';
                ?>
            </form>
        </div>
    </div>

    <div id="passwordModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Change Password</h2>
            <input type="password" id="newPassword" placeholder="New Password" onfocus="this.placeholder=''" onblur="this.placeholder='New Password'">
            <input type="password" id="confirmPassword" placeholder="Re-enter Password" onfocus="this.placeholder=''" onblur="this.placeholder='Re-enter Password'"></br>
            <button onclick="savePassword()">Save</button>
        </div>
    </div>


</body>
<script src="data/js/accountActions.js"></script>

</html>