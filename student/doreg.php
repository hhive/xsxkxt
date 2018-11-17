<?php
$conn = mysqli_connect("localhost", "root", "") or die ('连接失败');
mysqli_select_db($conn, 'phptest' ) or die('连接数据库失败');
mysqli_query($conn , "set names utf8");
if (isset($_POST['submit'])) {
	$sno = $_POST['sno'];
	$sname = $_POST['sname'];
	$spassword = $_POST['spassword'];
	$ssex = $_POST['ssex'];
	$sage = $_POST['sage'];
	echo $sno;
	$s_sql = "select sno from student where sno = '$sno'";
	$s_result = mysqli_query($conn, $s_sql);
	$s_row = mysqli_fetch_array($s_result);
	if ($s_row) {
		# code...
		echo "<script>alert('用户已存在');</script>";
	} else {
		$insert_sql = "insert into student(sno,sname,spassword,sage,ssex) values ('$sno','$sname','$spassword','$sage','$ssex')";
		echo "$insert_sql";
		$insert_result = mysqli_query($conn, $insert_sql) or die('失败');
		if (mysqli_affected_rows($conn)!=0) {
			# code...
			echo "<script>alert('添加成功');</script>";
			echo $sno;
			//header("Location: login.html");
	
		}
	}
}
