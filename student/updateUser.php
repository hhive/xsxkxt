<?php
include 'config.php';
	$sno = $_POST['sno'];
	$sname = $_POST['sname'];
	$spassword = $_POST['spassword'];
	$ssex = $_POST['ssex'];
	$sage = $_POST['sage'];
	echo $sno;
	//UPDATE `student` SET `sname`='q1' WHERE `sno`='001'
	// update `student` set `sname` = 'li1' and `spassword` = '123' and `ssex` = '男' and `sage` = '21' where `sno` = '001';
	// $s_sql = "update `student` set `sname` = '$sname' , `spassword` = '$spassword' , `ssex` = '$ssex' , `sage` = '$sage' where `sno` = '$sno'";
	$s_sql = "update student set sname = '$sname' , spassword = '$spassword' , ssex = '$ssex' , sage = '$sage' where sno = '$sno'";
	echo $s_sql;
	$s_result = mysqli_query($conn, $s_sql);
	if (!$s_result) {
 		printf("Error: %s\n", mysqli_error($conn));
 			exit();
		}
	// $s_row = mysqli_fetch_array($s_result);
	if ($s_result) {
		echo "<script>alert('更新成功');</script>";
		header("Location: member.php?sno=$sno&update=1");
		  	 exit();
		# code...
		//echo "<script>alert('登陆成功2');</script>";
		echo $s_row['sname'];
		echo $s_row['sage'];
	} else {
		
			echo "<script>alert('登陆失败');</script>";
		
	}