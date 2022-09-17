/**
* Author: Dat Tien Pham
* Target: quiz.php
* Purpose: Check quiz answer and marking the score 
*/

(function () {
    'use strict';
}());

// this function used for check question 3 has answered or not //
function option_checked_question() {  
    // var option = document.getElementById("ques_3").value; // declare variable for the option user choose //
    // if (option == "") { // if the user dont select the answer //
    //     alert("You have to answer question 3"); // pop up the alert //
    //     return false; // return false to function //
    // }
    // else {
    //     return true; // if user answerd --> return true to function // 
    // }
    return true;
}

// this function used for check at least 1 question has been answerd for question 1 //
function checkbox_checked_question() { 
    // var Developing = document.getElementById("Developing").checked; // Declare variable for the question 1 (4 multiple choices) //
    // var Storing = document.getElementById('Storing').checked; // Declare variable for the question 1 (4 multiple choices) //
    // var Defining = document.getElementById('Defining').checked; // Declare variable for the question 1 (4 multiple choices) // 
    // var Computing = document.getElementById('Computing').checked; // Declare variable for the question 1 (4 multiple choices) //

	// if (!(Developing || Storing || Defining || Computing)) { // if users dont choose any answer //
    //     alert("You have to answer question 1"); // pop up an alert //
    //     return false; // return false if user dont choose any answer //
    // }
    // else {
    //     return true; // otherwise return true // 
    // }
    return true;
}

// this function used for check question 5 has answered or not // 
function number_checked_question() {  
    // var answer = document.getElementById("ques_5").value; // Declare variable for the question 5 //
    // if (answer == "") { // If user dont answer //
    //     alert("You have to answer question 5"); // notify //
    //     return false; // return false if user dont choose //
    // }
    // else {
    //     return true; // otherwise return true //
    // }
    return true;
}

// this is input for question 1 // 
function multiple_choice_ques(mult_Developing, mult_Storing, mult_Defining, mult_Computing) {
    var mult_ques = "";
    if (mult_Developing) {mult_ques = "Developing";}
    if (mult_Developing && mult_Storing){mult_ques += ", Storing";} 
    else if (!mult_Developing && mult_Storing) {mult_ques = "Storing";}
    if ((mult_Developing || mult_Storing) && mult_Defining) {mult_ques += ", Defining";} 
    else if (!mult_Developing && !mult_Storing && mult_Defining) {mult_ques = "Defining";}
    if ((mult_Developing || mult_Storing || mult_Defining) && mult_Computing) {mult_ques += ", Computing";} 
    else if (!mult_Developing && !mult_Storing && !mult_Defining && mult_Computing) {mult_ques = "Computing";}
    return mult_ques;
}

// this function is for storing user information //
function storing_user_information(id, givenname, familyname, email, score, attempt) {
    sessionStorage.id = id; // storing student id //
    sessionStorage.givenname = givenname; // storing student given name //
    sessionStorage.familyname = familyname; // storing student family name //
	sessionStorage.email = email; // storing student email //
	sessionStorage.score = score; // storing student score //
    sessionStorage.attempt = attempt; // storing student attempt's number //
}

// this function is for take information from the user //
function getting_information() {
	// 5 lines of code below will be save into result page //
	document.getElementById("givenname").value = sessionStorage.givenname;
	document.getElementById("familyname").value = sessionStorage.familyname;
	document.getElementById("id").value = sessionStorage.id;
	document.getElementById("score").value = sessionStorage.score;
	document.getElementById("attempt").value = sessionStorage.attempt;

    // 4 lines of code below will be displayed on the result page on result.html //
	document.getElementById("full_name").textContent = sessionStorage.givenname + " " + sessionStorage.familyname; 
	document.getElementById("submit_id").textContent = sessionStorage.id;
	document.getElementById("final_score").textContent = sessionStorage.score;
	document.getElementById("total_attempts").textContent = sessionStorage.attempt;

	if (sessionStorage.attempt == 2) { // requirements of this assignment is 2 attemps maximum //
		var take_again = document.getElementById("retake"); // Try again //
		take_again.parentNode.removeChild(take_again);
	}
}

function validate() { 
    var checkbox = checkbox_checked_question();
    var option = option_checked_question();
    var answer_5 = number_checked_question();

    var score = 0;
    var id = document.getElementById("id").value;
    var email = document.getElementById("email").value;
    var givenname = document.getElementById("givenname").value;
    var familyname = document.getElementById("familyname").value;

    // var attempt_number = 0;
    // var result = true;
    // var ans_2;
    // var ans_3 = document.getElementById("ques_3").value;
    // var ans_4 = document.getElementById("ques_4").value;
    // var ans_5 = document.getElementById("ques_5").value;

    // var Extension = document.getElementById("Extension").checked;
    // var Extensible = document.getElementById("Extensible").checked;
    // var Electrical = document.getElementById("Electrical").checked;
    // var mult_Developing = document.getElementById("Developing").checked;
    // var mult_Storing = document.getElementById("Storing").checked;
    // var mult_Defining = document.getElementById("Defining").checked;
    // var mult_Computing = document.getElementById("Computing").checked;

    // var mult_ques = multiple_choice_ques(mult_Developing, mult_Storing, mult_Defining, mult_Computing);

    // if (checkbox == true && option == true && answer_5 == true){
		// if (sessionStorage.attempt_number == null) {
        //     attempt_number = 0;
        // } else {
        //     attempt_number = Number(sessionStorage.attempt_number);
        // }
        // if (attempt_number <= 1) {
        //     if (ans_4 == "synthetic speech") score += 1;
        //     if (Extension){
		// 		ans_2 = "Extension";
        //         score += 1;
		// 	}
		// 	else if (Extensible) ans_2 = "Extensible";
		// 	else if (Electrical) ans_2 = "Electrical";
        //     if (mult_ques == "Developing, Storing, Defining, Computing") score += 1;
        //     if (ans_3 == "storing") score += 1;
        //     if (ans_5 == 2022) score += 1;
		// 	if (score == 0) {
        //         alert("Your score is 0. Try again\n");
        //         result = false;
        //     }
        //     else {
        //         attempt_number += 1;
        //         storing_user_information(id, givenname, familyname, email, score, attempt_number);
        //     }
        //     sessionStorage.attempt_number = attempt_number;
       
		// } else {
		// 	alert("You completed 2 attempts already.\n");
        //     result = false;
        // }
    // }
    // else {
    //     result = false;
    // }
    return true;
}

function init() {
    var path = window.location.pathname; 
    var page = path.split("/").pop(); 
    var formvalidate = document.getElementById("quiz_form");

    if (page == "quiz.php") { 
        formvalidate.onsubmit = validate;
    }
    // if (page == "result.php") { // getting information when the code run
    //     getting_information(); // change from quiz page to result page
    // }
    var start = document.getElementById("start");
	start.onclick = timer;
}

window.onload = init;