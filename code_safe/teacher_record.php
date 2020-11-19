<?php session_start();
mysql_connect("localhost","root");
mysql_select_db("marker");
$check=mysql_query("select * from profile where username='".$_SESSION["user"]."'");
if(mysql_num_rows($check)>0){
  while($rows=mysql_fetch_array($check)){
  $name= $rows["firstname"];
  $mid= $rows["middlename"];
  $last= $rows["lastname"];
  $pu= $rows["pupils"];
  $sch= $rows["school"];
  $gender= $rows["gender"];
  $class= $rows["class"];
  $ses= $rows["session"];
  $term= $rows["term"];
  $sub= $rows["sub"];
  }	
}
else{$sms="erro!";}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/css" href="i.png">
	<title>Marker</title>
</head>
<body>
<img src="act.jpg" id='img'>
<div id="name"><?php echo $mid." ".$name." ".$last;?></div>
<div id="con">
<div style="margin-top:0px;">
<div style="margin:10px;">number of pupils your taking: <?php echo $pu;?></div>
<div style="margin:10px;">schoolname : <?php echo $sch;?></div>
<div style="margin:10px;">gender: <?php echo $gender;?></div>
<div style="margin:10px;">your taking class: <?php echo $class;?></div>
<div style="margin:10px;">current session: <?php echo $ses;?></div>
<div style="margin:10px;">current term: <?php echo $term;?></div>
<div style="margin:10px;">subject your taking: <?php echo $sub;?></div>
</div>
<center><img src="ii.png" width="100"></center>
</div><br>
<a href="home.php"><div id="anchor">back</div></a>
</body>
</html>
<style>
body{
background:url(image/bg10.jpeg);
}
#con{
text-transform:capitalize;
border:;
padding:10px;
width:70%;
margin-left:15%;
margin-right:15%;
background:white;
height:400px;
box-shadow: 1px 1px 1px black;
opacity:0.8;
text-shadow:0px 0px 1px black;
font-family:tahoma;
font-size:25px;
}
#img{
border:1px solid #4caf50;
padding:px;
margin-left:15%;
margin-right:15%;
margin-top:50px;
}
#name{
border:;
padding:6px;
width:400px;
float:right;
margin-right:44%;
margin-top:-3.4%;
margin-bottom:;
background:#333;
box-shadow: 1px 1px 1px black;
color:white;
font-family:tahoma;
font-size:20px;
text-transform:uppercase;
}
a{
text-decoration:none;
color:white;
}
#anchor{
padding:8px;
margin-left:15%;
margin-right:15%;
margin-top:;
background:#4caf50;
width:100px;
text-align:center;
font-family:tahoma;
text-transform:uppercase;	
}
</style>