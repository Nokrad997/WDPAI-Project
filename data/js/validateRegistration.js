function formValidation(event) {
    var nickname = document.getElementById("nicknameInput").value;
    var email = document.getElementById("emailInput").value;
    var password = document.getElementById("passwordInput").value;
    var rePassword = document.getElementById("reEnterInput").value;
    var flag = true;
    var alerts = "";

    if (!validateNickname(nickname)) {
        flag = false;
        alerts += "Nickname is required." + "\n";
    }

    if (!validateEmail(email)) {
        alerts += "Email is not valid." + "\n";
        flag = false;
    }

    if (!validatePassword(password)) {
        alerts += "Password must be between 8 and 16 characters." + "\n";
        flag = false;
    }

    if (!checkIfPasswordsMatch(password, rePassword)) {
        alerts += "Passwords do not match." + "\n";
        flag = false;
    }

    if (!flag) {
        alert(alerts);
        event.preventDefault();
    }
}

function validateNickname(x) {
    return x.length > 0;
}

function validateEmail(x) {
    var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
    return emailRegex.test(x);
}

function validatePassword(x) {
    return x.length >= 8 && x.length <= 16;
}

function checkIfPasswordsMatch(x, y) {
    return x === y;
}