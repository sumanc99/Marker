<?php
session_start();
//db connection
include("config/db_connect.php");
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");


$sms = "";
if(isset($_POST['submit'])){

    $fname = validating_input($_POST['fname']);

    if(empty($fname) || $fname==" "){
        $sms = "provide Fullname";
    }else{
        if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
            $sms = 'Fullname must be  letter only';
        }else{
            $reg_stud = reg_stud($fname, $_SESSION['class']);
          if($reg_stud){
           $sms = "<b class=green-text>student is registered</b>";
          }else{
              $sms = "Not registered".mysqli_error($conn);
          }
        }
    }

   


  
    

}

$sql_query = mysqli_query($conn, "SELECT name FROM {$_SESSION['class']}");
$student_num = mysqli_num_rows($sql_query);
?>
<html lang="en">
<?php include("templates/header.php");?>

<div class="container">

 <div class="center">
    <h4><?php echo"Welcome to {$_SESSION['class']} registration form";?></p>
    <img src="img/circle_icon.png" alt="icon" width="200px">
 </div>

<div class="center">
  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="">

  <div class="center">

       <div class="input-field" >
          <input type="text" name='fname' style="width:30%;" placeholder="Student_Fullname">
          <p class="red-text"><?php echo $sms;?></p>
        </div>

      

  </div>
   
    
    <a href="reg_class.php" class="btn" >Back</a>
    <input type="submit" name="submit" class="btn" style="margin-left:20px;"> 

    <?php echo"<h4>you have $student_num student in {$_SESSION['class']}</h4>";?>

  </form>
 </div>


</div>





<?php include("templates/footer.php");?>
</html>