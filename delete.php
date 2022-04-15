<?php
include 'connect.php';
if (isset($_GET['id'])) {
	@$sql = mysqli_query ($con, "DELETE FROM colleges WHERE id='".$_GET['id']."'");
	if (@$sql == true) { 
		header("Location:control.php?main_page=".$_GET['main_page']);
	 }
	else { echo "<script >alert('فشل الحذف'); </script>"; }
	@mysqli_close($con);
}
?>