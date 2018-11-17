<?php
include 'config.php';
	$sno = @$_GET['sno'];
	$update = @$_GET['update'];
	$delete = @$_GET['delete'];
	$s_sql = "select * from student where sno = '$sno'";
	$s_result = mysqli_query($conn, $s_sql);
	$s_row = mysqli_fetch_array($s_result);
	if (!$s_row) {
		# code...
		echo "<script>alert('登陆失败');</script>";
	}
	if ($update == 1) {
		echo "<script>alert('更新成功');</script>";
	}
	if ($delete == 1) {
		echo "<script>alert('删除成功');</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>member</title>
</head>
<body>
	<h1>
		用户资料：	
	</h1>
	<form action="updateUser.php" method="post">
		
	
		<table>
			<tr>
				<td>
					sno:
				</td>
				<td>
					<input type="text" name="sno" value="<?php echo $s_row['sno'];?>">
				</td>
			</tr>
			<tr>
				<td>
					sname:
				</td>
				<td>
					<input type="text" name="sname" value="<?php echo $s_row['sname'];?>">
				</td>
			</tr>
			<tr>
				<td>
					password:
				</td>
				<td>
					<input type="password" name="spassword" value="<?php echo $s_row['spassword'];?>">
				</td>
			</tr>
			<tr>
				<td>
					ssex
				</td>
				<td>
					<input type="text" name="ssex" value="<?php echo $s_row['ssex'];?>">
				</td>
			</tr>
			<tr>
				<td>
					sage:
				</td>
				<td>
					<input type="text" name="sage" value="<?php echo $s_row['sage'];?>">
				</td>
			<tr>
			<tr>
				<td>
					pro:
				</td>
				<td>
					<input type="text" name="pro" value="<?php echo $s_row['pro'];?>">
				</td>
			<tr>
				<td>
					<input type="submit" name="update" value="更新"/>
					<!-- <input type="button" name="update" value="更新" onclick="update();"/> -->
				</td>
			</tr>
		</table>	
	</form>
</body>
<script type="text/javascript">
	function update1() {
		alert("dd");
	}
</script>
<script>
//AJAX初始化函数
function GetXmlHttpObject()
{
	var XMLHttp=null;
	try
 	{
		XMLHttp=new XMLHttpRequest();
 	}
	catch (e)
 	{
 		try
  		{
 			XMLHttp=new ActiveXObject("Msxml2.XMLHTTP");
 		}
		catch (e)
 		{
  			XMLHttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
 	}
	return XMLHttp;
}
function update()
{
	XMLHttp=GetXmlHttpObject();				//初始化一个XMLHttpRequest对象
	alert("s" + XMLHttp);
	alert("d");
	//得到学号和课程名文本框中输入的值
	var sno=document.getElementById("sno").value;
	alert("s" + sno);
	alert("dd");
	var sname=document.getElementById("sname").value;
	var spassword=document.getElementById("spassword").value;
	var sage=document.getElementById("sage").value;
	var ssex=document.getElementById("ssex").value;
	var url="updateUser.php";			//服务器端在EX11_1_process.php中处理
	url=url+"?sno="+sno+"&sname="+sname + "$spassword=" + spassword + "sage=" + sage + "ssex=" + "ssex"; 			//url地址，以GET方式传递
	alert(url);
	url=url+"&sid="+Math.random();  		//添加一个随机数，以防服务器使用缓存的文件
	XMLHttp.open("GET",url, true);    		//以GET方式通过给定的url打开XMLHTTP对象
	XMLHttp.send(null);       				//向服务器发送HTTP请求，请求内容为空
	XMLHttp.onreadystatechange = function()	//定义响应处理函数
		{
			alert("d");
			if (XMLHttp.readyState==4&&XMLHttp.status==200) 
			{ 	
				alert("dd");
				//如果请求成功则在CJ文本框中显示EX9_1_process.php传回的信息
				document.getElementById("sname").value=XMLHttp.responseText;
				document.getElementById("password").value=XMLHttp.responseText;
				document.getElementById("ssex").value=XMLHttp.responseText;
				document.getElementById("sage").value=XMLHttp.responseText;
			}    
		}
}
</script>
</html>