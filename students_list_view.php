<?php
session_start();
//db connection
include("config/db_connect.php");
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");

$names = student_names($_SESSION['class']);
$i = 0;
?>
<html lang="en">
<head>
<link rel='stylesheet' href="style.css"> 
<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media=""/>
<link rel="icon" href="img/small_icon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marker</title>
</head>
<body>
   <?php echo "<h4 class=center>student lists of {$_SESSION['class']}</h4>";?>
    <table border="3px" align="center" style="margin-top:; width:50%;">
    <tr>
    <th>s/n</th>
    <th>name</th>
    </tr>
   <?php foreach($names as $name){?>

     <?php  echo "<tr>";?>
    
     <?php echo "<td>".++$i."</td><td>{$name['name']}</td>";?>

     <?php  echo "</tr>";?>

   <?php }?>
    </table>
    <p class="center"><a href="students.php" class="btn">Back</a></p>
</body>
</html>
<style>


</style>