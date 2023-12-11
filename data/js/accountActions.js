document.getElementById("nickname").addEventListener("click", changeNickname);
document.getElementById("email").addEventListener("click", changeEmail);
document
  .getElementById("password")
  .addEventListener("click", openPasswordModal);
document.getElementById("delete").addEventListener("click", deleteAccount);
document.getElementById("back").addEventListener("click", back);
document.getElementById("friends").addEventListener("click", friends);

document.getElementById("fileInput").addEventListener("change", function () {
  var file = this.files[0];
  var reader = new FileReader();
  reader.addEventListener(
    "load",
    function () {
      changes.profilePicture = file;
      document.getElementById("profilePicture").src = reader.result;
    },
    false
  );
  if (file) {
    reader.readAsDataURL(file);
  }

  updateSaveButtonVisibility();
});

function friends() {
  window.location.href = "manageFriends";
}

function back() {
  window.location.href='menu'
}

var changes = {
  nickname: null,
  email: null,
  password: null,
  profilePicture: null,
};

function changeNickname(event) {
  changes.nickname = prompt("Please enter your new nickname");

  if (changes.nickname != null && changes.nickname != "") {
    document.getElementById("nickname").value = changes.nickname;
    updateSaveButtonVisibility();
  }
}

function changeEmail(event) {
  changes.email = prompt("Please enter your new email");

  if (changes.email != null) {
    if (validateEmail(changes.email)) {
      document.getElementById("email").value = changes.email;
      updateSaveButtonVisibility();
    } else alert("Email format is not valid.");
  }
}

function openPasswordModal(event) {
  openModal();
}

function deleteAccount(event) {
  let deleteAccount = confirm("Are you sure you want to delete your account?");

  if (!deleteAccount) {
    event.preventDefault();
  }
}

function validateEmail(x) {
  var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
  return emailRegex.test(x);
}

function openModal() {
  document.getElementById("passwordModal").style.display = "block";
}

function closeModal() {
  document.getElementById("passwordModal").style.display = "none";
}

function savePassword() {
  var newPassword = document.getElementById("newPassword").value;
  var rePassword = document.getElementById("confirmPassword").value;

  if (!validatePassword(newPassword)) {
    alert("Password must be between 8 and 16 characters.");
    return;
  }

  if (!checkIfPasswordsMatch(newPassword, rePassword)) {
    alert("Passwords do not match.");
    return;
  }

  changes.password = newPassword;
  updateSaveButtonVisibility();
  closeModal();
}

function validatePassword(x) {
  return x.length >= 8 && x.length <= 16;
}

function checkIfPasswordsMatch(x, y) {
  return x === y;
}

function updateSaveButtonVisibility() {
  document.getElementById("saveChanges").style.display = "block";
}

function resetChanges() {
  changes = {
    nickname: null,
    email: null,
    password: null,
    profilePicture: null,
  };
}

function saveChanges() {
  const dataControllerEndpoint = "updateUser";
  var formData = new FormData();

  formData.append("nickname", changes.nickname);
  formData.append("email", changes.email);
  formData.append("password", changes.password);
  formData.append("profilePicture", changes.profilePicture);

  fetch(dataControllerEndpoint, {
    method: "POST",
    body: formData,
    credentials: "include",
  })
    .then((response) => response.text())
    .then((data) => {
      console.log("Zmiany zostały zapisane na kontrolerze danych:", data);
      resetChanges();
      location.reload();
    })
    .catch((error) => {
      console.error("Błąd podczas zapisywania zmian:", error);
    });
}
