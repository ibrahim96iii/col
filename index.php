<?php
	include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> استمارة القبول المركزي </title>
	<link rel="stylesheet" href="css/style.css">	
</head>
<body>
	<div class="container">
		<div class="login-content">
			<form method="post" action="" id="myform">
				<img src="img/avatar.svg">
				<h2 class="title">أهلا بك عزيزي الطالب</h2>

				<!-- Start Questions -->
				<div id="q1" style="display: flex;">
					<h3>هل تريد أنشاء استمارة كاملة بالاختيارات الممكنة؟</h3>
					<button id="next_q1" onclick="return Question1();"><span>نعم</span></button>
				</div>

				<div id="q2">
					<h3>أدخل المعدل؟</h3>
					<input type="text" name="average" id="average" value="" placeholder=""><br>
					<button onclick="return Question1();"><span>السابق</span></button>
					<button onclick="return Question2();"><span>التالي</span></button>
				</div>

				<div id="q3">
					<h3>أختر فرع الدراسة؟</h3>
					<select name="branch" id="branch">
						<option value="" id="branch_error"></option>
						<option value="ادبي">ادبي</option>
						<option value="تطبيقي">تطبيقي</option>
						<option value="احيائي">احيائي</option>
					</select><br>
					<button onclick="return Question2();"><span>السابق</span></button>
					<button onclick="return Question3();"><span>التالي</span></button>
				</div>

				<div id="q4">
					<h3>أختر مدينتك؟</h3>
					<select name="city_name" id="city_name">
						<option value="" id="city_name_error"></option>
						<option value="بغداد">بغداد</option>
						<option value="البصرة">البصرة</option>
						<option value="نينوى">نينوى</option>
						<option value="أربيل">أربيل</option>
						<option value="النجف">النجف</option>
						<option value="ذي قار">ذي قار</option>
						<option value="كركوك">كركوك</option>
						<option value="الأنبار">الأنبار</option>
						<option value="ديالى">ديالى</option>
						<option value="المثنى">المثنى</option>
						<option value="القادسية">القادسية</option>
						<option value="ميسان">ميسان</option>
						<option value="واسط">واسط</option>
						<option value="صلاح الدين">صلاح الدين</option>
						<option value="دهوك">دهوك</option>
						<option value="السليمانية">السليمانية</option>
						<option value="بابل">بابل</option>
						<option value="كربلاء">كربلاء</option>
					</select><br>
					<button onclick="return Question3();"><span>السابق</span></button>
					<button onclick="return Question4();"><span>التالي</span></button>
				</div>

				<div id="q5">
					<h3>أختر قناة القبول؟</h3>
					<select name="channel" id="channel">
						<option value="" id="channel_error"></option>
						<option value="قناة القبول المركزي">قناة القبول المركزي</option>
						<option value="قناة القبول لذوي الشهداء">قناة القبول لذوي الشهداء</option>
					</select><br>
					<button onclick="return Question4();"><span>السابق</span></button>
					<button onclick="return Question5();"><span>التالي</span></button>
				</div>

				<div id="q6">
					<h3>ما هي رغبتك؟</h3>
					<div id="show_desire"></div>
					<button onclick="return Question5();"><span>السابق</span></button>
					<button onclick="return Question6();"><span>التالي</span></button>
				</div>

				<div id="q7">
					<h3>هل من الممكن الدراسة خارج <strong id="change_city"> الموصل</strong>؟</h3>
					<button onclick="return Question7_yes();" id="hide_yes">نعم</button>
					<div id="selected_colleges_desire"></div>
					<button onclick="return Question6();"><span>السابق</span></button>
				</div>
				<div id="q8">
					<h3>عرض الاستمارة النهائية</h3>
					<div id="count"></div>
					<div id="final_selected_colleges"></div>
				</div>
				<div id="q9">
					<button onclick="return Question8();" style="background: #ec2100;">تحقق</button>
					<button onclick="printPageArea('q8');"><span>طباعة</span></button>
				</div>
				<!-- End Questions -->
            </form>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>
