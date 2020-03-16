function check(txt) {
    if (username.value != '' &&
        group.value != '' &&
        email.value != '' &&
        pass1.value != '' &&
        pass2.value != '' &&
        pass1.value == pass2.value &&
        pass1.value.length >= 8) {
        document.getElementById("submit").disabled  = false;
    }
    else {
        document.getElementById("submit").disabled = true;
    }
}
