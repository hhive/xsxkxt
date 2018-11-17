<?php
include 'config.php';
// if (isset($_POST['submit'])) {
	//echo "<script>alert('登陆成功1');</script>";
	$sno = $_POST['sno'];
	$spassword = $_POST['spassword'];
	$s_sql = "select sno from student where sno = '$sno' and spassword = '$spassword'";
	$s_result = mysqli_query($conn, $s_sql);
	if (!$s_result) {
 		printf("Error: %s\n", mysqli_error($conn));
 			exit();
		}
	$s_row = mysqli_fetch_array($s_result);
	if ($s_row) {
		# code...
		//echo "<script>alert('登陆成功2');</script>";
		header("Location: member.php?sno=$sno");
		  	 exit();
	} else {
		
			echo "<script>alert('登陆失败');</script>";
		
	}
//}
