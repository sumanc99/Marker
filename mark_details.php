<?php
session_start();
//connecting db 
include("config/db_connect.php");
//functionpage connection
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");
$sms ="";
$_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='{$_SESSION['username']}' and status='marking'";
$sql_query = mysqli_query($conn, $sql);

$status = mysqli_num_rows($sql_query);
 

//  print_r($result);
if(isset($_POST['submit2'])){

    $result = continue_marking($_SESSION['username']);
     
      if(mysqli_num_rows($result) > 0){
          $subject = mysqli_fetch_assoc($result);
         $_SESSION['subject'] = $subject['subject'];
         $_SESSION['class_letter'] = $subject['class'];
         header("location:markingpage.php");
      }else{
        $sms = "<span class=red-text>You have no subject to continue marking</span>";
      }
      
      
  
  
  }
?>
<html lang="en">
<?php include("templates/header.php");?>

<div class="container" style="padding:10px; margin:20px auto;">

<?php if($status>0):?>
    <?php $result = mysqli_fetch_assoc($sql_query);?>
    <h5 class='center'>
    <?php  echo "subject marking: ".fullsubject_name($result['subject']); ?>
    </h5>

    <h5 class='center'>
    <?php  echo "class: ".$result['class']; ?>
    </h5>

    <h5 class='center'>
    <?php  echo "student left unmarked: ".class_unmark_num($result['class'], $result['subject']); ?>
    </h5>

    <h5 class='center'>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <a href="userpanel.php" class="btn" >back</a>
    <input type="submit" name="submit2" value="continue marking" class="btn green darken-1" style="margin-left:20px;">
    </form>
    </h5>
<?php else:?>
    <?php $result = mysqli_fetch_assoc($sql_query);?>
    <h5 class='center'>
    <?php  echo "subject marking: null";?>
    </h5>

    <h5 class='center'>
    <?php  echo "class: null"; ?>
    </h5>

    <h5 class='center'>
    <?php  echo "student left unmarked: null"; ?>
    </h5>

    <h5 class='center'>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <a href="userpanel.php" class="btn" >back</a>
    <input type="submit" name="submit2" value="continue marking" class="btn green darken-1" style="margin-left:20px;">
    <?php echo "<h6>$sms</h6>";?>
    </form>
    </h5>
<?php endif;?>
</div>

<?php include("templates/footer.php");?>
</html>