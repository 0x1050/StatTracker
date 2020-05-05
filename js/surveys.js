// The categories remain the same, they can be hard-coded
// Change likert questions values (ascending/descending) depending on users direction
function checkDirection(userID) {

    // Stores likert values into array variables
    var likert1 = document.getElementsByClassName("likert1");
    var likert2 = document.getElementsByClassName("likert2");
    var likert3 = document.getElementsByClassName("likert3");
    var likert4 = document.getElementsByClassName("likert4");
    var likert5 = document.getElementsByClassName("likert5");
    var likert6 = document.getElementsByClassName("likert6");

    minVal = 1;
    maxVal = 5;

    for(var i = 0; i < maxVal; i++) {

        if((userID % 2) === 0) {
            likert1[i].value = i + minVal;
            likert2[i].value = i + minVal;
            likert3[i].value = i + minVal;
            likert4[i].value = i + minVal;
            likert5[i].value = i + minVal;
        } else {
            likert1[i].value = maxVal - i;
            likert2[i].value = maxVal - i;
            likert3[i].value = maxVal - i;
            likert4[i].value = maxVal - i;
            likert5[i].value = maxVal - i;
        }
    }
}

// Serve appropriate likert questions given the users category answers
function checkCategory(like, dislike) {

    // Stores likertliked elements into variables
    var liked1 = document.getElementById("likertliked1");
    var liked2 = document.getElementById("likertliked2");
    var liked3 = document.getElementById("likertliked3");

    // Stores likertdisliked elements into variables
    var disliked1 = document.getElementById("likertdisliked1");
    var disliked2 = document.getElementById("likertdisliked2");
    var disliked3 = document.getElementById("likertdisliked3");

    // Stores likert labels into array variables
    var l1 = document.getElementsByClassName("l1");
    var l2 = document.getElementsByClassName("l2");
    var l3 = document.getElementsByClassName("l3");
    var l4 = document.getElementsByClassName("l4");
    var l5 = document.getElementsByClassName("l5");
    var l6 = document.getElementsByClassName("l6");

    if(like === 'A') {
        // Serve User Like A Likert Question
        liked1.innerHTML = "Like A1";
        liked2.innerHTML = "Like A2";
        liked3.innerHTML = "Like A3";

    } else if(like === 'B') {
        // Serve User Like B Likert Question
        liked1.innerHTML = "Like B1";
        liked2.innerHTML = "Like B2";
        liked3.innerHTML = "Like B3";
    } else if(like === 'C') {
        // Serve User Like C Likert Question
        liked1.innerHTML = "Like C1";
        liked2.innerHTML = "Like C2";
        liked3.innerHTML = "Like C3";
    }

    if(dislike === 'A') {
        // Serve User Disike A Likert Question
        disliked1.innerHTML = "Dislike A1";
        disliked2.innerHTML = "Dislike A2";
        disliked3.innerHTML = "Dislike A3";
    } else if(dislike === 'B') {
        // Serve User Dislike B Likert Question
        disliked1.innerHTML = "Dislike B1";
        disliked2.innerHTML = "Dislike B2";
        disliked3.innerHTML = "Dislike B3";
    } else if(dislike === 'C') {
        // Serve User Disike C Likert Question
        disliked1.innerHTML = "Dislike C1";
        disliked2.innerHTML = "Dislike C2";
        disliked3.innerHTML = "Dislike C3";
    }
}

// Disable opposite radio buttons for Category Questions
function disableInput(liked, disliked) {

	// Function to re-enable radio buttons
	(function enable() {
		document.getElementById("liked1").disabled = false;
		document.getElementById("liked2").disabled = false;
		document.getElementById("liked3").disabled = false;
		document.getElementById("disliked1").disabled = false;
		document.getElementById("disliked2").disabled = false;
		document.getElementById("disliked3").disabled = false;
	})();

	// Condition statements to disable and uncheck opposite radio buttons
	if(liked == 'A') {
		(function disable() {
			document.getElementById("disliked1").disabled = true;
			document.getElementById("disliked1").checked = false;
		})();
	} else if(liked == 'B') {
		(function disable() {
			document.getElementById("disliked2").disabled = true;
			document.getElementById("disliked2").checked = false;
		})();
	} else if(liked == 'C') {
		(function disable() {
			document.getElementById("disliked3").disabled = true;
			document.getElementById("disliked3").checked = false;
		})();
	}

	if(disliked == 'A') {
		(function disable() {
			document.getElementById("liked1").disabled = true;
			document.getElementById("liked1").checked = false;
		})();
	} else if(disliked == 'B') {
		(function disable() {
			document.getElementById("liked2").disabled = true;
			document.getElementById("liked2").checked = false;
		})();
	} else if(disliked == 'C') {
		(function disable() {
			document.getElementById("liked3").disabled = true;
			document.getElementById("liked3").checked = false;
		})();
	}
}
