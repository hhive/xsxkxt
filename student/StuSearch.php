<html>
<head>
	<meta charset="utf-8">
	<title>学生信息查询</title>
	<style type="text/css">
	<!--
		.STYLE1 {font-size: 15px; font-family: "幼圆";}
		.STYLE2 {font-size: 15px; font-family: "幼圆";color:"#800080";}
	-->
	</style>
</head>
<body bgcolor="D9DFAA">
<div align=center><font face="幼圆" size="5" color="#008000"><b>学生信息查询</b></font></div>
<form action="" method="post" style="margin:0">
	<table width="480" border="1" align="center" cellpadding=0 cellspacing=0>
		<tr>
			<td height="10" class="STYLE1" bgcolor="#CCCCCC">学号:</td>
			<td><input name="sno" size="13" type="text"></td>
			<td class="STYLE1" bgcolor="#CCCCCC">姓名:</td>
			<td><input type="text" size="13" name="sname"></td>
			<td class="STYLE1" bgcolor="#CCCCCC">专业:</td>
			<td>
				<select name="select">
					<option>所有专业</option>
					<option>计算机</option>
					<option>通信工程</option>
				</select>
			</td>
			<td bgcolor="#CCCCCC" align="center">
				<input type="submit" name="submit" class="STYLE1" value="查询">
			</td>
		</tr>
	</table>
</form>
</body>
</html>
<?php

if(isset($_POST['submit'])) {
	include "config.php";
	$sno=$_POST['sno'];   		  		//Ñ§ºÅ
	$sname=$_POST['sname'];       		 	 	//ÐÕÃû
	$Project=$_POST['select'];           		  	//×¨Òµ
	//Éú³ÉsqlÓï¾äµÄgetsqlº¯Êý
	function getsql($StuNum,$StuNa,$Pro)
	{
		$sql="select * from student where ";
		$note=0;
		if($StuNum)
		{
	   		$sql.="sno like '%$StuNum%'";
	   		$note=1;
		}
		if($StuNa)
		{  	
			if($note==1)	
				$sql=" and sname like '%$StuNa%'";   
		  	else
		   		$sql.="sname like '%$StuNa%'";
		  	$note=1;
		}
		if($Pro&&($Pro!="所有专业"))
		{	 
			 if($note==1)  
				$sql.=" and pro='$Pro'";
			 else
			 {
		   		$sql.="pro='$Pro'";
		   		$note=1;
			 }
		}
		if($note==0)  
		{  
			 $sql="select * from student"; 
		}
		return $sql;
	}
	$sql=getsql($sno, $sname, $Project);		//µÃµ½²éÑ¯Óï¾ä
	echo "$sql";
	$result=mysqli_query($conn, $sql);
	$total=mysqli_num_rows($result);
	$page=isset($_GET['page'])?intval($_GET['page']):1;	//»ñÈ¡µØÖ·À¸ÖÐpageµÄÖµ£¬²»´æÔÚÔòÉèÎª1
	$num=12;                                     		//Ã¿Ò³ÏÔÊ¾12Ìõ¼ÇÂ¼
	$url='StuSearch.php';								//±¾Ò³URL
	//Ò³Âë¼ÆËã
	$pagenum=ceil($total/$num);							//»ñµÃ×ÜÒ³Êý£¬Ò²ÊÇ×îºóÒ»Ò³
	$page=min($pagenum,$page);							//»ñµÃÊ×Ò³
	$prepg=$page-1;										//ÉÏÒ»Ò³
	$nextpg=($page==$pagenum? 0: $page+1);		 		//ÏÂÒ»Ò³
	$new_sql=$sql." limit ".($page-1)*$num.",".$num;	//°´Ã¿Ò³¼ÇÂ¼ÊýÉú³É²éÑ¯Óï¾ä
	$new_result=mysqli_query($conn, $new_sql);
	if (!$new_result) {
	 		printf("Error: %s\n", mysqli_error($conn));
	 			exit();
		}
	if($new_row=mysqli_fetch_array($new_result))
	{   
		//ÈôÓÐ²éÑ¯½á¹û£¬ÔòÒÔ±í¸ñÐÎÊ½Êä³öÑ§ÉúÐÅÏ¢
		echo "<br><center><font size=5 face=楷体_GB2312 color=#0000FF>学生信息查询</font></center>";
		echo "<table width=480 border=1 align=center cellpadding=0 cellspacing=0 class=STYLE1>";
	    echo "<tr bgcolor=#CCCCCC><td>学号</td>";
	    echo "<td>姓名</td>";
	    echo "<td>年龄</td>";
	    echo "<td>性别</td>";
	    echo "<td>专业</td>";
	    echo "<td>操作</td>";
	    // echo "<td>³öÉúÊ±¼ä</td>";
	    // echo "<td>×¨Òµ</td>";
	    // echo "<td>×ÜÑ§·Ö</td></tr>";
		do
		{
			list($sno,$sname,$password,$sage,$ssex,$pro)=$new_row;
			//ÉèÖÃÑ§ºÅ³¬Á´½Ó
	        echo "<tr><td>$sno</td>";
	        echo "<td>$sname</td>";
			echo "<td>$sage</td>";
			echo "<td>$ssex</td>";
			echo "<td>$pro</td>";
			echo "<td><a href='deleteUser.php?sno=$sno'>删除</a><td/>";
		  	// $timeTemp=strtotime($CSSJ);     		//½«ÈÕÆÚÊ±¼ä½âÎöÎªUNIXÊ±¼ä´Á
		  	// $time=date("Y-n-j",$timeTemp); 			//ÓÃdateº¯Êý½«Ê±¼ä×ª»»Îª¡°Äê-ÔÂ-ÈÕ¡±ÐÎÊ½	
	      	// echo "<td>$time</td>";					//Êä³ö³öÉúÈÕÆÚ
	      	// echo "<td>$ZY</td>";					//Êä³ö×¨Òµ
	      	// echo "<td>$ZXF</td>";					//Êä³ö×ÜÑ§·Ö
	      	echo "</tr>";  
		}while($new_row=mysqli_fetch_array($new_result));
		echo "</table>";
		//¿ªÊ¼·ÖÒ³µ¼º½Ìõ´úÂë
		$pagenav="";
		if($prepg) 
			$pagenav.="<a href='$url?page=$prepg&sno=$sno&sname=$sname&select=$Project'>上一页</a> "; 
		for($i=1;$i<=$pagenum;$i++)
		{
			if($page==$i)
				$pagenav.=$i." ";
			else 
			  	$pagenav.=" <a href='$url?page=$i&sno=$sno&sname=$sname&select=$Project'>$i</a>"; 
		}
		if($nextpg)
			$pagenav.=" <a href='$url?page=$nextpg&sno=$sno&sname=$sname&select=$Project'>下一页</a>"; 
		$pagenav.="共(".$pagenum.")页";
		//Êä³ö·ÖÒ³µ¼º½
		echo "<br><div align=center class=STYLE1><b>".$pagenav."</b></div>";	   
	}
	else
		echo "<script>alert('无记录');location.href='StuSearch.php';</script>";
}

?>
