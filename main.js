// const containerElement = document.querySelector('.blockChat');
// containerElement.scrollTop = containerElement.scrollHeight;

// ajax for show message
// var url = './message.php';
// var xhr = new XMLHttpRequest();
// var output = document.querySelector('.blockChat');
// function handleResult() {
//     if(xhr.readyState === XMLHttpRequest.DONE) {
//         var div = document.getElementById("scrollable-div");
//         output.innerHTML = xhr.responseText;
//         div.scrollTop = div.scrollHeight;
//     }
// }

// setInterval(function() {
//     xhr.onreadystatechange = handleResult;
//     xhr.open('GET', url);
//     xhr.send();

    
// }, 1000);

var url = './message.php';
var xhr = new XMLHttpRequest();
var output = document.querySelector('.blockChat');
var div = document.querySelector('.blockChat');
var count = 0;
    
    function handleResult() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status >= 200 && xhr.status < 400) {
                output.innerHTML = xhr.responseText;
                if(count == 0) {
                    div.scrollTop = div.scrollHeight;
                    count++;
                }
        }
    }
}

setInterval(function() {
    xhr.onreadystatechange = handleResult;
    xhr.open('GET', url, true);
    xhr.send();
        
    
}, 100);