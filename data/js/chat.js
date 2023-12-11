document
  .getElementById("textInput")
  .addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();

      var message = document.getElementById("textInput").value;
      var targetUserId = document.getElementById("chatWithId").innerHTML;
      var sender_id = document.getElementById("userId").innerHTML;

      if (message.trim() !== "") {
        var data = {
          type: "message",
          sender: sender_id,
          target: targetUserId,
          content: message,
        };

        conn.send(JSON.stringify(data));
        document.getElementById("textInput").value = "";

        var formData = new FormData();

        formData.append("id", sender_id);
        formData.append("chatWith", targetUserId);
        formData.append("content", message);

        fetch("saveMessage", {
          method: "POST",
          body: formData,
          credentials: "include",
        })
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
          })
          .catch((error) => {
            console.error("Błąd podczas zapisywania wiadomości:", error);
          });

        var messageDiv = document.createElement("div");
        messageDiv.className = "myMessageBox";
        var messageContent = document.createElement("p");
        messageContent.className = "myMessage";
        messageContent.innerHTML = message;
        messageDiv.appendChild(messageContent);
        document.getElementById("friendPanel").appendChild(messageDiv);
        document.getElementById("friendPanel").scrollTop =
          document.getElementById("friendPanel").scrollHeight;
      }
    }
  });

document.getElementById("backBtn").addEventListener("click", function (event) {
  conn.close();
});

var conn = new WebSocket("ws://localhost:8080");
conn.onmessage = function (e) {
  console.log(e.data);

  var data = JSON.parse(e.data);

  if (data.sender == document.getElementById("chatWithId").innerHTML) {
    var messageDiv = document.createElement("div");
    messageDiv.className = "friendMessageBox";
    var messageContent = document.createElement("p");
    messageContent.className = "friendMessage";
    messageContent.innerHTML = data.content;
    messageDiv.appendChild(messageContent);
    document.getElementById("friendPanel").appendChild(messageDiv);
    document.getElementById("friendPanel").scrollTop =
    document.getElementById("friendPanel").scrollHeight;
  }
};

conn.onopen = function (e) {
  console.log("Connection established!");
  var data = {
    type: "auth",
    id: document.getElementById("userId").innerHTML,
  };

  conn.send(JSON.stringify(data));
};
