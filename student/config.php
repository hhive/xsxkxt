<?php
$conn = mysqli_connect("localhost:3308", "root", "") or die ('连接失败');
mysqli_select_db($conn, 'phptest' ) or die('连接数据库失败');
mysqli_query($conn , "set names utf8");
if ($conn) {
	echo "连接数据库成功\n";
	# code...
}