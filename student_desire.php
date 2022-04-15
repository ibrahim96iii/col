<?php 
include 'connect.php';
function enNum($string){
    return strtr($string, 
    array('٠'=> '0', '١'=> '1','٢'=> '2','٣'=> '3','٤'=> '4','٥'=> '5','٦'=> '6','٧'=> '7','٨'=> '8','٩'=> '9'));
}
//عرض الكليات المقترحة من قبل النظام على حسب مدينة الطالب
if (isset($_POST['average']) && isset($_POST['branch']) && isset($_POST['city_name']) && isset($_POST['channel'])) {
	@$average = test_input(enNum($_POST['average']));
	@$branch = test_input($_POST['branch']);
	@$city_name = test_input($_POST['city_name']);
	@$channel = test_input($_POST['channel']);
	

	@$sql = mysqli_query($con, "SELECT * FROM colleges WHERE college_average <= '".$average."' AND study_branch='".$branch."' AND city_name='".$city_name."' AND acceptance_channel='".$channel."' ORDER BY college_average DESC");
	$i = 1;
	while ($row=mysqli_fetch_array($sql)) {
		@$id = $row['id'];
		echo'
		<div class="box">
			<input type="checkbox" value="'.$id.'" class="select_college">
			<label>'.$i++.') '.$row['college_name'].'</label><br>
			<label class="ave_label">المعدل : <strong>'.$row['college_average'].'</strong></label>
		</div>';
	}
}

//عرض الكليات المقترحة من قبل النظام على حسب المدن الاخرى للطالب
if (isset($_POST['average_all']) && isset($_POST['branch_all']) && isset($_POST['city_name_all']) && isset($_POST['channel_all'])) {
	@$average = test_input(enNum($_POST['average_all']));
	@$branch = test_input($_POST['branch_all']);
	@$city_name = test_input($_POST['city_name_all']);
	@$channel = test_input($_POST['channel_all']);

	@$sql = mysqli_query($con, "SELECT * FROM colleges WHERE college_average <= '".$average."' AND study_branch='".$branch."' AND city_name!='".$city_name."' AND acceptance_channel='".$channel."' ORDER BY college_average DESC");
	$i = 1;
	while ($row=mysqli_fetch_array($sql)) {
		@$id = $row['id'];

		echo'
		<div class="box">
			<input type="checkbox" disabled value="'.$id.'" class="selected_college">
			<label>'.$i++.') '.$row['college_name'].'</label><br>
			<label class="ave_label">المعدل : <strong>'.$row['college_average'].'</strong></label>
			<button onclick="return add(this,'.$id.');" title="أضافة هذا الاختيار">+</button>
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