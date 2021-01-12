<?php
session_start();
//db connection
include("config/db_connect.php");
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");
$sn = 1;
$sql = "SELECT * FROM {$_SESSION['class']}";
$sql_query = mysqli_query($conn, $sql);

$sql_schoolname = "SELECT schoolname, schoolmotor FROM admin";
$sql_schoolname_query = mysqli_query($conn, $sql_schoolname);
$ans = mysqli_fetch_array($sql_schoolname_query);


?>
<html lang="en">
<head>
<link rel="icon" href="img/small_icon.png">
<link rel='stylesheet' href="style.css"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marker</title>
</head>
<body>
    <div class="title">
    <h1><?php echo $ans['schoolname'];?></h1>
    <h1><?php echo "motor: ".$ans['schoolmotor'];?></h1>

    <?php echo "<h4 class='class'>Class: {$_SESSION['class']} resultsheet</h4>";?>

     <div class="details">
    <span class='tech'>FormMaster:_____________________</span>
    <span class='term'>Term:</span>
    <span class='classrel'><?php echo "Class: {$_SESSION['class']} resultsheet";?></span> 
    </div>
    
    </div>
    
    <table align='center'border="1px" class="result_sheet_table">
    
    <tr>
    <th>S/N</th>
    <th>Student Fullname</th>
    <th>eng</th>
    <th>math</th>
    <th>hel</th>
    <th>social</th>
    <th>agric</th>
    <th>civic</th>
    <th>hau</th> 
    <th>basic</th>
    <th>art</th>
    <th>rel</th>
    <th>comp</th>
    <th>home</th>
    <th>Total</th>
    <th>AVG</th>
    <th>POS</th>
    </tr>
<?php while($row = mysqli_fetch_array($sql_query)){?>
    <?php include("ca_and_exam_adder.php");?>

    
    <?php echo"
    <tr>
    <td>".$sn++."</td>
    <td class=name>$name</td>
    <td>$eng</td>
    <td>$math</td>
    <td>$hel</td>
    <td>$social</td> 
    <td>$agric</td>
    <td>$civic</td>
    <td>$hau</td>
    <td>$basic</td>
    <td>$art</td>
    <td>$rel</td>
    <td>$comp</td>
    <td>$home</td>
    <td>$total</td>
    <td>$avg</td>
    <td>$position</td>
   
    </tr> ";?>
   
    <?php }?>

    </table>
    <a href="result_sheet_class_picker.php">back</a>
</body>
</html>