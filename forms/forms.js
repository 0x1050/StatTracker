window.onload = function() {
    loadFragment("forms/input.html");
}

function loadFragment(url) {
    //Create request and select form div
    var xhr = new XMLHttpRequest();
    var form = document.getElementById('form');
    //Set request, send it
    xhr.open("GET", url, true);
    xhr.send();
    //Handle request
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            form.innerHTML = xhr.responseText;
        }
    }
}


