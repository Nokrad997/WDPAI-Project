document
  .getElementById("textInput")
  .addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();

      var message = document.getElementById("textInput").value;
      var targetUserId = document.getElementById("chatWithId").innerHTML;
      if (message.trim() !== "") {
        var data = {
          type: "message",
          target: targetUserId,
          content: message,
        };

        conn.send(JSON.stringify(data));
        document.getElementById("textInput").value = "";
      }
    }
  });

document.getElementById("backBtn").addEventListener("click", function (event) {
  conn.close();
});

var conn = new WebSocket("ws://localhost:8080");
conn.onmessage = function (e) {
  console.log(e.data);
};

conn.onopen = function (e) {
  console.log("Connection established!");
  var data = {
    type: "auth",
    id: document.getElementById("userId").innerHTML,
  };

  conn.send(JSON.stringify(data));
};
