var left = null;
var right = null;

function uncheck(bid) {
    document.getElementById(bid).checked = false;
}
function check(side) {
    if (left != right && left != null && right != null)
        document.getElementById("categories").submit();
    else
        side == 'l' ? right = null : left = null;
}

