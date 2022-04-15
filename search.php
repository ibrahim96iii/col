<?php
	session_start();
  	include('connect.php');
	if (!empty($_GET['city_name']) || !empty($_GET['search'])){
		@$sql = mysqli_query($con, "SELECT * FROM colleges WHERE college_name LIKE '%".$_GET['search']."%' AND city_name LIKE '%".$_GET['city_name']."%' ORDER BY add_date DESC");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>صفحة البحث</title>
		<link rel="stylesheet" href="css/control.css">
	</head>
	<body>
		<section class="container">

			<!-- Start Middle Of Page -->
			<div class="middle">
				<?php
				include('nav.php');
				?>
				<form method="get" class="add_data" action="<?php echo$_SERVER['PHP_SELF'];?>">
					<select name="city_name" >
						<option value="">أختر المحافظة *</option>
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
					<input type="text" name="search" placeholder="اسم الجامعة / الكلية">
					<button>بحث</button>
				</form>
				<table cellspacing="0">
					<tr>
						<th>التسلسل</th>
						<th>المحافظة</th>
						<th>الجامعة / الكلية</th>
						<th>فرع الدراسة</th>
						<th>قناة القبول	</th>
						<th>المعدل</th>
						<th>تعديل</th>
						<th>حذف</th>
					</tr>
				<?php 
				$i = 1;
				@$count = mysqli_num_rows($sql);
				if ($count > 0) {
					while ($row=mysqli_fetch_array($sql)) {
						@$id = $row['id'];
						echo '
						<tr class="table_body">
							<td>'.@$i++.'</td>
							<td>'.$row['city_name'].'</td>
							<td>'.$row['college_name'].'</td>
							<td>'.$row['study_branch'].'</td>
							<td>'.$row['acceptance_channel'].'</td>
							<td>'.$row['college_average'].'</td>
							<td class="green">
								<a href="edit.php?id='.@$id.'&main_page=1">تعديل</a>
							</td>
							<td class="red">
								<a href="delete.php?id='.@$id.'&main_page=1">حذف</a>
							</td>
						</tr>';
					}
				}
				else {
					echo"
					<tr>
						<td colspan='7' style='background:#fff;'>لا توجد بيانات حاليا</td>
					</tr>";
				}
				?>		
				</table>
			</div>
			<!-- End Middle Of Page -->

		</section>
	</body>
</html>