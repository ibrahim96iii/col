<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>تعديل البيانات</title>
		<link rel="stylesheet" href="css/control.css">
	</head>
	<body>
		<section class="container">

			<!-- Start Middle Of Page -->
			<div class="middle">
				<div class="mangeement">
					<a href="control.php">رجوع للخلف</a>
				</div>
				<?php  
				if (isset($_GET['id'])) {
					@$sql = mysqli_query($con, "SELECT * FROM colleges WHERE id='".$_GET['id']."'");

					@$row = mysqli_fetch_array($sql);
					@$id = $row["id"];
					echo'
					<form method="post" class="add_data">
						<select name="city_name_edit">
						<option value="'.@$row["city_name"].'">'.@$row["city_name"].'</option>
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
						<input type="text" name="college_name_edit" value="'.@$row["college_name"].'" placeholder="اسم الكلية">
						<input type="text" name="college_average_edit" value="'.@$row["college_average"].'" placeholder="معدل الكلية">
						<select name="study_branch_edit">
							<option value="'.@$row["study_branch"].'">'.@$row["study_branch"].'</option>
							<option value="ادبي">ادبي</option>
							<option value="تطبيقي">تطبيقي</option>
							<option value="احيائي">احيائي</option>
						</select>
						<select name="acceptance_channel_edit">
							<option value="'.@$row["acceptance_channel"].'">'.@$row["acceptance_channel"].'</option>
							<option value="قناة القبول المركزي">قناة القبول المركزي</option>
							<option value="قناة القبول لذوي الشهداء">قناة القبول لذوي الشهداء</option>
						</select>
						<input type="hidden" name="id_edit" value="'.@$row["id"].'">
						<button>تعديل</button>
					</form>';
				}?>
			<!-- End Middle Of Page -->


			<?php

			if (isset($_POST['id_edit'])) {
				@$college_name = filter_var(test_input($_POST["college_name_edit"]), FILTER_SANITIZE_STRING);
				@$city_name = filter_var(test_input($_POST["city_name_edit"]), FILTER_SANITIZE_STRING);
				@$college_average = filter_var(test_input($_POST["college_average_edit"]), FILTER_SANITIZE_STRING);
				@$study_branch = filter_var(test_input($_POST["study_branch_edit"]), FILTER_SANITIZE_STRING);
				@$acceptance_channel = filter_var(test_input($_POST["acceptance_channel_edit"]), FILTER_SANITIZE_STRING);

				if (empty($college_name) || empty($city_name) || empty($college_average) || empty($study_branch) || empty($acceptance_channel)) {
					echo"<h4 style='color:red;'> يجب ملئ جميع الحقول</h4>";
				}
				else {
					@$sql2 = mysqli_query($con, "UPDATE colleges SET 
						college_name='".@$college_name."',
						city_name='".@$city_name."',
						college_average='".@$college_average."',
						study_branch='".@$study_branch."',
						acceptance_channel='".@$acceptance_channel."'
						WHERE id='".@$_POST['id_edit']."'
					");
					if (@$sql2 == true) { 
						header("Location:control.php?main_page=".$_GET['main_page']);
					}
					else {  echo"<h4 style='color:red;'> عذرا حصل خطأ ما</h4>";}
				}
			}
			// create protected function
			function test_input($data) {
				@$data  =  trim($data);
				@$data  =  stripcslashes($data);//remove backslash
				@$data  =  htmlspecialchars($data);
				return $data;
			}
			mysqli_close($con);
			?>

		</section>
	</body>
</html>