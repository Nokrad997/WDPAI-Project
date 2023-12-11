function redirectToChat(id) {
  endpoint = "openChatWith";

  var formData = new FormData();

  formData.append("friendId", id);

  fetch(endpoint, {
    method: "POST",
    body: formData,
    credentials: "include",
  })
    .then((response) => response.json())
    .then((data) => {
      window.location.href = data.url;
    })
    .catch((error) => {
      console.error("Błąd podczas otwierania okna czatu:", error);
    });
}