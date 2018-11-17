<?php
include 'config.php';
	$sno = @$_GET['sno'];
	echo "$sno";
	$s_sql = "delete from student where sno = '$sno'";
	$s_result = mysqli_query($conn, $s_sql);
	//$s_row = mysqli_fetch_array($s_result);
	if ($s_result) {
	header("Location: member.php?sno=$sno&delete=1");
		  	 exit();
	}
?>