/*global $, document, ActiveXObject */

//عرض الكليات المقترحة حسب المعدل والفرع الذي اختاره الطالب
function student_desire(average, branch, city_name, channel) {
    "use strict";
	var myRequest;
	if (window.XMLHttpRequest) { myRequest = new XMLHttpRequest(); } else { myRequest = new ActiveXObject("Microsoft.XMLHTTP"); }//code for IE5 and IE6

	myRequest.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			document.getElementById("show_desire").innerHTML = this.responseText;
		}
	};

	//with POST method.
	myRequest.open("POST", "student_desire.php", true);
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("average=" + average + "&branch=" + branch + "&city_name=" + city_name + "&channel=" + channel);
}

function final_selected_colleges(text) {
    "use strict";
	var myRequest;

	if (window.XMLHttpRequest) { myRequest = new XMLHttpRequest(); } else { myRequest = new ActiveXObject("Microsoft.XMLHTTP"); }//code for IE5 and IE6

	myRequest.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			document.getElementById("count").innerHTML = this.responseText;
		}
	};

	//with POST method.
	myRequest.open("POST", "selected_colleges_desire.php", true);
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("college_id_f=" + text);
}
function student_desire_all_cities(average, branch, city_name, channel) {
    "use strict";
	var myRequest;
	if (window.XMLHttpRequest) { myRequest = new XMLHttpRequest(); } else { myRequest = new ActiveXObject("Microsoft.XMLHTTP"); }//code for IE5 and IE6

	myRequest.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			document.getElementById("selected_colleges_desire").innerHTML += this.responseText;
		}
	};

	//with POST method.
	myRequest.open("POST", "student_desire.php", true);
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("average_all=" + average + "&branch_all=" + branch + "&city_name_all=" + city_name + "&channel_all=" + channel);
}

//عرض الكليات المحددة من قبل الطالب 
function selected_colleges_desire(text) {
    "use strict";
	var myRequest;

	if (window.XMLHttpRequest) { myRequest = new XMLHttpRequest(); } else {
        myRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }//code for IE5 and IE6

	myRequest.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			document.getElementById("selected_colleges_desire").innerHTML = this.responseText;
		}
	};

	//with POST method.
	myRequest.open("POST", "selected_colleges_desire.php", true);
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("college_id=" + text);
}

function Question1() {
    "use strict";
	var q1 = document.getElementById('q1'),
		q2 = document.getElementById('q2');
	//For Next
	if (q1.style.display === 'flex') {
		q1.style.display = 'none';
		q2.style.display = 'flex';
	} else { //For Prev
        q1.style.display = 'flex';
        q2.style.display = 'none';
    }
	return false;
}
function Question2() {
    "use strict";
	var q2 = document.getElementById('q2'),
		q3 = document.getElementById('q3'),
		average = document.getElementById('average').value;
	if (average !== '') {
		//For Next
		if (q2.style.display === 'flex') {
			q2.style.display = 'none';
			q3.style.display = 'flex';
		} else {//For Prev
            q2.style.display = 'flex';
            q3.style.display = 'none';
        }
	} else {
        document.getElementById('average').placeholder = 'يجب ادخال قيمة المعدل';
    }
	
	return false;
}
function Question3() {
    "use strict";
	var q3 = document.getElementById('q3'),
		q4 = document.getElementById('q4'),
		branch = document.getElementById('branch').value;
	if (branch !== '') {
		//For Next
		if (q3.style.display === 'flex') {
			q3.style.display = 'none';
			q4.style.display = 'flex';
		} else {//For Prev
            q3.style.display = 'flex';
            q4.style.display = 'none';
        }
	} else {
        document.getElementById('branch_error').innerHTML = 'يجب اختيار فرع الدراسة';
    }
	return false;
}

function Question4() {
    "use strict";
	var q4 = document.getElementById('q4'),
		q5 = document.getElementById('q5'),
		city_name = document.getElementById('city_name').value;
	if (city_name !== '') {
		//For Next
		if (q4.style.display === 'flex') {
			q4.style.display = 'none';
			q5.style.display = 'flex';
		} else {//For Prev
            q4.style.display = 'flex';
            q5.style.display = 'none';
        }
	} else {
        document.getElementById('city_name_error').innerHTML = 'يجب اختيار مدينتك';
    }
	return false;
}

function Question5() {
    "use strict";
	var q4 = document.getElementById('q4'),
		q5 = document.getElementById('q5'),
        q6 = document.getElementById('q6'),
		average = document.getElementById('average').value,
		branch = document.getElementById('branch').value,
		city_name = document.getElementById('city_name').value,
		channel = document.getElementById('channel').value;

	if (channel !== '') {
		//For Next
		if (q5.style.display === 'flex') {
			q5.style.display = 'none';
			q6.style.display = 'flex';
			student_desire(average, branch, city_name, channel);
		} else {//For Prev
            q5.style.display = 'flex';
            q6.style.display = 'none';
        }
	} else {
        document.getElementById('channel_error').innerHTML = 'يجب اختيار قناة القبول';
    }
	return false;
}

function Question6() {
    "use strict";
	var i,
        q5 = document.getElementById('q5'),
		q6 = document.getElementById('q6'),
        q7 = document.getElementById('q7'),
		q8 = document.getElementById('q8'),
		q9 = document.getElementById('q9'),
		select_college = document.getElementsByClassName('select_college'),
		city_name = document.getElementById('city_name').value,
		change_city = document.getElementById('change_city'),
		hide_yes = document.getElementById('hide_yes'),
		text = '';
	//For Show All Selected Checkbox
	
	//For Next
	if (q6.style.display === 'flex') {
		q6.style.display = 'none';
		q7.style.display = 'flex';
		q8.style.display = 'flex';
		q9.style.display = 'flex';
		hide_yes.style.display = 'flex';
		change_city.innerHTML = city_name;

		//For Show All Selected Checkbox
		for (i = 0; i < select_college.length; i++) {
			if (select_college[i].checked) {
				text += select_college[i].value + ' ';
			}

		}
		selected_colleges_desire(text);
	} else {//For Prev
        q6.style.display = 'flex';
        q7.style.display = 'none';
        q8.style.display = 'none';
        q9.style.display = 'none';

        document.getElementById("selected_colleges_desire").innerHTML = '';
        document.getElementById("final_selected_colleges").innerHTML = '';
        document.getElementById("count").innerHTML = '';
    }
	return false;
}

function Question8() {
    "use strict";
	var final_selected_college = document.getElementsByClassName('final_selected_college'),
		text = '',
        i;
	//For Show All Selected Checkbox
	for (i = 0; i < final_selected_college.length; i++) {
		
		if (final_selected_college[i].checked) {
			text += final_selected_college[i].value + ' ';
		}

	}
	final_selected_colleges(text);
	return false;
}

function Question7_yes() {
    "use strict";
	var average = document.getElementById('average').value,
		branch = document.getElementById('branch').value,
		city_name = document.getElementById('city_name').value,
		channel = document.getElementById('channel').value,
		hide_yes = document.getElementById('hide_yes');

	if (average !== '' && branch !== '' && city_name !== '' && channel !== '') {
		student_desire_all_cities(average, branch, city_name, channel);
		hide_yes.style.display = 'none';
	}
	return false;
}

function add(hide, id) {
    "use strict";
	var myRequest;

	if (window.XMLHttpRequest) { myRequest = new XMLHttpRequest(); } else {
        myRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }//code for IE5 and IE6

	myRequest.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			document.getElementById("final_selected_colleges").innerHTML += this.responseText;
			hide.style.display = 'none';
		}
	};

	//with POST method.
	myRequest.open("POST", "selected_colleges_desire.php", true);
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("college_add=" + id);
	return false;
}


function printPageArea(areaID) {
    "use strict";
	var printContent = document.getElementById("q8"),
        winPrint = window.open('', '', 'width=900,height=650');
	winPrint.document.write('<html><head><style>body{direction:rtl;}</style>');
	winPrint.document.write(printContent.innerHTML);
	winPrint.document.close();
	winPrint.focus();
	winPrint.print();
	winPrint.close();
}