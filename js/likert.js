function buttonCheck() {
    if (document.querySelector('input[name="l1"]:checked').id[1] != '6' &&
        document.querySelector('input[name="l2"]:checked').id[1] != '6' &&
        document.querySelector('input[name="l3"]:checked').id[1] != '6' &&
        document.querySelector('input[name="d1"]:checked').id[1] != '6' &&
        document.querySelector('input[name="d2"]:checked').id[1] != '6' &&
        document.querySelector('input[name="d3"]:checked').id[1] != '6' )  {
        document.getElementById("likert").submit();
    }
}
