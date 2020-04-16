/***********************************************/
/************** Categorial Survey **************/
/***********************************************/

// Category function to be called once category.html page is fully loaded
function category() {

};

/***********************************************/
/**************** Likert Survey ****************/
/***********************************************/

// Likert function to be called once the likert.html page is fully loaded
function likert() {
	
	const LIKERT_QUESTIONS = 3;

	document.getElementById("questionA").innerHTML = "Question A";
	document.getElementById("questionB").innerHTML = "Question B";
	document.getElementById("questionC").innerHTML = "Question C";

	// Creates varaibles containing an array of its respective class
	var l1 = document.getElementsByClassName("l1");
	var l2 = document.getElementsByClassName("l2");
	var l3 = document.getElementsByClassName("l3");
	var l4 = document.getElementsByClassName("l4");
	var l5 = document.getElementsByClassName("l5");

	// Iterates through each likert class array and modifies each element to their appropriate values
	for(let i = 0; i <= LIKERT_QUESTIONS; i++) {
		// Question Labels
		l1[i].innerHTML = "Strongly Disagree";
		l2[i].innerHTML = "Disagree";
		l3[i].innerHTML = "Neutral";
		l4[i].innerHTML = "Agree";
		l5[i].innerHTML = "Strongly Agree";

		// Question Values
		l1[i].value = "strongly_disagree";
		l2[i].value = "disagree";
		l3[i].value = "neutral";
		l4[i].value = "agree";
		l5[i].value = "strongly_agree";
	}

};

/***********************************************/
/**************** Rating Survey ****************/
/***********************************************/

// Rating function to be called once rating.html page is fully loaded
function rating() {

	const MAX_RATING = 10;

	document.getElementById("rating").innerHTML = "How would you rate this project from 1-10?";
	
	// TO DO: Modify this loop?
	for(let i = 0; i < MAX_RATING; i++)
	{
		document.getElementById("rate" + (i + 1)).innerHTML = (i + 1);
		document.getElementById("rate" + (i + 1)).value = "rate" + (i + 1);
	}
};

/***********************************************/
/*************** Freeform Survey ***************/
/***********************************************/

// Freeform function to be called once freeform.html page is fully loaded
function freeform() {
	document.getElementById("ff1").innerHTML = "Freeform Question 1";
	document.getElementById("ff2").innerHTML = "Freeform Question 2";
};

// TO DO:``
// - Create a functions that runs the appropriate functions once the given html page is loaded
