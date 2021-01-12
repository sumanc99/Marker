<?php session_start();
//db page
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
    <link rel='stylesheet' href="reportcard_style.css"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marker</title>
</head>
<body>
    <div class="title">
        <h2><?php echo $ans['schoolname'];?></h2>
        <h3><?php echo "motor: ".$ans['schoolmotor'];?></h3>
        <h2>student report sheet</h3>
    </div>
    <div class="details">

        <div class="report_infor">
        <span class='name'>session:  <span class='subname'>2020/2021</span> </span>
        <span class='name'>term:  <span class='subname'>first term</span> </span>
        <span class='name'>date:  <span class='subname'>12-09-2020</span></span>
        </div>

        <div class="report_name">
           <ul>
               <li>name: <span class='subname'>sulaiman saleh yahaya</span></li>
               <li>class: <span class='subname'>first term</span></li>
               <li>next term begins: <span class='subname'>first term</span></li>
           </ul>
           <img src="img/pic.png" alt="" style='float:right; margin:20px;'>
        </div>

    </div>

    <div class="report_result">
        <h2>result</h2>
        <table align='center' border='1px' class='table_report'>
            <tr>
                <th>s/n</th>
                <th>subject</th>
                <th>cA1</th>
                <th>cA2</th>
                <th>cA3</th>
                <th>exams</th>
                <th>total</th>
                <th>grade</th>
                <th>pos</th>
                <th>class avg</th>
                <th>remark</th>
            </tr>
            <tr>
                <td >1</td>
                <td class='subject'>english language</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>

            <tr>
                <td >2</td>
                <td class='subject'>mathematics</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >3</td>
                <td class='subject'>health education</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >4</td>
                <td class='subject'>social studies</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >5</td>
                <td class='subject'>agricultural science</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >6</td>
                <td class='subject'>civic education</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >7</td>
                <td class='subject'>hausa</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >8</td>
                <td class='subject'>basic science</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >9</td>
                <td class='subject'>art</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >10</td>
                <td class='subject'>religion</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >11</td>
                <td class='subject'>computer</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
            <tr>
                <td >12</td>
                <td class='subject'>home economics</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>a</td>
                <td>0</td>
                <td>4.5</td>
                <td class='remark'>merit</td>
            </tr>
      </table>
    </div>
<a href="report_card_class_picker.php" class="btn" style="margin-left:20px;">Back</a>
</body>
</html>