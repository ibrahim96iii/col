<?php
    include('connect.php');
	if ($_SERVER['REQUEST_METHOD']=="POST") {

		if (empty($_POST['city_name']) || empty($_POST['college_name']) || empty($_POST['college_average']) || empty($_POST['study_branch']) || empty($_POST['acceptance_channel'])) {
		  $result = "<h4 style='color:red;'> يجب ملئ جميع الحقول الفارغة</h4>";
		} 
		else {

			@$college_name = filter_var(test_input($_POST['college_name']), FILTER_SANITIZE_STRING);
			@$city_name = filter_var(test_input($_POST['city_name']), FILTER_SANITIZE_STRING);
			@$college_average = filter_var(test_input($_POST['college_average']), FILTER_SANITIZE_STRING);
			@$study_branch = filter_var(test_input($_POST['study_branch']), FILTER_SANITIZE_STRING);
			@$acceptance_channel = filter_var(test_input($_POST['acceptance_channel']), FILTER_SANITIZE_STRING);
			@$add_date = filter_var(test_input(date('Y/m/d | H:i:s')), FILTER_SANITIZE_STRING);


			$sql = mysqli_query($con, "INSERT INTO colleges (college_name, city_name, college_average, study_branch, acceptance_channel, add_date) VALUES ('$college_name', '$city_name', '$college_average', '$study_branch', '$acceptance_channel', '$add_date')");
			if ($sql == true) {
			  header("Location:control.php");
			} 
			else {
			  $result = "<h4 style='color:red;'> فشلت عملية الاضافة </h4>";
			}
		 }
	}
	// create protected function
	function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);//remove backslash
		$data = htmlspecialchars($data);
		return $data;
	}
	mysqli_close($con);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>اضافة البيانات</title>
		<link rel="stylesheet" href="css/control.css">
	</head>
	<body>
		<section class="container">

			<!-- Start add Of Page -->
			<div class="middle">
				<div class="mangeement">
					<a href="control.php">رجوع للخلف</a>
				</div>
				
				<form method="post" class="add_data" action="<?php echo$_SERVER['PHP_SELF'];?>">
					<div><?php echo @$result; ?></div>
					
					<select name="city_name">
						<option value="">اسم المحافظة</option>
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
					</select>
					<select name="study_branch">
						<option>أختر الفرع</option>
						<option value="ادبي">ادبي</option>
						<option value="تطبيقي">تطبيقي</option>
						<option value="احيائي">احيائي</option>
					</select>
					<select name="acceptance_channel">
						<option>أختر قناة القبول</option>
						<option value="قناة القبول المركزي">قناة القبول المركزي</option>
						<option value="قناة القبول لذوي الشهداء">قناة القبول لذوي الشهداء</option>
					</select>
					<input type="text" name="college_name" placeholder="اسم الجامعة / الكلية">
					<input type="text" name="college_average" placeholder="معدل الكلية">
					<button>اضافة</button>
				</form>
			<!-- End add Of Page -->

		</section>
	</body>
</html>