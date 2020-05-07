function checkIfPassMatch(txt) {
    if (username != '' &&
        email != '' &&
        group != '' &&
        !isNaN(group.value) &&
        group.value < 8 &&
        group.value > 0 &&
        pass1.value == pass2.value &&
        pass1.value.length <= 8
        ) {
        document.getElementById("submit").disabled = false;
    }
    else {
        document.getElementById("submit").disabled = true;
    }
}

function resetCheck(txt) {
    if (username != '' &&
        email  != '' &&
        pass1.value == pass2.value &&
        pass1.value.length >= 8
       )
        document.getElementById("submit").disabled = false;
    else
        document.getElementById("submit").disabled = true;
}

//-----------------------------------------------------AJAX
function loadFragment(url, element) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.send();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            element.innerHTML = xhr.responseText;
            return 0;
        }
    }
}
