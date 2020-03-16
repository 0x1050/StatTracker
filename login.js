function check(txt) {
    if (username.value != '' &&
        pass.value.length >= 1) {
        document.getElementById("submit").disabled  = false;
    }
    else {
        document.getElementById("submit").disabled = true;
    }
}
