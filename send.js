document.getElementById('messageInput').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
});

function sendMessage() {
    var message = document.querySelector(".message").value;
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const user = urlParams.get('users') || 0;
    
    if (message !== '') {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "send.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (this.status == 200) {
                document.querySelector(".message").value = '';

                setTimeout(function() {
                    var div = document.querySelector('.blockChat');
                    div.scrollTop = div.scrollHeight;
                }, 100);
            }
        };
        xhr.send("message=" + encodeURIComponent(message) + "&users=" + encodeURIComponent(users));
    } else {
        alert('Please enter a message.');
    }
}
