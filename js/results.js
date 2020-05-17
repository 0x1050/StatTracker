
window.onload = function() {
    main();
}


function getCoordinatesForPercent(percent) {
    const x = Math.cos(2 * Math.PI * percent);
    const y = Math.sin(2 * Math.PI * percent);
    return [x, y];
}

function createBarChart(s) {
    const sagree = s.SAgree / total * 100;
    const agree = s.Agree / total * 100;
    const neutral = s.Neutral / total * 100;
    const dagree = s.Disagree / total * 100;
    const sdagree = s.SDisAgree / total * 100;
    console.log("comment: " + dagree);
    chart = "<svg class='bars' height='100' width='100' >";
        chart += "<rect width='14' height='" + sagree  + "' fill='#5b9' y='" + (100 - sagree) + "' x='3'  />"
        chart += "<rect width='14' height='" + agree   + "' fill='#5b9' y='" + (100 - agree)   + "' x='23' />"
        chart += "<rect width='14' height='" + neutral + "' fill='#5b9' y='" + (100 - neutral) + "' x='43' />"
        chart += "<rect width='14' height='" + dagree  + "' fill='#5b9' y='" + (100 - dagree)  + "' x='63' />"
        chart += "<rect width='14' height='" + sdagree + "' fill='#5b9' y='" + (100 - sdagree) + "' x='83' />"

    chart += "</svg>";

    return chart;
}

function main() {
//    createPieChart(dlikes);
//    createBarChart(A1);
//    createBarChart(A2);
//    createBarChart(A3);
//    createBarChart(B1);
//    createBarChart(B2);
//    createBarChart(B3);
//    createBarChart(C1);
//    createBarChart(C2);
//    createBarChart(C3);
//    createBarChart(Q10);
//    createBarChart(Q11);
//    createBarChart(Q12);
//    createBarChart(Q13);
//    createBarChart(Q14);
//    createBarChart(Q15);
//    createScale(scale);
    document.getElementById("form").innerHTML = "<div class='charts'>";
//    document.getElementById("form").innerHTML += "<svg class='pieA' viewbox='-1 -1 2 2' transform:rotate(-90deg)>";
//    document.getElementById("form").innerHTML += createPieChart(likes, 'A');
//    document.getElementById("form").innerHTML += createPieChart(dlikes);
    document.getElementById("form").innerHTML += createBarChart(A1);
    document.getElementById("form").innerHTML += createBarChart(A2);
    document.getElementById("form").innerHTML += createBarChart(A3) + "<br>";
    document.getElementById("form").innerHTML += createBarChart(B1);
    document.getElementById("form").innerHTML += createBarChart(B2);
    document.getElementById("form").innerHTML += createBarChart(B3) + "<br>";
    document.getElementById("form").innerHTML += createBarChart(C1);
    document.getElementById("form").innerHTML += createBarChart(C2);
    document.getElementById("form").innerHTML += createBarChart(C3) + "<br>";
    document.getElementById("form").innerHTML += createBarChart(Q10);
    document.getElementById("form").innerHTML += createBarChart(Q11);
    document.getElementById("form").innerHTML += createBarChart(Q12) + "<br>";
    document.getElementById("form").innerHTML += createBarChart(Q13);
    document.getElementById("form").innerHTML += createBarChart(Q14);
    document.getElementById("form").innerHTML += createBarChart(Q15) + "<br>";
    document.getElementById("form").innerHTML += "</div>";


}
