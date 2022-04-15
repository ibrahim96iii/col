<?php 
include 'connect.php';
//عرض الكليات المحددة من قبل الطالب على حسب مدينة الطالب
if (isset($_POST['college_id'])) {

	@$college_id = $_POST['college_id'];

	@$explode = explode(" ", $college_id);
	$m = 1;
	for ($i=0; $i <count($explode); $i++) { 
		@$number = test_input((int)$explode[$i]);
		@$sql = mysqli_query($con, "SELECT * FROM colleges WHERE id=$number ORDER BY college_average DESC");
		
		while($row=mysqli_fetch_array($sql)){
			$id = $row['id'];
			echo'
			<div class="box">
				<input type="checkbox" checked disabled value="'.$id.'" class="selected_college">
				<label>'.$m++.') '.$row['college_name'].'</label><br>
				<label class="ave_label">المعدل : <strong>'.$row['college_average'].'</strong></label>
				<button onclick="return add(this,'.$id.');" title="أضافة هذا الاختيار">+</button>
			</div>';
		}	
	}
}



//فحص عدد الكليات والمعاهد المختارة
if (isset($_POST['college_id_f'])) {

	@$college_id = $_POST['college_id_f'];

	@$explode = explode(" ", $college_id);

	@$count = (count($explode)-1);
	
	$errors = array();
	if ($count >50 || $count <25) {
		$errors[] ="<p class='count'>يجب ان تختار من 25 الى 50 كلية او معهد ويجب ان يتضمن اختيارك ما لايقل عن 10 معاهد</p>";
	}
	else {
		echo'<p class="count"> العدد الكلي المحدد هو '.@$count.'</p>';

		$count_institute =0;
		for ($i=0; $i <count($explode); $i++) { 
			@$number = test_input((int)$explode[$i]);

			@$sql = mysqli_query($con, "SELECT * FROM colleges WHERE id=$number AND college_name LIKE '%معهد%'");
			@$count_institute += mysqli_num_rows($sql);
		}

		echo'<p class="count"> عدد المعاهد المحددة هي '.@$count_institute.'</p>';
		
		if ($count_institute < 10) {
			$errors[] ="<p class='count'>يجب ان تختار على الاقل  10 معاهد</p>";
		}
	}
	foreach ($errors as $value) { 
		echo $value; 
	}
}



//عرض الكليات النهائية والمرتبة  من قبل الطالب على حسب مدينته والمدن الاخرى
if (isset($_POST['college_add'])) {

	@$college_add = test_input($_POST['college_add']);
	@$sql = mysqli_query($con, "SELECT * FROM colleges WHERE id=$college_add");
		
	while($row=mysqli_fetch_array($sql)){
		@$id = $row['id'];
		echo'
		<div class="box">
			<input type="checkbox" checked disabled value="'.$id.'" class="final_selected_college">
			<label> '.$row['college_name'].'</label><br>
		</div>';

	}
}

// create protected function
function test_input($data) {
	@$data = trim($data);
	@$data = stripcslashes($data);//remove backslash
	@$data = htmlspecialchars($data);
	return $data;
}
?>