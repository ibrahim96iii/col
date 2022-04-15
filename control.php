<?php
	session_start();
  	include('connect.php');
 
	if (isset($_GET['main_page'])) { $main_page = $_GET['main_page'];} 
	else { $main_page = 1;}
	$num_ber_page = 10;
	@$from_page = ($main_page - 1) * $num_ber_page;

	@$sql = mysqli_query($con, "SELECT * FROM colleges ORDER BY add_date DESC limit $from_page,$num_ber_page");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>لوحة التحكم</title>
		<link rel="stylesheet" href="css/control.css">
	</head>
	<body>
		<section class="container">

			<!-- Start Middle Of Page -->
			<div class="middle">
				<?php
				include('nav.php');
				?>
				<table cellspacing="0">
					<tr>
						<th>التسلسل</th>
						<th>المحافظة</th>
						<th>الجامعة / الكلية</th>
						<th>معدل الكلية</th>
						<th>فرع الدراسة</th>
						<th>قناة القبول</th>
						<th class="green">تعديل</th>
						<th class="red">حذف</th>
					</tr>
				<?php 
				$i = 1;
				while (@$row=mysqli_fetch_array($sql)) {
					@$id = $row['id'];
					echo '
					<tr class="table_body">
						<td>'.@$i++.'</td>
						<td>'.$row['city_name'].'</td>
						<td>'.$row['college_name'].'</td>
						<td>'.$row['college_average'].'</td>
						<td>'.$row['study_branch'].'</td>
						<td>'.$row['acceptance_channel'].'</td>
						<td class="green">
							<a href="edit.php?id='.@$id.'&main_page='.@$main_page.'">تعديل</a>
						</td>
						<td class="red">
							<a href="delete.php?id='.@$id.'&main_page='.@$main_page.'">حذف</a>
						</td>
					</tr>';
				}
				?>

						
				</table>
				<nav>
					<ul class="pagination">
						<?php 
						if(($main_page - 1) > 0) {
							if(($main_page - 1) > 0){$prev = $main_page - 1;} else{$prev = '1';} 
						 ?>			
							<li class="page-item">
								<?php echo'<a class="page-link" href="control.php?main_page='.@$prev.'">السابق
								</a>'; ?>
							</li> 
						<?php } 
							
							@$sql = mysqli_query($con, "SELECT * FROM colleges");
							

							@$count = mysqli_num_rows($sql);
							@$Total_page = ceil($count/$num_ber_page);
						?>
						<?php 
						if(($main_page + 1) > $Total_page) { echo'<li class="page-item" style="margin:0;">';}  
						else { 
							if(($main_page + 1) < $Total_page){ $next = $main_page + 1;}
							elseif(($main_page + 1) >= $Total_page){$next = $Total_page;}
							?>
							<li class="page-item">
								<?php echo'<a class="page-link" href="control.php?main_page='.@$next.'">التالي</a>'; ?>
							</li>
						<?php } ?>
					</ul>
				</nav>
			</div>
			<!-- End Middle Of Page -->

		</section>
	</body>
</html>