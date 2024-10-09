<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with me</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div id="main">
        <div id="main_container">
            <div class="container">
                <h1>CHAT WITH ME</h1>
                <div class="blockChat">
                </div>
                <div class="messInput">
                    <input type="text" id="messageInput" name="message" class="message">
                    <button onclick="sendMessage()" name="send" id="sendButton">Send</button>
                </div>
            </div>
        </div>
    </div>
    <div id="chat"></div>
    <script src="./main.js"></script>
    <script src="./send.js"></script>
</body>
</html>