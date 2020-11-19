<?php
mysql_connect("localhost","root");
mysql_select_db("marker");
$sms="hello";
if(isset($_POST["regstudent"])){
$student = $_POST["name"];
 if(empty($student) || $student==" "){
	 $sms="<font color='red'>hello input student_name</font>";
	 }
	 else{
		 $check=mysql_query("select * from large where name='$student'");
		 if(mysql_num_rows($check)>0){$sms='<font color="red">student already exists</font>';}
		 else{
		 $sel= mysql_query("insert into large(name) values('$student')");
		 if($sel){$sms="<font color='white'>student:"." ".$student." "."inserted</font>";}
	     }}
}
if(isset($_POST["logout"])){
header("location:home.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/css"href="i.png" />
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student_Reg</title>
</head>

<body style="background:#7070ff; margin:0px;">
<form method="post">
<input type="submit"name="logout" value="logout to home" id="out"/>
</form>
<div style="border:px solid black; padding:20px; text-transform:capitalize; margin-top:px;">

<div>
<center>
<img src="pic.png"  width="113" style="margin:7.5px;"/>
<br />
<font style="font-family:'GemFont One'; font-size:18px; font-weight:700; text-shadow:0px 0px 1px black;"><?php echo $sms ;?></font><br /><br />
<form method="post">
<input type="text"name="name"placeholder="Enter Student_Name" id='king'/>
<input type="submit"name="regstudent"value="Reg_Student" id='put'/>
</form>
</center></div></div>
<div style="margin-top:50px; margin-bottom:px;"><center><img src="ii.png" width="140"/></center></div><br /><br />
<div id="footer" style="margin:0px; width:100%; background:#333; height:150px;">
<center><div style="">developed by suman(sulaiman saleh maidoya) contact: 08104343917, 09043835356</div></center>
<center><img src="q.png"  width="100px" /></center>
</div>

</body>
</html>