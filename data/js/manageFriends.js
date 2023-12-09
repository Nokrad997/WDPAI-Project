document.getElementById("searchBtn").addEventListener("click", function () {
  userName = document.getElementById("search").value;

  if (userName != "") {
    const dataControllerEndpoint = "getUserByName";
    var formData = new FormData();

    formData.append("nickname", userName);

    fetch(dataControllerEndpoint, {
      method: "POST",
      body: formData,
      credentials: "include",
    })
      .then((response) => response.json())
      .then((data) => {
        fillSelect(data.users);
      })
      .catch((error) => {
        console.error("Błąd podczas zapisywania zmian:", error);
      });
  }
});

function fillSelect(data) {
  var select = document.getElementById("users");

  if (data) {
    select.innerHTML = "";
    for (var i = 0; i < data.length; i++) {
      var option = document.createElement("option");
      option.value = data[i].id;
      option.text = data[i].nickname + " " + data[i].email;
      select.appendChild(option);
    }
  }
}

function addFriend(userId) {
  friendId = document.getElementById("users").value;
  endpoint = 'addFriend'

  var formData = new FormData();

  formData.append("userId", userId);
  formData.append("friendId", friendId);

  fetch(endpoint, {
    method: "POST",
    body: formData,
    credentials: "include",
  })
    .then((response) => response.json())
    .then((data) => {
      fillSelect(data.users);
    })
    .catch((error) => {
      console.error("Błąd podczas zapisywania zmian:", error);
    });
}

function deleteFriend(userId, friendId) {
    endpoint = 'deleteFriend'
    
    var formData = new FormData();
    
    formData.append("userId", userId);
    formData.append("friendId", friendId);
    
    fetch(endpoint, {
        method: "POST",
        body: formData,
        credentials: "include",
    })
        .then((response) => response.json())
        .then((data) => {
        location.reload();
        })
        .catch((error) => {
        console.error("Błąd podczas zapisywania zmian:", error);
        });
}
