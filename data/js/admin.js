function changeNickname(id) {
  var nickname = prompt("Please enter new nickname");

  if (nickname != null && nickname != "") {
    var formData = new FormData();

    formData.append("id", id);
    formData.append("nickname", nickname);
    formData.append("email", 'null');

    fetch("adminUpdateUserCredenials", {
      method: "POST",
      body: formData,
      credentials: "include",
    })
      .then((response) => response.text())
      .then((data) => {
        console.log("Zmiany zostały zapisane na kontrolerze danych:", data);
        location.reload();
      })
      .catch((error) => {
        console.error("Błąd podczas zapisywania zmian:", error);
      });
  }
}

function changeEmail(id) {
  var email = prompt("Please enter new email");

  if (email != null) {
    if (validateEmail(email)) {
      var formData = new FormData();

      formData.append("id", id);
      formData.append("nickname", 'null');
      formData.append("email", email);

      fetch("adminUpdateUserCredenials", {
        method: "POST",
        body: formData,
        credentials: "include",
      })
        .then((response) => response.text())
        .then((data) => {
          console.log("Zmiany zostały zapisane na kontrolerze danych:", data);
          location.reload();
        })
        .catch((error) => {
          console.error("Błąd podczas zapisywania zmian:", error);
        });
    } else alert("Email format is not valid.");
  }
}

function deleteUser(id) {
  let deleteAccount = confirm(
    "Are you sure you want to delete this user account?"
  );

  if (deleteAccount) {
    var formData = new FormData();

    formData.append("id", id);

    fetch("adminDeleteUser", {
      method: "POST",
      body: formData,
      credentials: "include",
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
        // location.reload();
      })
      .catch((error) => {
        console.error("Błąd podczas zapisywania zmian:", error);
      });
  }
}

function validateEmail(x) {
  var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
  return emailRegex.test(x);
}
