
/**
* Author: Dat Tien Pham
* Target: quiz.php
* Purpose: create timer for the quiz
*/

(function () {
    'use strict';
}());

function timer() {
	var id = document.getElementById("id").value;
	var givenname = document.getElementById("givenname").value;
	var familyname = document.getElementById("familyname").value;
	var email = document.getElementById("email").value;

	if (id != "" && givenname != "" && familyname !="" && email != ""){
		var counter = 600;
		var timer = counter;
		setInterval(timeIt, 1000);
		function timeIt(){
			timer--;
			if (timer>=0){
				document.getElementById("timer").innerHTML = converseSeconds(timer);
			} else {
				document.getElementById("quiz_form").submit();
			}
		}	
		function converseSeconds(second) {
			var min = Math.floor(second/60);
			var sec = second % 60;
			min = min < 10 ? "0" + min : min;
			sec = sec < 10 ? "0" + sec : sec;
			return min + ':' + sec;
		}
	}
}

